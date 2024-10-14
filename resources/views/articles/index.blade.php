<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 dark:border-neutral-700">
                        <table class="w-full text-left text-sm text-neutral-600 dark:text-neutral-300">
                            <thead class="border-b border-neutral-300 bg-neutral-50 text-sm text-neutral-900 dark:border-neutral-700 dark:bg-neutral-900 dark:text-white">
                                <tr>
                                    <th class="p-4" style="width: 25%">Article ID</th>
                                    <th class="p-4" style="width: 65%">Code</th>
                                    <th class="p-4"></th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-neutral-300 dark:divide-neutral-700">
                                @foreach($articles as $article)
                                    <tr>
                                        <td class="p-4">{{$article->id}}</td>
                                        <td class="p-4">{{$article->code}}</td>
                                        <td class="p-4 flex space-x-2">
                                            <a href="{{route("articles.show", $article->id)}}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                            <div class="flex space-x-2">
                                                <form action="{{ route('articles.destroy', $article->id) }}" method="POST" onclick="return confirm('Weet je zeker dat je dit artikel wilt verwijderen?');" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
