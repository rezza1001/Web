<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $fillable = ['user_id', 'post_id', 'comment_id', 'content', 'status'];

	public function posts() {
		return $this->hasMany('App\Post');
	}
	public function user() {
		return $this->belongsTo('App\User');
	}
	public function post() {
		return $this->belongsTo('App\Post');
	}
	public function parents() {
		return $this->hasMany(Comment::class , 'comment_id');
	}
	public function parent() {
		return $this->belongTo(Comment::class , 'comment_id');
	}
	public function isParent() {
		return !!$this->parent;
	}

}
