<?php

namespace App\View\Components;


use App\Models\Category;
use Illuminate\View\Component;


class navbar extends Component
{
    public $leftlinks;
    public $rightlinks;
    public $brand;
    public $categories;

    public function __construct($leftlinks = null, $rightlinks = null, $brand = null)
    {
        $this->leftlinks = $leftlinks;
        $this->rightlinks = $rightlinks;
        $this->brand = $brand;
        $this->categories = Category::all();
    }
    /**
     * Create a new component instance.
     *
     * @return void
     */
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