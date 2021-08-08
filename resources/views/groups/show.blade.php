<x-sidebar-layout>
    <x-slot name="sidebar">
        <div class="border-b border-gray-200 hover:opacity-75">
            <a class="text-sm p-4 black" href="{{ route('groups.create') }}">
                <i class="fa fa-users mr-1 w-4 text-center"></i>グループ作成
            </a>
        </div>
        <div class="border-b border-gray-200 hover:opacity-75">
            <a class="text-sm p-4 black" href="{{ route('groups.edit') }}">
                <i class="fa fa-edit mr-1 w-4 text-center"></i>グループ更新
            </a>
        </div>
        <div class="border-b border-gray-200 hover:opacity-75">
            <form action="{{ route('groups.destroy') }}" method="POST">
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
                <li class="text-sm">
                    ユーザー1
                </li>
                <li class="text-sm">
                    ユーザー2
                </li>
            </ul>
        </div>
    </x-slot>

    <x-slot name="main">
        <div class="flex flex-col justify-content-stretch">
            <div class="shadow relative z-10">
                <p class="text-xl py-2 px-4">
                    グループ１
                    <span class="text-sm ml-1 text-gray-600">グループ説明</span>
                </p>
            </div>
            <div class="flex-1 overflow-scroll">
                <div class="p-4 max-w-4xl m-auto">
                    <div class="mb-4">
                        <div class="mb-1 ml-1">
                            <span class="text-sm mr-2">
                                <i class="fa fa-user mr-2"></i>user_id_1
                            </span>
                            <span class="text-xs text-gray-500">2021時間</span>
                        </div>
                        <div class="bg-white p-2 pr-3 rounded flex">
                            <div class="flex-1">
                                <p class="text-sm">メッセージ１</p>
                            </div>
                            <button class="text-sm text-red-400">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-1 ml-1">
                            <span class="text-sm mr-2">
                                <i class="fa fa-user mr-2"></i>user_id_2
                            </span>
                            <span class="text-xs text-gray-500">2021時間</span>
                        </div>
                        <div class="bg-white p-2 pr-3 rounded flex">
                            <div class="flex-1">
                                <p class="text-sm">メッセージ2</p>
                            </div>
                            <button class="text-sm text-red-400">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-1 ml-1">
                            <span class="text-sm mr-2">
                                <i class="fa fa-user mr-2"></i>user_id_3
                            </span>
                            <span class="text-xs text-gray-500">2021時間</span>
                        </div>
                        <div class="bg-white p-2 pr-3 rounded flex">
                            <div class="flex-1">
                                <p class="text-sm">メッセージ3</p>
                            </div>
                            <button class="text-sm text-red-400">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="mb-1 ml-1">
                            <span class="text-sm mr-2">
                                <i class="fa fa-user mr-2"></i>user_id_4
                            </span>
                            <span class="text-xs text-gray-500">2021時間</span>
                        </div>
                        <div class="bg-white p-2 pr-3 rounded flex">
                            <div class="flex-1">
                                <p class="text-sm">メッセージ4</p>
                            </div>
                            <button class="text-sm text-red-400">
                                <i class="fa fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-gray-100">
            <div class="px-4">
                <div class="p-4 max-w-4xl m-auto">
                    <div class="flex items-center">
                        <div class="flex-1 pr-2">
                            <input type="text" placeholder="Message" class="w-full p-2 py-3 border rounded">
                        </div>
                        <div>
                            <label class="cursor-pointer"></label>
                            <input type="file" class="hidden">
                            <button><i class="fa fa-paper-plane text-blue-600 p-2"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-sidebar-layout>