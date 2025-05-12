<x-Layout>
    <div class="container mt-4">
        <h3 class="mb-4">Categories</h3>
        <div class="row">
            @foreach ($categories as $category)
                <div class="col-md-3 mb-4">
                    <x-card :title="$category->name">
                        <p>{{ Str::limit($category->description, 60) }}</p>
                        <a href="/category/{{ $category->slug }}" class="btn btn-success">View Products</a>
                    </x-card>
                </div>
            @endforeach
        </div>
    </div>
</x-Layout>
