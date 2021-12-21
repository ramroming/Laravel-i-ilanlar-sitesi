<?php

namespace App\Http\Livewire;


use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $record,$subject,$comment,$job_id,$rate;

    public function mount($id){

        $this->record =Job::findOrFail($id);
        $this->job_id =$this->record->id;
    }
    public function render()
    {
        return view('livewire.comment');
    }


//    the action part of the form in comment.blade.php
    public function store(){
        $this->validate([
           'subject' => 'required|min:5',
            'comment' => 'required|min:10',
            'rate' => 'required'
        ]);

        \App\Models\Comment::create([
            'job_id' => $this->job_id,
            'user_id' => Auth::id(),
            'IP' => $_SERVER['REMOTE_ADDR'],
            'rate' => $this->rate,
            'subject'=> $this->subject,
            'comment' => $this->comment
        ]);

        session()->flash('message','Thanks for leaving a comment!');
        $this->reset();
    }
}
