<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['author','content','post_id'];
}
