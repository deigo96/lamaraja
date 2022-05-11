$(document).ready(function(){
    $('#logOut').click(function(){
        bootbox.confirm({
            message: "Apakah anda yakin ingin keluar?",
            buttons: {
                cancel: {
                    label: '<i class="icon icon-times"></i> Tidak'
                },
                confirm: {
                    label: '<i class="icon icon-check"></i> Ya'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        url: baseUrl+'login/logout',
                        type: "GET",
                        success: function(data) {
                            window.location.href = baseUrl+'home'
                        },

                    })
                }
            }
        });
    });
});

$("#updateProfileForm").on('submit', function(e){
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
                url: baseUrl+'profile/update_profile/'+id,
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
                            window.location.href = baseUrl+'Profile/lihat_profile/'+id
                        });
                        
                    }else if(data == "error"){
                        Swal.fire(
                            'Data gagal disimpan', 
                            'Format foto tidak sesuai', 
                            'error'
                        )
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
});