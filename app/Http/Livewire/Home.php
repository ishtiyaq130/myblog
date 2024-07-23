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
    $categories = Category::all();
    $users = User::all();
    $blogs = Blog::with('users', 'category')->get();
    // dd($users);
    return view('livewire.home', [
        'blogs' => $blogs,
        'categories' => $categories,
        'users' => $users,
    ]);
}


}
