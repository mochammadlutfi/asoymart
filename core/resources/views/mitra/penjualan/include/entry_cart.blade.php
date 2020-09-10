{{-- @foreach($data as $d) --}}
<tr>
    <td>
        <input type="hidden" name="cart[][produk_id]" value="{{ $d['produk_id'] }}">
        <input type="hidden" name="cart[][variasi_id]" value="{{ $d['variasi_id'] }}" class="row_variasi_id">
        <input type="hidden" name="cart[][qty]" class="row_kuantitas" value="{{ $d['qty'] }}">
        <input type="hidden" name="cart[][hrg]" value="{{ $d['hrg'] }}">
        <input type="hidden" name="cart[][diskon]" value="{{ $d['diskon'] }}">
        <div class="font-w600 font-size-md">{{ $d['text_produk'] }}</div>
        <div class="font-size-sm">Rp {{ number_format($d['hrg'],0,",",".") }} x {{ $d['qty'] }}</div>
        <div class="font-size-sm diskon_text-{{ $d['variasi_id'] }}" style="display:none;">Diskon Harga</div>
    </td>
    <td class="text-right">
        <button class="btn btn-sm btn-alt-primary ubah-variasi">
            <i class="fa fa-pencil-square-o mr-1"></i>Ubah
        </button>
        <div class="font-w600 font-size-sm">Rp {{ number_format($d['sub_total'],0,",",".") }}</div>
        <div class="font-size-sm diskon_price-{{ $d['variasi_id'] }}" style="display:none;">Rp  12</div>
    </td>
</tr>
{{-- @endforeach --}}
