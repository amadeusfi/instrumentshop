@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @foreach($categories as $category)
                <div class="col-md-12">
                    <h2 style="color:darkred">{{$category->name}}</h2>
                    <div class="jumbotron">
                        <div class="row">
                            @foreach(App\Product::where('category_id',$category->id)->get() as $product)
                                <div class="col-md-3">
                                    <p class="text-center"><div>{{$product->name}}</div><div> ${{$product->price}}</div>
                                    <button class="btn btn-dark">Buy</button>
                                    </p>
                                    <div class="">
                                        <a href="{{route('product.detail',[$product->id])}}">  {{--the function in the controller--}}
                                            <button class="btn btn-info">
                                                Info   {{--go to details of the product so the page is not overload--}}
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

