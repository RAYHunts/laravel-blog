<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Main extends Component
{

    public $title;
    public $description;
    public $keywords;
    public $author;
    public $thumb;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title = null, $description = null, $keywords = null, $author = null, $thumb = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->keywords = $keywords;
        $this->author = $author;
        $this->thumb = $thumb;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('layouts.main');
    }
}