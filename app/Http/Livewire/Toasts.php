<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Toasts extends Component
{
    protected $listeners = [
        'addNotification' => 'addNotification',
    ];

    public $notifications = [];

    public function render()
    {
        return view('livewire.toasts');
    }

    public function addNotification(array $notification)
    {
        $this->notifications[] = $notification;
    }

}
