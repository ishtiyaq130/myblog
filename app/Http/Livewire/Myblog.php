<?php

// app/Http/Livewire/MyBlog.php
namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Helpers\RoleHelper;
use Illuminate\Support\Facades\Auth;

class Myblog extends Component
{
    use WithPagination;

    public $i = 1;
    public $search;
    public $selectedAuthor = '';
    public $selectedCategory = '';
    public $selectedDate;
    public $check = true;
    public $u_id;
    public $user_id;
    public $category_id;
    public $title;
    public $content;
    public $thumbnail;
    public $status;

    protected $queryString = [
        'search' => ['except' => ''],
        'selectedAuthor' => ['except' => ''],
        'selectedCategory' => ['except' => ''],
        'selectedDate' => ['except' => ''],
    ];

    public function delete($id)
    {
        $this->authorize('delete');
        Blog::find($id)->delete();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSelectedAuthor()
    {
        $this->resetPage();
    }

    public function updatingSelectedCategory()
    {
        $this->resetPage();
    }

    public function updatingSelectedDate()
    {
        $this->resetPage();
    }



    public function render()
    {
        $blogsQuery = Blog::query();

        if ($this->selectedAuthor) {
            $blogsQuery->where('user_id', $this->selectedAuthor);
        }

        if ($this->selectedCategory) {
            $blogsQuery->where('category_id', $this->selectedCategory);
        }

        if ($this->search) {
            $blogsQuery->where('title', 'like', '%' . $this->search . '%');
        }

        if ($this->selectedDate) {
            $blogsQuery->whereDate('publish_at', $this->selectedDate);
        }

        $blogs = $blogsQuery->paginate(5);

        $categories = Category::all();
        $users = User::all();

        return view('livewire.myblog', [
            'blogs' => $blogs,
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    private function authorize($permission)
    {
        $user = Auth::user();

        if (!RoleHelper::can($user->role, $permission)) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function update($id)
    {
        $blog = Blog::find($id);
        $this->u_id = $blog->blog_id;
        $this->user_id = $blog->user_id;
        $this->category_id = $blog->category_id;
        $this->title = $blog->title;
        $this->content = $blog->content;
        $this->thumbnail = $blog->thumbnail;
        $this->status = $blog->status;
        $this->check = false;
    }
}
