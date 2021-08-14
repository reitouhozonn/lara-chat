<x-app-layout>
    <div class="py-3 sm:py-6">
        <div class="max-w-4xl mx-auto px-3 sm:px-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounder-lg p-6">
                @if ($errors->any())
                <div class="border border-red-300 bg-red-100 rounded-sm text-sm p-2 mb-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="text-red-800">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                    <form action="{{ route('groups.update', ['group' => $group->id]) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="flex flex-col mb-2 sm:flex-row">
                            <div class="w-200 pt-3 text-sm">名前</div>
                            <div class="flex-1 mt-2 sm:mt-0">
                                <input name="name" type="text" value="{{ $group->name }}" class="border rounded-sm p-2" />
                            </div>
                        </div>
                        <div class="flex flex-col mb-2 sm:flex-row">
                            <div class="w-200 pt-3 text-sm">説明</div>
                            <div class="flex-1 mt-2 sm:mt-0">
                                <textarea name="description" id="" cols="50" rows="5" class="border rounded-sm p-2 w-full"></textarea>
                            </div>
                        </div>
                        <div class="flex flex-col mb-2 sm:flex-row">
                            <div class="w-200 pt-3 text-sm">所属メンバー</div>
                            <div class="flex-1 mt-2">
                                @foreach ($users as $user)
                                    @if ($user->belongsToGroup($group->id))
                                        @php
                                            $checked = "checked";
                                        @endphp
                                    @else
                                        @php
                                            $checked = "";
                                        @endphp
                                    @endif
                                <label class="cursor-pointer mr-2">
                                    <input type="checkbox" name="userIds[]" value="{{ $user->id }}" class="align-middle">
                                    <span class="text-sm">{{ $user->name }}</span>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="mt-6 flex justify-center">
                            <input type="submit" value="更新" class="bg-blue-600 rounded-md text-white w-200 h-10 cursor-pointer">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>