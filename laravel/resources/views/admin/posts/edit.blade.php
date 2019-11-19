@extends('layouts.admin')

@section('content')

    <admin_posts_edit-component
        :routes="{{ collect($routes) }}"
        :props_published_status="{{ collect($published_status) }}"
        :post="{{ $post }}"
    ></admin_posts_edit-component>

@endsection