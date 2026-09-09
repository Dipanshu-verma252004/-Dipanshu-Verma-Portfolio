@extends('frontend.layouts.app')

@section('title', 'Projects')

@section('content')
    <h1>Projects</h1>

    @foreach ($projects as $project)
        <h2>{{ $project->title }}</h2>
    @endforeach
@endsection