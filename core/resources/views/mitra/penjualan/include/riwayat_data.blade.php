@if($data->total() > 0)
    @foreach($data as $d)
    <tbody class="data_transaksi">
        <tr data-transaksi_id="{{$d->id }}">
            <td>
                {{ $d->tgl_transaksi }}
            </td>
            <td>
                <span class="badge badge-success">{{ $d->bayar_status }}</span>
            </td>
            <td>
                {{ $d->invoice_no }}
            </td>
            <td>
                {{ $d->outlet->nama }}
            </td>
            <td>
                Rp <span class="display_currency">{{ $d->final_total }}</span>
            </td>
            <td>
            {{ ucWords($d->mitra->nama) }}
            </td>
        </tr>
    </tbody>
    @endforeach
    @if ($data->hasMorePages())
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
    @endif
@else
<tbody>
    <tr>
        <td colspan="8" class="text-center">
            <img src="{{ asset('assets/img/placeholder/data_not_found.png') }}">
        </td>
    </tr>
</tbody>
@endif
