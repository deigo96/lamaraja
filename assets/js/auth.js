$(document).ready(function(){
    // $('#login-form').validate({
    //     rules: {
    //         email: {
    //             required: true,
    //             email: true
    //         },
    //         password: {
    //             required: true,
    //         }
    //     },
    //     messages: {
    //         email: {
    //             required: "Email harus diisi",
    //             email: "Email tidak sesuai"
    //         },
    //         password: "Masukan password"
    //     }
    // });

    // var formLogin = $('#login-form');
    // $('#login-form').on('submit',function(e){
    //     e.preventDefault;
    //     if(formLogin.valid()){
    //         var dataLogin = $('#login-form').serialize();
    //         $.ajax({
    //             type: "POST",
    //             url: baseUrl + "Login/auth",
    //             data: dataLogin,
    //             success: function(data){
    //                 if(data == "true"){
    //                     window.location.href = baseUrl+'home'
    //                 }
    //             }
    //         });
    //     }
    // });

    $('#register-form').validate({
        rules: {
            nama: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: baseUrl+'Register/checkEmail',
                    type: "post",
                    data: {
                        email: function() {
                            return $( ".email" ).val();
                        }
                    }
                }
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
            nama: "Nama tidak boleh kosong",
            email: {
                required: "Email harus diisi",
                remote: "Email sudah digunakan",
                email: "Email tidak sesuai"
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

    var formRegister = $( "#register-form" );
    $('#buttonRegister').click(function(){
        if(formRegister.valid()){
            var dataString = $("#register-form").serialize();
            bootbox.confirm("Pastikan data yang anda isi benar", function(result) {
                if(result){
                    $.ajax({
                        type:"POST",
                        url: baseUrl + 'Register/auth',
                        data:dataString,
                        success:function (data) {
                            if(data == "true"){
                                bootbox.alert({
                                    title: "Berhasil Daftar",
                                    size: "small",
                                    className: "text-center",
                                    message: "Silahkan login",
                                    callback: function () {
                                        window.location.href = baseUrl+'login';
                                    }
                                })
                            }else{
                                bootbox.alert({
                                    title: "Gagal Daftar",
                                    size: "small",
                                    className: "text-center",
                                    message: "Silahkan login",
                                    callback: function () {
                                        window.location.href = baseUrl+'Register';
                                    }
                                })
                            }
                        }
                    });   
                }
            });  
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