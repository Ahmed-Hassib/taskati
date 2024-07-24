<?php

namespace App\Livewire\Forms\Tasks;

use App\Enums\TaskStatusEnum;
use App\Models\Task;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task;
    public $id;
    public $user_id;
    public $task_name;
    public $start_date;
    public $end_date;
    public $notes;
    public $is_done;

    public function rules()
    {
        return [
            'task_name' => 'bail|required|min:10',
            'start_date' => 'bail|required|date',
            'end_date' => 'bail|required|date|after_or_equal:start_date',
            'is_done' => ['sometimes', 'required', Rule::enum(TaskStatusEnum::class)->only([TaskStatusEnum::Done, TaskStatusEnum::Processing])],
            'notes' => 'bail|nullable|string|min:10',
        ];
    }
    
    public function storeRules()
    {
        return [
            'task_name' => 'bail|required|min:10',
            'start_date' => 'bail|required|date',
            'end_date' => 'bail|required|date|after_or_equal:start_date',
            'notes' => 'bail|nullable|string|min:10',
        ];
    }

    public function setTask(Task $task)
    {
        $this->task = $task;
        $this->id = $task->id;
        $this->user_id = $task->user_id;
        $this->task_name = $task->task_name;
        $this->start_date = date_format(date_create($task->start_date), 'Y-m-d');
        $this->end_date = date_format(date_create($task->end_date), 'Y-m-d');
        $this->is_done = $task->is_done;
        $this->notes = $task->notes;
    }

    public function updateTask()
    {
        $this->validate();
        return $this->task->update($this->only(['user_id', 'task_name', 'start_date', 'end_date', 'is_done', 'notes']));
    }

    public function createTask()
    {
        $this->validate($this->storeRules());
        return Task::create($this->only(['user_id', 'task_name', 'start_date', 'end_date', 'notes']));
    }
}
