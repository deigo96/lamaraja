$(document).ready(function(){
    $('#jabatan').attr('disabled',true).trigger('chosen:updated');
    $('#kabupaten').attr('disabled',true).trigger('chosen:updated');
    if($('#kabupatenPerusahaan').val() == ""){
        $('#kabupatenPerusahaan').attr('disabled',true).trigger('chosen:updated');
    }
    if($('#kecamatanPerusahaan').val() == ""){
        $('#kecamatanPerusahaan').attr('disabled',true).trigger('chosen:updated');
    }

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

    $('#provinsiPerusahaan').change(function(){
        $('#kecamatanPerusahaan').attr('disabled',true).trigger('chosen:updated');
        var idProvinsi = $(this).val()
        if(idProvinsi != ""){
            $('#kabupatenPerusahaan').attr('disabled',false).trigger('chosen:updated');
            $.ajax({
                url: baseUrl+'perusahaan/Profile_perusahaan/get_kabupaten/'+idProvinsi,
                type: "POST",
                success: function(data){
                    console.log(data);
                    if(data != "[]"){
                        var obj = jQuery.parseJSON(data);
                        var appendOption = $();
                        var appendFirst = "<option value=''>Pilih Kabupaten/Kota</option>"
                        for(i=0; i<obj.length; i++){
                            appendOption = appendOption.add('<option value="'+obj[i].id+'">'+obj[i].name+'</option>');
                        }
                        $('#kabupatenPerusahaan')
                            .find('option')
                            .remove()
                            .end()
                            .append(appendFirst,appendOption).trigger('chosen:updated')
                        $('#kecamatanPerusahaan')
                        .find('option')
                        .remove()
                        .end().trigger('chosen:updated')
                    }else{
                        $('#kabupatenPerusahaan')
                            .find('option')
                            .remove()
                            .end()
                            .append(
                                '<option value="" disabled>Kabupaten tidak ditemukan</option>'
                            )
                            .val('')
                            .trigger('chosen:updated')
                    }
                }

            })
        }else{
            $('#kabupatenPerusahaan').attr('disabled',true).trigger('chosen:updated');
            $('#kecamatanPerusahaan').attr('disabled',true).trigger('chosen:updated');
            $('#kabupatenPerusahaan')
                .find('option')
                .remove()
                .end()
                .val("")
                .trigger('chosen:updated');
            $('#kecamatanPerusahaan')
            .find('option')
            .remove()
            .end()
            .val("")
            .trigger('chosen:updated');
        }
    });

    $('#kabupatenPerusahaan').change(function(){
        var idKabupaten = $(this).val();
        if (idKabupaten != ""){
            $('#kecamatanPerusahaan').attr('disabled',false).trigger('chosen:updated');
            $.ajax({
                url: baseUrl+'perusahaan/Profile_perusahaan/get_kecamatan/'+idKabupaten,
                type: "POST",
                success: function(data){
                    console.log(data);
                    if(data != "[]"){
                        var obj = jQuery.parseJSON(data);
                        var appendOption = $();
                        var appendFirst = "<option value=''>Pilih Kecamatan</option>"
                        for(i=0; i<obj.length; i++){
                            appendOption = appendOption.add('<option value="'+obj[i].id+'">'+obj[i].name+'</option>');
                        }
                        $('#kecamatanPerusahaan')
                            .find('option')
                            .remove()
                            .end()
                            .append(appendFirst,appendOption).trigger('chosen:updated')
                    }else{
                        $('#kecamatanPerusahaan')
                            .find('option')
                            .remove()
                            .end()
                            .append(
                                '<option value="" disabled>Kecamatan tidak ditemukan</option>'
                            )
                            .val('')
                            .trigger('chosen:updated')
                    }
                }

            })
        }else{
            $('#kecamatanPerusahaan').attr('disabled',true).trigger('chosen:updated');
            $('#kecamatanPerusahaan')
                .find('option')
                .remove()
                .end()
                .val("")
                .trigger('chosen:updated');
        }
    });

    $(function() {
        $.ajax({
            url:baseUrl+"perusahaan/profile_perusahaan/notifikasiPerusahaan",
            method:"POST",
            // data:{view:view},
            dataType:"json",
            success:function(data){
                if(data.notif > 0) {
                    $('span.notif-perusahaan').addClass("badge badge-danger navbar-badge").append(data.notif);
                }
            }
        })
    })

    $('.resetNotifPerusahaan').on('click', function(){
        $.ajax({
            url:baseUrl+"perusahaan/profile_perusahaan/removeNotifikasiPerusahaan",
            method:"POST",
            data:{status:'0'},
            dataType:"json",
            success:function(data){
            }
        })
    })

    $(function(){
        var status  = $('#status-perusahaan').val();
        if(status == '0'){
            Swal.fire({
                title: 'Profile',
                text: "Profile anda belum lengkap, Mohon lengkapi profile!",
                icon: 'error',
                allowOutsideClick: false,
                allowEscapeKey: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Profile',
            }).then(result => {
                if(result.isConfirmed){
                    window.location.href = baseUrl+'perusahaan/profile_perusahaan/index/'+namaPerusahaanLowongan
                }
            })
        }
    })
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

$('#updateProfilePerusahaan').on('submit', function(e){
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
                url: baseUrl+'perusahaan/Profile_perusahaan/update_profile_perusahaan',
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
                'Gagal Mengupdate Profile', 
                '', 
                'error'
            )
        }
    })
});

