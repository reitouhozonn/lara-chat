<x-sidebar-layout>
    <x-slot name="sidebar">
        <div class="border-b border-gray-200">
            <a class="text-sm p-4 black hover:opacity-75" href="{{ route('groups.create') }}">
                <i class="fa fa-users mr-1 w-4 text-center"></i>グループ作成
            </a>
        </div>
        <div class="p-4">
            <h2 class="text-sm font-bold"> ▼ グループ一覧</h2>
            <ul class="pl-4">
                @foreach ($groups as $group)
                <li>
                    <a class="underline hover:no-underline text-sm arrow" href="{{ route('groups.show', ['group' => $group->id]) }}">
                        {{ $group->name }}
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </x-slot>

    <x-slot name="main">
        <p class="text-cool-gray-400 p-4">⬅︎ グループを選択、またはグループを作成してください。</p>
    </x-slot>
</x-sidebar-layout>
