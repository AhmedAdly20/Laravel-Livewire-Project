<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddTask extends Component
{
    public $title = '';

    protected $rules = [
        'title' => 'required|min:3'
    ];

    public function render()
    {
        return view('livewire.add-task');
    }

    public function updated($title){
        $this->validateOnly($title);
    }

    public function addTask(){
        $this->validate();

        auth()->user()->tasks()->create([
            'title' => $this->title,
            'status' => false,
        ]);

        $this->title = "";
        $this->emit('taskAdded');
        session()->flash('message','TASK WAS ADDED SUCCESSFULY');
    }
}
