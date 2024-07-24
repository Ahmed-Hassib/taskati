<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Session;
use Livewire\Attributes\On;
use Livewire\Component;

class Alert extends Component
{
    public $alertType;
    public $message;

    public function __construct($type = null, $message = null)
    {
        $this->alertType = $type;
        $this->message = $message;
    }

    #[On('taskUpdated'), On('taskInserted')]
    public function updateTask($type, $message)
    {
        $this->alertType = $type;
        $this->message = $message;
        $this->render();
    }

    public function render()
    {
        return view('livewire.alert');
    }
}
