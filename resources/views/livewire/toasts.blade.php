@if($notifications)
    <div class="fixed top-1 right-1 bottom-1 z-10 bg-white">
        hi
        @foreach($notifications as $toast)
            <span>
                {{ $toast->message }}
            </span>
        @endforeach
    </div>
@endif