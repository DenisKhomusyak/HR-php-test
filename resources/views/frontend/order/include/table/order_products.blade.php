<ul>
    @forelse($orderProducts as $product)
        <li>{{ $product->name }} x {{ $product->quantityInOrder }}</li>
    @empty
        <li>No products</li>
    @endforelse
</ul>