@extends('layout.master')



@section('content')

    <div class="row">

        <div class="col-sm-12">
            <h1 class="m-4">roles <a href="/roles/create" class="btn btn-success">Add New Role</a> </h1>
            <table class="table m-4">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->mobile}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->title}}</td>

                        <td><a href="/users/{{$user->id}}/edit" class="btn btn-primary  btn-sm">Edit</a></td>
                        <td>
                            <form action="/users/{{$user->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="DELETE" class="btn btn-danger btn-sm ">
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
