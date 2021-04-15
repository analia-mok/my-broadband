<?php

namespace App\Http\Livewire\Forms;

use App\Models\Equipment;
use Livewire\Component;

class EquipmentForm extends Component
{
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    /**
     * Currently editing equipment model.
     *
     * @var Equipment
     */
    public $equipment;

    public $showModal = true;

    public $disabled = false;

    protected $rules = [
        'equipment.name' => 'required',
        'equipment.type' => 'required',
        'equipment.serial_number' => 'required',
        'equipment.device_address' => 'required',
        'equipment.make' => 'required',
        'equipment.model' => 'required',
    ];

    public function render()
    {
        return view('livewire.forms.equipment-form');
    }

    public function save()
    {
        $this->disabled = true;
        $this->validate();

        $this->equipment->save();
        $this->disabled = false;

        $this->emit('closeEditModal');

        // session()->flash('flash.banner', 'Saved');
        // session()->flash('flash.bannerStyle', 'success');
        // $this->emit('addNotification', ['message' => 'Saved']);
    }
}
