@extends('layouts.app')

@section('content')
<h1></h1>
<a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success mb-2">Criar produto</a>
  <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Loja</th>
                <th>Ações</th>
                
                
                
            </tr>
        </thead>
        <tbody>
            @foreach($product as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>R${{$p->price}}</td>
                <td>{{$user->name}}</td>
                <td>
                <a href="{{route('admin.products.edit', ['product' => $p->id])}}" class="btn btn-sm btn-primary">EDITAR</a>

                <a href="{{route('admin.products.destroy', ['product' => $p->id])}}" class="btn btn-sm btn-danger">REMOVER</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$product->links()}}
@endsection