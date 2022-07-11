<style>
    .social-edu-ctn{
        margin-top: 20px;
    }
    .basic-list li{
        padding: 18px 0 !important;
    }
</style>
<div class="traffic-analysis-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu">
                    <i class="fa fa-user"></i>
                    <div class="social-edu-ctn">
                        <a href="<?php echo base_url('admin/laporan/pelamar') ?>"><h3><?php echo $countUser->count ?> User</h3></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu twitter-cl res-mg-t-30 table-mg-t-pro-n">
                    <i class="fa fa-building"></i>
                    <div class="social-edu-ctn">
                        <a href="<?php echo base_url('admin/laporan/perusahaan') ?>"><h3><?php echo $countPerusahaan->count ?> perusahaan</h3></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu linkedin-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <i class="fa fa-cubes"></i>
                    <div class="social-edu-ctn">
                        <a href="<?php echo base_url('admin/laporan/lowongan') ?>"><h3><?php echo $countLowongan->count ?> Lowongan</h3></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="social-media-edu youtube-cl res-mg-t-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                    <i class="fa fa-book"></i>
                    <div class="social-edu-ctn">
                        <a href="<?php echo base_url('admin/jabatan/semua_jabatan') ?>"><h3><?php echo $countJabatan->count ?> Jabatan</h3></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="courses-area mg-b-15 mg-t-30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="single-review-st-item res-mg-t-30 table-mg-t-pro-n">
                    <div class="single-review-st-hd">
                        <h2>User Baru</h2>
                    </div>
                    <?php foreach($userBaru as $user) { ?>
                        <div class="single-review-st-text">
                            <img src="<?php echo !empty($user->foto) ? base_url('assets/upload/profile/').$user->foto : base_url('assets/images/profile_users/user.png') ?>" alt="">
                            <div class="review-ctn-hf" style="margin-top: 20px !important;">
                                <h3><?php echo $user->nama_user ?></h3>
                            </div>
                            <div class="review-item-rating" style="margin-top: 20px !important;">
                                <?php 
                                    if($user->id_profile_user == NULL) 
                                        echo '<span class="pull-right label-warning label-5 label">Belum Aktif</span>';
                                    else    
                                        echo '<span class="pull-right label-success label-3 label">Aktif</span>';
                                ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box">
                    <h3 class="box-title">Perusahaan Baru</h3>
                    <ul class="basic-list">
                        <?php foreach($peruBaru as $perusahaan) { ?>
                            <?php $perusahaan->id_profile_perusahaan == NULL ? $label = "info label-4" : $label = "danger label-1" ?>
                            <?php $perusahaan->id_profile_perusahaan == NULL ? $teks = "Belum Aktif" : $teks = "Aktif" ?>
                            <li><?php echo $perusahaan->nama_perusahaan ?> <span class="pull-right label-<?php echo $label ?> label"><?php echo $teks ?></span></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12">
                <div class="white-box res-mg-t-30 table-mg-t-pro-n">
                    <h3 class="box-title">Lowongan terbaru</h3>
                    <ul class="country-state">
                        <?php foreach($lowoBaru as $lowo) { ?>
                            <li>
                                <h2><span><?php echo $lowo->nama ?></span></h2> <small><?php echo $lowo->nama_perusahaan ?></small>
                                <div class="pull-right label-info"> <?php echo $lowo->tanggal_post ?></i></div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>