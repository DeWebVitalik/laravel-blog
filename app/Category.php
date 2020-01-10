<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'category';

    /**
     * Get category posts
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
