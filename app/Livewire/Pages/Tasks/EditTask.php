<?php

namespace App\Livewire\Pages\Tasks;

use App\Livewire\Alert;
use App\Livewire\Forms\Tasks\TaskForm;
use App\Models\Task;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class EditTask extends Component
{
    public TaskForm $form;

    protected $listeners = ['taskUpdated' => '$refresh'];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount(Task $task)
    {
        $this->form->setTask($task);
    }

    public function save()
    {
        $isUpdated = $this->form->updateTask();        
        $this->dispatch(
            'taskUpdated',
            type: $isUpdated ? 'success' : 'error',
            message: $isUpdated ? trans('tasks.updated') : trans('tasks.update failed')
        )->to(Alert::class);
    }

    public function render()
    {
        return view('livewire.pages.tasks.edit-task');
    }
}
