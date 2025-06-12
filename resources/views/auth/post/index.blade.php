@extends('layouts.admin')
@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
@endsection
@section('title', 'Posts')
@section('content')
    <!-- partial -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">All posts</h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('auth.posts') }}">Posts</a></li>

                    </ol>
                </nav>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('auth.post.create') }}" class="btn btn-primary btn-sm">Create Post</a>
                            @if ($posts->count() > 0)
                                <h4 class="card-title">All Posts</h4>

                                <table class="table" id="post_table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Is published</th>
                                            <th>Category</th>
                                            <th>Created at</th>
                                            <th>images</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->title }}</td>
                                                <td>{!! Str::limit($post->description, 15, '...') !!}</td>
                                                <td>
                                                    @if ($post->is_published)
                                                        <label class="badge badge-success">Published</label>
                                                    @else
                                                        <label class="badge badge-danger">Draft</label>
                                                    @endif
                                                </td>
                                                <td>{{ $post->category->name }}</td>
                                                <td>{{ $post->created_at }}</td>
                                                <td>
                                                    @isset($post->gallery)
                                                        <img src="{{ $post->getImageUrlAttribute() }}" alt="Image"
                                                            style="width: 50px; height: 50px;">
                                                    @endisset($post->images)


                                                </td>
                                                <td>
                                                    <a href="{{ route('auth.post.show', $post->id) }}"
                                                        class="btn btn-info btn-sm" title="view post"><i
                                                            class="fa fa-eye"></i>
                                                    </a>
                                                    @haspermission('edit posts')
                                                        <a href="{{ route('auth.post.edit', $post->id) }}"
                                                            class="btn btn-warning btn-sm" title="edit post"> <i
                                                                class="fa fa-edit"></i></a>
                                                    @endhaspermission
                                                    @haspermission('publish posts')
                                                        @if ($post->is_published == false)
                                                            <a href="{{ route('auth.post.publish', $post->id) }}"
                                                                class="btn btn-success btn-sm" title="Publish to Public">
                                                                <i class="fa fa-globe"></i>
                                                            </a>
                                                        @endif
                                                    @endhaspermission
                                                    @haspermission('delete posts')
                                                        <form action="{{ route('auth.post.destroy', $post->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                title="Delete Post" onclick="return confirm('Are you sure?')"><i
                                                                    class="fa fa-trash"></i> </button>
                                                        </form>
                                                    @endhaspermission
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $posts->links() }}
                            @else
                                <h4 class="card-title">No Posts Found</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial -->

        <!-- main-panel ends -->
    @endsection
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#post_table').DataTable();
            });
        </script>
    @endsection
