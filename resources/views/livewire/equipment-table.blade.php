<div class="container mx-auto max-w-6xl">
    <div class="mb-8 flex">
        <div class="flex space-x-4">
            <div>
                <x-jet-label for="serialNumber" value="{{ __('Serial Number') }}" />
                <x-jet-input type="text" name="serialNumber" id="serialNumber" wire:model.debounce.450ms="serialNumber" />
            </div>
            <div>
                <x-jet-label for="make" value="{{ __('Make') }}" />
                <x-jet-input type="text" name="make" id="make" wire:model.debounce.450ms="make" />
            </div>
            <div>
                <x-jet-label for="model" value="{{ __('Model') }}" />
                <x-jet-input type="text" name="model" id="model" wire:model.debounce.450ms="model" />
            </div>
            <div>
                <x-jet-label for="selectedDeviceType" value="{{ __('Device Type') }}" />
                <select name="selectedDeviceType"
                    id="selectedDeviceType"
                    wire:model="selectedDeviceType"
                    class="form-select border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" selected>{{ __('All') }}</option>
                    @foreach($deviceTypes as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
            </div>
            <div class="pt-5">
                <x-jet-button type="button" wire:click="resetFilters">{{ __('Reset') }}</x-jet-button>
            </div>
        </div>
        <div class="ml-auto">
            <x-jet-label for="totalShown" value="{{ __('Show') }}" />
            <select name="totalShown"
                id="totalShown"
                wire:model="totalShown"
                class="form-select border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="50">50</option>
            </select>
        </div>
    </div>
    <x-table class="min-w-full">
        <x-slot name="header">
            <x-table.header>{{ __('Name') }}</x-table.header>
            <x-table.header>{{ __('Serial Number') }}</x-table.header>
            <x-table.header>{{ __('Device Address') }}</x-table.header>
            <x-table.header>{{ __('Make') }}</x-table.header>
            <x-table.header>{{ __('Model') }}</x-table.header>
            <x-table.header class="relative">
                <span class="sr-only">{{ __('Edit') }}</span>
            </x-table.header>
        </x-slot>
        <x-slot name="body">
            @empty($equipmentItems)
                <tr>
                    <x-table.cell colspan="6">{{ __('No Devices Found') }}</x-table.cell>
                </tr>
            @endempty
            @foreach($equipmentItems as $equipment)
                <tr>
                    <x-table.cell>{{ $equipment->name }}</x-table.cell>
                    <x-table.cell>{{ $equipment->serial_number }}</x-table.cell>
                    <x-table.cell>{{ $equipment->device_address }}</x-table.cell>
                    <x-table.cell>{{ $equipment->make }}</x-table.cell>
                    <x-table.cell>{{ $equipment->model }}</x-table.cell>
                    <x-table.cell class="text-right font-medium">
                        <a href="#" class="text-blue-400 hover:text-blue-900">{{ __('Edit') }}</a>
                    </x-table.cell>
                </tr>
            @endforeach
        </x-slot>
      </x-table>

    <div class="pt-8 pb-16">
        {{ $equipmentItems->links() }}
    </div>
</div>