<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Article') }} #{{$article->id}} ({{$article->code}})
            </h2>

            <div class="flex space-x-1">
                <a href="{{ route('articles.edit', $article->id) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{__("Edit")}}</a>
                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit artikel wilt verwijderen?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">{{__("Delete")}}</button>
                </form>
            </div>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-semibold mb-4">{{ __('Article') }}</h2>
                    <form>
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="article_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("ID")}}</label>
                                <input type="text" id="article_id" value="{{$article->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly />
                            </div>
                            <div>
                                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("Code")}}</label>
                                <input type="text" id="code" value="{{$article->code}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled readonly />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-5">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-semibold mb-4">{{ __('Batches') }}</h2>
                    <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
                        <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                        <tr>
                            <th class="p-4" style="width: 15%">{{__("ID")}}</th>
                            <th class="p-4" style="width: 15%">{{__("Code")}}</th>
                            <th class="p-4" style="width: 15%">{{__("Quantity")}}</th>
                            <th class="p-4" style="width: 15%">{{__("created_at")}}</th>
                        </tr>
                        </thead>
                        <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                            @foreach($article->batches as $batch)
                                <tr>
                                    <td class="p-4">{{$batch->id}}</td>
                                    <td class="p-4">{{$batch->code}}</td>
                                    <td class="p-4">{{$batch->quantity}}</td>
                                    <td class="p-4">{{$batch->created_at->format("d-m-Y H:s")}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
