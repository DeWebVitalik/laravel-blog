<?php

namespace App\Widgets;

use App\PostComment;
use App\CategoryComment;
use Arrilot\Widgets\AbstractWidget;

class Comments extends AbstractWidget
{
    const TYPE_POST = 1;
    const TYPE_CATEGORY =0;
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {

        switch ($this->config['type']) {
            case self::TYPE_CATEGORY:
                $comments = CategoryComment::where('category_id', $this->config['id'])->get();
                break;
            case self::TYPE_POST:
                $comments = PostComment::where('post_id', $this->config['id'])->get();
                break;
            default:
                $comments = [];
        }

        return view('widgets.comments', [
            'config' => $this->config,
            'comments' => $comments
        ]);
    }
}
