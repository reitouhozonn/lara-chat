<div>
    @foreach ($messages as $message)
        @if ($message->user_id === $userId)
        <div class="mb-4">
            <div class="mb-1 ml-1">
                <span class="text-sm mr-2">
                    <i class="fa fa-user mr-2"></i>{{ $message->user->name }}
                </span>
                <span class="text-xs text-gray-500">{{ $message->created_at }}</span>
            </div>
            <div class="bg-white p-2 pr-3 rounded flex">
                <div class="flex-1">
                    <p class="text-sm">{{ $message->message }}</p>
                    @if ($message->hasPhoto())
                        <img class="mt-2" src="{{ $message->photoUri() }}">
                    @endif
                </div>
                <button class="text-sm text-red-400">
                    <i class="fa fa-trash-alt"></i>
                </button>
            </div>
        </div>
        @else
        <div class="mb-4">
            <div class="mb-1 ml-1">
                <span class="text-sm mr-2">
                    <i class="fa fa-user mr-2"></i>{{ $message->user->name }}
                </span>
                <span class="text-xs text-gray-500">{{ $message->created_at }}</span>
            </div>
            <div class="bg-white p-2 rounded flex">
                <div class="flex-1">
                    <p class="text-sm">{{ $message->message }}</p>
                    @if ($message->hasPhoto())
                        <img class="mt-2" src="{{ $message->photoUri() }}">
                    @endif
                </div>
                <button class="text-sm text-red-400">
                    <i class="fa fa-trash-alt"></i>
                </button>
            </div>
        </div>
        @endif
    @endforeach
</div>

<script>
    document.addEventListener('livewire:load', function(){
        Echo.join('group.' + @this.groupId)
        .listen('MessageUpdate', (e) => {
            Livewire.emit('refreshMessage');
        });
    });
</script>
