@extends('mitra.layouts.master')

@section('content')
<div class="content">
    <div class="content-heading pt-0 mb-3">
        Detail Penjualan
        <button type="submit" class="btn btn-secondary float-right mr-5">
            <i class="si si-paper-plane mr-1"></i>
            Print Struk
        </button>
    </div>
    <div class="block">
        {{-- <div class="block-header block-header-default">
            <h3 class="block-title">#{{ $transaksi->ref_no }}</h3>
            <div class="block-options">
                <!-- Print Page functionality is initialized in Helpers.print() -->
                <button type="button" class="btn-block-option" onclick="Codebase.helpers('print-page');">
                    <i class="si si-printer"></i> Print Invoice
                </button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                    <i class="si si-refresh"></i>
                </button>
            </div>
        </div> --}}
        <div class="block-content">
            <!-- Invoice Info -->
            <div class="row my-20">
                <!-- Company Info -->
                <div class="col-4">
                    <p class="h5 mb-1"></p>
                    <address>
                        <br>
                        
                    </address>
                </div>
                <!-- END Company Info -->

                <!-- Client Info -->
                <div class="col-4 text-right">
                    {{-- <p class="h5 mb-1">{{ $transaksi->supplier->nama }}</p> --}}
                    <address>
                    </address>
                </div>
                <!-- END Client Info -->
            </div>
            <!-- END Invoice Info -->

            <!-- Table -->

            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <h5 class="mb-5">Produk Terjual:</h5>
                </div>
                <div class="col-sm-12">

                    <table class="table bg-gray-light">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="text-center" style="width: 60px;">#</th>
                                <th>Produk</th>
                                <th class="text-center">Satuan</th>
                                <th class="text-center">Harga Satuan</th>
                                <th class="text-center">Kuantitas</th>
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
                                <td class="text-center">Rp {{ number_format($item->hrg_jual,0,",",".") }}</td>
                                <td class="text-center">
                                    <span class="badge badge-pill badge-primary">{{ $item->quantity }}</span>
                                </td>
                                <td class="text-center">Rp {{ number_format($item->sub_total,0,",",".") }}</td>
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
                                        <span class="display_currency pull-right" data-currency_symbol="true">{{ $transaksi->final_total }}</span>
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
                                {{-- <tr>
                                    <th>Total Sisa:</th>
                                    <td></td>
                                    <td>
                                        <span class="display_currency pull-right" data-currency_symbol="true">{{ $transaksi->bayaran->tempo }}</span>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Table -->

            <!-- Footer -->
            <p class="text-muted text-center">Thank you very much for doing business with us. We look forward to working with you again!</p>
            <!-- END Footer -->
        </div>
    </div>
</div>
@stop
@push('scripts')
<script>
</script>
@endpush
