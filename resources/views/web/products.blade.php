<x-Layout>
    <div class="container mt-4">
        <h2 class="mb-4">All Products</h2>

        <div class="row">
            @forelse ($products as $product)
                <div class="col-md-3 mb-4">
                    <x-card
                        :image="'storage/' . $product->image_url"
                        :title="$product->name">
                        <p>{{ Str::limit($product->description, 60) }}</p>
                        <p class="text-muted mb-2">Price: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                        <a href="/products/{{ $product->slug }}" class="btn btn-success">View Details</a>
                    </x-card>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted">No products found.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-4">
            {{ $products->links() }}
        </div>
    </div>
</x-Layout>