$('#terimaPelamar').click(function(){
    swal.fire({
        title: 'Apakah anda yakin menerima lamaran ini?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak!'
    }).then(result => {
        if(result.isConfirmed){
            $.ajax({
                url: baseUrl+'perusahaan/kandidat/proses_lamaran/' + idLowongan,
                type: "POST",
                data: {
                    proses: '0', 
                    idLowongan: idLowongan,
                },
                success: function(data){
                    if(data == "true"){
                        Swal.fire(
                            'Berhasil!',
                            'Pelamar telah diterima ketahap selanjutnya.',
                            'success'
                        ).then((result) => {
                            $.ajax({
                                url: baseUrl+'perusahaan/kandidat/sendMail',
                                type: "POST",
                                data: {
                                    nama: namaPerusahaan, 
                                    email: emailPelamar,
                                    subject: 'Lamaran Anda Telah Berhasil Diterima',
                                    pesan: 'Hi '+namaPelamar+'<p>Kami telah meninjau lamaran anda sebagai '
                                                +namaJabatan+' '
                                                +tipePekerjaan+' di '
                                                +namaPerusahaan+' dan kami ingin melanjutkan lamaran anda ke tahap selanjutnya yaitu interview. Proses interview akan kami infokan lebih lanjut.</p><p>Terima kasih</p>',
                                },
                                success: function(data){
                                    if(data == "true") {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        })
                                          
                                        Toast.fire({
                                            icon: 'success',
                                            title: 'Email telah berhasil dikirim'
                                        })
                                    } else {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        })
                                          
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'Gagal mengirim email'
                                        })
                                    }
                                }
                            })
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
                        'Gagal', 
                        'Ada Kesalahan', 
                        'error'
                    )
                }
            })
        }else if (result.dismiss ) {
            Swal.fire(
                'Batal memproses lowongan', 
                '', 
                'error'
            )
        }
    })
});

$('#tolakPelamar').click(function(){
    swal.fire({
        title: 'Apakah anda yakin menolak lamaran ini?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak!'
    }).then(result => {
        if(result.isConfirmed){
            $.ajax({
                url: baseUrl+'perusahaan/kandidat/proses_lamaran/' + idLowongan,
                type: "POST",
                data: {proses: '0', idLowongan: idLowongan},
                success: function(data){
                    if(data == "true"){
                        Swal.fire(
                            'Berhasil!',
                            'Pelamar telah ditolak.',
                            'success'
                        ).then((result) => {
                            $.ajax({
                                url: baseUrl+'perusahaan/kandidat/sendMail',
                                type: "POST",
                                data: {
                                    nama: namaPerusahaan, 
                                    email: emailPelamar,
                                    subject: 'Lamaran Anda Telah Berhasil Diterima',
                                    pesan: 'Hi '+namaPelamar+'<p>Kami telah meninjau lamaran anda sebagai '
                                                +namaJabatan+' '
                                                +tipePekerjaan+' di '
                                                +namaPerusahaan+' dan kami ingin menginfokan bahwa lamaran anda tidak akan dilanjutkan.</p><p>Terima kasih karena ingin menjadi bagian dari perusahaan kami</p>',
                                },
                                success: function(data){
                                    if(data == "true") {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        })
                                          
                                        Toast.fire({
                                            icon: 'success',
                                            title: 'Email telah berhasil dikirim'
                                        })
                                    } else {
                                        const Toast = Swal.mixin({
                                            toast: true,
                                            position: 'top-end',
                                            showConfirmButton: false,
                                            timer: 3000,
                                            timerProgressBar: true,
                                            didOpen: (toast) => {
                                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                                            }
                                        })
                                          
                                        Toast.fire({
                                            icon: 'error',
                                            title: 'Gagal mengirim email'
                                        })
                                    }
                                }
                            })
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
                        'Gagal', 
                        'Ada Kesalahan', 
                        'error'
                    )
                }
            })
        }else if (result.dismiss ) {
            Swal.fire(
                'Batal menolak pelamar', 
                '', 
                'error'
            )
        }
    })
});

function deleteLowongan(id){
    swal.fire({
        title: 'Peringatan',
        text: "Apakah anda yakin ingin menghapus lowongan ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak!'
    }).then(result =>{
        if(result.isConfirmed){
            $.ajax({
                url: baseUrl+'perusahaan/profile_perusahaan/hapus_lowongan/' + id,
                type: "POST",
                data: {idLowongan: id},
                success: function(data){
                    if(data == "true"){
                        Swal.fire(
                            'Berhasil!',
                            'Lowongan Berhasil Dihapus',
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                        
                    }else{
                        Swal.fire(
                            'Gagal Menghapus Lowongan', 
                            '', 
                            'error'
                        )
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    Swal.fire(
                        'Gagal Menghapus Lowongan', 
                        '', 
                        'error'
                    )
                }
            })
        }else if (result.dismiss ) {
            Swal.fire(
                'Batal Menghapus Lowongan', 
                '', 
                'error'
            )
        }
    })
}