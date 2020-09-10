@if($data->total() > 0)
    @foreach($data as $d)
    <tbody class="data_transaksi">
        <tr data-transaksi_id="{{$d->id }}">
            <td>
                {{ $d->tgl_transaksi }}
            </td>
            <td>
                {{ ucwords($d->outlet->nama) }}
            </td>
            <td>
                {{ ucwords($d->supplier->nama) }}
            </td>
            <td>
                <?= showStatusPembayaran($d->bayar_status); ?>
            </td>
            <td>
                Rp <span class="display_currency">{{ $d->final_total }}</span>
            </td>
            <td>
                {{ ucwords($d->mitra->nama) }}
            </td>
        </tr>
    </tbody>
    @endforeach
    <tfoot>
        <tr>
            <td colspan="4">
            {{-- Menampilkan {!! $data->total() !!} --}}
            </td>
            <td colspan="4" class="text-right">
            {!! $data->links() !!}
            </td>
        </tr>
    </tfoot>
@else
<tbody>
    <tr>
        <td colspan="8" class="text-center">
            <img src="{{ asset('assets/img/placeholder/data_not_found.png') }}">
        </td>
    </tr>
</tbody>
@endif
