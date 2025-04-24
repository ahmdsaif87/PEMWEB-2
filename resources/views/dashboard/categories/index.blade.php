<x-layouts.app :title="__('Dashboard')">
    <div class="flex justify-between items-center mb-4">
        <flux:heading>Produk Kategori</flux:heading>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
            <thead class="text-white">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium">No</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Image</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Name</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Slug</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Description</th>
                    <th class="px-4 py-2 text-left text-sm font-medium">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $key => $category)
                <tr class="border-t border-gray-200 dark:border-gray-700 transition duration-150">
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $key + 1 }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                        <img src="{{ $category->image_url ?? 'https://via.placeholder.com/50' }}" alt="Category Image" class="w-10 h-10 rounded-full">
                    </td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $category->name }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $category->slug }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">{{ $category->description }}</td>
                    <td class="px-4 py-2 text-sm text-gray-700 dark:text-gray-300">
                        <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-600 dark:text-blue-400 dark:hover:text-blue-300 hover:underline">Edit</a> |
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600 dark:text-red-400 dark:hover:text-red-300 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.app>
