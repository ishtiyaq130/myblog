<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Helpers\RoleHelper;



class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $thumbnail;
    public $content;
    public $category_id;
    public $user_id;

    public function save(){
        // dd($this->user_id);
        $this->authorize('create');
        $this->validate([
            'title' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'content' => 'required',
            'category_id' => 'required|exists:category,category_id',
            'user_id' => 'required|exists:users,user_id',
        ]);

        $this->thumbnail = $this->thumbnail->store('images', 'public');
            try{
            // dd( $thumbnailPath);
            $blog = new Blog();
            $blog->title = $this->title;
            $blog->thumbnail = $this->thumbnail;
            $blog->content = $this->content;
            $blog->category_id = $this->category_id;
            $blog->user_id = $this->user_id;
            $blog->save();
            session()->flash('message','New Record Created Successfully');
            return \redirect("myblog");
        }catch(\Exception $e){
            session()->flash('error', 'error to create new rocord'.$e->getMessage());
        }
    }

    private function authorize($permission)
    {
        $user = Auth::user();

        if (!RoleHelper::can($user->role, $permission)) {
            abort(403, 'Unauthorized action.');
        }
    }

    public function render()
    {
        $category = Category::all();
        $users = User::all();
        return view('livewire.create-post',[
            'category' => $category,
            'users' => $users,
        ]);
    }
}
