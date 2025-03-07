<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BaseLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = 'Audiophile',
        public bool $noCategoryList = false,
        public bool $noPromotion = false
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.base-layout', ['categories' => Category::all()]);
    }
}
