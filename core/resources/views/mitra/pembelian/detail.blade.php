@extends('mitra.layouts.master')

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Detail Pembelian
        <button type="submit" class="btn btn-secondary float-right mr-5">
            <i class="si si-printer mr-1"></i>
            Print
        </button>
        <a href="{{ route('mitra.pembelian.edit', $transaksi->id) }}" class="btn btn-secondary float-right mr-5">
            <i class="si si-note mr-1"></i>
            Ubah
        </a>
        <button type="submit" class="btn btn-secondary float-right mr-5">
            <i class="si si-printer mr-1"></i>
            Hapus
        </button>
        <button type="submit" class="btn btn-secondary float-right mr-5">
            <i class="si si-cloud-download mr-1"></i>
            Download
        </button>
    </div>
    <div class="block">
        <div class="block-content">
            <!-- Invoice Info -->
            <div class="row mb-20">
                <!-- Company Info -->
                <div class="col-4">
                    <p class="h5 mb-1">{{ $transaksi->supplier->nama }}</p>
                    <address>
                        {{ $transaksi->supplier->alamat }}<br>
                        <?= get_daerah($transaksi->supplier->daerah_id); ?>
                    </address>
                </div>
                <!-- END Company Info -->

                <!-- Client Info -->
                <div class="col-4 text-right">
                    <p class="h5 mb-1">{{ $transaksi->supplier->nama }}</p>
                    <address>
                    </address>
                </div>
                <!-- END Client Info -->
            </div>
            <!-- END Invoice Info -->

            <!-- Table -->

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h5 class="mb-5">Produk Pembelian:</h5>
                </div>
                <div class="col-sm-12">

                    <table class="table bg-gray-light">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-center" style="width: 60px;">#</th>
                                <th>Produk</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Kuantitas</th>
                                <th class="text-center">Harga Beli</th>
                                <th class="text-center">Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i = 1; @endphp
                            @foreach($produk as $item)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>
                                    <div class="text-muted">{{ $item->variasi->produk->nama }},{{ $item->variasi->nama }}</div>
                                </td>
                                <td>
                                    <div class="text-muted">{{ $item->variasi->satuan->nama }}</div>
                                </td>
                                <td class="text-center">
                                    <span class="badge badge-pill badge-primary">{{ $item->quantity }}</span>
                                </td>
                                <td class="text-center">Rp {{ number_format($item->hrg_beli,0,",",".") }}</td>
                                <td class="text-center">Rp {{ number_format($item->total_hrg,0,",",".") }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Produk -->
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h5 class="mb-5">Pembayaran:</h5>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table bg-gray">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal</th>
                                    <th>No Ref</th>
                                    <th>Jumlah</th>
                                    <th>Metode</th>
                                    <th>Catatan Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach($pembayaran as $p)
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <span class="display_currency" data-currency_symbol="true">{{ $p->jumlah }}</span></td>
                                    <td>
                                        {{ $p->method }}
                                    </td>
                                    <td> --
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="table-responsive">
                        <table class="table bg-gray">
                            <tbody>
                                <tr>
                                    <th>Total: </th>
                                    <td></td>
                                    <td>
                                        <span class="display_currency pull-right" data-currency_symbol="true"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Diskon:</th>
                                    <td><b>(-)</b></td>
                                    <td><span class="pull-right">0 % </span></td>
                                </tr>
                                <tr>
                                    <th>PPN:</th>
                                    <td><b>(+)</b></td>
                                    <td class="text-right">
                                        0.00
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <th>Shipping: </th>
                                    <td><b>(+)</b></td>
                                    <td><span class="display_currency pull-right" data-currency_symbol="true">Rp
                                            0.00</span></td>
                                </tr> --}}
                                <tr>
                                    <th>Total Tagihan: </th>
                                    <td></td>
                                    <td>
                                        <span class="display_currency pull-right" data-currency_symbol="true">{{ $transaksi->final_total }}</span>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Total Dibayar:</th>
                                    <td></td>
                                    <td>
                                        <span class="display_currency pull-right" data-currency_symbol="true">{{ $transaksi->bayaran->sum('jumlah') }}</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Table -->

            <!-- Footer -->
            {{-- <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p> --}}
            <!-- END Footer -->
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
</script>
@endpush
