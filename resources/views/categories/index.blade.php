<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('categories.create') }}"><x-primary-button>{{ __('New Category') }}</x-primary-button></a>
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
                                <th scope="col" class="px-6 py-3">Name</th>
                                <th scope="col" class="px-6 py-3">Edit</th>
                                <th scope="col" class="px-6 py-3">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="w-5/6 px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{ $category->name }}</th>
                                    <td class="w-20 px-6 py-4"><a href="{{ route('categories.edit', $category) }}"><div class="m-2"><x-primary-button>{{ __('Edit') }}</x-primary-button></div></a></td>
                                    <td class="w-20 px-6 py-4">
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <x-primary-button class="inline-block float-right">{{ __('Delete') }}</x-primary-button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>