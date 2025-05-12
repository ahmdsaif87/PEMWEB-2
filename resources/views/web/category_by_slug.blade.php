<x-Layout>
    <div class="container mt-4">
        <h2 class="mb-4">Category: {{ $category->name }}</h2>
        <p class="mb-4">{{ $category->description }}</p>

        <div class="row">
            @foreach ($category->products as $product)
                <div class="col-md-3 mb-4">
                    <x-card :title="$product->name" :description="Str::limit($product->description, 60)" :slug="$product->slug">
                        <p class="text-muted mb-2">Price: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="/products/{{ $product->slug }}" class="btn btn-success">View Details</a>
                    </x-card>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-center mt-4">
            {{ $category->products->links() }}
        </div>
    </div>
</x-Layout>
