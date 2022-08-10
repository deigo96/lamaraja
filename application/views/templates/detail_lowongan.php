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

    button.apply-job:hover{
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

<div class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url('assets/images/bg_1.jpg') ?>');" data-stellar-background-ratio="0.5">
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
                            <div class="img" style="background-image: url('<?php echo base_url('assets/upload/perusahaan/').$lowongan->foto_perusahaan ?>');background-size:200px"></div>
                            <div class="text pl-md-4">
                                <div class="d-flex flex-row justify-content-between">
                                    <div class="">
                                        <h6 class="location mb-0"><?php echo $lowongan->nama_kabupaten ?>, <?php echo $lowongan->nama_provinsi ?></h6>
                                        <h2><?php echo $lowongan->nama_jabatan ?></h2>
                                    </div>
                                    <div class="tagcloud">
                                        <?php if(isset($checkLamaran) && $checkLamaran != 0) { ?>
                                            <button type="button" disabled class="tag-cloud-link applied">Sudah melamar</button>
                                        <?php } else{ ?>
                                            <button type="button" class="tag-cloud-link apply-job" id="apply-btn">Apply Job</button>
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
                    <form action="<?php echo base_url('lowongan/kategori') ?>" method="POST" class="search-form mb-3">
                        <div class="form-group">
                            <select name="kategori" id="kategoriPencarian" class="form-control chosen-select">
                                <option value="">Semua Kategori</option>
                                <?php foreach($getKategori as $kategori) { ?>
                                    <option value="<?php echo $kategori->nama ?>"><?php echo $kategori->nama ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <h3 class="heading-sidebar mt-5">Pilih Lokasi</h3>
                        <div class="form-group">
                            <select name="lokasi" id="lokasiPencarian" class="form-control chosen-select" style="width: 250px; position:fixed; z-index:99999">
                                <option value="">Semua Lokasi</option>
                                <?php foreach($wilayah as $wilayah) { ?>
                                    <option value="<?php echo $wilayah->name ?>"><?php echo $wilayah->name ?></option>
                                <?php }?>
                            </select>
                        </div>
                        <h3 class="heading-sidebar mt-5">Tipe Pekerjaan</h3>
                        <select name="tipe" id="tipePencarian" class="form-control chosen-select">
                            <option value="">Semua tipe pekerjaan</option>
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Internship">Internship</option>
                            <option value="Freelance">Freelance</option>
                        </select>
                        <p class="mt-5">
                            <button type="submit" name="cariLowongan" class="btn btn-primary btn-block">Cari</button>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    var baseUrl = '<?php echo base_url() ?>';
    var idLowongan = <?php echo $lowongan->id_lowongan ?>;
    var checkUserProfile = "<?php echo $checkUser ?>";
</script>