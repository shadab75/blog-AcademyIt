@extends('layout.master')



@section('content')

<div class="row">

    <div class="col-sm-12">
        <h1 class="m-4">roles <a href="/roles/create" class="btn btn-success">Add New Role</a> </h1>
        <table class="table m-4">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roles as $role)
                <tr>
            <th scope="row">{{$role->id}}</th>
            <td>{{$role->title}}</td>
            <td><a href="/roles/{{$role->id}}" class="btn btn-primary  btn-sm">Edit</a></td>
            <td>
                <form action="/roles/{{$role->id}}" method="post">
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
