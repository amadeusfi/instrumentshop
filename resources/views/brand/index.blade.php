@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{Session::get('message')}}
                    </div>
                @endif
                <div class="card">
                    <div class="card-header text-lg-center">brands
                        <span class="float-right">
                            <a href="{{route('brand.create')}}">
                                <button class="btn btn-secondary">
                                    Insert brand
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
                                <th scope="col">Description</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($brands)>0) <!--check if there are prod to display-->
                            @foreach($brands as $key=>$brand) <!--getting from db $keys-->
                            <tr>
                                <td><img src="{{asset('images')}}/{{$brand->image}}" width="50" height="50"></td>
                                <td>{{$brand->name}}</td>
                                <td>{{$brand->description}}</td>
                                <td>
                                    <a href="{{route('brand.edit',[$brand->id])}}"> <!--routing [$brand{from controller}->id]-->
                                        <button class="btn btn-outline-success">Edit
                                        </button>
                                    </a>
                                </td>
                                <td>
                                    <a href="">
                                        <form action="{{route('brand.destroy',[$brand->id])}}" method="post">@csrf
                                            {{method_field('DELETE')}}
                                            <button class="btn btn-outline-danger">Delete
                                            </button>
                                        </form>
                                    </a>
                                </td>
                            </tr>
                            @endforeach <!--getting from db $keys-->
                            @else <!--check if there are brands to display-->
                            <td>No brand to display</td>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

