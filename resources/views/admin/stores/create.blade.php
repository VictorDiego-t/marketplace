@extends('layouts.app')

@section('content')

<h1>Criar Loja</h1>
<form action="{{{route('admin.stores.store')}}}" method="post" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class='form-group'>
        <label>Nome Loja</label>
        <h1></h1>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
        @error ('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    
    <div class='form-group'>
        <label>Descrição</label>
        <label>(Minimo 10 Caracteres)</label>
        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror"value="{{old('description')}}">
        @error ('description')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    
    <div class='form-group'>
        <h1></h1>
        <label>Telefone</label>
        <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"value="{{old('phone')}}">
        @error ('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>

        @enderror
    </div>
    
    <div class='form-group'>
        <h1></h1>
        <label>Whatsapp</label>
        <input type="text" name="mobile_phone" class="form-control @error('mobile_phone') is-invalid @enderror"value="{{old('mobile_phone')}}">
        @error ('mobile_phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label>Fotos  Da logo</label>
        <input type="file" name="logo" class="form-control @error('logo.*') is-invalid @enderror"multiple>

        @error('logo')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>


    
    
    <div>
        
        <h1></h1>
        <button type="submit" class="btn btn-lg btn-success @error ('name') btn-danger @enderror @error ('description') btn-danger @enderror @error ('phone') btn-danger @enderror @error ('mobile_phone') btn-danger @enderror">Criar Loja</button>

    </div>
</form>
@endsection
