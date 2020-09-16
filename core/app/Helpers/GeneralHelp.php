<?php
use App\Models\VariasiDetail;
use App\Models\Daerah;
use Carbon\Carbon;
use Session as Session;
use Storage as Storage;
if (!function_exists('getStokPerVariasi')) {

    /**
     * Mengambil Stok Terkini Berdasarkan Variasi Produk
     *
     * @param
     * $variasi_id = ID Variasi
     * @return
     * Jumlah Stok Variasi
     */
    function getStokPerVariasi($variasi_id)
    {
        $variasi = VariasiDetail::where('variasi_id',$variasi_id)->first();
        if($variasi)
        {
            return $variasi->qty_tersedia;
        }else{
            return 0;
        }
    }
}

if (!function_exists('get_produk_img')) {

    /**
     * Mengambil Stok Terkini Berdasarkan Variasi Produk
     *
     * @param
     * $variasi_id = ID Variasi
     * @return
     * Jumlah Stok Variasi
     */
    function get_produk_img($img_path)
    {
        $isExists = Storage::disk('umum')->exists($img_path);
        if(!$isExists)
        {
            return asset('assets/img/placeholder/product.png');
        }else{
            return asset('uploads/'.$img_path);
        }

    }
}
if (!function_exists('get_variant')) {

    /**
     * Mengambil Stok Terkini Berdasarkan Variasi Produk
     *
     * @param
     * $variant = Nilai Variasi
     * @return
     * Jumlah Stok Variasi
     */
    function get_variant($variant, $var = 1)
    {
        if(strpos($variant, '-') !== false ) {
            list($var1, $var2) = explode('-', $variant);
            if($var == 2)
            {
                return $var2;
            }else{
                return $var1;
            }
       }else{
        return $variant;
       }
    }
}

// if (!function_exists('getCart')) {

//     /**
//      * Mengambil Stok Terkini Berdasarkan Variasi Produk
//      *
//      * @param
//      * $variasi_id = ID Variasi
//      * @return
//      * Jumlah Stok Variasi
//      */
//     function getCart($tipe)
//     {
//         if($tipe == 'pembelian')
//         {
//             $cart = \Cart::session(auth()->guard('mitra')->user()->id.'-pembelian')->getContent();
//         }else{
//             $cart = \Cart::session(auth()->guard('mitra')->user()->id.'-penjualan')->getContent();
//         }
//         return $cart->sort();
//     }
// }

if (!function_exists('getCartCount')) {

    /**
     * Mengambil Stok Terkini Berdasarkan Variasi Produk
     *
     * @param
     * $variasi_id = ID Variasi
     * @return
     * Jumlah Stok Variasi
     */
    function getCartCount($tipe)
    {
        if($tipe == 'pembelian')
        {
            $cart = \Cart::session(Session::get('bisnis.outlet_id').'-pembelian')->getContent();
        }else if($tipe == 'penjualan'){
            $cart = \Cart::session(Session::get('bisnis.outlet_id').'-penjualan')->getContent();
        }else if($tipe == 'returbeli'){
            $cart = \Cart::session(Session::get('bisnis.outlet_id').'-returbeli')->getContent();
        }
        return $cart->count();
    }
}

if (!function_exists('getCart')) {

    /**
     * Mengambil Data Cart
     *
     * @param
     * $tipe = Tipe transaksi penjualan/pembelian
     * @return
     * Session Cart
     */
    function getCart($tipe)
    {
        if($tipe == 'pembelian')
        {
            $cart = \Cart::session(Session::get('bisnis.outlet_id').'-pembelian');
        }else if($tipe == 'penjualan'){
            $cart = \Cart::session(Session::get('bisnis.outlet_id').'-penjualan');
        }else if($tipe == 'returbeli'){
            $cart = \Cart::session(Session::get('bisnis.outlet_id').'-returbeli');
        }
        return $cart;
    }
}

if (!function_exists('uf_date')) {

    /**
     * Konversi tanggal kedalam format MYSQL
     *
     * @param string $date
     * @param bool $time (default = false)
     * @return strin
     */
    function uf_date($date, $time = false)
    {
        $date_format = 'd-m-Y';
        $mysql_format = 'Y-m-d';
        if ($time) {
            $date_format = $date_format . ' H:i';

            $mysql_format = 'Y-m-d H:i:s';
        }

        return Carbon::createFromFormat($date_format, $date)->format($mysql_format);
    }
}

if (!function_exists('get_daerah')) {

    /**
     * Konversi tanggal kedalam format MYSQL
     *
     * @param string $date
     * @param bool $time (default = false)
     * @return strin
     */
    function get_daerah($daerah_id)
    {
        $daerah = Daerah::find($daerah_id);

        $alamat  = ucwords(strtolower($daerah->urban)).', ';
        $alamat .= ucwords(strtolower($daerah->sub_district)).',<br>';
        $alamat .= ucwords(strtolower($daerah->city)).', ';
        $alamat .= ucwords(strtolower($daerah->provinsi->province_name));
        return $alamat;
    }//
}

if (!function_exists('showStatusPembayaran')) {

    /**
     * Konversi tanggal kedalam format MYSQL
     *
     * @param string $date
     * @param bool $time (default = false)
     * @return strin
     */
    function showStatusPembayaran($status)
    {
        if($status == 'lunas')
        {
            $badge = '<span class="badge badge-success">'. ucwords($status) .'</span>';
        }elseif($status == 'sebagian')
        {
            $badge = '<span class="badge badge-warning">'. ucwords($status) .'</span>';
        }elseif($status == 'belum dibayar')
        {
            $badge = '<span class="badge badge-danger">'. ucwords($status) .'</span>';
        }
        return $badge;
    }
}

