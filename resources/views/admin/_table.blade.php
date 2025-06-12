@forelse($products as $product)
<tr class="hover:bg-gray-50 transition">
    <td class="px-4 py-4 flex items-center gap-4">
        <img src="{{ asset('images/products/' . $product->image) }}"
             alt="{{ $product->name }}"
             class="w-16 h-16 object-cover rounded-md border" />
        <span class="font-medium text-gray-800">{{ $product->name }}</span>
    </td>
    <td class="px-4 py-4 text-gray-700">
        Rp {{ number_format($product->price, 0, ',', '.') }}
    </td>
    <td class="px-4 py-4 text-sm text-green-600 font-medium">
        In stock ({{ $product->stock }})
    </td>
    <td class="px-4 py-4 flex items-center gap-4 text-lg">
        <a href="{{ route('products.edit', $product->id) }}"
           class="text-gray-600 hover:text-gray-800 transition"
           title="Edit">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M17.414 2.586a2 2 0 010 2.828L7.828 13H5v-2l9.586-9.586a2 2 0 012.828 0z" clip-rule="evenodd" />
            </svg>
        </a>

        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="inline-block"
              onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="text-gray-600 hover:text-gray-800 transition"
                    title="Hapus">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 2a2 2 0 012-2h4a2 2 0 012 2h6a2 2 0 012 2v14a2 2 0 01-2 2H4a2 2 0 01-2-2V4a2 2 0 012-2h6z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="4" class="px-4 py-6 text-center text-gray-500">
        Produk tidak ditemukan.
    </td>
</tr>
@endforelse
