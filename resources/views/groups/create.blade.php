<x-app-layout>
    <div class="py-3 sm:py-6">
        <div class="max-w-4xl mx-auto px-3 sm:px-6">
            <div class="bg-white overflow-hidden shadow-xl sm:rounder-lg p-6">
                <div class="border border-red-300 bg-red-100 rounded-sm text-sm p-2 mb-2">
                    <ul>
                        <li class="text-red-800">エラー文言</li>
                    </ul>
                </div>
                    <form action="/groups" method="POST">
                        @csrf
                        <div class="flex flex-col mb-2 sm:flex-row">
                            <div class="w-200 pt-3 text-sm">名前</div>
                            <div class="flex-1 mt-2 sm:mt-0">
                                <input name="name" type="text" class="border rounded-sm p-2" />
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
                                <label class="cursor-pointer mr-2">
                                    <input type="checkbox" name="userIds[]" value="1" class="align-middle">
                                    <span class="text-sm">ユーザー1</span>
                                </label>
                                <label class="cursor-pointer mr-2">
                                    <input type="checkbox" name="userIds[]" value="2" class="align-middle">
                                    <span class="text-sm">ユーザー2</span>
                                </label>
                            </div>
                        </div>
                        <div class="mt-6 flex justify-center">
                            <input type="submit" value="作成" class="bg-blue-600 rounded-md text-white w-200 h-10 cursor-pointer">
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-app-layout>