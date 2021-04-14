@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
      <div class="text-lg">
        {{ $title }}
      </div>
    </div>

    <div>
      {{ $form }}
    </div>
</x-jet-modal>
