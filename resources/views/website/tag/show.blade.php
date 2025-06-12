@extends('layouts.admin')
@section('content')
    <h2>Posts tagged with #{{ $tag->name }}</h2>
    @foreach ($posts as $post)
        <h4><a href="{{ route('auth.posts', $post->id) }}">{{ $post->title }}</a></h4>
    @endforeach

    {{ $posts->links() }}
@endsection
