<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use App\Models\Task;
use Auth;

class Form extends Component
{
    public $description;
    public $name;
    public $deadline;

    protected $rules = [
        'description' => 'required|min:6'
    ];
    
    public function render()
    {
        return view('livewire.todo.form');
    }

    public function createTask()
    {
        $this->validate();

        $item = new Task();
        $item->description = $this->description;
        $item->name = $this->name;
        $item->deadline = $this->deadline;
        $item->user_id = Auth::user()->id;
        $item->save();

        $this->emit('saved');
    }
}
