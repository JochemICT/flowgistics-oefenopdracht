<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Create batch') }}
            </h2>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-semibold mb-4">{{ __('Batch') }}</h2>
                    <form method="post" action="{{route("batches.store")}}">
                        @method("post")
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("ID")}}</label>
                                <input type="text" name="id" value="{{\App\Models\Batch::getNextBatchID()}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" readonly disabled />
                            </div>
                            <div>
                                <label for="article" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("Article")}}</label>
                                <select name="article_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" data-role="slArticle" required>
                                    <option value="">Select an article</option>
                                    @foreach($articles as $article)
                                        <option value="{{$article->id}}" {{ $article->id == request('article_id') ? 'selected' : '' }} data-article="{{$article}}">{{$article->code}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="batch_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("Batch code (filled automatically by selecting an article)")}}</label>
                                <input type="text" name="code" value="" data-role="inpBatchCode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>
                            </div>
                            <div>
                                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{__("Quantity")}}</label>
                                <input type="number" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>
                            </div>
                        </div>
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{__("Create")}}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    $(document).ready(function (){
        $("[data-role='slArticle']").on("change", function (evt){
            let target = $(evt.currentTarget);
            let selected = target.find("option:selected");

            let article = selected.data("article")

            if(article){
                $("[data-role='inpBatchCode']").val(article.code + "-")
            }else{
                $("[data-role='inpBatchCode']").val("")
            }
        })
    })
</script>
