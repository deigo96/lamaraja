$(document).ready(function(){
    $('#jabatan').attr('disabled',true).trigger('chosen:updated');
    $('#kabupaten').attr('disabled',true).trigger('chosen:updated');

    //pilih kategori
    $('#kategori').change(function(){
        var idKategori = $(this).val()
        if(idKategori != ""){
            $('#jabatan').attr('disabled',false).trigger('chosen:updated');
            $.ajax({
                url: baseUrl+'perusahaan/tambah_lowongan/get_jabatan/'+idKategori,
                type: "POST",
                success: function(data){
                    if(data != "[]"){
                        var obj = jQuery.parseJSON(data);
                        var appendOption = $();
                        for(i=0; i<obj.length; i++){
                            appendOption = appendOption.add('<option value="'+obj[i].id_jabatan+'">'+obj[i].nama+'</option>');
                        }
                        $('#jabatan')
                            .find('option')
                            .remove()
                            .end()
                            .append(appendOption).trigger('chosen:updated')
                    }else{
                        $('#jabatan')
                            .find('option')
                            .remove()
                            .end()
                            .append(
                                '<option value="" disabled>Jabatan tidak ditemukan</option>'
                            )
                            .val('')
                            .trigger('chosen:updated')
                    }
                }

            })
        }else{
            $('#jabatan').attr('disabled',true).trigger('chosen:updated');
            $('#jabatan')
                .find('option')
                .remove()
                .end()
                .val("")
                .trigger('chosen:updated');
        }
    });

    //pilih Provinsi
    $('#provinsi').change(function(){
        var idProvinsi = $(this).val()
        if(idProvinsi != ""){
            $('#kabupaten').attr('disabled',false).trigger('chosen:updated');
            $.ajax({
                url: baseUrl+'perusahaan/tambah_lowongan/get_kabupaten/'+idProvinsi,
                type: "POST",
                success: function(data){
                    if(data != "[]"){
                        var obj = jQuery.parseJSON(data);
                        var appendOption = $();
                        for(i=0; i<obj.length; i++){
                            appendOption = appendOption.add('<option value="'+obj[i].id+'">'+obj[i].name+'</option>');
                        }
                        $('#kabupaten')
                            .find('option')
                            .remove()
                            .end()
                            .append(appendOption).trigger('chosen:updated')
                    }else{
                        $('#kabupaten')
                            .find('option')
                            .remove()
                            .end()
                            .append(
                                '<option value="" disabled>Jabatan tidak ditemukan</option>'
                            )
                            .val('')
                            .trigger('chosen:updated')
                    }
                }

            })
        }else{
            $('#kabupaten').attr('disabled',true).trigger('chosen:updated');
            $('#kabupaten')
                .find('option')
                .remove()
                .end()
                .val("")
                .trigger('chosen:updated');
        }
    });
});

$("#addRowKualifikasi").click(function () {
    var html = '';
    html += '<div id="inputFormRow">';
    html += '<div class="input-group mb-3">';
    html += '<input type="text" name="kualifikasi[]" class="form-control m-input" placeholder="Tambah kualifikasi pekerjaan" autocomplete="off">';
    html += '<div class="input-group-append">';
    html += '<button id="removeRowKualifikasi" type="button" class="btn btn-danger" style="line-height:0.5 !important">Hapus</button>';
    html += '</div>';
    html += '</div>';

    $('#newRow').append(html);
});

$(document).on('click', '#removeRowKualifikasi', function () {
    $(this).closest('#inputFormRow').remove();
});

$("#addRowDeskripsi").click(function () {
    var html = '';
    html += '<div id="inputFormRowDeskripsi">';
    html += '<div class="input-group mb-3">';
    html += '<input type="text" name="deskripsi[]" class="form-control m-input" placeholder="Tambah deskripsi pekerjaan" autocomplete="off">';
    html += '<div class="input-group-append">';
    html += '<button id="removeRowDeskripsi" type="button" class="btn btn-danger" style="line-height:0.5 !important">Hapus</button>';
    html += '</div>';
    html += '</div>';

    $('#newRowDeskripsi').append(html);
});

$(document).on('click', '#removeRowDeskripsi', function () {
    $(this).closest('#inputFormRowDeskripsi').remove();
});

$("#tambahLowongan").on('submit', function(e){
    e.preventDefault();
    Swal.fire({
        title: 'Apakah anda yakin data sudah benar?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            var dataform = new FormData(this)
            $.ajax({
                url: baseUrl+'perusahaan/tambah_lowongan/post',
                type: "POST",
                data: new FormData(this),
                processData: false,
                cache: false,
                contentType: false,
                success: function(data){
                    if(data == "true"){
                        Swal.fire(
                            'Berhasil!',
                            'Lowongan berhasil ditambah.',
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                        
                    }else{
                        Swal.fire(
                            'Gagal Menambah Lowongan', 
                            '', 
                            'error'
                        )
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    Swal.fire(
                        'Gagal Menambah Lowongan', 
                        '', 
                        'error'
                    )
                }
            })
        }else if (result.dismiss ) {
            Swal.fire(
                'Gagal Menambah Lowongan', 
                '', 
                'error'
            )
        }
    })
});