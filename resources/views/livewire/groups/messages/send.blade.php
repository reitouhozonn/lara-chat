<div class="p-4 max-w-4xl m-auto">
    <div class="flex items-center">
        <div class="flex-1 pr-2">
            <input wire:model.lazy="message" type="text" placeholder="message" class="w-full p-2 pl-2 pr-3 border rounded">
        </div>
        <div>
            <label class="cursor-pointer">
                <input wire:model="photo" type="file" class="hidden">
                <i class="fa fa-image text-gray-500 p-2"></i>
            </label>
        </div>
        <div>
            <button wire:click="sendMessage" class="rounded-md text-white h-10 cursor-pointer">
                <i class="fa fa-paper-plane text-blue-600 p-2"></i>
            </button>
        </div>
    </div>
    <div wire:loading wire:target="photo" class="text-xs text-gray-500 mt-1">
        アップロード中...
    </div>
    @if ($photo)
        <div class="mt-2">
            <img class="max-w-2xl" src="{{ $photo->temporaryUrl() }}">
        </div>
    @endif
</div>