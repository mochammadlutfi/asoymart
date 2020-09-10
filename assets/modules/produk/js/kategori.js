jQuery(document).ready(function () {
    var croppie = null;
    var el = document.getElementById('resizer');
    var formData = new FormData();
    $.base64ImageToBlob = function(str) {
        // extract content type and base64 payload from original string
        var pos = str.indexOf(';base64,');
        var type = str.substring(5, pos);
        var b64 = str.substr(pos + 8);

        // decode base64
        var imageContent = atob(b64);

        // create an ArrayBuffer and a view (as unsigned 8-bit)
        var buffer = new ArrayBuffer(imageContent.length);
        var view = new Uint8Array(buffer);

        // fill the view, using the decoded base64
        for (var n = 0; n < imageContent.length; n++) {
          view[n] = imageContent.charCodeAt(n);
        }

        // convert ArrayBuffer to Blob
        var blob = new Blob([buffer], { type: type });

        return blob;
    }

    $.getImage = function(input, croppie) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                croppie.bind({
                    url: e.target.result,
                });
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#file-upload").on("change", function(event) {
        $("#cropModal").modal();
        croppie = new Croppie(el, {
                viewport: {
                    width: 350,
                    height: 350,
                    type: 'square'
                },
                original : {
                    width: 350,
                    height: 350,
                    type: 'square'
                },
                boundary: {
                    width: 360,
                    height: 360
                },
                enableOrientation: true
            });
        $.getImage(event.target, croppie);
    });

    $("#upload").on("click", function() {
        croppie.result({
            type: 'base64',
            size: 'original',
			format:'jpeg',
			size: { 
                width: 700, height: 700 
            }
        }).then(function(base64) {
                $("#cropModal").modal("hide");
                $("#img_preview").attr("src", base64);
            formData.append("icon", $.base64ImageToBlob(base64));
        });
    });

    $(".rotate").on("click", function() {
        croppie.rotate(parseInt($(this).data('deg')));
    });

    $('#cropModal').on('hidden.bs.modal', function (e) {
        setTimeout(function() { croppie.destroy(); }, 100);
    });

    $("#form-kategori").submit(function (e) {
        e.preventDefault();
        var poData = jQuery(document.forms['form-kategori']).serializeArray();
        for (var i=0; i<poData.length; i++)
        {
            formData.append(poData[i].name, poData[i].value);
        }
        if($('#metode').val() == 'update'){
            link = laroute.route('admin.kategori.update')
        }else{
            link = laroute.route('admin.kategori.simpan')
        }
        $.ajax({
            url: link,
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
                Swal.fire({
                    title: 'Tunggu Sebentar...',
                    text: ' ',
                    imageUrl: laroute.url('assets/img/loading.gif', ['']),
                    showConfirmButton: false,
                    allowOutsideClick: false,
                });
            },
            success: function (response) {
                if (response.fail == false) {
                    Swal.fire({
                        title: "Berhasil",
                        text: "Kategori Baru Berhasil Ditambahkan",
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'success'
                    });
                    window.setTimeout(function () {
                        location.reload();
                    }, 1500);
                } else {
                    Swal.close();
                    for (control in response.errors) {
                        $('#field-' + control).addClass('is-invalid');
                        $('#error-' + control).html(response.errors[control]);
                    }
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                Swal.close();
                alert('Error adding / update data');
            }
        });
    });

    $('#kategori-tree').jstree({
        'core' : {
            'data' : {
                "url" : laroute.route('admin.kategori.tree'),
                "dataType" : "json"
            }
        }
    });

    $('#kategori-tree').on("changed.jstree", function (e, data) {
        $(".add-sub-category").removeClass("disabled");
        kategori_id = data.instance.get_node(data.selected[0]).id;
        $('#field-parent_id').val(kategori_id);
        $.ajax({
            url : laroute.route('admin.kategori.edit', {id : kategori_id}),
            type: "GET",
            dataType: "JSON",
            success: function(response)
            {
                $("#hapus-kategori").removeClass("hide");
                $('#hapus-kategori').attr('data-id', response.id);
                $('[name="kategori_id"]').val(response.id);
                $('[name="nama"]').val(response.nama);
                $('#nama_kategori').val(response.nama);
                $("#img_preview").attr("src", laroute.url(response.icon, ['']));
                $('#metode').val('update');
                if(response.is_active)
                {
                    $( "#field-is_active" ).prop("checked", true);
                }
            },
            error: function (jqXHR, textStatus, errorThrown){
                alert('Error get data from ajax');
            }
        });
    });

    $(".add-sub-category").on("click", function() {
        $('#metode').val('tambah');
        parent_nama_kategori = $('#nama_kategori').val();
        $('#form-title').html('Tambah sub kategori ' + parent_nama_kategori);
        $('#field-nama').val('');
        $("#img_preview").attr("src", laroute.url('assets/img/placeholder/product.png', ['']));
    });

    $("#hapus-kategori").on("click", function() {

        kategori_id = $(this).data("id");
        Swal.fire({
            title: "Anda Yakin?",
            text: "Data Yang Dihapus Tidak Akan Bisa Dikembalikan",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Tidak, Batalkan!',
            reverseButtons: true,
            allowOutsideClick: false,
            confirmButtonColor: '#af1310',
            cancelButtonColor: '#fffff',
        })
        .then((result) => {
            if (result.value) {
            $.ajax({
                url: laroute.route('admin.kategori.hapus', { id: kategori_id }),
                type: "GET",
                dataType: "JSON",
                beforeSend: function(){
                    Swal.fire({
                        title: 'Tunggu Sebentar...',
                        text: ' ',
                        imageUrl: laroute.url('assets/img/loading.gif', ['']),
                        showConfirmButton: false,
                        allowOutsideClick: false,
                    });
                },
                success: function(data) {
                    Swal.fire({
                        title: "Berhasil",
                        text: 'Kategori Berhasil Dihapus!',
                        timer: 3000,
                        showConfirmButton: false,
                        icon: 'success'
                    });
                    window.setTimeout(function(){
                        location.reload();
                    } ,1500);
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error deleting data');
                }
            });
            } else {
                window.setTimeout(function(){
                    location.reload();
                } ,1500);
            }
        });
    });
});