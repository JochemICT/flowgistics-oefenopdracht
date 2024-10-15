<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Batch') }} #{{$batch->id}} ({{$batch->code}})
            </h2>
        </div>

    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-semibold mb-4">{{ __('Batch') }}</h2>
                    <form method="post" action="{{route("batches.update", $batch->id)}}">
                        @method("put")
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="article_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("ID")}}</label>
                                <input type="text" id="article_id" value="{{$batch->id}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly disabled/>
                            </div>
                            <div>
                                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Article") }}</label>
                                <div class="flex items-center">
                                    <input type="text" name="code" value="{{$batch->article->code}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly disabled />
                                    <a href="{{ route('articles.show', $batch->article->id) }}" class="ml-2 text-blue-500 hover:text-blue-700">
                                        <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <div>
                                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("Batch code")}}</label>
                                <input type="text" name="code" value="{{$batch->code}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            </div>
                            <div>
                                <label for="code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("Quantity")}}</label>
                                <input type="text" name="code" value="{{$batch->quantity}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required />
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__("Update")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
