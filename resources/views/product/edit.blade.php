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

                <form action="{{route('product.update',[$product->id])}}"
                      method="post" enctype="multipart/form-data">@csrf <!-- specify cat mit id  -->
                {{method_field('PUT')}} <!--because re routing at web -->
                    <div class="card">
                        <div class="card-header">Update product</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Category</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">Select Category</option>
                                    @foreach(App\Category::all() as $category)
                                        <option value="{{$category->id}}"
                                                @if($category->id==$product->category_id)selected
                                            @endif>
                                            {{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Brand</label>
                                <select name="brand" class="form-control @error('brand') is-invalid @enderror">
                                    <option value="">Select Brand</option>
                                    @foreach(App\Brand::all() as $brand)
                                        <option value="{{$brand->id}}"
                                                @if($brand->id==$product->brand_id)selected
                                            @endif>
                                            {{$brand->name}}
                                        </option>
                                    @endforeach
                                </select>

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{$product->name}}"><!-- specify val aus db  -->
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" name="price"
                                       class="form-control @error('price') is-invalid @enderror"
                                       value="{{$product->price}}"><!-- specify val aus db  -->
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description"
                                          class="form-control @error('description') is-invalid @enderror">{{$product->description}}</textarea>
                                <!--specify val aus db-->
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-primary">
                                    update
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
