<?php

namespace App;

use App\Services\PostService;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'content', 'category_id', 'file'];

    /**
     * Get the post category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Get short content
     */
    public function getLittleContentAttribute()
    {
        return PostService::getLittleContent($this->content,200);
    }

    /**
     * Returns true if the file is an image
     *
     * @return bool
     */
    public function getFileImageAttribute(){
        return PostService::fileIsImage($this->file);
    }

    /**
     * Format created_at
     * @param $value
     * @return mixed
     */
    public function getDateAttribute()
    {
        return $this->created_at->format('d/m/y H:i');
    }

}
