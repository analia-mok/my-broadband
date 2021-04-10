<x-app-layout>
  <x-slot name="header">
    <x-headings.h2>{{ __('My Equipment') }}</x-headings.h2>
  </x-slot>

  <div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 space-y-6">
      @foreach($equipmentGroups as $groupName => $devices)
        <div>
          <x-headings.h3 class="mb-4">{{ $groupName }}</x-headings.h3>
          <x-table class="min-w-full">
            <x-slot name="header">
              <x-table.header>{{ __('Name') }}</x-table.header>
              <x-table.header>{{ __('Serial Number') }}</x-table.header>
              <x-table.header>{{ __('Device Address') }}</x-table.header>
              <x-table.header>{{ __('Make') }}</x-table.header>
              <x-table.header>{{ __('Model') }}</x-table.header>
              <x-table.header class="relative">
                <span class="sr-only">{{ __('Reset') }}</span>
              </x-table.header>
            </x-slot>
            <x-slot name="body">
              @empty($devices)
                <tr>
                  <x-table.cell colspan="6">{{ __('No Devices Found') }}</x-table.cell>
                </tr>
              @endempty
              @foreach($devices as $device)
                <tr>
                  <x-table.cell>{{ $device->name }}</x-table.cell>
                  <x-table.cell>{{ $device->serial_number }}</x-table.cell>
                  <x-table.cell>{{ $device->device_address }}</x-table.cell>
                  <x-table.cell>{{ $device->make }}</x-table.cell>
                  <x-table.cell>{{ $device->model }}</x-table.cell>
                  <x-table.cell class="text-right font-medium">
                    <a href="#" class="text-blue-400 hover:text-blue-900">{{ __('Reset') }}</a>
                  </x-table.cell>
                </tr>
              @endforeach
            </x-slot>
          </x-table>
        </div>
      @endforeach
    </div>
  </div>
</x-app-layout>