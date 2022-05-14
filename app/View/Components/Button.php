<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $text;
    public $url;
    public $type;
    public $class;
    public $linkText;
    public $linkClass;

    public function __construct($text, $url = null, $type = null, $class = null, $linkText = null, $linkClass = null)
    {
        $this->text = $text;
        $this->url = $url;
        $this->type = $type;
        $this->class = $class;
        $this->linkText = $linkText;
        $this->linkClass = $linkClass;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}