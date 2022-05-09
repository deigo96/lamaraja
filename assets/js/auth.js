$(document).ready(function(){
    $('#login-form').validate({
        rules: {
            name: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
            }
        },
        messages: {
            email: "Email tidak sesuai",
            password: "Masukan password"
        }
    });

    $('#register-form').validate({
        rules: {
            nama: {
                required: true
            },
            email: {
                required: true,
                email: true
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
            email: "Email tidak sesuai",
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

});
var formRegister = $( "#register-form" );
$('#button').click(function(){
    if(formRegister.valid()){
        var dataString = $("#register-form").serialize();
        $.ajax({
            type:"POST",
            url: baseUrl + 'Register/auth',
            data:dataString,
            success:function (data) {
                alert(data)
                console.log(data);
            }
        });     
    }
});