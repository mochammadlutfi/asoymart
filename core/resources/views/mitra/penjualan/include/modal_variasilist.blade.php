<div class="form-group row">
    <div class="col-md-7">
        <div class="font-w600 font-size-md">{{ $pv->nama }}</div>
        <input type="hidden" name="produk[{{ $i }}][produk_id]" value="{{ $produk->id }}">
        <input type="hidden" name="produk[{{ $i }}][produk_nama]" value="{{ $produk->nama }}">
        <input type="hidden" name="produk[{{ $i }}][variasi_id]" value="{{ $pv->id }}" id="variasi_id_modal">
        <input type="hidden" name="produk[{{ $i }}][variasi_nama]" value="{{ $pv->nama }}">
        <input type="hidden" name="produk[{{ $i }}][hrg]" value="{{ $pv->hrg_jual }}">
        Rp <span class="display_currency">{{ number_format($pv->hrg_jual,0,",",".") }}</span>
    </div>
    <div class="col-md-5">
        <div class="input-group input-number">
            <div class="input-group-prepend">
                <button type="button" class="btn btn-secondary quantity-down">
                    <i class="fa fa-minus text-danger"></i>
                </button>
            </div>
            <input type="text" data-min="1" class="form-control pos_quantity-{{$pv->id}} input_number mousetrap input_quantity valid" value="0" name="produk[{{ $i }}][qty]" data-allow-overselling="false" data-decimal="0" data-rule-abs_digit="true" data-msg-abs_digit="Decimal value not allowed" data-rule-required="true" data-msg-required="This field is required" data-rule-max-value="4.0000" data-qty_available="4.0000" data-msg-max-value="Only 4.00 Pc(s) available" data-msg_max_default="Only 4.00 Pc(s) available" aria-required="true" aria-invalid="false">
            <div class="input-group-append">
                <button type="button" class="btn btn-secondary quantity-up">
                    <i class="fa fa-plus text-success"></i>
                </button>
            </div>
        </div>
    </div>
</div>