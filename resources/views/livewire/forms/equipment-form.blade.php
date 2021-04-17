<form wire:submit.prevent="{{ $this->saveAction }}" method="POST">
    @if($equipment && $operation === 'save')
        @method('PUT')
    @endif
    <div class="px-4 py-5 bg-white sm:p-6 grid grid-cols-2 gap-4">
        <div>
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input class="w-full" type="text" id="name" name="name" wire:model.debounce.450ms="equipment.name" />
            @error('equipment.name')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
        </div>
        <div>{{-- Placeholder --}}</div>

        @if($operation === 'create')
            <div>
                <x-jet-label for="team" value="{{ __('Team') }}" />
                <select name="team"
                    id="team"
                    wire:model.debounce.450ms="equipment.team"
                    class="form-select w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" disabled selected>Select a team</option>

                    @foreach($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
                @error('equipment.team')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
            </div>
            <div>
                <x-jet-label for="type" value="{{ __('Type') }}" />
                <select name="type"
                    id="type"
                    wire:model.debounce.450ms="equipment.type"
                    class="form-select w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">

                    <option value="" disabled selected>Select a device type</option>

                    @foreach($deviceTypes as $type)
                        <option value="{{ $type }}" @if($loop->first) selected @endif>{{ $type }}</option>
                    @endforeach
                </select>
                @error('equipment.type')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
            </div>
        @endif
        <div>
            <x-jet-label for="serial_number" value="{{ __('Serial Number') }}" />
            <x-jet-input class="w-full" type="text" id="serial_number" name="serial_number" wire:model.debounce.450ms="equipment.serial_number" />
            @error('equipment.serial_number')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
        </div>
        <div>
            <x-jet-label for="device_address" value="{{ __('Device Address') }}" />
            <x-jet-input class="w-full" type="text" name="device_address" id="device_address" wire:model.debounce.450ms="equipment.device_address" />
            @error('equipment.device_address')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
        </div>
        <div>
            <x-jet-label for="make" value="{{ __('Make') }}" />
            <x-jet-input class="w-full" type="text" name="make" id="make" wire:model.debounce.450ms="equipment.make" />
            @error('equipment.make')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
        </div>
        <div>
            <x-jet-label for="model" value="{{ __('Model') }}" />
            <x-jet-input class="w-full" type="text" name="model" id="model" wire:model.debounce.450ms="equipment.model" />
            @error('equipment.model')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
        </div>
    </div>

    <div class="flex items-center space-x-4 justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
        @if($equipment && $operation === 'save')
            <p class="mr-auto text-sm">{{ __('Last Updated') }}: {{ $equipment?->updated_at?->format('M d, Y H:i:s A') }}</p>
        @endif
        <x-jet-button type="button" wire:click="$emit('toggleShowEditForm')">{{ __('Cancel') }}</x-jet-button>

        <x-jet-button wire:loading.attr="disabled">
            @if($operation === 'save')
                {{ __('Save') }}
            @else
                {{ __('Add') }}
            @endif
        </x-jet-button>
    </div>
</form>