<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Task;

class Task_Detail extends Component
{
    public function render(Request $request, $task)
    {
        $info = Task::where('id', $task)->get()->first();
        return view('livewire.task-detail', ['info' => $info ]);
    }
}
