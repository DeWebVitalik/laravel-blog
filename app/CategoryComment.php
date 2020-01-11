<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryComment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category_comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['author','content','category_id'];
}
