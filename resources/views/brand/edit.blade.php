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

                <form action="{{route('brand.update',[$brand->id])}}" method="post" enctype="multipart/form-data">@csrf <!-- specify cat mit id  -->
                {{method_field('PUT')}} <!--because re routing at web -->
                    <div class="card">
                        <div class="card-header">Update brand</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{$brand->name}}"><!-- specify val aus db  -->
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" >{{$brand->description}}</textarea><!--specify val aus db-->
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control"  name="image">
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
