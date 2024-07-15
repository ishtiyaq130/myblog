<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Comments;

class Blogdetail extends Component
{

    public $blog;
    public $comment;
    public $blog_id;
    public $user_id;

    public function mount($id)
    {
        $this->blog = Blog::with('users', 'category')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.blogdetail');
    }

    public function create(){
        try{
        $comments = new Comments();
        $comments->comment = $this->comment;
        $comments->blog_id = Auth::user_id();
        $comments->user_id = $this->blog_id ;
        $comments->save();
        $this->comment = '';
        session()->flash('message','New Record Created Successfully');
        }catch(\Exception $e){
            session()->flash('error', 'error to create new rocord'.$e->getMessage());
        }
    }
}
