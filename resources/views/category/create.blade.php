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
                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">@csrf
                <div class="card">
                    <div class="card-header">Category</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror ">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$message}}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description"></textarea>

                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control"  name="image">

                        </div>

                        <div class="form-group">
                            <button class="btn btn-outline-primary">
                                    Insert Category
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
