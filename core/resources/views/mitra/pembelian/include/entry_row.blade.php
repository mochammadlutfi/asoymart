@if(getCart('pembelian')->isEmpty())
<tr>
    <td colspan="6" class="text-center border-0">
        <img src="{{ asset('assets/img/placeholder/cart_empty.png') }}">
    </td>
</tr>
@else
@foreach(getCart('pembelian')->getContent()->sort() as $d)
<tr>
    <td>
        @if(!empty($d->attributes['pembelian_id']))
            <input type="hidden" name="pembelian[{{ $d->id }}][pembelian_id]" value="{{ $d->attributes['pembelian_id'] }}">
        @endif
        <input type="hidden" name="pembelian[{{ $d->id }}][produk_id]" value="{{ $d->attributes['produk_id'] }}">
        <input type="hidden" name="pembelian[{{ $d->id }}][variasi_id]" value="{{ $d->id }}" class="row_variasi_id">
        <input type="hidden" name="pembelian[{{ $d->id }}][qty]" class="row_kuantitas" value="{{ $d->quantity }}">
        {{ $d->name }}
    </td>
    <td>
        {{ $d->attributes['satuan_nama'] }}
    </td>
    <td>
        <input type="number" class="form-control jumlah_beli form-control-sm" name="pembelian[{{ $d->id }}][jumlah]" value="{{ $d->quantity }}" min="1">
    </td>
    <td>
        {{-- Rp {{ number_format($d->price,0,",",".") }} --}}
        <input type="number" class="form-control hrg_pokok" name="pembelian[{{ $d->id }}][harga]" value="{{ round($d->price,0) }}">
    </td>
    <td>
        Rp <span class="row_subtotal">{{ number_format($d->price*$d->quantity,0,",",".") }}</span>
        <input type="hidden" class="form-control row_subtotal_hidden" name="pembelian[{{ $d->id }}][total]" value="{{ $d->price*$d->quantity }}">
    </td>
    <td>
        <button type="button" class="btn btn-sm btn-danger hapus_cart">
            <i class="fa fa-close"></i>
        </button>
    </td>
</tr>
@endforeach
@endif


