<?php

namespace App\Livewire\Pages\Tasks;

use App\Livewire\Alert;
use App\Livewire\Forms\Tasks\TaskForm;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CreateTask extends Component
{
    public TaskForm $form;

    protected $listeners = ['taskInserted' => '$refresh'];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
        $this->form->user_id = auth()->user()->id;
        $this->form->is_done = 0;
    }

    public function store()
    {
        $isInserted = $this->form->createTask();
        $this->dispatch(
            'taskInserted',
            type: $isInserted ? 'success' : 'error',
            message: $isInserted ? trans('tasks.inserted') : trans('tasks.insert failed')
        )->to(Alert::class);
        $this->form->reset();
    }

    public function render()
    {
        return view('livewire.pages.tasks.create-task');
    }
}
