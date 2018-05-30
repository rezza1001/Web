<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Frontend\Controller;

use App\Comment;
use App\Post;
use Auth;
use Request;
use Response;

class CommentController extends Controller {

	public function comment() {
		if (Request::ajax()) {
			if (Auth::check()) {
				$postId    = $_POST['postId'];
				$parent_id = $_POST['commentId'];
				if ($parent_id == 0) {
					$parent_id = null;
				}
				$post           = Post::find($postId);
				$commentMessage = $_POST['commentMessage'];
				if (!empty($commentMessage)) {
					$user   = Auth::user();
					$avatar = "images/default_square.jpg";
					if (count($user->getMedia('thumbnail'))) {
						$avatar = $user->getMedia('thumbnail')->first();
						$avatar = "media/".$avatar->id."/conversions/square.jpg";
					}
					$post->increment('comments', 1);
					$comment             = new Comment;
					$comment->user_id    = $user->id;
					$comment->post_id    = $postId;
					$comment->comment_id = $parent_id;
					$comment->content    = $commentMessage;
					$comment->like       = 0;
					$comment->dislike    = 0;
					$comment->report     = 0;
					$comment->save();
					$data = array(
						'name'       => $user->name,
						'userslug'   => $user->slug,
						'comment'    => $commentMessage,
						'date'       => $comment->created_at,
						'avatar'     => $avatar,
						'post_id'    => $postId,
						'comment_id' => $comment->id,
						'parent_id'  => $parent_id,
					);
					return Response::json($data);
				} else {
					$data = array(
						'status' => 3,
					);
					return Response::json($data);
				}

			}
			$data = array(
				'status' => 3,
			);
			return Response::json($data);
		}
	}
	public function likeComment() {
		if (Request::ajax()) {

			if (Auth::check()) {
				$commentId = $_POST['commentId'];
				$comment   = Comment::find($commentId);
				$comment->increment('like', 1);
				$data = array(
					'comment_id' => $commentId,
				);
			} else {
				$data = array(
					'status' => 3,
				);
				return Response::json($data);
			}
			return Response::json($data);
		}
	}
	public function dislikeComment() {
		if (Request::ajax()) {
			if (Auth::check()) {
				$commentId = $_POST['commentId'];
				$comment   = Comment::find($commentId);
				$comment->increment('dislike', 1);
				$data = array(
					'comment_id' => $commentId,
				);
			} else {
				$data = array(
					'status' => 3,
				);
				return Response::json($data);
			}
			return Response::json($data);
		}
	}
	public function reportComment() {
		if (Request::ajax()) {

			if (Auth::check()) {

				$commentId = $_POST['commentId'];
				$comment   = Comment::find($commentId);
				$comment->increment('report', 1);
				$data = array(
					'comment_id' => $commentId,
				);
			} else {
				$data = array(
					'status' => 3,
				);
				return Response::json($data);
			}
			return Response::json($data);
		}
	}
}
