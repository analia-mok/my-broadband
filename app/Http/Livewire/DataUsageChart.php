<?php

namespace App\Http\Livewire;

use App\Enums\EquipmentType;
use App\Helpers\DataUnitConversionFacade as DataUnitConversion;
use App\Models\DataUsage;
use Asantibanez\LivewireCharts\Models\LineChartModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class DataUsageChart extends Component
{

    /**
     * Currently selected device ID.
     *
     * @var int
     */
    public $selectedDevice;

    /**
     * Current team's devices.
     *
     * @var \Illuminate\Database\Eloquent\Collection
     */
    protected $devices;

    public function mount()
    {
        /** @var \App\Models\Team $currentTeam */
        $currentTeam = Auth::user()->currentTeam;
        $this->devices = $currentTeam->equipment()
            ->where('type', EquipmentType::INTERNET())
            ->get();

        $defaultDevice = $this->devices->first();
        $this->selectedDevice = $defaultDevice->id;
    }

    public function render()
    {
        /** @var \App\Models\Equipment $currentDevice */
        $currentDevice = $this->devices->find($this->selectedDevice);
        $dataUsage = $currentDevice->dataUsage;

        $dataUsageChartModel = (new LineChartModel())
            ->setTitle('Your Data Usage');

        foreach ($dataUsage as $data) {
            $dataUsageChartModel->addPoint($data->id, DataUnitConversion::bytesToMB($data->data));
        }

        return view('livewire.data-usage-chart', [
            'devices' => $this->devices,
            'dataUsageChartModel' => $dataUsageChartModel,
        ]);
    }
}
