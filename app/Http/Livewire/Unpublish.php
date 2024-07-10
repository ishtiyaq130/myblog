<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;

class Unpublish extends Component
{

    public function render()
    {
        $blog = Blog::all();
        return view('livewire.unpublish', ['blog' => $blog]);
    }
}
