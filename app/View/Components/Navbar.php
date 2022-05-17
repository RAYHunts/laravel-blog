<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;


class Navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $categories;

    public function __construct()
    {
        // all categories that have at least one article
        $this->categories = Category::with('articles')->has('articles')->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.navbar');
    }
}