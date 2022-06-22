<style>
    .form-control{
        height: 35px !important;
        font-size: 16px !important;
    }
</style>
<div class="hero-wrap hero-wrap-3" style="background-image: url('<?php echo base_url('assets/images/bg_1.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: unset;">
            <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Job Post</span></p>
                <h1 class="mb-3 bread">Kandidat</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-candidates ftco-candidates-2 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 pr-lg-4">
                <div class="row">
                    <?php foreach($getKandidat as $get) { ?>
                        <div class="col-md-12">
                            <div class="team d-md-flex p-4 bg-white">
                                <div class="img" style="background-image: url('<?php echo base_url('assets/upload/profile/').$get->foto ?>');"></div>
                                <div class="text pl-md-4">
                                    <span class="location mb-0">Western City, UK</span>
                                    <h2><?php echo ucfirst($get->nama_pelamar) ?></h2>
                                    <span class="position">Graduate</span>
                                    <p class="mb-2"><?php echo $get->deskripsi_pelamar ?></p>
                                    <span class="icon-calendar seen seen"> <?php echo $get->tanggal ?></span>
                                    <p><a href="<?php echo base_url('perusahaan/kandidat/profil_pelamar/').$get->id_proses_lowongan ?>" class="btn btn-primary">Lihat Profile</a></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 sidebar">
            <div class="sidebar-box bg-white p-4 ftco-animate">
                <h3 class="heading-sidebar">Browse Category</h3>
                <form action="#" class="search-form mb-3">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Search...">
            </div>
            </form>
                <form action="#" class="browse-form">
                            <label for="option-job-1"><input type="checkbox" id="option-job-1" name="vehicle" value="" checked> Website &amp; Software</label><br>
                            <label for="option-job-2"><input type="checkbox" id="option-job-2" name="vehicle" value=""> Education &amp; Training</label><br>
                            <label for="option-job-3"><input type="checkbox" id="option-job-3" name="vehicle" value=""> Graphics Design</label><br>
                            <label for="option-job-4"><input type="checkbox" id="option-job-4" name="vehicle" value=""> Accounting &amp; Finance</label><br>
                            <label for="option-job-5"><input type="checkbox" id="option-job-5" name="vehicle" value=""> Restaurant &amp; Food</label><br>
                            <label for="option-job-6"><input type="checkbox" id="option-job-6" name="vehicle" value=""> Health &amp; Hospital</label><br>
                        </form>
            </div>

            <div class="sidebar-box bg-white p-4 ftco-animate">
                <h3 class="heading-sidebar">Select Location</h3>
                <form action="#" class="search-form mb-3">
            <div class="form-group">
                <span class="icon icon-search"></span>
                <input type="text" class="form-control" placeholder="Search...">
            </div>
            </form>
                <form action="#" class="browse-form">
                            <label for="option-location-1"><input type="checkbox" id="option-location-1" name="vehicle" value="" checked> Sydney, Australia</label><br>
                            <label for="option-location-2"><input type="checkbox" id="option-location-2" name="vehicle" value=""> New York, United States</label><br>
                            <label for="option-location-3"><input type="checkbox" id="option-location-3" name="vehicle" value=""> Tokyo, Japan</label><br>
                            <label for="option-location-4"><input type="checkbox" id="option-location-4" name="vehicle" value=""> Manila, Philippines</label><br>
                            <label for="option-location-5"><input type="checkbox" id="option-location-5" name="vehicle" value=""> Seoul, South Korea</label><br>
                            <label for="option-location-6"><input type="checkbox" id="option-location-6" name="vehicle" value=""> Western City, UK</label><br>
                        </form>
            </div>

            <div class="sidebar-box bg-white p-4 ftco-animate">
                <h3 class="heading-sidebar">Job Type</h3>
                <form action="#" class="browse-form">
                            <label for="option-job-type-1"><input type="checkbox" id="option-job-type-1" name="vehicle" value="" checked> Partime</label><br>
                            <label for="option-job-type-2"><input type="checkbox" id="option-job-type-2" name="vehicle" value=""> Fulltime</label><br>
                            <label for="option-job-type-3"><input type="checkbox" id="option-job-type-3" name="vehicle" value=""> Intership</label><br>
                            <label for="option-job-type-4"><input type="checkbox" id="option-job-type-4" name="vehicle" value=""> Temporary</label><br>
                            <label for="option-job-type-5"><input type="checkbox" id="option-job-type-5" name="vehicle" value=""> Freelance</label><br>
                            <label for="option-job-type-6"><input type="checkbox" id="option-job-type-6" name="vehicle" value=""> Fixed</label><br>
                        </form>
            </div>
            </div>
        </div>
    </div>
</section>

<script>
    var baseUrl = "<?php echo base_url() ?>";
</script>
