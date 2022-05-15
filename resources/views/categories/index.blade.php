@extends('layout.master')


@section ('content')
    <div class="row">

    @can('read_category',\App\Models\Category::class)

            <ul>
                @foreach($categories as $category)

                    <li >
                        {{$category->title}}<a href="/categories/{{$category->id}}/edit" class="btn btn-primary btn-sm ml-3 mt-3">Edit</a>
                        <form action="/categories/{{$category->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-danger btn-sm" value="DELETE">

                        </form>

                    </li>

                @endforeach
            </ul>
        @else
        <h3 class="container m-5 p-5">You can not see this page</h3>
        @endcan

    </div>
    @include('layout.errors')
@endsection

