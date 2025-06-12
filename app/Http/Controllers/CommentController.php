<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Notifications\NewCommentNotification;
use App\Models\User;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {

        $validated = $request->validate([
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'website' => 'nullable|url|max:255',
            'body' => 'required|string|max:2000',
            // 'g-recaptcha-response' => 'required|captcha',
        ]);
        if ($request->parent_id != null) {
            $status = true;
            // Update the timestamp of the parent comment
        } else {
            $status = false;
        }
        $comment = Comment::create([
            'post_id' => $request->post_id,
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'email' => $request->email,
            'website' => $request->website,
            'body' => $request->body,
            'is_approved' => $status, // moderation
        ]);
        $admin = User::where('email', config('app.admin_email'))->first();
        $comment->updated_at = now()->addSecond();
        $comment->save();
        if ($admin) {
            $admin->notify(new NewCommentNotification($comment));
        }
        return back()->with('success', 'Comment submitted and waiting for approval!');
    }

    public function approve($id)
    {
        $comment = Comment::findOrFail($id);
        if (!$comment) {
            return back()->with('error', 'Comment not found!');
        }
        $comment->is_approved = true;
        $comment->save();
        return back()->with('success', 'Comment approved!');
    }

    public function reject($id)
    {
        $comment = Comment::findOrFail($id);
        if (!$comment) {
            return back()->with('error', 'Comment not found!');
        }
        $comment->is_approved = false;
        $comment->updated_at = now(); // Update the timestamp to reflect the change
        $comment->save();
        return back()->with('success', 'Comment rejected!');
    }
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        if (!$comment) {
            return back()->with('error', 'Comment not found!');
        }
        // Recursively delete all replies
        $this->deleteReplies($comment);
        $comment->delete();
        return back()->with('success', 'Comment and all its replies deleted successfully!');
    }

    private function deleteReplies($comment)
    {
        foreach ($comment->replies as $reply) {
            $this->deleteReplies($reply);
            $reply->delete();
        }
    }
}
