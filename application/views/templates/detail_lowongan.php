<style>
    .tagcloud button {
    text-transform: uppercase;
    display: inline-block;
    padding: 4px 10px;
    margin-bottom: 7px;
    margin-right: 4px;
    border-radius: 4px;
    color: #000000;
    border: 1px solid #ccc;
    font-size: 11px;
    }
    button.tag-cloud-link:hover{
        background-color: #206dfb;
        color: #fff;
        border-color: #206dfb;
    }
    p{
        margin-bottom: 0;
    }
    span{
        margin-bottom: 0;
    }
    .hero-wrap.hero-wrap-2{
        height: 75px !important;
    }
    .ftco-navbar-light{
        top: 0 !important;
    }
</style>

<div class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <!-- <div class="container"> -->
        <!-- <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
                <h1 class="mb-3 bread">Browse Jobs</h1>
            </div>
        </div> -->
    <!-- </div> -->
</div>
<!-- Start post Area -->
<section class="ftco-section ftco-candidates ftco-candidates-2 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pr-lg-4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="team d-md-flex p-4 bg-white">
                            <div class="img" style="background-image: url(images/person_1.jpg);"></div>
                            <div class="text pl-md-4">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="">
                                        <h6 class="location mb-0"><?php echo $lowongan->nama_kabupaten ?>, <?php echo $lowongan->nama_provinsi ?></h6>
                                        <h2><?php echo $lowongan->nama_jabatan ?></h2>
                                    </div>
                                    <div class="tagcloud" id="apply-btn">
                                        <?php if(isset($checkLamaran) && $checkLamaran != 0) { ?>
                                            <button type="button" disabled class="tag-cloud-link">Sudah melamar</button>
                                        <?php } else{ ?>
                                            <button type="button" class="tag-cloud-link">Apply Job</button>
                                        <?php } ?>
                                    </div>
                                </div>
                                <span class="location mb-0"><?php echo $lowongan->nama_perusahaan ?></span>
                                <span class="position"><?php echo $lowongan->tipePekerjaan ?></span>
                                <p><?php echo str_replace('#',', ', $lowongan->deskripsi) ?></p>
                                <span class="icon-calendar seen"> Di posting <?php echo date('d M Y', strtotime($lowongan->tanggal_post)) ?></span>
                                <!-- <p><a href="#" class="btn btn-primary">Shortlist</a></p> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="team p-4 bg-white">
                            <h5>Kualifikasi</h5>
                            <div>
                            <ul>
                                <li><?php echo $lowongan->pendidikan ?></li>
                                <?php
                                    $kualifikasi = explode('#', $lowongan->kualifikasi);
                                    foreach($kualifikasi as $k){
                                        echo '<li>'.$k.'</li>';
                                    }
                                ?>
                            </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 sidebar">
                <div class="sidebar-box bg-white p-4 ftco-animate">
                    <h3 class="heading-sidebar">Cari Lowongan lain</h3>
                    <form action="#" class="search-form mb-3">
                        <div class="form-group">
                            <select name="kategori" id="kategori" class="form-control chosen-select">
                                <option value="">Semua Kategori</option>
                                <?php foreach($getJabatan as $jabatan) { ?>
                                    <option value="<?php echo $jabatan->id_jabatan ?>"><?php echo $jabatan->nama ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </form>
                    <h3 class="heading-sidebar mt-5">Pilih Lokasi</h3>
                    <form action="#" class="search-form mb-3">
                        <div class="form-group">
                            <select name="lokasi" id="lokasi" class="form-control chosen-select" style="width: 250px; position:fixed; z-index:99999">
                                <option value="">Semua Lokasi</option>
                                <?php foreach($wilayah as $wilayah) { ?>
                                    <option value="<?php echo $wilayah->id ?>"><?php echo $wilayah->name ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </form>
                    <h3 class="heading-sidebar mt-5">Tipe Pekerjaan</h3>
                    <form action="#" class="browse-form">
                        <select name="tipe" id="tipe" class="form-control chosen-select">
                            <option value="">Semua tipe pekerjaan</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Internship">Internship</option>
                            <option value="Freelance">Freelance</option>
                        </select>
                    </form>
                    <p class="mt-5">
                        <a href="#" class="btn btn-primary btn-block">Cari</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var baseUrl = '<?php echo base_url() ?>';
    var idLowongan = <?php echo $lowongan->id_lowongan ?>;
</script>