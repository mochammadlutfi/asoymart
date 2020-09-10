@for($i= 0; $i < count($variasi); $i++)
<tr>
    <td>
        {{ $variasi[$i]['pil1'] }}
        <input type="hidden" class="form-control" name="variasi[{{$i}}][pil1]" value="{{ $variasi[$i]['pil1'] }}">
    </td>
    @if($variasi[$i]['pil2'] !== '')
    <td>
        {{ $variasi[$i]['pil2'] }}
        <input type="hidden" class="form-control" name="variasi[{{$i}}][pil2]" value="{{ $variasi[$i]['pil2'] }}">
    </td>
    @endif
    <td>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    Rp
                </span>
            </div>
            <input type="number" class="form-control" id="field-harga" name="variasi[{{$i}}][harga]" placeholder="Masukan Harga">
        </div>
    </td>
    <td>
        <input type="number" class="form-control" id="field-harga" name="variasi[{{$i}}][stok]" min="1">
    </td>
    <td>
        <input type="text" class="form-control" id="field-harga" name="variasi[{{$i}}][sku]">
    </td>
</tr>
@endfor
