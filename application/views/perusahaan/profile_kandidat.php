<div class="hero-wrap hero-wrap-3" style="background-image: url('<?php echo base_url('assets/images/bg_1.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profile</span></p>
                <h1 class="mb-3 bread">Profile Kandidat</h1>
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
                                    src="<?php echo base_url('assets/upload/profile/').$getKandidat->foto ?>" 
                                    alt="Foto profile user">
                            </div>
                            <h3 class="profile-username text-center"><?php echo $getKandidat->nama ?></h3>
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
                                <?php echo !empty($getKandidat) ? $getKandidat->pendidikan_terakhir.' <p class="text-muted" style="margin-bottom: 0;">'.$getKandidat->nama_institusi.'</p class="text-muted"><p>'.$getKandidat->jurusan.'</p>' : "" ?>
                            </p>
                            <hr>
                            <strong><i class="icon icon-map-marker mr-1"></i> Alamat</strong>
                            <p class="text-muted"><?php echo !empty($getKandidat) ? $getKandidat->alamat : "" ?></p>
                            <hr>
                            <strong><i class="icon icon-pencil mr-1"></i> Keahlian</strong>
                            <p class="text-muted">
                                <?php echo !empty($getKandidat) ? $getKandidat->keahlian : "" ?>
                            </p>
                            <hr>
                            <strong><i class="icon icon-file mr-1"></i> Deskripsi</strong>
                            <p class="text-muted">
                                <?php echo !empty($getKandidat) ? $getKandidat->deskripsi : "" ?>
                            </p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-pane" id="settings">
                                <form action="#" class="form-horizontal" id="prosesPelamar" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nama" class="form-control" id="inputName" placeholder="Nama" value="<?php echo !empty($getKandidat) ? $getKandidat->nama : $userData->nama_user ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo !empty($getKandidat) ? $getKandidat->email_pelamar : '' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputJenkel" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="jenkel" class="form-control" id="inputJenkel" value="<?php echo !empty($getKandidat) ? $getKandidat->jenis_kelamin : '' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputTanggalLahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="tanggal_lahir" id="inputTanggalLahir"  value="<?php echo !empty($getKandidat) ? date('d M Y', strtotime($getKandidat->tanggal_lahir)) : '' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputAgama" class="col-sm-2 col-form-label">Agama</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="agama" id="inputAgama" placeholder="Agama" value="<?php echo !empty($getKandidat) ? $getKandidat->agama : '' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPendidikan" class="col-sm-2 col-form-label">Pendidikan Terakhir</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="pendidikan_terakhir" id="inputPendidikan" placeholder="Pendidikan Terakhir" value="<?php echo !empty($getKandidat) ? $getKandidat->pendidikan_terakhir : '' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputNamaInstitusi" class="col-sm-2 col-form-label">Nama Institusi</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_institusi" id="inputNamaInstitusi" placeholder="Nama Institusi" value="<?php echo !empty($getKandidat) ? $getKandidat->nama_institusi : '' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputJurusan" class="col-sm-2 col-form-label">Jurusan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jurusan" id="inputJurusan" placeholder="Jurusan" value="<?php echo !empty($getKandidat) ? $getKandidat->jurusan : '' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputDeskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="deskripsi" id="inputDeskripsi" placeholder="Deskripsi" readonly><?php echo !empty($getKandidat) ? $getKandidat->deskripsi_pelamar : '' ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputKeahlian" class="col-sm-2 col-form-label">Keahlian</label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" name="keahlian" id="inputKeahlian" placeholder="Keahlian" readonly><?php echo !empty($getKandidat) ? $getKandidat->keahlian : '' ?></textarea>
                                        </div>
                                    </div>
                                    <?php if(!empty($getKandidat->resume)) { ?>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <a href="<?php echo !empty($getKandidat) ? base_url('assets/upload/dokumen/').$getKandidat->resume : "#" ?>" target="blank" class="btn btn-block btn-info">LIHAT RESUME</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if(!empty($getKandidat->ijazah)) { ?>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <a href="<?php echo !empty($getKandidat) ? base_url('assets/upload/dokumen/').$getKandidat->ijazah : "#" ?>" target="blank" class="btn btn-block btn-info">LIHAT IJAZAH</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php if(!empty($getKandidat->transkip_nilai)) { ?>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <a href="<?php echo !empty($getKandidat) ? base_url('assets/upload/dokumen/').$getKandidat->transkip_nilai : "#" ?>" target="blank" class="btn btn-block btn-info">LIHAT TRANSKIP NILAI</a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="form-group row">
                                        <div class="offset-sm-2 col-sm-10">
                                            <?php if($getKandidat->status_lamaran == 0) { ?>
                                                <button type="button" class="btn btn-block btn-primary" id="terimaPelamar">TERIMA</button>
                                                <button type="button" class="btn btn-block btn-danger" id="tolakPelamar">TOLAK</button>
                                            <?php } elseif($getKandidat->status_lamaran == "1") { ?>
                                                <button type="button" class="btn btn-block btn-success" disabled>DITERIMA</button>
                                            <?php } elseif($getKandidat->status_lamaran == "2") { ?>
                                                <button type="button" class="btn btn-block btn-info" disabled>DITOLAK</button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </form>
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
    var id = <?php echo $this->session->userdata('id_perusahaan') ?>;
    var idLowongan = <?php echo $getKandidat->id_proses_lowongan ?>;
    var namaPelamar = '<?php echo $getKandidat->nama ?>';
    var emailPelamar = '<?php echo $getKandidat->email_pelamar ?>';
    var namaJabatan = '<?php echo $getKandidat->nama_jabatan ?>';
    var namaPerusahaan = '<?php echo $getKandidat->nama_perusahaan ?>';
    var tipePekerjaan = '<?php echo $getKandidat->tipePekerjaan ?>';
    var kontakEmail = '<?php echo $getKandidat->kontak_email ?>';
</script>