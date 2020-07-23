@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-lg-center">Products
                        <span class="float-right">
                            <a href="{{route('product.create')}}">
                                <button class="btn btn-secondary">
                                    Insert Product
                                </button>
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Price</th>
                                <th scope="col">Brand</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($products)>0) <!--check if there are prod to display-->
                            @foreach($products as $key=>$product) <!--getting from db $keys-->
                            <tr>
                                <td><img src="{{asset('images')}}/{{$product->image}}" width="60" height="60"></td>
                                <td>{{$product->name}}</td>
                                <td>€ {{$product->price}}</td>
                                <td>{{$product->brand_id}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->category_id}}</td>
                                <td>
                                    <a href="{{route('product.edit',[$product->id])}}"> <!--routing [$product{from controller}->id]-->
                                        <button class="btn btn-outline-success">Edit
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="">
                                        <form action="{{route('product.destroy',[$product->id])}}" method="post">@csrf
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-outline-danger">Delete
                                            </button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            @endforeach <!--getting from db $keys-->
                            @else <!--check if there are products to display-->
                            <td>No Product to display</td>
                            @endif
                            </tbody>
                        </table>
                        {{$products->links()}}    {{--for paginate--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

