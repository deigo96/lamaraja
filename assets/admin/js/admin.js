$(document).ready(function(){
    $('#log_out_admin').click(function(e){
        e.preventDefault(e);
        Swal.fire({
            title: 'Apakah anda yakin ingin keluar?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl+'admin/dashboard/logout',
                    type: "GET",
                    success: function(data) {
                        window.location.href = baseUrl+'admin/login_admin'
                    }

                });
            }else if (result.dismiss ) {
                Swal.fire(
                    'Gagal keluar', 
                    '', 
                    'error'
                )
            }
        });
    });

    $.validator.setDefaults({ ignore: ":hidden:not(.chosen-select)" })
    $('#form-jabatan').validate({
        rules: {
            nama: {
                required: true,
                remote: {
                    url: baseUrl+'admin/jabatan/checkJabatan',
                    type: "post",
                    data: {
                        nama: function() {
                            return $( "#namaJabatan" ).val();
                        }
                    }
                }
            },
            id_kategori: {
                required: true
            },
        },
        messages: {
            id_kategori: "Kategori tidak boleh kosong",
            nama: {
                required: "Nama jabatan tidak boleh kosong",
                remote: "Nama jabatan sudah ada"
            },
        }
    });
    $('#edit-form-jabatan').validate({
        rules: {
            nama: {
                required: true,
                remote: {
                    url: baseUrl+'admin/jabatan/checkEditJabatan',
                    type: "post",
                    data: {
                        nama: function() {
                            return $( "#edit_nama_jabatan" ).val();
                        },
                        id_kategori: function() {
                            return $( "#idKategori" ).val();
                        }
                    }
                }
            },
            id_kategori: {
                required: true
            },
        },
        messages: {
            id_kategori: "Kategori tidak boleh kosong",
            nama: {
                required: "Nama jabatan tidak boleh kosong",
                remote: "Nama jabatan sudah ada"
            },
        }
    });

    $('#form-tambah-kategori').validate({
        rules: {
            namaKategori: {
                required: true,
                remote: {
                    url: baseUrl+'admin/kategori/checkKategori',
                    type: "post",
                    data: {
                        namaKategori: function() {
                            return $( "#namaKategori" ).val();
                        }
                    }
                }
            },
        },
        messages: {
            namaKategori: {
                required: "Nama kategori tidak boleh kosong",
                remote: "Nama kategori sudah ada"
            },
        }
    });

    $('#edit-form-kategori').validate({
        rules: {
            nama: {
                required: true,
                remote: {
                    url: baseUrl+'admin/kategori/checkEditKategori',
                    type: "post",
                    data: {
                        nama: function() {
                            return $( "#edit_nama_kategori" ).val();
                        },
                    }
                }
            },
        },
        messages: {
            nama: {
                required: "Nama kategori tidak boleh kosong",
                remote: "Nama kategori sudah ada"
            },
        }
    });
});

var formJabatan = $( "#form-jabatan" );
$("#form-jabatan").on('submit', function(e){
    if(formJabatan.valid()){
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menyimpan data?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl+'admin/Jabatan/submit_jabatan',
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function(data){
                        if(data == "true"){
                            Swal.fire(
                                'Disimpan!',
                                'Data anda berhasil disimpan.',
                                'success'
                            ).then((result) => {
                                window.location.href = baseUrl+'admin/Jabatan/semua_jabatan/'
                            });
                            
                        }else{
                            Swal.fire(
                                'Data gagal disimpan', 
                                '', 
                                'error'
                            )
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        Swal.fire(
                            'Data gagal disimpan', 
                            '', 
                            'error'
                        )
                    }
                })
            }else if (result.dismiss ) {
                Swal.fire(
                    'Data gagal disimpan', 
                    '', 
                    'error'
                )
            }
        })
    };
});

var editJabatan = $( "#edit-form-jabatan" );
$("#edit-form-jabatan").on('submit', function(e){
    if(editJabatan.valid()){
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menyimpan data?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl+'admin/Jabatan/updateJabatan/'+id,
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function(data){
                        if(data == "true"){
                            Swal.fire(
                                'Disimpan!',
                                'Data anda berhasil diupdate.',
                                'success'
                            ).then((result) => {
                                window.location.href = baseUrl+'admin/Jabatan/semua_jabatan/'
                            });
                            
                        }else{
                            Swal.fire(
                                'Data gagal disimpan', 
                                '', 
                                'error'
                            )
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        Swal.fire(
                            'Data gagal disimpan', 
                            '', 
                            'error'
                        )
                    }
                })
            }else if (result.dismiss ) {
                Swal.fire(
                    'Data gagal disimpan', 
                    '', 
                    'error'
                )
            }
        })
    };
});

