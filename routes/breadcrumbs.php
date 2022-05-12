<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\Article;
use App\Models\Category;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});


// Home > Category > Article
Breadcrumbs::for('article', function (BreadcrumbTrail $trail, Article $article) {
    $trail->parent('home'); // Home
    // Category
    $trail->push($article->category->name, url('?category=' . $article->category->slug));
    // Article
    $trail->push($article->title, route('article.show', $article));
});

// Home > Trending
Breadcrumbs::for('trending', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Trending');
});