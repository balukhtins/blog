@extends('layouts/index')

@section('content')

    <div class="container">
        <div class="row">

            <users_index-component
                    :users="{{ $users }}"
                    :request="{{ $request }}"
            ></users_index-component>

        </div>
    </div>


{{--    {{ $users->links() }}--}}

@endsection