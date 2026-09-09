@extends('frontend.layouts.app')

@section('title', 'Blog')

@section('content')
    <h1>Blog</h1>

    @foreach ($blogs as $blog)
        <h2>{{ $blog->title }}</h2>
    @endforeach
@endsection