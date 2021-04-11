@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
      <div class="text-lg">
        {{ $title }}
      </div>
    </div>

    <div>
      <form wire:submit.prevent="submit">
        <div class="px-4 py-5 bg-white sm:p-6 grid grid-cols-2 gap-4">
          {{ $form }}
        </div>

        <div class="flex items-center space-x-4 justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            {{ $actions }}
        </div>
      </form>
    </div>
</x-jet-modal>
