<x-sidebar-layout>
    <x-slot name="sidebar">
        <div class="border-b border-gray-200 hover:opacity-75">
            <a class="text-sm p-4 black" href="{{ route('groups.create') }}">
                <i class="fa fa-users mr-1 w-4 text-center"></i>グループ作成
            </a>
        </div>
        <div class="border-b border-gray-200 hover:opacity-75">
            <a class="text-sm p-4 black" href="{{ route('groups.edit', ['group' => $group->id]) }}">
                <i class="fa fa-edit mr-1 w-4 text-center"></i>グループ更新
            </a>
        </div>
        <div class="border-b border-gray-200 hover:opacity-75">
            <form action="{{ route('groups.destroy', ['group' => $group->id]) }}" method="POST">
                @method('delete')
                @csrf
                <button class="text-sm p-4 block w-full text-left">
                    <i class="fa fa-trash mr-1 w-4 text-center"></i>グループ削除
                </button>
            </form>
        </div>
        <div class="p-4">
            <h2 class="text-xs font-bold"> ▼ ユーザー一覧</h2>
            <ul class="pl-4">
                @foreach ($group->users as $user)
                <li class="text-sm">
                    {{ $user->name }}
                </li>
                @endforeach
            </ul>
        </div>
    </x-slot>

    <x-slot name="main">
        <div class="flex flex-col justify-content-stretch">
            <div class="shadow relative z-10">
                <p class="text-xl py-2 px-4">
                    {{ $group->name }}
                    <span class="text-sm ml-1 text-gray-600">{{ $group->description }}</span>
                </p>
            </div>
            <div class="flex-1 overflow-scroll">
                <div class="p-4 max-w-4xl m-auto">
                    <livewire:groups.messages.show :group="$group" />
                </div>
            </div>
        </div>
        <div class="bg-gray-100">
            <div class="px-4">
                <livewire:groups.messages.send :group="$group" />
            </div>
        </div>
    </x-slot>
</x-sidebar-layout>