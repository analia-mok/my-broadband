<div>
    <div class="mb-8">
        <x-jet-label for="selectedDevice" value="{{ __('Currently Viewing:') }}" />
        <select name="selectedDevice"
            id="selectedDevice"
            wire:model="selectedDevice"
            class="form-select border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            @foreach ($devices as $device)
                <option value="{{ $device->id }}">{{ $device->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="h-96">
        @livewire('livewire-line-chart', ['lineChartModel' => $dataUsageChartModel], $dataUsageChartModel->reactiveKey())
    </div>

</div>