<tr>
    <td>
        <div class="font-w600 font-size-md">{{ $pv->nama }}</div>
        <input type="hidden" name="produk[{{ $i }}][produk_id]" value="{{ $pv->produk->id }}">
        <input type="hidden" name="produk[{{ $i }}][produk_nama]" value="{{ $pv->produk->nama }}">
        <input type="hidden" name="produk[{{ $i }}][variasi_id]" value="{{ $pv->id }}" class="variasi_id_modal">
        <input type="hidden" name="produk[{{ $i }}][variasi_nama]" value="{{ $pv->nama }}">
        <input type="hidden" name="produk[{{ $i }}][hrg]" value="{{ $pv->hrg_jual }}">
        Rp <span class="display_currency">{{ number_format($pv->hrg_jual,0,",",".") }}</span>
    </td>
    <td width="35%">
        <div class="input-group input-number">
            <div class="input-group-prepend">
                <button type="button" class="btn btn-secondary quantity-down">
                    <i class="fa fa-minus text-danger"></i>
                </button>
            </div>
            <input type="number" data-min="1" class="form-control pos_quantity-{{$pv->id}} input_quantity kuantias_modal" value="0" name="produk[{{ $i }}][qty]" value="0">
            <div class="input-group-append">
                <button type="button" class="btn btn-secondary quantity-up">
                    <i class="fa fa-plus text-success"></i>
                </button>
            </div>
        </div>
    </td>
</tr>
