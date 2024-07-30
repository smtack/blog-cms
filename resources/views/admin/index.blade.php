<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('posts.create') }}"><x-primary-button>{{ __('New Post') }}</x-primary-button></a>
                    <a href="{{ route('categories.index') }}"><x-primary-button>{{ __('Manage Categories') }}</x-primary-button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Category
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Featured
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Edit
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Delete
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="w-3/4 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $post->title }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $post->category->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('posts.feature', $post->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            
                                            @if($post->is_featured)
                                                <input class="w-4 h-4 text-indigo-600 bg-gray-100 border-gray-300 rounded focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" type="checkbox" name="feature" onChange="this.form.submit()" checked>
                                            @else
                                                <input class="rounded-md" type="checkbox" name="unfeature" onChange="this.form.submit()">
                                            @endif
                                        </form>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a class="mr-2" href="{{ route('posts.edit', $post) }}"><x-primary-button>{{ __('Edit') }}</x-primary-button></a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
            
                                            <x-primary-button>{{ __('Delete') }}</x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            {{ $posts->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>