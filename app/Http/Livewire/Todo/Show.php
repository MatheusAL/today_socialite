<?php

namespace App\Http\Livewire\Todo;
//https://codyrigg.medium.com/how-to-add-a-google-login-using-socialite-on-laravel-8-with-jetstream-6153581e7dc9
use Livewire\Component;
use Auth;   
use App\Models\Task;

class Show extends Component
{
    protected $listeners = ['saved'];
    
    public function render()
    {
        //$list = Task::all()->sortByDesc('created_at');
        $list = Task::where('user_id', Auth::user()->id)->get();

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
