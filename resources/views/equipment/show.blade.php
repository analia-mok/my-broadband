<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('My Equipment') }}
    </h2>
  </x-slot>

  <div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      @foreach($equipmentGroups as $groupName => $devices)
        <h3 class="text-gray-800 leading-tight font-semibold text-lg mb-4">{{ $groupName }}</h3>
        <div class="mb-8 shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-indigo-600">
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wide">{{ __('Name') }}</th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wide">{{ __('Serial Number') }}</th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wide">{{ __('Device Address') }}</th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wide">{{ __('Make') }}</th>
              <th scope="col" class="px-6 py-3 text-left text-sm font-medium text-white uppercase tracking-wide">{{ __('Model') }}</th>
              <th scope="col" class="relative px-6 py-3">
                <span class="sr-only">{{ __('Reset') }}</span>
              </th>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($devices as $device)
                <tr>
                  <td class="px-6 py-4 whitespace-nowrap">{{ $device->name }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ $device->serial_number }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ $device->device_address }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ $device->make }}</td>
                  <td class="px-6 py-4 whitespace-nowrap">{{ $device->model }}</td>
                  <td class="px-6 py-4 whitespace-nowrap text-right font-medium">
                    <a href="#" class="text-purple-600 hover:text-purple-900">{{ __('Reset') }}</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      @endforeach
    </div>
  </div>
</x-app-layout>