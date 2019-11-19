@extends('layouts.index')

@section('content')

    <posts_index-component
        :posts="{{ $posts }}"
        :routes="{{ collect($routes) }}"
    ></posts_index-component>

@endsection