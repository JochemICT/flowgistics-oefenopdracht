<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Batches') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    {{--Filters hier--}}
                    <h3 class="font-bold text-xl mb-2">{{__("Filters")}}</h3>
                    <div class="mb-4 flex items-center">
                        <div class="mr-4">
                            {{__("Article")}}
                            <select class="ml-3 rounded-md border-gray-300" data-role="slArticle">
                                <option value="-1">Select an article</option>
                                @foreach($articles as $article)
                                    <option value="{{$article->id}}"{{ $article->id == request('article_id') ? 'selected' : '' }}>{{$article->code}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
                        <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
                            <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                            <tr>
                                <th class="p-4" style="width: 20%">Batch ID</th>
                                <th class="p-4" style="width: 20%">Article ID</th>
                                <th class="p-4" style="width: 20%">Code</th>
                                <th class="p-4" style="width: 20%">Quantity</th>
                                <th class="p-4" style="width: 20%">Created At</th>
                                <th class="p-4"></th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                                @foreach($batches as $batch)
                                    <tr>
                                        <td class="p-4">{{$batch->id}}</td>
                                        <td class="p-4">{{$batch->article_id}}</td>
                                        <td class="p-4">{{$batch->code}}</td>
                                        <td class="p-4">{{$batch->quantity}}</td>
                                        <td class="p-4">{{$batch->created_at->format("d-m-Y H:s")}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-5">
                        {{ $batches->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


    <script>
        $(document).ready(function (){
            $("[data-role='slArticle']").on("change", function (evt){
                let target = $(evt.currentTarget);
                let articleID = target.val()

                window.location.href = "/batches?article_id=" + articleID;
            })
        })
    </script>