function hapusJabatan(id){
    Swal.fire({
        title: 'Apakah anda yakin ingin menyimpan data?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseUrl+'admin/Jabatan/hapus_jabatan/'+id,
                type: "POST",
                processData: false,
                cache: false,
                contentType: false,
                success: function(data){
                    if(data == "true"){
                        Swal.fire(
                            'Disimpan!',
                            'Data anda berhasil dihapus.',
                            'success'
                        ).then((result) => {
                            window.location.href = baseUrl+'admin/Jabatan/semua_jabatan/'
                        });
                        
                    }else{
                        Swal.fire(
                            'Data gagal dihapus', 
                            '', 
                            'error'
                        )
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    Swal.fire(
                        'Data gagal dihapus', 
                        '', 
                        'error'
                    )
                }
            })
        }else if (result.dismiss ) {
            Swal.fire(
                'Data batal dihapus', 
                '', 
                'error'
            )
        }
    })

    
}

var formKategori = $( "#form-tambah-kategori" );
$("#form-tambah-kategori").on('submit', function(e){
    if(formKategori.valid()){
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menyimpan data?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl+'admin/kategori/submit_kategori',
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function(data){
                        if(data == "true"){
                            Swal.fire(
                                'Disimpan!',
                                'Data anda berhasil disimpan.',
                                'success'
                            ).then((result) => {
                                window.location.href = baseUrl+'admin/kategori/semua_kategori/'
                            });
                            
                        }else{
                            Swal.fire(
                                'Data gagal disimpan', 
                                '', 
                                'error'
                            )
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        Swal.fire(
                            'Data gagal disimpan', 
                            '', 
                            'error'
                        )
                    }
                })
                // console.log("berhasil");
            }else if (result.dismiss ) {
                Swal.fire(
                    'Data gagal disimpan', 
                    '', 
                    'error'
                )
            }
        })
    };
});

var editkategori = $( "#edit-form-kategori" );
$("#edit-form-kategori").on('submit', function(e){
    if(editkategori.valid()){
        e.preventDefault();
        Swal.fire({
            title: 'Apakah anda yakin ingin menyimpan data?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Tidak!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: baseUrl+'admin/kategori/updateKategori/'+id,
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function(data){
                        if(data == "true"){
                            Swal.fire(
                                'Disimpan!',
                                'Data anda berhasil diupdate.',
                                'success'
                            ).then((result) => {
                                window.location.href = baseUrl+'admin/kategori/semua_kategori/'
                            });
                            
                        }else{
                            Swal.fire(
                                'Data gagal disimpan', 
                                '', 
                                'error'
                            )
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        Swal.fire(
                            'Data gagal disimpan', 
                            '', 
                            'error'
                        )
                    }
                })
                // console.log("berhasil");
            }else if (result.dismiss ) {
                Swal.fire(
                    'Data gagal disimpan', 
                    '', 
                    'error'
                )
            }
        })
    };
});

function hapusKategori(id){
    Swal.fire({
        title: 'Apakah anda yakin ingin menyimpan data?',
        text: "",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: baseUrl+'admin/kategori/hapus_kategori/'+id,
                type: "POST",
                processData: false,
                cache: false,
                contentType: false,
                success: function(data){
                    if(data == "true"){
                        Swal.fire(
                            'Disimpan!',
                            'Data anda berhasil dihapus.',
                            'success'
                        ).then((result) => {
                            window.location.href = baseUrl+'admin/kategori/semua_kategori/'
                        });
                        
                    }else{
                        Swal.fire(
                            'Data gagal dihapus', 
                            '', 
                            'error'
                        )
                    }
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    Swal.fire(
                        'Data gagal dihapus', 
                        '', 
                        'error'
                    )
                }
            })
        }else if (result.dismiss ) {
            Swal.fire(
                'Data batal dihapus', 
                '', 
                'error'
            )
        }
    })

    
}