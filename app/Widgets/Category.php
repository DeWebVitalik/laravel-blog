<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;
use App\Category as CategoryModel;

class Category extends AbstractWidget
{
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
        $categories = CategoryModel::all();
        return view('widgets.category', compact('categories'));
    }
}
