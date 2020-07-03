@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header text-lg-center"><h4>Product</h4></div>
                    <div class="card-body">
                        <img {{--src="{{asset('images')}}/{{$product->image}}" --}}class="border-success" width="100rem" height="100rem">


                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-lg-center"><h4>Details</h4></div>
                    <div class="card-body text-lg-center">
                        <p><h5>{{$product->name}}</h5></p>
                        <p><h6>€ {{$product->price}}</h6></p>
                        <p><h6>{{$product->description}}</h6></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
