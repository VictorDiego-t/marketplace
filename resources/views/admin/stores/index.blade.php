@extends('layouts.app')

@section('content')
@if(!$store)
<h1></h1>
<a href="{{route('admin.stores.create')}}" class="btn btn-lg btn-success">Criar Loja</a>
@endif
  <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Loja</th>
                <th>Total De Produtos</th>
                <th>Ações</th>
                
                
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->products->count()}}</td>
                <td>
                <a href="{{route('admin.stores.edit', ['store' => $store->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                <a href="{{route('admin.stores.destroy', ['store' => $store->id])}}" class="btn btn-sm btn-danger">REMOVER</a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection