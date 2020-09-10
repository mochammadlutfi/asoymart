@if(getCart('penjualan')->isEmpty())
<tr>
    <td colspan="3" class="text-center border-0">
        <img src="{{ asset('assets/img/placeholder/cart_empty.png') }}">
    </td>
</tr>
@else
@foreach(getCart('penjualan')->getContent()->sort() as $d)
<tr>
    <td class="px-0">
        <input type="hidden" name="penjualan[{{ $d->id }}][produk_id]" value="{{ $d->attributes['produk_id'] }}">
        <input type="hidden" name="penjualan[{{ $d->id }}][variasi_id]" value="{{ $d->id }}" class="row_variasi_id">
        <input type="hidden" name="penjualan[{{ $d->id }}][qty]" class="row_kuantitas" value="{{ $d->quantity }}">
        <input type="hidden" name="penjualan[{{ $d->id }}][hrg_jual]" value="{{ $d->price }}">
        <input type="hidden" name="penjualan[{{ $d->id }}][kelola_stok]" value="{{ $d->attributes['kelola_stok'] }}">
        <div class="font-w600 font-size-md">{{ $d->name }}
        </div>
        <div class="font-size-sm">Rp {{ number_format($d->price,0,",",".") }} x {{ $d->quantity }}</div>
    </td>
    <td class="text-right">
        <button class="btn btn-sm btn-alt-primary ubah_cart">
            <i class="si si-note mr-1"></i>Ubah
        </button>
        <div class="font-w600 font-size-sm">Rp {{ number_format($d->price*$d->quantity,0,",",".") }}</div>
    </td>
    <td width="5%" class="px-0">
        <button class="btn btn-sm btn-alt-danger hapus_cart py-15">
            <i class="si si-close"></i>
        </button>
    </td>
</tr>
@endforeach
@endif
