(function () {

    var laroute = (function () {

        var routes = {

            absolute: true,
            rootUrl: 'http://localhost/asoymart',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/open","name":"debugbar.openhandler","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@handle"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/clockwork\/{id}","name":"debugbar.clockwork","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/telescope\/{id}","name":"debugbar.telescope","action":"Barryvdh\Debugbar\Controllers\TelescopeController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/stylesheets","name":"debugbar.assets.css","action":"Barryvdh\Debugbar\Controllers\AssetController@css"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/javascript","name":"debugbar.assets.js","action":"Barryvdh\Debugbar\Controllers\AssetController@js"},{"host":null,"methods":["DELETE"],"uri":"_debugbar\/cache\/{key}\/{tags?}","name":"debugbar.cache.delete","action":"Barryvdh\Debugbar\Controllers\CacheController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"arrilot\/load-widget","name":null,"action":"Arrilot\Widgets\Controllers\WidgetController@showWidget"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"admin.login","action":"App\Http\Controllers\Admin\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"admin.","action":"App\Http\Controllers\Admin\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"admin\/logout","name":"admin.logout","action":"App\Http\Controllers\Admin\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/beranda","name":"admin.beranda","action":"App\Http\Controllers\Admin\BerandaController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra","name":"admin.mitra","action":"App\Http\Controllers\Admin\MitraController@index"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/mitra\/tambah","name":"admin.mitra.tambah","action":"App\Http\Controllers\Admin\MitraController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/edit\/{id}","name":"admin.mitra.edit","action":"App\Http\Controllers\Admin\MitraController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/mitra\/update","name":"admin.mitra.update","action":"App\Http\Controllers\Admin\MitraController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/hapus\/{id}","name":"admin.mitra.hapus","action":"App\Http\Controllers\Admin\MitraController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/kategori","name":"admin.Bisniskategori","action":"App\Http\Controllers\Admin\BisnisKategoriController@index"},{"host":null,"methods":["POST"],"uri":"admin\/mitra\/kategori\/json","name":"admin.Bisniskategori.json","action":"App\Http\Controllers\Admin\BisnisKategoriController@json"},{"host":null,"methods":["POST"],"uri":"admin\/mitra\/kategori\/simpan","name":"admin.Bisniskategori.simpan","action":"App\Http\Controllers\Admin\BisnisKategoriController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/kategori\/edit\/{id}","name":"admin.Bisniskategori.edit","action":"App\Http\Controllers\Admin\BisnisKategoriController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/mitra\/kategori\/update","name":"admin.Bisniskategori.update","action":"App\Http\Controllers\Admin\BisnisKategoriController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/kategori\/hapus\/{id}","name":"admin.Bisniskategori.hapus","action":"App\Http\Controllers\Admin\BisnisKategoriController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/promo","name":"admin.promo","action":"App\Http\Controllers\Admin\PromoController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/promo\/tambah","name":"admin.promo.tambah","action":"App\Http\Controllers\Admin\PromoController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/promo\/simpan","name":"admin.promo.simpan","action":"App\Http\Controllers\Admin\PromoController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/promo\/edit\/{id}","name":"admin.promo.edit","action":"App\Http\Controllers\Admin\PromoController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/promo\/update","name":"admin.promo.update","action":"App\Http\Controllers\Admin\PromoController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/promo\/hapus\/{id}","name":"admin.promo.hapus","action":"App\Http\Controllers\Admin\PromoController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kupon","name":"admin.kupon","action":"App\Http\Controllers\Admin\KuponController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kupon\/tambah","name":"admin.kupon.tambah","action":"App\Http\Controllers\Admin\KuponController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/kupon\/simpan","name":"admin.kupon.simpan","action":"App\Http\Controllers\Admin\KuponController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kupon\/edit\/{id}","name":"admin.kupon.edit","action":"App\Http\Controllers\Admin\KuponController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/kupon\/update","name":"admin.kupon.update","action":"App\Http\Controllers\Admin\KuponController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kupon\/hapus\/{id}","name":"admin.kupon.hapus","action":"App\Http\Controllers\Admin\KuponController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kategori","name":"admin.kategori","action":"App\Http\Controllers\Admin\KategoriController@index"},{"host":null,"methods":["POST"],"uri":"admin\/kategori\/json","name":"admin.kategori.json","action":"App\Http\Controllers\Admin\KategoriController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kategori\/tree","name":"admin.kategori.tree","action":"App\Http\Controllers\Admin\KategoriController@tree"},{"host":null,"methods":["POST"],"uri":"admin\/kategori\/simpan","name":"admin.kategori.simpan","action":"App\Http\Controllers\Admin\KategoriController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kategori\/edit\/{id}","name":"admin.kategori.edit","action":"App\Http\Controllers\Admin\KategoriController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/kategori\/update","name":"admin.kategori.update","action":"App\Http\Controllers\Admin\KategoriController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/kategori\/hapus\/{id}","name":"admin.kategori.hapus","action":"App\Http\Controllers\Admin\KategoriController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/login","name":"mitra.login","action":"App\Http\Controllers\Mitra\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"mitra\/login","name":"mitra.loginPost","action":"App\Http\Controllers\Mitra\Auth\LoginController@login"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra","name":"mitra.daftar","action":"App\Http\Controllers\Mitra\Auth\PendaftaranController@index"},{"host":null,"methods":["POST"],"uri":"mitra\/daftar-1","name":"mitra.daftarStep1","action":"App\Http\Controllers\Mitra\Auth\PendaftaranController@step1"},{"host":null,"methods":["POST"],"uri":"mitra\/daftar-2","name":"mitra.daftarStep2","action":"App\Http\Controllers\Mitra\Auth\PendaftaranController@step2"},{"host":null,"methods":["POST"],"uri":"mitra\/daftar\/cek-username","name":"mitra.postCheckUsername","action":"App\Http\Controllers\Mitra\Auth\PendaftaranController@postCheckUsername"},{"host":null,"methods":["POST"],"uri":"mitra\/daftar\/cek-email","name":"mitra.postCheckEmail","action":"App\Http\Controllers\Mitra\Auth\PendaftaranController@postCheckEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/beranda","name":"mitra.beranda","action":"App\Http\Controllers\Mitra\BerandaController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/getTotal","name":"mitra.beranda.getTotal","action":"App\Http\Controllers\Mitra\BerandaController@getTotal"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk","name":"mitra.produk","action":"App\Http\Controllers\Mitra\ProdukController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk\/tambah","name":"mitra.produk.tambah","action":"App\Http\Controllers\Mitra\ProdukController@tambah"},{"host":null,"methods":["POST"],"uri":"mitra\/produk\/simpan","name":"mitra.produk.simpan","action":"App\Http\Controllers\Mitra\ProdukController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk\/edit\/{id}","name":"mitra.produk.edit","action":"App\Http\Controllers\Mitra\ProdukController@edit"},{"host":null,"methods":["POST"],"uri":"mitra\/produk\/update","name":"mitra.produk.update","action":"App\Http\Controllers\Mitra\ProdukController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk\/hapus\/{id}","name":"mitra.produk.hapus","action":"App\Http\Controllers\Mitra\ProdukController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk\/json","name":"mitra.produk.json","action":"App\Http\Controllers\Mitra\ProdukController@json"},{"host":null,"methods":["POST"],"uri":"mitra\/produk\/add_variasi","name":"mitra.variasi_update","action":"App\Http\Controllers\Mitra\VariasiController@add_variasi"},{"host":null,"methods":["POST"],"uri":"mitra\/produk\/get_variasi","name":"mitra.variasi_get","action":"App\Http\Controllers\Mitra\VariasiController@get_variasi"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/penjualan","name":"mitra.order","action":"App\Http\Controllers\Mitra\PenjualanController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/keuangan\/rekening-bank","name":"mitra.rekening","action":"App\Http\Controllers\Mitra\RekeningController@index"},{"host":null,"methods":["POST"],"uri":"mitra\/keuangan\/rekening-bank\/simpan","name":"mitra.rekening.simpan","action":"App\Http\Controllers\Mitra\RekeningController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/keuangan\/rekening-bank\/edit\/{id}","name":"mitra.rekening.edit","action":"App\Http\Controllers\Mitra\RekeningController@edit"},{"host":null,"methods":["POST"],"uri":"mitra\/keuangan\/rekening-bank\/update","name":"mitra.rekening.update","action":"App\Http\Controllers\Mitra\RekeningController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/keuangan\/rekening-bank\/hapus\/{id}","name":"mitra.rekening.hapus","action":"App\Http\Controllers\Mitra\RekeningController@hapus"},{"host":null,"methods":["POST"],"uri":"mitra\/keuangan\/rekening-bank\/bank","name":"mitra.rekening.bank","action":"App\Http\Controllers\Mitra\RekeningController@bank"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/toko","name":"mitra.toko.profil","action":"App\Http\Controllers\Mitra\TokoController@index"},{"host":null,"methods":["POST"],"uri":"mitra\/toko\/update","name":"mitra.toko.update","action":"App\Http\Controllers\Mitra\TokoController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/toko\/etalase","name":"mitra.etalase","action":"App\Http\Controllers\Mitra\EtalaseTokoController@index"},{"host":null,"methods":["POST"],"uri":"mitra\/toko\/etalase\/simpan","name":"mitra.etalase.simpan","action":"App\Http\Controllers\Mitra\EtalaseTokoController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/toko\/etalase\/edit\/{id}","name":"mitra.etalase.edit","action":"App\Http\Controllers\Mitra\EtalaseTokoController@edit"},{"host":null,"methods":["POST"],"uri":"mitra\/toko\/etalase\/update","name":"mitra.etalase.update","action":"App\Http\Controllers\Mitra\EtalaseTokoController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/toko\/etalase\/hapus\/{id}","name":"mitra.etalase.hapus","action":"App\Http\Controllers\Mitra\EtalaseTokoController@hapus"},{"host":null,"methods":["POST"],"uri":"wilayah\/jsonSelect","name":"wilayah.jsonSelect","action":"App\Http\Controllers\WilayahController@jsonSelect"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":"home","action":"App\Http\Controllers\Umum\HomeController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"App\Http\Controllers\Umum\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":"loginPost","action":"App\Http\Controllers\Umum\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"App\Http\Controllers\Umum\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"App\Http\Controllers\Umum\Auth\RegisterController@index"},{"host":null,"methods":["POST"],"uri":"registerPost","name":"registerPost","action":"App\Http\Controllers\Umum\Auth\RegisterController@proses"},{"host":null,"methods":["GET","HEAD"],"uri":"user","name":"user.index","action":"App\Http\Controllers\Umum\UserController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/profil","name":"user.profil","action":"App\Http\Controllers\Umum\UserController@profil"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/pembayaran","name":"user.belum_bayar","action":"App\Http\Controllers\Umum\OrderController@belum_bayar"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/pesanan","name":"user.pesanan","action":"App\Http\Controllers\Umum\OrderController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/pesanan\/invoice\/{invoice_no}","name":"user.invoice","action":"App\Http\Controllers\Umum\OrderController@invoice"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/alamat","name":"user.alamat","action":"App\Http\Controllers\Umum\AlamatController@index"},{"host":null,"methods":["POST"],"uri":"user\/alamat\/simpan","name":"user.alamat.simpan","action":"App\Http\Controllers\Umum\AlamatController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/alamat\/edit\/{id}","name":"user.alamat.edit","action":"App\Http\Controllers\Umum\AlamatController@edit"},{"host":null,"methods":["POST"],"uri":"user\/alamat\/update","name":"user.alamat.update","action":"App\Http\Controllers\Umum\AlamatController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/alamat\/hapus\/{id}","name":"user.alamat.hapus","action":"App\Http\Controllers\Umum\AlamatController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/alamat\/json","name":"user.alamat.json","action":"App\Http\Controllers\Umum\AlamatController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"cart","name":"cart","action":"App\Http\Controllers\Umum\CartController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/data","name":"cart.data","action":"App\Http\Controllers\Umum\CartController@data"},{"host":null,"methods":["POST"],"uri":"cart\/show-cart-modal","name":"cart.showCartModal","action":"App\Http\Controllers\Umum\CartController@showCartModal"},{"host":null,"methods":["POST"],"uri":"cart\/addtocart","name":"cart.addToCart","action":"App\Http\Controllers\Umum\CartController@addToCart"},{"host":null,"methods":["POST"],"uri":"cart\/hapus","name":"cart.hapus","action":"App\Http\Controllers\Umum\CartController@hapus"},{"host":null,"methods":["POST"],"uri":"cart\/updateQuantity","name":"cart.updateQuantity","action":"App\Http\Controllers\Umum\CartController@updateQuantity"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"cart\/checkout","name":"checkout","action":"App\Http\Controllers\Umum\CheckoutController@index"},{"host":null,"methods":["POST"],"uri":"cart\/checkout\/pembayaran","name":"checkout.bayar","action":"App\Http\Controllers\Umum\CheckoutController@pembayaran"},{"host":null,"methods":["POST"],"uri":"cart\/checkout\/post","name":"checkout.simpan","action":"App\Http\Controllers\Umum\CheckoutController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"cart\/checkout\/bayar","name":null,"action":"App\Http\Controllers\Umum\CheckoutController@bayar"},{"host":null,"methods":["POST"],"uri":"variant_price","name":"variant_price","action":"App\Http\Controllers\Umum\ProdukController@variant_price"},{"host":null,"methods":["POST"],"uri":"top-data","name":"cart.top_data","action":"App\Http\Controllers\Umum\KategoriController@cartTop_data"},{"host":null,"methods":["GET","HEAD"],"uri":"c\/{kategori}","name":"kategori.detail","action":"App\Http\Controllers\Umum\KategoriController@index"},{"host":null,"methods":["POST"],"uri":"c\/sub_kategori_json","name":"kategori.sub_kategori_json","action":"App\Http\Controllers\Umum\KategoriController@sub_kategori_json"},{"host":null,"methods":["GET","HEAD"],"uri":"promo","name":"promo","action":"App\Http\Controllers\Umum\PromoController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"promo\/{slug}","name":"promo.detail","action":"App\Http\Controllers\Umum\PromoController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"{seller}","name":"seller","action":"App\Http\Controllers\Umum\SellerController@detail"},{"host":null,"methods":["GET","HEAD"],"uri":"{bisnis}\/{produk}","name":"produk.detail","action":"App\Http\Controllers\Umum\ProdukController@detail"}],
            prefix: '',

            route : function (name, parameters, route) {
                route = route || this.getByName(name);

                if ( ! route ) {
                    return undefined;
                }

                return this.toRoute(route, parameters);
            },

            url: function (url, parameters) {
                parameters = parameters || [];

                var uri = url + '/' + parameters.join('/');

                return this.getCorrectUrl(uri);
            },

            toRoute : function (route, parameters) {
                var uri = this.replaceNamedParameters(route.uri, parameters);
                var qs  = this.getRouteQueryString(parameters);

                if (this.absolute && this.isOtherHost(route)){
                    return "//" + route.host + "/" + uri + qs;
                }

                return this.getCorrectUrl(uri + qs);
            },

            isOtherHost: function (route){
                return route.host && route.host != window.location.hostname;
            },

            replaceNamedParameters : function (uri, parameters) {
                uri = uri.replace(/\{(.*?)\??\}/g, function(match, key) {
                    if (parameters.hasOwnProperty(key)) {
                        var value = parameters[key];
                        delete parameters[key];
                        return value;
                    } else {
                        return match;
                    }
                });

                // Strip out any optional parameters that were not given
                uri = uri.replace(/\/\{.*?\?\}/g, '');

                return uri;
            },

            getRouteQueryString : function (parameters) {
                var qs = [];
                for (var key in parameters) {
                    if (parameters.hasOwnProperty(key)) {
                        qs.push(key + '=' + parameters[key]);
                    }
                }

                if (qs.length < 1) {
                    return '';
                }

                return '?' + qs.join('&');
            },

            getByName : function (name) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].name === name) {
                        return this.routes[key];
                    }
                }
            },

            getByAction : function(action) {
                for (var key in this.routes) {
                    if (this.routes.hasOwnProperty(key) && this.routes[key].action === action) {
                        return this.routes[key];
                    }
                }
            },

            getCorrectUrl: function (uri) {
                var url = this.prefix + '/' + uri.replace(/^\/?/, '');

                if ( ! this.absolute) {
                    return url;
                }

                return this.rootUrl.replace('/\/?$/', '') + url;
            }
        };

        var getLinkAttributes = function(attributes) {
            if ( ! attributes) {
                return '';
            }

            var attrs = [];
            for (var key in attributes) {
                if (attributes.hasOwnProperty(key)) {
                    attrs.push(key + '="' + attributes[key] + '"');
                }
            }

            return attrs.join(' ');
        };

        var getHtmlLink = function (url, title, attributes) {
            title      = title || url;
            attributes = getLinkAttributes(attributes);

            return '<a href="' + url + '" ' + attributes + '>' + title + '</a>';
        };

        return {
            // Generate a url for a given controller action.
            // laroute.action('HomeController@getIndex', [params = {}])
            action : function (name, parameters) {
                parameters = parameters || {};

                return routes.route(name, parameters, routes.getByAction(name));
            },

            // Generate a url for a given named route.
            // laroute.route('routeName', [params = {}])
            route : function (route, parameters) {
                parameters = parameters || {};

                return routes.route(route, parameters);
            },

            // Generate a fully qualified URL to the given path.
            // laroute.route('url', [params = {}])
            url : function (route, parameters) {
                parameters = parameters || {};

                return routes.url(route, parameters);
            },

            // Generate a html link to the given url.
            // laroute.link_to('foo/bar', [title = url], [attributes = {}])
            link_to : function (url, title, attributes) {
                url = this.url(url);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given route.
            // laroute.link_to_route('route.name', [title=url], [parameters = {}], [attributes = {}])
            link_to_route : function (route, title, parameters, attributes) {
                var url = this.route(route, parameters);

                return getHtmlLink(url, title, attributes);
            },

            // Generate a html link to the given controller action.
            // laroute.link_to_action('HomeController@getIndex', [title=url], [parameters = {}], [attributes = {}])
            link_to_action : function(action, title, parameters, attributes) {
                var url = this.action(action, parameters);

                return getHtmlLink(url, title, attributes);
            }

        };

    }).call(this);

    /**
     * Expose the class either via AMD, CommonJS or the global object
     */
    if (typeof define === 'function' && define.amd) {
        define(function () {
            return laroute;
        });
    }
    else if (typeof module === 'object' && module.exports){
        module.exports = laroute;
    }
    else {
        window.laroute = laroute;
    }

}).call(this);

