<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class Home extends Component
{
    public function render()
    {
        $blogs = Blog::all();
        $categories = Category::all();
        $users = User::all();
        return view('livewire.home',['blogs' => $blogs, 'categories' => $categories,
            'users' => $users,]);
    }

}
