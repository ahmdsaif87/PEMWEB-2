<x-Layout>
    <div class="container mt-4">
        <!-- Hero Section -->
        <div class="jumbotron text-center bg-light p-5 rounded">
            <h1 class="display-4">Welcome to If-Commerce</h1>
            <p class="lead">Find the best products, best quality, and the best price</p>
            <a href="/products" class="btn btn-primary btn-lg">Shopping Right Now!</a>
        </div>

        <!-- Kategori Produk -->
        <div class="mt-5">
            <h3 class="mb-4">Categories</h3>
            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-3 mb-4">
                        <x-card :title="$category['name']">
                            <p>{{ Str::limit($category->description, 60) }}</p>
                            <a href="/category/{{ $category['slug'] }}" class="btn btn-success">View Products</a>
                        </x-card>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Produk Unggulan -->
        <div class="mt-5">
            <h3 class="mb-4">Products</h3>
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-md-3 mb-4">
                        <x-card :image="'storage/' . $product->image_url" :title="$product->name">
                            <p>{{ Str::limit($product->description, 60) }}</p>
                            <p class="text-muted mb-2">Price: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
                            <a href="/products/{{ $product->slug }}" class="btn btn-success">View Details</a>
                        </x-card>
                    </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
</x-Layout>
