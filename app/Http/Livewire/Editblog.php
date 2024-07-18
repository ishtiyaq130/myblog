<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Helpers\RoleHelper;
use Illuminate\Support\Facades\Auth;


class Editblog extends Component
{

    use WithFileUploads;

    public $u_id;
    public $user_id;
    public $category_id;
    public $title;
    public $content;
    public $thumbnail;
    public $status;

    public function render()
    {
        $category = Category::all();
        $users = User::all();
        return view('livewire.editblog', ['category' => $category,
            'users' => $users,]);
    }

    public function updateblog(){
        // $this->authorize('update');
        $this->validate([
            'title' => 'required',
            'thumbnail' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
            'content' => 'required',
            'category_id' => 'required|exists:category,category_id',
            'user_id' => 'required|exists:users,user_id',
        ]);

        $this->thumbnail = $this->thumbnail->store('images', 'public');

        try{
            $blog = Blog::find($this->u_id);
            $blog->user_id=$this->user_id;
            $blog->category_id=$this->category_id;
            $blog->title=$this->title;
            $blog->thumbnail=$this->thumbnail;
            $blog->content=$this->content;
            $blog->status=$this->status;

            if($this->status == 0){
                $blog->publish_at = null;
            }
            else{
                $blog->publish_at = now()->toDateString();
            }

            $blog->save();

            session()->flash('message','updated successfully');
            return \redirect('/myblog');
        }catch(\Exception $e){
            session()->flash('message','not updated');
        }

    }

    private function authorize($permission)
    {
        $user = Auth::user();

        if (!RoleHelper::can($user->role, $permission)) {
            abort(403, 'Unauthorized action.');
        }
    }
}
