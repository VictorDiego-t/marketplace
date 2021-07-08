<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \App\Models\ProductPhoto;
class ProductPhotoController extends Controller
{
    public function removephoto(Request $request){
        
        $photoName = $request->get('photoName');
        //Remover Dos Aruqivos
        if(Storage::disk('public')->exists($photoName)){
            Storage::disk('public')->delete($photoName);
        }
        //Remover Do Banco
        $removePhoto = ProductPhoto::where('image', $photoName);
        $productId = $removePhoto->first()->product_id;
        $removePhoto->delete();

        flash('Imagem Removida Com Sucesso!')->success();
        return redirect()->route('admin.products.edit', ['product' => $productId]);
    }
}
