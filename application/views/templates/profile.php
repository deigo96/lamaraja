<style>
    .form-control {
        height: 35px !important;
        font-size: 14px !important;
        color: #5d5454 !important;
    }

    .input--file {
        position: relative;
        color: #7f7f7f;
    }

    .input--file input[type="file"] {
        position: absolute;
        top: 0;
        left: 0;
        opacity: 0;
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
                                <img class="profile-user-img img-fluid img-circle" style="height: 115px;" src="<?php echo !empty($userProfile->foto) ? base_url('assets/upload/profile/') . $userProfile->foto : base_url('assets/images/profile_users/user.png') ?>" alt="Foto profile user">
                                <div class="input--file">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="3.2" />
                                            <path d="M9 2l-1.83 2h-3.17c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2v-12c0-1.1-.9-2-2-2h-3.17l-1.83-2h-6zm3 15c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5z" />
                                            <path d="M0 0h24v24h-24z" fill="none" />
                                        </svg>
                                    </span>
                                    <input type="hidden" name="oldFoto" id="oldFoto" value="<?php echo !empty($userProfile->foto) ? $userProfile->foto : "" ?>">
                                    <input name="file" id="fotoUpload" type="file" />
                                    </script>
                                </div>
                            </div>
                            <div class="uploadFoto" style="display: none;">
                                <button type="button" id="buttonUploadFoto" class="btn btn-primary btn-block"><b>Upload Foto</b></button>
                            </div>
                            <h3 class="profile-username text-center"><?php echo $userData->nama_user ?></h3>
                            <!-- <p class="text-muted text-center">Software Engineer</p> -->
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Lamaran</b> <a class="float-right"><?php echo $countLamaran->lamaran ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Diterima</b> <a class="float-right"><?php echo $countDiterima->diterima ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Ditolak</b> <a class="float-right"><?php echo $countDitolak->ditolak ?></a>
                                </li>
                            </ul>
                            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="icon icon-book mr-1"></i> Pendidikan</strong>
                            <p class="text-muted" style="margin-bottom: 0;">
                                <?php echo !empty($userProfile) ? $userProfile->pendidikan_terakhir . ' <p class="text-muted" style="margin-bottom: 0;">' . $userProfile->nama_institusi . '</p class="text-muted"><p>' . $userProfile->jurusan . '</p>' : "" ?>
                            </p>
                            <hr>
                            <strong><i class="icon icon-map-marker mr-1"></i> Alamat</strong>
                            <p class="text-muted"><?php echo !empty($userProfile) ? $userProfile->alamat : "" ?></p>
                            <hr>
                            <strong><i class="icon icon-pencil mr-1"></i> Keahlian</strong>
                            <p class="text-muted">
                                <?php echo !empty($userProfile) ? $userProfile->keahlian : "" ?>
                            </p>
                            <hr>
                            <strong><i class="icon icon-file mr-1"></i> Deskripsi</strong>
                            <p class="text-muted">
                                <?php echo !empty($userProfile) ? $userProfile->deskripsi : "" ?>
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Aktifitas</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Pengaturan</a></li>
                                <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane active" id="timeline">
                                    <div class="timeline timeline-inverse" style="color: white">
                                        <?php foreach ($lamaranUser as $lamaran) { ?>
                                            <div class="time-label">
                                                <span class="bg-success">
                                                    <?php echo date('d M, Y', strtotime($lamaran->tanggal)) ?>
                                                </span>
                                            </div>
                                            <div>
                                                <div class="timeline-item">
                                                    <span class="time"><i class="far fa-clock"></i> <?php echo date('H:i', strtotime($lamaran->tanggal)) ?></span>
                                                    <h3 class="timeline-header">Anda melamar pekerjaan</h3>
                                                    <div class="timeline-body">
                                                        <b><?php echo $lamaran->nama_perusahaan ?> </b>- <?php echo $lamaran->nama  ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php if ($lamaran->status != 0) {
                                                if ($lamaran->status == '1') {
                                                    $status = "Menerima";
                                                } elseif ($lamaran->status == '2') {
                                                    $status = "Menolak";
                                                }
                                            ?>
                                                <div>
                                                    <div class="timeline-item">
                                                        <span class="time"><i class="far fa-clock"></i> <?php echo time_elapsed_string($lamaran->tanggal_proses) ?></span>

                                                        <h3 class="timeline-header border-0"><b style="color: #206dfb"><?php echo $lamaran->nama_perusahaan ?> </b><?php echo $status ?> lamaran anda
                                                        </h3>
                                                    </div>
                                                </div>
                                            <?php } else { ?>
                                                <div>
                                                    <div class="timeline-item">
                                                        <h3 class="timeline-header border-0"><b style="color: #206dfb">Lamaran anda sedang diproses</b>
                                                        </h3>
                                                    </div>
                                                </div>
                                        <?php }
                                        } ?>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->

                                <div class="tab-pane" id="settings">
                                    <form action="#" class="form-horizontal" id="updateProfileForm" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="nama" class="form-control" id="inputName" placeholder="Nama" value="<?php echo !empty($userProfile) ? $userProfile->nama : $userData->nama_user ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo !empty($userProfile) ? $userProfile->email : $userData->email ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                            <div class="col-sm-10">
                                                <?php
                                                $selected1 = "";
                                                $selected2 = "";
                                                if (!empty($userProfile)) {
                                                    if ($userProfile->jenis_kelamin == "Laki-Laki")
                                                        $selected1 = "selected";
                                                    elseif ($userProfile->jenis_kelamin == "Perempuan")
                                                        $selected2 = "selected";
                                                }
                                                ?>
                                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control chosen-select">
                                                    <option value="">Pilih...</option>
                                                    <option value="Laki-Laki" <?php echo $selected1 ?>>Laki-Laki</option>
                                                    <option value="Perempuan" <?php echo $selected2 ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                            <div class="col-sm-10">
                                                <input type="date" class="form-control" name="tanggal_lahir" id="inputTanggalLahir" value="<?php echo !empty($userProfile) ? $userProfile->tanggal_lahir : '' ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="agama" id="inputAgama" placeholder="Agama" value="<?php echo !empty($userProfile) ? $userProfile->agama : '' ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPendidikan" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="pendidikan_terakhir" id="inputPendidikan" placeholder="Pendidikan Terakhir" value="<?php echo !empty($userProfile) ? $userProfile->pendidikan_terakhir : '' ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputNamaInstitusi" class="col-sm-2 col-form-label">Nama Institusi</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="nama_institusi" id="inputNamaInstitusi" placeholder="Nama Institusi" value="<?php echo !empty($userProfile) ? $userProfile->nama_institusi : '' ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="jurusan" id="inputJurusan" placeholder="Jurusan" value="<?php echo !empty($userProfile) ? $userProfile->jurusan : '' ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="deskripsi" id="inputDeskripsi" placeholder="Deskripsi"><?php echo !empty($userProfile) ? $userProfile->deskripsi : '' ?></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputKeahlian" class="col-sm-2 col-form-label">Keahlian</label>
                                            <div class="col-sm-10">
                                                <textarea class="form-control" name="keahlian" id="inputKeahlian" placeholder="Keahlian"><?php echo !empty($userProfile) ? $userProfile->keahlian : '' ?></textarea>
                                                <span><i>Gunakan tanda (-) untuk memisah kalimat</i></span>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="inputFile" class="col-sm-2 col-form-label">Foto</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file" placeholder="Pilih foto" id="file" class="form-control">
                                                <input type="hidden" name="oldFoto" value="<?php echo !empty($userProfile->foto) ? $userProfile->foto : "" ?>">
                                                <?php if (!empty($userProfile->foto)) {
                                                    echo "<b>Anda sudah mengupload foto</b>";
                                                } else {
                                                    echo "<span><i>Format foto harus (jpg, jpeg, png) max.2MB</i></span>";
                                                } ?>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="inputFile" class="col-sm-2 col-form-label">CV</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file_upload[]" placeholder="Pilih file" id="resume" class="form-control">
                                                <input type="hidden" name="oldDokumen[]" value="<?php echo !empty($userProfile->resume) ? $userProfile->resume : "" ?>">
                                                <?php if (!empty($userProfile->resume)) {
                                                    echo "<b>Anda sudah mengupload CV</b>";
                                                } else {
                                                    echo "<span><i>Format file harus PDF max.2MB</i></span>";
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputFile" class="col-sm-2 col-form-label">Ijazah</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file_upload[]" placeholder="Pilih file" id="ijazah" class="form-control">
                                                <input type="hidden" name="oldDokumen[]" value="<?php echo !empty($userProfile->ijazah) ? $userProfile->ijazah : "" ?>">
                                                <?php if (!empty($userProfile->ijazah)) {
                                                    echo "<b>Anda sudah mengupload Ijazah</b>";
                                                } else {
                                                    echo "<span><i>Format file harus PDF max.2MB</i></span>";
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputFile" class="col-sm-2 col-form-label">Transkip Nilai</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="file_upload[]" placeholder="Pilih file" id="transkip_nilai" class="form-control">
                                                <input type="hidden" name="oldDokumen[]" value="<?php echo !empty($userProfile->transkip_nilai) ? $userProfile->transkip_nilai : "" ?>">
                                                <?php if (!empty($userProfile->transkip_nilai)) {
                                                    echo "<b>Anda sudah mengupload Transkip Nilai</b>";
                                                } else {
                                                    echo "<span><i>Format file harus PDF max.2MB</i></span>";
                                                } ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <!-- <button type="button" class="btn btn-primary buttonProfile">Update</button> -->
                                                <input type="submit" value="update" name="update" class="btn btn-primary" id="updateProfile">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="password">
                                    <form action="#" class="form-horizontal" id="ganti-password" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label for="inputPasswordLama" class="col-sm-2 col-form-label">Password Lama</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="passwordLama" class="form-control" id="passwordLama" placeholder="Password Lama">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPasswordBaru" class="col-sm-2 col-form-label">Password Baru</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="passwordBaru" class="form-control" id="passwordBaru" placeholder="Password Baru">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="confirmPassword" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" name="konfirmasiPassword" class="form-control" id="konfirmasiPassword" placeholder="Konfirmasi Password">
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
                            </div>
                            <!-- /.tab-content -->
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
<script>
    var baseUrl = "<?php echo base_url() ?>";
    var id = <?php echo $this->session->userdata('id_user') ?>;
</script>