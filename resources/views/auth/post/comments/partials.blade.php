@foreach ($comments as $comment)
    <div class="col-md-12 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <span class="font-weight-bold text-primary">{{ $comment->name }}</span>
                    <span class="text-muted small">{{ $comment->created_at->format('d M Y, H:i') }}</span>
                </div>
                <div class="mb-2">
                    <span class="d-block bg-light rounded px-2 py-2">{{ $comment->body }}</span>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        @if ($comment->is_approved == false && $comment->created_at == $comment->updated_at)
                            <span class="badge badge-warning px-2 py-1">Pending</span>
                        @elseif ($comment->is_approved == true)
                            <span class="badge badge-success px-2 py-1">Approved</span>
                        @else
                            <span class="badge badge-danger px-2 py-1">Rejected</span>
                        @endif
                    </div>
                    <div>
                        @if ($comment->is_approved == false && $comment->created_at == $comment->updated_at)
                            <form action="{{ route('comments.approve', $comment->id) }}" method="POST"
                                class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-sm mx-1 shadow-sm" title="Accept"><i
                                        class="mdi mdi-check"></i></button>
                            </form>
                            <form action="{{ route('comments.reject', $comment->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btn-sm mx-1 shadow-sm" title="Reject"><i
                                        class="mdi mdi-close"></i></button>
                            </form>
                        @endif
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm mx-1 shadow-sm" title="Delete"><i
                                    class="mdi mdi-delete"></i></button>
                        </form>
                    </div>
                </div>
                @if ($comment->replies && $comment->replies->count() > 0)
                    <button class="btn btn-link btn-sm mt-3 toggle-replies" type="button" data-bs-toggle="collapse"
                        data-bs-target="#replies-{{ $comment->id }}" aria-expanded="false"
                        aria-controls="replies-{{ $comment->id }}">
                        <span class="text-primary">Show/Hide Replies ({{ $comment->replies->count() }})</span>
                    </button>
                    <div class="collapse" id="replies-{{ $comment->id }}">
                        <div class="ml-4 mt-3 border-left pl-3">
                            @include('auth.post.comments.partials', [
                                'post' => $post,
                                'comments' => $comment->replies,
                                'isAdmin' => true,
                            ])
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // For Bootstrap 4/5 collapse
        var toggles = document.querySelectorAll('.toggle-replies');
        toggles.forEach(function(btn) {
            btn.addEventListener('click', function() {
                var target = btn.getAttribute('data-target');
                var el = document.querySelector(target);
                if (el) {
                    el.classList.toggle('show');
                }
            });
        });
    });
</script>
