<?php

namespace App\Http\Livewire;

use App\Enums\EquipmentType;
use App\Models\Equipment;
use Livewire\Component;
use Livewire\WithPagination;

class EquipmentTable extends Component
{
    use WithPagination;

    /**
     * The component's state.
     *
     * @var array
     */
    public $state = [];

    public $serialNumber = '';

    public $make = '';

    public $model = '';

    public $selectedDeviceType = '';

    public $deviceTypes = [];

    public $totalShown = 15;

    protected $queryString = [
        'serialNumber' => ['except' => ''],
        'make' => ['except' => ''],
        'model' => ['except' => ''],
        'selectedDeviceType' => ['except' => ''],
    ];

    protected $listeners = [
        'closeEditModal' => 'toggleShowEditForm',
    ];

    public $showEditForm = false;

    public $currentDevice = null;

    public $disabled = false;

    public function mount()
    {
        $this->deviceTypes = EquipmentType::toArray();
        $this->showEditForm = false;
    }

    public function render()
    {
        $equipment = Equipment::search('serial_number', $this->serialNumber)
            ->search('model', $this->model)
            ->search('make', $this->make)
            ->search('type', $this->selectedDeviceType)
            ->paginate($this->totalShown);

        return view('livewire.equipment-table', ['equipmentItems' => $equipment]);
    }

    public function resetFilters()
    {
        $this->serialNumber = '';
        $this->model = '';
        $this->make = '';
        $this->selectedDeviceType = '';

        session()->flash('flash.banner', 'Reset');
        session()->flash('flash.bannerStyle', 'success');
    }

    public function openEquipmentEditFormModal(Equipment $equipment)
    {
        $this->currentDevice = $equipment;
        $this->showEditForm = true;
    }

    public function toggleShowEditForm()
    {
        $this->showEditForm = false;
    }
}
