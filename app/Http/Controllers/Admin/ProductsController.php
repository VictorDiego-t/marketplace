<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\UploadTrait;
use App\Models\Store;
use App\Http\Requests\ProductRequest;


class ProductsController extends Controller
{
    use UploadTrait;
    public function index()
    {
        if(auth()->user()->store()->count()){
            $userStore = auth()->user()->store;
            $product = $userStore->products()->paginate(10);
            $user = auth()->user()->store;
            return view('admin.products.index', compact('product','user'));
        }
        else{
            flash('Você Ainda Não Possui Produtos Crie Um Para Prosseguir')->warning();
            return redirect()->route('admin.products.create');
        } 

    }

    public function create(){
    $categories = \App\Models\Category::all(['id', 'name']);
    return view('admin.products.create', compact('categories'));
    }
    
    public function store(ProductRequest $request)
    {
        if(auth()->user()->store()->count()){
        $data = $request->all();
        $categories = $request->get('categories', null);
        $stores = auth()->user()->store;
        $product = $stores->products()->create($data);
        $product->categories()->sync($categories);
        if($request->hasFile('photos')){
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }

        flash('Produto Criado Com Sucesso')->success();
        return redirect()->route('admin.products.index');
    }else{
        flash('Crie Uma Loja Antes De Criar Produtos')->warning();
        return redirect()->route('admin.stores.create');
    }

    }

    public function edit($product)
    {
        $product = Product::findOrFail($product);
        $categories = \App\Models\Category::all(['id', 'name']);
        return view('admin.products.edit', compact('product', 'categories'));

    }

    public function update(ProductRequest $request, $product)
    {
        $data = $request->all();
        $categories = $request->get('categories', null);
        
        $product = Product::find($product);
        $product->update($data);
        if(!is_null($categories)){
        $product->categories()->sync($data['categories']);
        }


        if($request->hasFile('photos')){
            $images = $this->imageUpload($request->file('photos'), 'image');

            $product->photos()->createMany($images);
        }


        flash('Produto Atualizado Com Sucesso')->success();
        return redirect()->route('admin.products.index');

    }


    public function destroy($product)
    {
        $product = Product::find($product);
        $product->delete();
        flash('Produto Removido Com Sucesso')->success();
        return redirect()->route('admin.products.index');


    }


}
