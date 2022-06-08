$(document).ready(function(){
    $('#logOutPerusahaan').click(function(e){
        e.preventDefault(e);
        Swal.fire({
            title: 'Apakah anda yakin ingin Keluar?',
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
                    url: baseUrl+'perusahaan/login_perusahaan/logOut',
                    type: "GET",
                    success: function(data) {
                        window.location.href = baseUrl+'Home'
                    }

                });
            }
        });
    });

    $('#register-form-perusahaan').validate({
        rules: {
            nama_perusahaan: {
                required: true,
                remote: {
                    url: baseUrl+'perusahaan/Register_perusahaan/checkNama',
                    type: "post",
                    data: {
                        nama_perusahaan: function() {
                            return $( ".nama_perusahaan" ).val();
                        }
                    }
                }
            },
            email_login: {
                required: true,
                email: true,
                remote: {
                    url: baseUrl+'perusahaan/Register_perusahaan/checkEmail',
                    type: "post",
                    data: {
                        email_login: function() {
                            return $( ".email_login" ).val();
                        }
                    }
                }
            },
            no_telp: {
                required: true,
                number: true,
            },
            password: {
                required: true,
                minlength: 8
            },
            confirmPassword: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            }
        },
        messages: {
            nama_perusahaan: {
                required: "Nama tidak boleh kosong",
                remote: "Nama sudah terdaftar"
            },
            email_login: {
                required: "Email harus diisi",
                remote: "Email sudah digunakan",
                email: "Email tidak sesuai"
            },
            no_telp: {
                required: "No telepon harus diisi",
                number: "Masukan nomor yang valid"
            },
            password: {
                required: "Password harus diisi",
                minlength: "Password minimal 8 karakter"
            },
            confirmPassword: {
                required: "Password tidak boleh kosong",
                minlength: "Password minimal 8 karakter",
                equalTo: "Password tidak sama"

            }
        }
    });

    var formRegister = $( "#register-form-perusahaan" );
    $("#register-form-perusahaan").on('submit', function(e){
        if(formRegister.valid()){
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
                    $.ajax({
                        url: baseUrl+'perusahaan/register_perusahaan/auth',
                        type: "POST",
                        data: new FormData(this),
                        processData: false,
                        cache: false,
                        contentType: false,
                        success: function(data){
                            if(data == "true"){
                                Swal.fire(
                                    'Berhasil!',
                                    'Silahkan login untuk melanjutkan.',
                                    'success'
                                ).then((result) => {
                                    window.location.href = baseUrl+'perusahaan/login_perusahaan'
                                });
                                
                            }else{
                                Swal.fire(
                                    'Gagal Mendaftar', 
                                    '', 
                                    'error'
                                )
                            }
                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            Swal.fire(
                                'Gagal Mendaftar', 
                                '', 
                                'error'
                            )
                        }
                    })
                }else if (result.dismiss ) {
                    Swal.fire(
                        'Gagal Mendaftar', 
                        '', 
                        'error'
                    )
                }
            })
        }
    });
    
    $('#ganti-password').validate({
        rules: {
            passwordLama: {
                required: true,
                remote: {
                    url: baseUrl+'Profile/checkPassword/',
                    type: "post",
                    data: {
                        passwordLama: function() {
                            return $( "#passwordLama" ).val();
                        }
                    }
                }
            },
            passwordBaru: {
                required: true,
                minlength: 8
            },
            konfirmasiPassword: {
                required: true,
                minlength: 8,
                equalTo: "#passwordBaru"
            }
        },
        messages: {
            passwordLama: {
                required: "Password Lama harus diisi",
                remote: "Password lama salah",
            },
            passwordBaru: {
                required: "Password baru harus diisi",
                minlength: "Password minimal 8 karakter"
            },
            konfirmasiPassword: {
                required: "Password tidak boleh kosong",
                minlength: "Password minimal 8 karakter",
                equalTo: "Password tidak sama"

            }
        }
    });

    var gantiPassword = $( "#ganti-password" );
    $('#ganti-password').on('submit',function(e){
        e.preventDefault();
        if(gantiPassword.valid()){
            Swal.fire({
                title: 'Apakah anda yakin ingin mengganti password?',
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
                        type:"POST",
                        url: baseUrl + 'Profile/gantiPassword',
                        data:new FormData(this),
                        processData: false,
                        cache: false,
                        contentType: false,
                        success: function(data){
                            if(data == "true"){
                                Swal.fire(
                                    'Disimpan!',
                                    'Password berhasil diganti.',
                                    'success'
                                ).then((result) => {
                                    window.location.href = baseUrl+'Profile/lihat_profile/'+id
                                });
                                
                            }else{
                                Swal.fire(
                                    'Gagal mengganti password', 
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
                    });   
                }else if (result.dismiss ) {
                    Swal.fire(
                        'Data gagal disimpan', 
                        '', 
                        'error'
                    )
                }
            });  
        }
    });
});