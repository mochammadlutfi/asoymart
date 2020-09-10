@if($data->total() > 0)
    @foreach($data as $d)
    <tbody class="data_transaksi">
        <tr data-transaksi_id="{{$d->id }}">
            <td>
                {{ $d->tgl_transaksi }}
            </td>
            <td>
                {{ $d->outlet->nama }}
            </td>
            <td>
                {{ ucWords($d->supplier->nama) }}
            </td>
            <td>
                <span class="badge badge-success">{{ $d->status }}</span>
            </td>
            <td>
                <span class="badge badge-success">{{ $d->bayar_status }}</span>
            </td>
            <td>
                Rp <span class="display_currency">{{ $d->final_total }}</span>
            </td>
            <td>
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
                    <div class="dropdown-menu" style="">
                        <a class="dropdown-item" href="{{ route('mitra.pembelian.detail', $d->id) }}">
                            <i class="si si-eye mr-1"></i>Detail
                        </a>
                        <a class="dropdown-item" href="javascript:void(0)">
                            <i class="si si-trash mr-1"></i>Hapus Produk
                        </a>
                    </div>
                </div>
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
