@extends('layouts.app')


@section('content')

    <a href="{{route('admin.categories.create')}}" class="btn btn-lg btn-success mb-2">Criar Categoria</a>

    <table class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td width="15%">
                        <div class="btn-group">
                            <a href="{{route('admin.categories.edit', ['category' => $category->id])}}" class="btn btn-sm btn-primary ml-1">EDITAR</a>
                            <form action="{{route('admin.categories.destroy', ['category' => $category->id])}}" method="post">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-sm btn-danger">REMOVER</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection