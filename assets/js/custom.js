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

$('#apply-btn').click(function(){
    Swal.fire({
        title: 'Apakah anda yakin ingin melamar?',
        text: "Pastikan profil anda terbaru",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya!',
        cancelButtonText: 'Tidak!'
    }).then((result) => {
        if(result.isConfirmed){
            $.ajax({
                url: baseUrl+'lowongan/applyJob/'+idLowongan,
                type: "POST",
                success: function(data){
                    if(data == "true"){
                        Swal.fire(
                            'Berhasil!',
                            'Lamaran anda terkirim!',
                            'success'
                        ).then((result) => {
                            location.reload();
                        });
                    }else if(data == "failed"){
                        Swal.fire(
                            'Gagal!',
                            'Silahkan login untuk melamar',
                            'error'
                        ).then((result) => {
                            window.location.href = baseUrl+'Login';
                        });
                    }
                }
            })
        }
    });
})

if($('.email-terkirim')[0]){
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
        title: 'Email terkirim'
    })
}

// $('.pencarian-lowongan').on('submit', function(e){
//     e.preventDefault()
//     var dataform = new FormData(this);
//     $.ajax({
//         url: baseUrl+'lowongan/search',
//         type: "POST",
//         data: new FormData(this),
//         processData: false,
//         cache: false,
//         contentType: false,
//         success: function(data){
//         },
//         error: function (xhr, ajaxOptions, thrownError) {
            
//         }
//     })
// });

$(function(){
    $.ajax({
        url: baseUrl+'home/autocompleteLokasi',
        datatype: "JSON",
        type: "GET",
        success: function(result){
            var data = JSON.parse(result);
            $('#auto-complete-lokasi').autocomplete({
                source: data,                
            });
            
        }
    })

    $.ajax({
        url: baseUrl+'home/autocompleteKategori',
        datatype: "JSON",
        type: "GET",
        success: function(result){
            var data = JSON.parse(result);
            $('#auto-complete-kategori').autocomplete({
                source: data,                
            });
            
        }
    })

    var tipe = [
        "Full Time",
        "Part Time",
        "Internship",
        "Freelance"
    ];
    $('#auto-complete-tipe').autocomplete({
        source: tipe,  
        minLength: 0,
        minChars: 0,
        max: 12,
        autoFill: true,
        mustMatch: true,
        matchContains: false,
        scrollHeight: 220,              
    }).on('focus', function(event) {
        var self = this;
        $(self).autocomplete( "search", "");;
    });
});
