<x-app-layout>
    <x-slot name="sidebar">
        <div class="border-b border-gray-200">
            <a class="text-sm p-4 black hover:opacity-75" href="{{ route('groups.create') }}">
                <i class="fa fa-users mr-1 w-4 text-center"></i>グループ作成
            </a>
        </div>
</x-app-layout>
