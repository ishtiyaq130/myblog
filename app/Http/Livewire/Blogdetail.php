<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;
use App\Models\Comments;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Blogdetail extends Component
{

    public $blog;
    public $comment;


    public function mount($id)
    {
        $this->blog = Blog::with('users', 'category')->findOrFail($id);
        $this->blog_id = $id;
        // dd($this->blog_id);
    }

    protected $rules = [
        'comment' => 'required',
    ];

    public function save()
    {
        $this->validate();

        try {

            \Log::info('Comment submitted:', ['comment' => $this->comment]);
            $comment = new Comments();
            $comment->comment = $this->comment;
            $comment->blog_id = $this->blog_id;
            $comment->user_id = Auth::id();
            $comment->save();

            $this->reset('comment');
            session()->flash('message', 'New Record Created Successfully');
        } catch (\Exception $e) {
            session()->flash('error', 'Error creating new record: ' . $e->getMessage());
        }
    }

    public function delete($id)
    {
        $this->authorize('delete');
        Comments::find($id)->delete();
    }

    public function render()
    {
        $user = User::all();
        $comments = Comments::where('blog_id', $this->blog_id)->latest()->get();

        return view('livewire.blogdetail', [
            'comments' => $comments,
            'user' => $user,
        ]);
    }

}
