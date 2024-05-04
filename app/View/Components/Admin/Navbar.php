<?php

namespace App\View\Components\Admin;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public string $jurusan = '';
    public function __construct()
    {
        $this->jurusan = Setting::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.navbar');
    }
}
