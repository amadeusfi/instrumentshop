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
                <form action="{{route('customer.store')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card">
                        <div class="card-header">Insert new customers</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Birth Date</label>
                                <input type="date" name="birth_date" class="form-control @error('birth_date') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="registration_date">Registration Date</label>
                                <input type="date" name="registration_date" class="form-control @error('registration_date') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="city">city</label>
                                <input type="text" name="city" class="form-control @error('city') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="plz">plz</label>
                                <input type="text" name="plz" class="form-control @error('plz') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="country">country</label>
                                <input type="text" name="country" class="form-control @error('country') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="text" name="password" class="form-control @error('password') is-invalid @enderror">
                            </div>
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-outline-primary" type="submit">
                                    Insert customer
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
