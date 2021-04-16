<form wire:submit.prevent="save">
    <div class="px-4 py-5 bg-white sm:p-6 grid grid-cols-2 gap-4">
        <div>
            @error('equipment.name')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input class="w-full" type="text" id="name" name="name" wire:model="equipment.name" />
        </div>
        <div>{{-- Placeholder--}}</div>
        <div>
            @error('equipment.serial_number')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
            <x-jet-label for="serial_number" value="{{ __('Serial Number') }}" />
            <x-jet-input class="w-full" type="text" id="serial_number" name="serial_number" wire:model="equipment.serial_number" />
        </div>
        <div>
            @error('equipment.device_address')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
            <x-jet-label for="device_address" value="{{ __('Device Address') }}" />
            <x-jet-input class="w-full" type="text" name="device_address" id="device_address" wire:model="equipment.device_address" />
        </div>
        <div>
            @error('equipment.make')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
            <x-jet-label for="make" value="{{ __('Make') }}" />
            <x-jet-input class="w-full" type="text" name="make" id="make" wire:model="equipment.make" />
        </div>
        <div>
            @error('equipment.model')<span class="text-red-500 font-medium">{{ $message }}</span>@enderror
            <x-jet-label for="model" value="{{ __('Model') }}" />
            <x-jet-input class="w-full" type="text" name="model" id="model" wire:model="equipment.model" />
        </div>
    </div>

    <div class="flex items-center space-x-4 justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
        <p class="mr-auto text-sm">{{ __('Last Updated') }}: {{ $equipment?->updated_at->format('M d, Y H:i:s A') }}</p>
        <x-jet-button type="button" wire:click="$emit('toggleShowEditForm')">{{ __('Cancel') }}</x-jet-button>

        <x-jet-button wire:loading.attr="disabled">
            {{ __('Save') }}
        </x-jet-button>
    </div>
</form>