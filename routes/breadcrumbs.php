<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

//Categories
Breadcrumbs::for('categories', function ($trail) {
    $trail->parent('home');
    $trail->push('Categories', route('categories'));
});

//Add category
Breadcrumbs::for('categoryAdd', function ($trail) {
    $trail->parent('home');
    $trail->push('Add category', route('categoryAdd'));
});

//Add post
Breadcrumbs::for('postAdd', function ($trail) {
    $trail->parent('home');
    $trail->push('Add post', route('postAdd'));
});

//Update category
Breadcrumbs::for('categoryUpdate', function ($trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('categoryShow', $category->id));
    $trail->push('Update:' . $category->name, route('categoryUpdate', $category->id));
});

//Update post
Breadcrumbs::for('postUpdate', function ($trail, $post) {
    $trail->parent('home');
    $trail->push($post->category->name, route('categoryShow', $post->category_id));
    $trail->push('Update:' . $post->name, route('categoryUpdate', $post->id));
});


//Show category
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('home');
    $trail->push($category->name, route('categoryShow', $category->id));
});

//Show post
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('home');
    $trail->push($post->category->name, route('categoryShow', $post->category_id));
    $trail->push($post->name, route('postShow', $post->id));
});
