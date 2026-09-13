@extends('frontend.layouts.app')
@section('title', $blog->meta_title ?: $blog->title)
@section('content')
<section class="section"><div class="container"><div class="row justify-content-center"><div class="col-lg-9"><a class="muted" href="{{ route('frontend.blog.index') }}">← Back to blog</a><div class="mt-4"><span class="eyebrow">{{ $blog->blogCategory->name ?? 'Development' }}</span><h1 class="display-5 fw-bold mt-3">{{ $blog->title }}</h1><p class="muted">{{ optional($blog->published_at)->format('M d, Y') }} · {{ $blog->author ?? 'Dipanshu Verma' }}</p><div class="card-pro mt-4"><p class="lead">{{ $blog->excerpt }}</p><hr><div class="muted">{!! $blog->content !!}</div></div></div></div></div></div></section>
@endsection