<?php

namespace App\Http\Livewire\Todo;

use Livewire\Component;
use App\Models\Task;

class Show extends Component
{
    protected $listeners = ['saved'];
    
    public function render()
    {
        $list = Task::all()->sortByDesc('created_at');

       return view('livewire.todo.show', [ 'list' => $list ]);
    }

    public function saved()
    {
        $this->render();
    }

    public function markAsDone(Task $item)
    {
        $item->done = true;
        $item->save();
    }

    public function markAsToDo(Task $item)
    {
        $item->done = false;
        $item->save();
    }

    public function deleteTask(Task $item)
    {
        $item->delete();
    }
}
