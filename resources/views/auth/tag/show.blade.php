@extends('layouts.admin')
@section('title', 'Tag: ' . $tag->name)
@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="font-weight-bold text-primary mb-2">Tag: {{ $tag->name }}</h2>
                <p class="text-muted">Slug: <span class="badge badge-info">{{ $tag->slug }}</span></p>
                <p class="text-secondary">{{ $tag->description ?? 'No description for this tag.' }}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-light">
                        <h5 class="mb-0">Posts with this tag ({{ $posts->total() }})</h5>
                    </div>
                    <div class="card-body p-0">
                        @if ($posts->count())
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-light">
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
                                                <td><a href="{{ route('auth.posts.show', $post->id) }}"
                                                        class="text-primary font-weight-bold">{{ $post->title }}</a></td>
                                                <td>{{ $post->user->name ?? 'N/A' }}</td>
                                                <td>
                                                    <span
                                                        class="badge badge-{{ $post->is_published ? 'success' : 'warning' }}">
                                                        {{ $post->is_published ? 'Published' : 'Draft' }}
                                                    </span>
                                                </td>
                                                <td>{{ $post->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('auth.posts.show', $post->id) }}"
                                                        class="btn btn-sm btn-info">View</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3 ml-2">
                                {{ $posts->links() }}
                            </div>
                        @else
                            <div class="alert alert-info m-3">No posts found for this tag.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
