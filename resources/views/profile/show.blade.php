@extends('layout.master')




@section('content')


    <div class="row">
        <div class="col-sm-12 p-3">
        <h1>Profile</h1>
          <p> <a href="/profile/edit" class="btn btn-primary">Edit your personal data</a></p>
        <p class="pl-4">
            <strong>name :</strong>
            {{$user->name}}

        </p>
            <p class="pl-4">
                <strong>email :</strong>
                {{$user->email}}

            </p>

            <p class="pl-4">

                <strong>mobile :</strong>
                {{$user->mobile}}


            </p>

        </div>
    </div>



@endsection
