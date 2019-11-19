@extends('layouts.admin')

@section('content')

    <admin_posts_index-component
        :posts="{{ $posts }}"
        :routes="{{ collect($routes) }}"
    ></admin_posts_index-component>

@endsection