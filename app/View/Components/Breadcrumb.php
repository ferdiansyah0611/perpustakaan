<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Breadcrumb extends Component
{
    public $title;
    public $links;

    public function __construct($title, $links)
    {
        $this->title = $title;
        $this->links = $links;
    }

    public function render()
    {
        return view('components.breadcrumb');
    }
}