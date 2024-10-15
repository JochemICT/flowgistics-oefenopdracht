<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-lg font-semibold mb-4">{{ __('Pick') }}</h2>
                    <form method="post" action="{{ route('picklist.store') }}">
                        @csrf
                        <div class="grid gap-6 mb-6 md:grid-cols-2">
                            <div>
                                <label for="article" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Article") }}</label>
                                <select data-role='slArticle' name="article_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">Select an article</option>
                                    @foreach($articles as $article)
                                        <option value="{{ $article->id }}" {{ $article->id == request('article_id') ? 'selected' : '' }} data-article="{{ $article }}">{{ $article->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __("Quantity") }}</label>
                                <input data-role="inpQuantity" type="number" name="quantity" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required/>
                            </div>
                        </div>
                        <div id="batch-fields" class="mt-6"></div>
{{--                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">{{ __("Create") }}</button>--}}
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("[data-role='inpQuantity']").on("focusout", function (evt) {
                let target = $(evt.currentTarget);
                let article_id = parseInt($("[data-role='slArticle']").val());
                let quantity = parseInt(target.val());

                if (article_id >= 1) {
                    fetch(`/api/articles/${article_id}`)
                        .then(response => response.json())
                        .then(article => {
                            const batchFields = document.getElementById('batch-fields');
                            batchFields.innerHTML = ''; // Clear previous batch fields

                            let totalQuantity = 0;

                            // Create input fields for each batch
                            article.batches.forEach(batch => {
                                const batchField = document.createElement('div');
                                batchField.classList.add('flex', 'items-center', 'mb-4');
                                batchField.innerHTML = `
                                <label class="mr-2">${batch.code}</label>
                            `;
                                batchFields.append(batchField);
                            });
                        });
                }
            });
        });
    </script>

</x-app-layout>
