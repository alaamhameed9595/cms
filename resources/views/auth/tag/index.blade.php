@extends('layouts.admin')
@section('title', 'All Tags')
@section('content')
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <h2 class="font-weight-bold text-primary mb-0">All Tags</h2>
                <a href="{{ route('auth.tag.create') }}" class="btn btn-primary">
                    <i class="mdi mdi-plus-box"></i> Create Tag
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        @if ($tags->count())
                            <div class="table-responsive">
                                <table class="table table-hover mb-0">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tags as $tag)
                                            <tr>
                                                <td>
                                                    <span class="tag-name-display text-primary font-weight-bold"
                                                        data-tag-id="{{ $tag->id }}">
                                                        {{ $tag->name }}
                                                    </span>
                                                    <input type="text" class="form-control tag-name-input d-none"
                                                        value="{{ $tag->name }}" data-tag-id="{{ $tag->id }}"
                                                        onblur="saveTagEdit(this)"
                                                        onkeydown="if(event.key==='Enter'){this.blur();}">
                                                    <button type="button" class="btn btn-link btn-sm p-0 align-baseline"
                                                        onclick="enableTagEdit(this.previousElementSibling.previousElementSibling)">
                                                        <span class="mdi mdi-pencil"></span>
                                                    </button>
                                                </td>
                                                <td>{{ $tag->slug }}</td>

                                                <td>{{ $tag->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('auth.tag.posts', $tag->slug) }}"
                                                        class="btn btn-sm btn-info" title="View">
                                                        <span class="mdi mdi-eye"></span>
                                                    </a>
                                                    @haspermission('edit tags')
                                                        <a href="{{ route('auth.tag.edit', $tag->id) }}"
                                                            class="btn btn-sm btn-warning" title="Edit">
                                                            <span class="mdi mdi-pencil"></span>
                                                        </a>
                                                    @endhaspermission
                                                    @haspermission('delete tags')
                                                        <a href="{{ route('auth.tag.delete', $tag->id) }}"
                                                            class="btn btn-sm btn-danger" title="Delete">
                                                            <span class="mdi mdi-trash-can"></span>
                                                        </a>
                                                    @endhaspermission
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info m-3">No tags found.</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function enableTagEdit(span) {
            const input = span.nextElementSibling;
            span.classList.add('d-none');
            input.classList.remove('d-none');
            input.focus();
            input.select();
        }

        function saveTagEdit(input) {
            const span = input.previousElementSibling;
            const tagId = input.getAttribute('data-tag-id');
            const newName = input.value.trim();
            if (!newName) {
                input.classList.add('is-invalid');
                return;
            }
            // AJAX request to update tag name
            fetch(`/admin/tags/${tagId}/update-name`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        name: newName
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        span.textContent = newName;
                        input.classList.remove('is-invalid');
                    } else {
                        input.classList.add('is-invalid');
                        alert(data.message || 'Update failed');
                    }
                })
                .catch(() => {
                    input.classList.add('is-invalid');
                    alert('Update failed');
                })
                .finally(() => {
                    input.classList.add('d-none');
                    span.classList.remove('d-none');
                });
        }
    </script>
@endsection
