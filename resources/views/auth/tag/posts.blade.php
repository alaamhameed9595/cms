@extends('layouts.admin')
@section('title', 'Posts for Tag: ' . $tag->name)
@section('content')
    <div class="container-fluid">
        <h2 class="mb-4">Posts with tag: <span class="text-primary">{{ $tag->name }}</span></h2>
        @if ($posts->count() > 0)
            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->user->name ?? 'N/A' }}</td>
                                    <td>
                                        <span class="badge badge-{{ $post->is_published ? 'success' : 'warning' }}">
                                            {{ $post->is_published ? 'Published' : 'Draft' }}
                                        </span>
                                    </td>
                                    <td>{{ $post->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('auth.post.show', $post->id) }}"
                                            class="btn btn-sm btn-info">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="p-3">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        @else
            <div class="alert alert-info">No posts found for this tag.</div>
        @endif
    </div>
@endsection
