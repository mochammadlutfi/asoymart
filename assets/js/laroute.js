(function () {

    var laroute = (function () {

        var routes = {

            absolute: true,
            rootUrl: 'http://localhost/asoymart',
            routes : [{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/open","name":"debugbar.openhandler","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@handle"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/clockwork\/{id}","name":"debugbar.clockwork","action":"Barryvdh\Debugbar\Controllers\OpenHandlerController@clockwork"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/telescope\/{id}","name":"debugbar.telescope","action":"Barryvdh\Debugbar\Controllers\TelescopeController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/stylesheets","name":"debugbar.assets.css","action":"Barryvdh\Debugbar\Controllers\AssetController@css"},{"host":null,"methods":["GET","HEAD"],"uri":"_debugbar\/assets\/javascript","name":"debugbar.assets.js","action":"Barryvdh\Debugbar\Controllers\AssetController@js"},{"host":null,"methods":["DELETE"],"uri":"_debugbar\/cache\/{key}\/{tags?}","name":"debugbar.cache.delete","action":"Barryvdh\Debugbar\Controllers\CacheController@delete"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/user","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"coba","name":null,"action":"Closure"},{"host":null,"methods":["POST"],"uri":"json\/wilayah","name":"wilayah.json","action":"App\Http\Controllers\GeneralController@wilayah"},{"host":null,"methods":["POST"],"uri":"json\/getPos","name":"getPos.json","action":"App\Http\Controllers\GeneralController@getPos"},{"host":null,"methods":["POST"],"uri":"json\/kategori-bisnis","name":"bisnisKategori.json","action":"App\Http\Controllers\GeneralController@bisnisKategori"},{"host":null,"methods":["GET","HEAD"],"uri":"admin","name":"admin.","action":"Modules\Admin\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/login","name":"admin.login","action":"Modules\Admin\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"admin\/login","name":"admin.","action":"Modules\Admin\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"admin\/logout","name":"admin.logout","action":"Modules\Admin\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset","name":"admin.password.request","action":"Modules\Admin\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"admin\/password\/email","name":"admin.password.email","action":"Modules\Admin\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/password\/reset\/{token}","name":"admin.password.reset","action":"Modules\Admin\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"admin\/password\/reset","name":"admin.password.update","action":"Modules\Admin\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/email\/verify","name":"admin.verification.notice","action":"Modules\Admin\Http\Controllers\Auth\VerificationController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/email\/verify\/{id}","name":"admin.verification.verify","action":"Modules\Admin\Http\Controllers\Auth\VerificationController@verify"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/email\/resend","name":"admin.verification.resend","action":"Modules\Admin\Http\Controllers\Auth\VerificationController@resend"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/beranda","name":"admin.beranda","action":"Modules\Admin\Http\Controllers\BerandaController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra","name":"admin.mitra","action":"App\Http\Controllers\Admin\MitraController@index"},{"host":null,"methods":["GET","POST","HEAD"],"uri":"admin\/mitra\/tambah","name":"admin.mitra.tambah","action":"App\Http\Controllers\Admin\MitraController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/edit\/{id}","name":"admin.mitra.edit","action":"App\Http\Controllers\Admin\MitraController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/mitra\/update","name":"admin.mitra.update","action":"App\Http\Controllers\Admin\MitraController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/hapus\/{id}","name":"admin.mitra.hapus","action":"App\Http\Controllers\Admin\MitraController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/kategori","name":"admin.Bisniskategori","action":"App\Http\Controllers\Admin\BisnisKategoriController@index"},{"host":null,"methods":["POST"],"uri":"admin\/mitra\/kategori\/json","name":"admin.Bisniskategori.json","action":"App\Http\Controllers\Admin\BisnisKategoriController@json"},{"host":null,"methods":["POST"],"uri":"admin\/mitra\/kategori\/simpan","name":"admin.Bisniskategori.simpan","action":"App\Http\Controllers\Admin\BisnisKategoriController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/kategori\/edit\/{id}","name":"admin.Bisniskategori.edit","action":"App\Http\Controllers\Admin\BisnisKategoriController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/mitra\/kategori\/update","name":"admin.Bisniskategori.update","action":"App\Http\Controllers\Admin\BisnisKategoriController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/mitra\/kategori\/hapus\/{id}","name":"admin.Bisniskategori.hapus","action":"App\Http\Controllers\Admin\BisnisKategoriController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/admin","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/media","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"media","name":null,"action":"Modules\Media\Http\Controllers\MediaController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/mitra","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra","name":"mitra.daftar","action":"Modules\Mitra\Http\Controllers\PendaftaranController@getRegister"},{"host":null,"methods":["POST"],"uri":"mitra\/daftar-1","name":"mitra.daftarStep1","action":"Modules\Mitra\Http\Controllers\PendaftaranController@step1"},{"host":null,"methods":["POST"],"uri":"mitra\/daftar-2","name":"mitra.daftarStep2","action":"Modules\Mitra\Http\Controllers\PendaftaranController@step2"},{"host":null,"methods":["POST"],"uri":"mitra\/daftar\/cek-username","name":"mitra.postCheckUsername","action":"Modules\Mitra\Http\Controllers\PendaftaranController@postCheckUsername"},{"host":null,"methods":["POST"],"uri":"mitra\/daftar\/cek-email","name":"mitra.postCheckEmail","action":"Modules\Mitra\Http\Controllers\PendaftaranController@postCheckEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/beranda","name":"mitra.beranda","action":"Modules\Mitra\Http\Controllers\Mitra\BerandaController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/getTotal","name":"mitra.beranda.getTotal","action":"Modules\Mitra\Http\Controllers\Mitra\BerandaController@getTotal"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/page","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"\/","name":null,"action":"Modules\Page\Http\Controllers\PageController@home"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/produk","name":null,"action":"Closure"},{"host":null,"methods":["GET","HEAD"],"uri":"produk","name":null,"action":"Modules\Produk\Http\Controllers\ProdukController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/stok-awal\/{id}","name":"admin.stok_awal","action":"Modules\Produk\Http\Controllers\Admin\StokAwalController@index"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/stok-awal-simpan","name":"admin.stok_awal.simpan","action":"Modules\Produk\Http\Controllers\Admin\StokAwalController@simpan"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/variasi\/tambah","name":"admin.variasi.tambah","action":"Modules\Produk\Http\Controllers\Admin\VariasiProdukController@tambah"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/variasi\/change-row","name":"admin.variasi.changeRow","action":"Modules\Produk\Http\Controllers\Admin\VariasiProdukController@changeRow"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/variasi\/json-modal","name":"admin.variasi.jsonModal","action":"Modules\Produk\Http\Controllers\Admin\VariasiProdukController@jsonModal"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/variasi\/json-find","name":"admin.variasi.jsonFind","action":"Modules\Produk\Http\Controllers\Admin\VariasiProdukController@jsonFind"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/variasi\/getForm","name":"admin.variasi.getForm","action":"Modules\Produk\Http\Controllers\Admin\VariasiProdukController@getForm"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/kategori","name":"admin.kategori","action":"Modules\Produk\Http\Controllers\Admin\KategoriController@index"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/kategori\/json","name":"admin.kategori.json","action":"Modules\Produk\Http\Controllers\Admin\KategoriController@json"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/kategori\/tree","name":"admin.kategori.tree","action":"Modules\Produk\Http\Controllers\Admin\KategoriController@tree"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/kategori\/simpan","name":"admin.kategori.simpan","action":"Modules\Produk\Http\Controllers\Admin\KategoriController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/kategori\/edit\/{id}","name":"admin.kategori.edit","action":"Modules\Produk\Http\Controllers\Admin\KategoriController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/kategori\/update","name":"admin.kategori.update","action":"Modules\Produk\Http\Controllers\Admin\KategoriController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/kategori\/hapus\/{id}","name":"admin.kategori.hapus","action":"Modules\Produk\Http\Controllers\Admin\KategoriController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/merk","name":"admin.merk","action":"Modules\Produk\Http\Controllers\Admin\MerkController@index"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/merk\/json","name":"admin.merk.json","action":"Modules\Produk\Http\Controllers\Admin\MerkController@json"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/merk\/simpan","name":"admin.merk.simpan","action":"Modules\Produk\Http\Controllers\Admin\MerkController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/merk\/edit\/{id}","name":"admin.merk.edit","action":"Modules\Produk\Http\Controllers\Admin\MerkController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/merk\/update","name":"admin.merk.update","action":"Modules\Produk\Http\Controllers\Admin\MerkController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/merk\/hapus\/{id}","name":"admin.merk.hapus","action":"Modules\Produk\Http\Controllers\Admin\MerkController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/satuan","name":"admin.satuan","action":"Modules\Produk\Http\Controllers\Admin\SatuanController@index"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/satuan\/json","name":"admin.satuan.json","action":"Modules\Produk\Http\Controllers\Admin\SatuanController@json"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/satuan\/simpan","name":"admin.satuan.simpan","action":"Modules\Produk\Http\Controllers\Admin\SatuanController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/satuan\/edit\/{id}","name":"admin.satuan.edit","action":"Modules\Produk\Http\Controllers\Admin\SatuanController@edit"},{"host":null,"methods":["POST"],"uri":"admin\/produk\/satuan\/update","name":"admin.satuan.update","action":"Modules\Produk\Http\Controllers\Admin\SatuanController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"admin\/produk\/satuan\/hapus\/{id}","name":"admin.satuan.hapus","action":"Modules\Produk\Http\Controllers\Admin\SatuanController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk","name":"mitra.produk","action":"Modules\Produk\Http\Controllers\Mitra\ProdukController@index"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk\/tambah","name":"mitra.produk.tambah","action":"Modules\Produk\Http\Controllers\Mitra\ProdukController@tambah"},{"host":null,"methods":["POST"],"uri":"mitra\/produk\/simpan","name":"mitra.produk.simpan","action":"Modules\Produk\Http\Controllers\Mitra\ProdukController@simpan"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk\/edit\/{id}","name":"mitra.produk.edit","action":"Modules\Produk\Http\Controllers\Mitra\ProdukController@edit"},{"host":null,"methods":["POST"],"uri":"mitra\/produk\/update","name":"mitra.produk.update","action":"Modules\Produk\Http\Controllers\Mitra\ProdukController@update"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk\/hapus\/{id}","name":"mitra.produk.hapus","action":"Modules\Produk\Http\Controllers\Mitra\ProdukController@hapus"},{"host":null,"methods":["GET","HEAD"],"uri":"mitra\/produk\/json","name":"mitra.produk.json","action":"Modules\Produk\Http\Controllers\Mitra\ProdukController@json"},{"host":null,"methods":["POST"],"uri":"mitra\/produk\/add_variasi","name":"mitra.variasi_update","action":"Modules\Produk\Http\Controllers\Mitra\VariasiController@add_variasi"},{"host":null,"methods":["POST"],"uri":"kategori\/sub_kategori_json","name":"kategori.sub_kategori_json","action":"Modules\Produk\Http\Controllers\KategoriController@sub_kategori_json"},{"host":null,"methods":["GET","HEAD"],"uri":"login","name":"login","action":"Modules\User\Http\Controllers\Auth\LoginController@showLoginForm"},{"host":null,"methods":["POST"],"uri":"login","name":"loginPost","action":"Modules\User\Http\Controllers\Auth\LoginController@login"},{"host":null,"methods":["POST"],"uri":"logout","name":"logout","action":"Modules\User\Http\Controllers\Auth\LoginController@logout"},{"host":null,"methods":["GET","HEAD"],"uri":"register","name":"register","action":"Modules\User\Http\Controllers\Auth\RegisterController@index"},{"host":null,"methods":["POST"],"uri":"registerPost","name":"registerPost","action":"Modules\User\Http\Controllers\Auth\RegisterController@proses"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset","name":"password.request","action":"Modules\User\Http\Controllers\Auth\ForgotPasswordController@showLinkRequestForm"},{"host":null,"methods":["POST"],"uri":"password\/email","name":"password.email","action":"Modules\User\Http\Controllers\Auth\ForgotPasswordController@sendResetLinkEmail"},{"host":null,"methods":["GET","HEAD"],"uri":"password\/reset\/{token}","name":"password.reset","action":"Modules\User\Http\Controllers\Auth\ResetPasswordController@showResetForm"},{"host":null,"methods":["POST"],"uri":"password\/reset","name":"password.update","action":"Modules\User\Http\Controllers\Auth\ResetPasswordController@reset"},{"host":null,"methods":["GET","HEAD"],"uri":"email\/verify","name":"verification.notice","action":"Modules\User\Http\Controllers\Auth\VerificationController@show"},{"host":null,"methods":["GET","HEAD"],"uri":"email\/verify\/{id}","name":"verification.verify","action":"Modules\User\Http\Controllers\Auth\VerificationController@verify"},{"host":null,"methods":["GET","HEAD"],"uri":"email\/resend","name":"verification.resend","action":"Modules\User\Http\Controllers\Auth\VerificationController@resend"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/profil","name":"user.profil","action":"Modules\User\Http\Controllers\UserController@profil"},{"host":null,"methods":["GET","HEAD"],"uri":"user\/ordering","name":"user.pesanan","action":"Modules\User\Http\Controllers\UserController@profil"},{"host":null,"methods":["GET","HEAD"],"uri":"api\/wilayah","name":null,"action":"Closure"},{"host":null,"methods":["POST"],"uri":"wilayah\/jsonSelect","name":"wilayah.jsonSelect","action":"Modules\Wilayah\Http\Controllers\WilayahController@jsonSelect"}],
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

