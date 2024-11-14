<?php

namespace App\View\Components;

use App\Repositories\ClientRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectClient extends Component
{
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct(
        protected ClientRepository $clientRepository
    )
    {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        dd($this->id);
        return view('components.select-client');
    }
}
