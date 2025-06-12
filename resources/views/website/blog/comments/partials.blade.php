@foreach ($comments as $comment)
    <li class="media mb-4 p-3 border rounded bg-white shadow-sm">
        <a class="pull-left mr-3" href="#">
            <img class="media-object comment-avatar rounded-circle border"
                style="width:48px;height:48px;object-fit:cover;"
                src="{{ asset('assets/website/images/blog/avater-1.jpg') }}" alt="">
        </a>
        <div class="media-body">
            <div class="d-flex align-items-center mb-1">
                <h6 class="mb-0 font-weight-bold mr-2 text-primary">{{ $comment->name }}</h6>
                <span class="text-muted small ml-2">{{ $comment->created_at->diffForHumans() }}</span>
            </div>
            <div class="bg-light rounded px-3 py-2 mb-1 d-inline-block w-auto">
                <span class="text-dark">{{ $comment->body }}</span>
            </div>
            <div class="d-flex align-items-center mt-1">
                <button onclick="toggleReplyForm({{ $comment->id }})" class="btn btn-link btn-sm p-0 mr-3 text-primary"
                    style="font-size: 0.95rem;">Reply</button>
            </div>
            <form action="{{ route('comments.store') }}" method="POST" id="reply-form-{{ $comment->id }}"
                class="d-none mt-2 bg-white p-3 rounded border">
                @csrf
                <input type="hidden" name="post_id" value="{{ $comment->post_id }}">
                <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                <div class="form-row">
                    <div class="col-md-4 mb-2">
                        <input name="name" required placeholder="Name" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4 mb-2">
                        <input name="email" required placeholder="Email" class="form-control form-control-sm">
                    </div>
                    <div class="col-md-4 mb-2">
                        <input name="website" placeholder="Website" class="form-control form-control-sm">
                    </div>
                </div>
                <textarea name="body" required placeholder="Write a reply..." class="form-control form-control-sm mb-2"></textarea>
                <button type="submit" class="btn btn-primary btn-sm">Reply</button>
            </form>
            @if ($comment->approvedReplies && $comment->approvedReplies->count() > 0)
                <button class="btn btn-link btn-sm mt-3" type="button" data-bs-toggle="collapse"
                    data-bs-target="#replies-{{ $comment->id }}" aria-expanded="false"
                    aria-controls="replies-{{ $comment->id }}">
                    <span class="text-primary">Show/Hide Replies ({{ $comment->approvedReplies->count() }})</span>
                </button>
                <ul class="list-unstyled ml-5 mt-3 collapse" id="replies-{{ $comment->id }}">
                    @include('website.blog.comments.partials', ['comments' => $comment->approvedReplies])
                </ul>
            @endif
        </div>
    </li>
@endforeach
<script>
    // Only keep the reply form toggle, remove any JS for replies collapse
    function toggleReplyForm(id) {
        let form = document.getElementById('reply-form-' + id);
        if (form) form.classList.toggle('d-none');
    }
</script>
