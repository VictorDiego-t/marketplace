@extends('layouts.app')

@section('content')

<h1>Atualizar Loja</h1>
<form action="{{route('admin.stores.update',['store' => $store->id])}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">

    <div class='form-group'>
        <label>Nome Loja</label>
        <h1></h1>
        <input type="text" name="name" class="form-control" value="{{$store->name}}">
    </div>
    
    <div class='form-group'>
        <label>Descrição</label>
        <h1></h1>
        <input type="text" name="description" class="form-control" value="{{$store->description}}">
    </div>
    
    <div class='form-group'>
        <h1></h1>
        <label>Telefone</label>
        <input type="text" name="phone" class="form-control" value="{{$store->phone}}">
    </div>
    
    <div class='form-group'>
        <h1></h1>
        <label>Celular</label>
        <input type="text" name="mobile_phone" class="form-control" value="{{$store->mobile_phone}}">
    </div>

    <div class="form-group">
        <p>
            <img src="{{asset('storage/' . $store->logo)}}" alt="" class="img-control">
        </p>
        <label>Fotos  Do Produto</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror"multiple>

        @error('logo')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    

    
    <div>
        <h1></h1>
        <button type="submit" class="btn btn-lg btn-success">Atualizar Loja</button>
    </div>
</form>
@endsection
