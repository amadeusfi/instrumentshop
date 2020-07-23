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
                <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">Insert new Products</div>
                        <div class="card-body">
                               <div class="form-group">
                                <label for="name">Category</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">Select Category</option>
                                    @foreach(App\Category::all() as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Brand</label>
                                <select name="brand" class="form-control @error('brand') is-invalid @enderror">
                                    <option value="">Select Brand</option>
                                    @foreach(App\Brand::all() as $brand)
                                        <option value="{{$brand->id}}">{{$brand->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price"
                                       class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control"  name="image">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-primary" type="submit">
                                    Insert product
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
