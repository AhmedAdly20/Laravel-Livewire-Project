<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddTask extends Component
{
    public $title = '';
    public function render()
    {
        return view('livewire.add-task');
    }

    public function addTask(){
        auth()->user()->tasks()->create([
            'title' => $this->title,
            'status' => false,
        ]);

        $this->title = "";
        $this->emit('taskAdded');
        session()->flash('message','TASK WAS ADDED SUCCESSFULY');
    }
}
