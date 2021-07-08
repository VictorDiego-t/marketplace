@extends('layouts.front')

@section('content')

<div class="row">
    <div class="col-4">
        <img src="{{asset('storage/' . $product->photos->first()->image)}}" alt="" class="card-img-top">
    </div>
    <div class="col-8">
        <h2>{{$product->name}}</h2>
        <p>
            {{$product->description}}
        </p>
        <h3>{{$product->price}}</h3>

        <span>
            Loja: {{$product->store->name}}
        </span>
    </div>
<h1></h1>
</div>

<div class="row">
<div class="col-12">
    <hr>
    {{$product->body}}

</div>
</div>



@endsection

