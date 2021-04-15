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

    /**
     * Wire model for serialNumber.
     *
     * @var string
     */
    public $serialNumber = '';

    /**
     * Wire model for make.
     *
     * @var string
     */
    public $make = '';

    /**
     * Wire model for model string.
     *
     * @var string
     */
    public $model = '';

    /**
     * Wire model for currently selectedDeviceType.
     *
     * @var string
     */
    public $selectedDeviceType = '';

    /**
     * All available device types.
     *
     * @var array
     */
    public $deviceTypes = [];

    /**
     * Currently selected pagination limit.
     *
     * @var integer
     */
    public $totalShown = 15;

    /**
     * Exposed query string parameters.
     *
     * @var array
     */
    protected $queryString = [
        'serialNumber' => ['except' => ''],
        'make' => ['except' => ''],
        'model' => ['except' => ''],
        'selectedDeviceType' => ['except' => ''],
    ];

    protected $listeners = [
        'closeEditModal' => 'toggleShowEditForm',
    ];

    /**
     * Toggle for displaying edit form modal.
     *
     * @var boolean
     */
    public $showEditForm = false;

    /**
     * Current device being edited.
     *
     * @var \App\Models\Equipment
     */
    public $currentDevice = null;

    /**
     * Submit / action button state
     *
     * @var boolean
     */
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
