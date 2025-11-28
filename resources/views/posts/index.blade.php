<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @can('crear posts')
                        <div class="mb-6 flex justify-end">
                            <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                {{ __('Add new post') }}
                            </a>
                        </div>
                    @endcan

                    <div class="overflow-x-auto bg-white rounded-lg shadow overflow-y-auto relative">
                        <table class="border-collapse table-auto w-full whitespace-no-wrap bg-white table-striped relative">
                            <thead>
                                <tr class="text-left">
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        {{ __('Title') }}
                                    </th>
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        {{ __('Category') }}
                                    </th>
                                    <th class="bg-gray-100 sticky top-0 border-b border-gray-200 px-6 py-3 text-gray-600 font-bold tracking-wider uppercase text-xs">
                                        {{ __('Actions') }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr class="hover:bg-gray-50">
                                        <td class="border-dashed border-t border-gray-200 px-6 py-4">
                                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $post->title }}</span>
                                        </td>
                                        <td class="border-dashed border-t border-gray-200 px-6 py-4">
                                            <span class="text-gray-700 px-6 py-3 flex items-center">{{ $post->category->name }}</span>
                                        </td>
                                        <td class="border-dashed border-t border-gray-200 px-6 py-4">
                                            <div class="flex items-center space-x-4">
                                                @can('editar posts')
                                                    <a href="{{ route('posts.edit', $post) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">
                                                        {{ __('Edit') }}
                                                    </a>
                                                @endcan

                                                @can('eliminar posts')
                                                    <form method="POST" action="{{ route('posts.destroy', $post) }}" class="inline-block">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="text-red-600 hover:text-red-900 font-medium" onclick="return confirm('Are you sure?')">
                                                            {{ __('Delete') }}
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>