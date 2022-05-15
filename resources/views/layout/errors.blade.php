@if(count($errors->all())>0)
    <ul class="bg-danger p-3">
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>

        @endforeach
        @endif

    </ul>
