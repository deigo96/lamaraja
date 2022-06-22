<style>
     .form-control{
        height: 35px !important;
        font-size: 14px !important;
        color: #5d5454 !important;
    }
    .mailbox-name a:hover {
        color: #aa8d8d;
    }
</style>
<div class="hero-wrap hero-wrap-3" style="background-image: url('<?php echo base_url('assets/images/bg_1.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile</span></p>
                <h1 class="mb-3 bread">Buat Profile Terbaikmu</h1>
            </div>
        </div>
    </div>
</div>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline" style="box-shadow: 0 0 1px rgb(0 0 0 / 13%), 0 1px 3px rgb(0 0 0 / 20%);margin-bottom: 1rem;">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" 
                                    src="<?php echo !empty($getProfile->foto_perusahaan) ? base_url('assets/upload/perusahaan/').$getProfile->foto_perusahaan : base_url('assets/images/profile_users/user.png') ?>" 
                                    alt="Foto profile user">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $getData->nama_perusahaan ?></h3>
                            <!-- <p class="text-muted text-center">Software Engineer</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul> -->
                            <a href="<?php echo base_url('perusahaan/tambah_lowongan') ?>" class="btn btn-primary btn-block"><b>Tambah Lowongan</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Profile</a></li>
                                <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">
                                    <div class="content-wrapper">

                                        <!-- Main content -->
                                        <section class="content">
                                            <div class="row">
                                                <!-- /.col -->
                                                <div class="col-md-12">
                                                    <div class="card card-primary card-outline">
                                                        <div class="card-header">
                                                            <div class="card-tools">
                                                                <div class="input-group input-group-sm">
                                                                    <input type="text" class="form-control" placeholder="Search Mail">
                                                                    <div class="input-group-append">
                                                                        <button type="submit" class="form-control btn btn-primary">Search</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- /.card-tools -->
                                                        </div>
                                                        <!-- /.card-header -->
                                                        <div class="card-body p-0">
                                                            <!-- <div class="mailbox-controls">
                                                                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i>
                                                                </button>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-default btn-sm">
                                                                        <i class="far fa-trash-alt"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-default btn-sm">
                                                                        <i class="fas fa-reply"></i>
                                                                    </button>
                                                                    <button type="button" class="btn btn-default btn-sm">
                                                                        <i class="fas fa-share"></i>
                                                                    </button>
                                                                </div>
                                                                <button type="button" class="btn btn-default btn-sm">
                                                                <i class="fas fa-sync-alt"></i>
                                                                </button>
                                                                <div class="float-right">
                                                                    1-50/200
                                                                    <div class="btn-group">
                                                                        <button type="button" class="btn btn-default btn-sm">
                                                                        <i class="fas fa-chevron-left"></i>
                                                                        </button>
                                                                        <button type="button" class="btn btn-default btn-sm">
                                                                        <i class="fas fa-chevron-right"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                            <div class="table-responsive mailbox-messages">
                                                                <table class="table table-hover table-striped" id="table-notif">
                                                                    <tbody>
                                                                        <?php if(count($getKandidat) > 0){ ?>
                                                                            <?php foreach($getKandidat as $kandidat) { $style = "background-color: #fff !important" ?>
                                                                                <?php $deskirpsi = str_replace("#", ', ',$kandidat->deskripsi) ?>
                                                                                <?php if($kandidat->status_notifikasi == 0) {
                                                                                    $style = "background-color: lavender !important";
                                                                                } ?>
                                                                                <tr style="<?php echo $style ?>">
                                                                                    <td class="mailbox-name"><a href="<?php echo base_url('perusahaan/kandidat/profil_pelamar/').$kandidat->id_proses_lowongan ?>"><?php echo $kandidat->nama_pelamar ?></a></td>
                                                                                    <td class="mailbox-subject"><b><?php echo $kandidat->nama_jabatan ?></b> - <?php echo max_karakter($deskirpsi, 30) ?></td>
                                                                                    <td class="mailbox-date"><?php echo time_elapsed_string($kandidat->tanggal) ?></td>
                                                                                    <td class="mailbox-status">
                                                                                        <?php   if($kandidat->status_kandidat != 0) { ?>
                                                                                            <button disabled>Sudah di proses</button>
                                                                                        <?php }else{ ?>
                                                                                            <a href="<?php echo base_url('perusahaan/kandidat/profil_pelamar/').$kandidat->id_proses_lowongan ?>" class="btn btn-primary text-center"> Review </a>
                                                                                        <?php } ?>
                                                                                    </td>
                                                                                </tr>
                                                                        <?php }} ?>
                                                                    </tbody>
                                                                </table>
                                                                <!-- /.table -->
                                                            </div>
                                                            <!-- /.mail-box-messages -->
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="card-footer p-0">

                                                        </div>
                                                    </div>
                                                <!-- /.card -->
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                        </section>
                                        <!-- /.content -->
                                    </div>
                                <!-- /.content-wrapper -->
                                </div>
                                <div class="tab-pane" id="timeline">
                                    <div class="timeline timeline-inverse" style="color: white">
                                        <?php foreach ($getLowongan as $lowongan) { ?>
                                            <div class="time-label">
                                                <span class="bg-success">
                                                    <?php echo date('d M, Y', strtotime($lowongan->tanggal_post)) ?>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> <?php echo date('H:i', strtotime($lowongan->tanggal_post)) ?></span>
                                                    <h3 class="timeline-header">
                                                        <?php 
                                                            if($lowongan->tanggal_update == 0)
                                                                echo "Anda memposting lowongan";
                                                            else
                                                                echo "Anda menghapus lowongan"
                                                        ?>
                                                    </h3>
                                                    <div class="timeline-body bold">
                                                        <b><?php echo $lowongan->nama_jabatan ?></b>
                                                    </div>
                                                    <div class="timeline-footer">
                                                        <a href="#" class="btn btn-warning btn-sm">Read more</a>
                                                        <?php if($lowongan->tanggal_update == 0) { ?>
                                                            <button type="button" href="" onclick="deleteLowongan('<?php echo $lowongan->id_lowongan ?>')" class="btn btn-danger btn-sm">Delete</button>
                                                        <?php } ?>
                                                    </div>
                                                </div>  
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings">
                                    <form action="#" class="form-horizontal" id="updateProfilePerusahaan" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama_perusahaan" class="form-control" id="namaPerusahaan" placeholder="Nama Perusahaan" value="<?php echo !empty($getProfile) ? $getProfile->nama_perusahaan : $getData->nama_perusahaan ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email_perusahaan" class="form-control" id="inputEmail" placeholder="Email Perusahaan" value="<?php echo !empty($getProfile) ? $getProfile->email_perusahaan : '' ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Telepon Perusahaan</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" name="telepon_perusahaan" id="inputTelepon" placeholder="Telepon Perusahaan"  value="<?php echo !empty($getProfile) ? $getProfile->telepon_perusahaan : '' ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputAgama" class="col-sm-2 col-form-label">Provinsi</label>
                                            <div class="col-sm-10">
                                                <select name="provinsiPerusahaan" id="provinsiPerusahaan" class="form-control chosen-select" data-placeholder="Pilih Provinsi">
                                                    <option value="">Pilih Provinsi</option>
                                                    <?php 
                                                        foreach($getProvinsi as $provinsi){
                                                            $selected = "";
                                                            if(!empty($getProfile)){
                                                                if($getProfile->id_provinsi == $provinsi->id){
                                                                    $selected = "selected";
                                                                }
                                                            }
                                                            echo "<option value='$provinsi->id' $selected>".$provinsi->name."</option>";
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputKabupaten" class="col-sm-2 col-form-label">Kabupaten</label>
                                            <div class="col-sm-10">
                                                <select name="kabupatenPerusahaan" id="kabupatenPerusahaan" class="form-control chosen-select" data-placeholder="Pilih Kabupaten/Kota">
                                                    <?php
                                                        if(!empty($getProfile)){
                                                            foreach($getKabupaten as $kab){
                                                                $select = "";
                                                                if($getProfile->id_kabupaten == $kab->id){
                                                                    $select = "selected";
                                                                }
                                                                echo '<option value="'.$kab->id.'"'.$select.'>'.$kab->name.'</option>';
                                                            }
                                                        }else{
                                                            echo '<option value="">Pilih Kabupaten/Kota</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputKecamatan" class="col-sm-2 col-form-label">Kecamatan</label>
                                            <div class="col-sm-10">
                                                <select name="kecamatanPerusahaan" id="kecamatanPerusahaan" class="form-control chosen-select" data-placeholder="Pilih Kecamatan">
                                                <?php
                                                        if(!empty($getProfile)){
                                                            foreach($getKecamatan as $kec){
                                                                $select = "";
                                                                if($getProfile->id_kecamatan == $kec->id){
                                                                    $select = "selected";
                                                                }
                                                                echo '<option value="'.$kec->id.'"'.$select.'>'.$kec->name.'</option>';
                                                            }
                                                        }else{
                                                            echo '<option value="">Pilih Kecamatan</option>';
                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputNamaInstitusi" class="col-sm-2 col-form-label">Alamat Lengkap</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="alamat_lengkap" id="inputNamaInstitusi" placeholder="Alamat Lengkap" value="<?php echo !empty($getProfile) ? $getProfile->alamat_lengkap : '' ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputJurusan" class="col-sm-2 col-form-label">Kontak Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="kontak_email" id="inputJurusan" placeholder="Kontak Email" value="<?php echo !empty($getProfile) ? $getProfile->kontak_email : '' ?>" >
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputDeskripsi" class="col-sm-2 col-form-label">Tentang Perusahaan</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="tentang_perusahaan" id="inputDeskripsi" cols="10" rows="4" placeholder="Tentang Perusahaan" ><?php echo !empty($getProfile) ? $getProfile->tentang_perusahaan : '' ?></textarea>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="inputKeahlian" class="col-sm-2 col-form-label">Keahlian</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="keahlian" id="inputKeahlian" placeholder="Keahlian" ><?php echo !empty($getProfile) ? $getProfile->keahlian : '' ?></textarea>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="inputFile" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file" placeholder="Pilih foto" id="file" class="form-control">
                                                <span><i>Format foto harus (jpg, jpeg, png) max.2MB</i></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <!-- <button type="button" class="btn btn-primary buttonProfile">Update</button> -->
                                                <input type="submit" value="Update Profile" name="update" class="btn btn-block btn-primary" id="updateProfile">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="password">
                                    <form action="#" class="form-horizontal" id="ganti_password_perusahaan" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="inputPasswordLama" class="col-sm-2 col-form-label">Password Lama</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="passwordLama" class="form-control" id="passwordLamaPerusahaan" placeholder="Password Lama">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPasswordBaru" class="col-sm-2 col-form-label">Password Baru</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="passwordBaru" class="form-control" id="passwordBaruPerusahaan" placeholder="Password Baru">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="confirmPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="konfirmasiPassword" class="form-control" id="konfirmasiPasswordPerusahaan" placeholder="Konfirmasi Password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <!-- <button type="button" class="btn btn-primary buttonProfile">Update</button> -->
                                                <input type="submit" value="Ganti Password" name="gantiPassword" class="btn btn-primary" id="gantiPassword">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                        <!-- /.tab-content -->
                            </div>
                        </div><!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- <script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script> -->
<script>

    // $(document).ready(function(){
    //     function unReadNotification(view = ''){
    //         $.ajax({
    //             url:baseUrl+"perusahaan/profile_perusahaan/notifikasiPerusahaan",
    //             method:"POST",
    //             data:{view:view},
    //             dataType:"json",
    //             success:function(data){
    //                 console.log(data)
    //             }
    //         })
    //     }

    //     unReadNotification();
    // });
    var baseUrl = "<?php echo base_url() ?>";
    var id = <?php echo $this->session->userdata('id_perusahaan') ?>;
</script>