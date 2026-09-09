@extends('frontend.layouts.app')

@section('title', $blog->title)

@section('content')
    <h1>{{ $blog->title }}</h1>
    <p>Blog post details coming soon.</p>
@endsection