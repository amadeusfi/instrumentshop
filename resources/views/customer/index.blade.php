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
                    <div class="card-header text-lg-center">customers
                        <span class="float-right">
                            <a href="{{route('customer.create')}}">
                                <button class="btn btn-secondary">
                                    Insert customer
                                </button>
                            </a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Image</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Birth Date</th>
                                <th scope="col">Registration Date</th>
                                <th scope="col">Address</th>
                                <th scope="col">City</th>
                                <th scope="col">Plz</th>
                                <th scope="col">Country</th>
                                <th scope="col">Email</th>
                                <th scope="col">password</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(count($customers)>0) <!--check if there are prod to display-->
                                @foreach($customers as $key=>$customer) <!--getting from db $keys-->
                                <tr>
                                    <td><img src="{{asset('images')}}/{{$customer->image}}" width="50" height="50"></td>
                                    <td>{{$customer->last_name}}</td>
                                    <td>{{$customer->first_name}}</td>
                                    <td>{{$customer->birth_date}}</td>
                                    <td>{{$customer->registration_date}}</td>
                                    <td>{{$customer->address}}</td>
                                    <td>{{$customer->city}}</td>
                                    <td>{{$customer->plz}}</td>
                                    <td>{{$customer->country}}</td>
                                    <td>{{$customer->email}}</td>
                                    <td>{{$customer->password}}</td>
                                    <td>
                                        <a href="{{route('customer.edit',[$customer->id])}}"> <!--routing [$customer{from controller}->id]-->
                                            <button class="btn btn-outline-success">Edit
                                            </button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="">
                                            <form action="{{route('customer.destroy',[$customer->id])}}" method="post">@csrf
                                                {{method_field('DELETE')}}
                                                <button class="btn btn-outline-danger">Delete
                                                </button>
                                            </form>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach <!--getting from db $keys-->
                                @else <!--check if there are customers to display-->
                                <td>No customer to display</td>
                                @endif
                            </tbody>
                        </table>
                        {{$customers->links()}}    {{--for paginate--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

