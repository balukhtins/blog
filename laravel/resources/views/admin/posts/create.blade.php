@extends('layouts.admin')

@section('content')

    <admin_posts_create-component
        :routes="{{ collect($routes) }}"
        :props_published_status="{{ collect($published_status) }}"
    ></admin_posts_create-component>

@endsection