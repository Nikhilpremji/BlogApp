<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DeleteModal extends Component
{
    public $route;
    public $modalName;
    public $title;
    public $description;
    public $buttonLabel;


     public function __construct($route, $modalName = null, $title = null, $description = null, $buttonLabel = null)
    {
        $this->route = $route;
        $this->modalName = $modalName;
        $this->title = $title;
        $this->description = $description;
        $this->buttonLabel = $buttonLabel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.delete-modal');
    }
}
