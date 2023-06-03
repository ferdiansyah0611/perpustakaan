<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $field;
    public $rows;
    public $option;

    public function __construct($field, $rows, $option)
    {
        $this->field = $field;
        $this->rows = $rows;
        $this->option = $option;
    }

    public function render()
    {
        return view('components.table');
    }
}