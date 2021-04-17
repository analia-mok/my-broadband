<?php

namespace App\Http\Livewire\Forms;

use App\Enums\EquipmentType;
use App\Models\Equipment;
use App\Models\Team;
use Livewire\Component;

class EquipmentForm extends Component
{
    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    public $operation = 'save';

    /**
     * Currently editing equipment model.
     *
     * @var Equipment
     */
    public $equipment;

    public $showModal = true;

    public $disabled = false;

    /**
     * Available teams to assign equipment to.
     *
     * TODO: Make search dropdown.
     *
     * @var array
     */
    public $teams = [];

    public $deviceTypes = [];

    protected $rules = [
        'equipment.name' => 'required',
        'equipment.type' => 'required',
        'equipment.serial_number' => 'required',
        'equipment.device_address' => 'required',
        'equipment.make' => 'required',
        'equipment.model' => 'required',
    ];

    protected $validationAttributes = [
        'equipment.name' => 'name',
        'equipment.team' => 'team',
        'equipment.type' => 'type',
        'equipment.serial_number' => 'serial number',
        'equipment.device_address' => 'device address',
        'equipment.make' => 'make',
        'equipment.model' => 'model',
    ];

    public function mount()
    {
        $this->teams = Team::all(['id', 'name']);
        $this->deviceTypes = EquipmentType::toArray();

        // @fixme prepopulating doesn't work
        if ($this->operation === 'save') {
            $this->equipment->type = EquipmentType::INTERNET();
            $this->equipment->team = $this->teams->first()->id;
        }
    }

    public function render()
    {
        return view('livewire.forms.equipment-form');
    }

    public function getSaveActionProperty()
    {
        return $this->equipment && $this->operation === 'save' ? 'save' : 'store';
    }

    public function save()
    {
        $this->disabled = true;
        $this->validate();

        $this->equipment->save();
        $this->disabled = false;

        $this->emit('toggleShowEditForm');

        // session()->flash('flash.banner', 'Saved');
        // session()->flash('flash.bannerStyle', 'success');
        // $this->emit('addNotification', ['message' => 'Saved']);
    }

    public function store()
    {
        $this->validate($this->rules + [
            'equipment.team' => 'required',
        ]);

        dd($this->equipment);

        $newDevice = Equipment::create([
            'name' => $this->equipment->name,
            'type' => $this->equipment->type,
            'serial_number' => $this->equipment->serial_number,
            'device_address' => $this->equipment->device_address,
            'make' => $this->equipment->make,
            'model' => $this->equipment->model,
        ]);



        session()->flash('flash.banner', 'Created!');
        session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('equipment.admin');
    }
}
