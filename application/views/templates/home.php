<style>
    .ui-autocomplete {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 1000;
    float: left;
    display: none;
    min-width: 160px;   
    padding: 4px 0;
    margin: 0 0 10px 25px;
    list-style: none;
    background-color: #ffffff;
    border-color: #ccc;
    border-color: rgba(0, 0, 0, 0.2);
    border-style: solid;
    border-width: 1px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    background-clip: padding-box;
    *border-right-width: 2px;
    *border-bottom-width: 2px;
}

.ui-menu-item > a.ui-corner-all {
    display: block;
    padding: 3px 15px;
    clear: both;
    font-weight: normal;
    line-height: 18px;
    color: #555555;
    white-space: nowrap;
    text-decoration: none;
}

.ui-state-hover, .ui-state-active {
    color: #ffffff;
    text-decoration: none;
    background-color: #0088cc;
    border-radius: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    background-image: none;
}
</style>   
<div class="hero-wrap img" style="background-image: url('<?php echo base_url('assets/images/bg_1.jpg') ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row d-md-flex no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-10 d-flex align-items-center ftco-animate">
                <div class="text text-center pt-5 mt-md-5">
                    <p class="mb-4">Find Job, Employment, and Career Opportunities</p>
                    <h1 class="mb-5">The Eassiest Way to Get Your New Job</h1>
                    <div class="ftco-counter ftco-no-pt ftco-no-pb">
                        <div class="row">
                            <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18">
                                    <div class="text d-flex">
                                        <div class="icon mr-2">
                                            <span class="flaticon-worldwide"></span>
                                        </div>
                                        <div class="desc text-left">
                                            <strong class="number" data-number="<?php echo $wilayah ?>">0</strong>
                                            <span>Wilayah</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text d-flex">
                                        <div class="icon mr-2">
                                            <span class="flaticon-visitor"></span>
                                        </div>
                                        <div class="desc text-left">
                                            <strong class="number" data-number="<?php echo $perusahaan ?>">0</strong>
                                            <span>Perusahaan</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 d-flex justify-content-center counter-wrap ftco-animate">
                                <div class="block-18 text-center">
                                    <div class="text d-flex">
                                        <div class="icon mr-2">
                                            <span class="flaticon-resume"></span>
                                        </div>
                                        <div class="desc text-left">
                                            <strong class="number" data-number="<?php echo $user ?>">0</strong>
                                            <span>Pelamar aktif</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ftco-search my-md-5">
                        <div class="row">
                            <div class="col-md-12 tab-wrap">  
                                <div class="tab-content p-4" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="v-pills-nextgen-tab">
                                        <form action="<?php echo base_url('lowongan/kategori/') ?>" class="search-job" method="POST">
                                            <div class="row no-gutters">
                                                <div class="col-md mr-md-2">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="icon"><span class="icon-briefcase"></span></div>
                                                            <input type="text" name="kategori" id="auto-complete-kategori" class="form-control" placeholder="eg. Garphic. Web Developer">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md mr-md-2">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                                                <input type="text" name="tipe" id="auto-complete-tipe" class="form-control" placeholder="Tipe Pekerjaan">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <select name="" id="" class="chosen-select"></select> -->
                                                <div class="col-md mr-md-2">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <div class="icon"><span class="icon-map-marker"></span></div>
                                                            <input type="text" name="lokasi" id="auto-complete-lokasi" value="" class="form-control" placeholder="Provinsi">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md">
                                                    <div class="form-group">
                                                        <div class="form-field">
                                                            <button type="submit" class="form-control btn btn-primary">Search</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-no-pt ftco-no-pb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="category-wrap">
                    <div class="row no-gutters">
                        <div class="col-md-2">
                            <div class="top-category text-center no-border-left">
                                <h3><a href="<?php echo base_url('lowongan/kategori/').$getPosisi[0]->nama ?>">Website &amp; Software</a></h3>
                                <span class="icon flaticon-contact"></span>
                                <p><span class="number"><?php echo $getPosisi[0]->jumlah_posisi ?></span> <span>Open position</span></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="top-category text-center">
                                <h3><a href="<?php echo base_url('lowongan/kategori/').$getPosisi[1]->nama ?>">Education &amp; Training</a></h3>
                                <span class="icon flaticon-mortarboard"></span>
                                <p><span class="number"><?php echo $getPosisi[1]->jumlah_posisi ?></span> <span>Open position</span></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="top-category text-center">
                                <h3><a href="<?php echo base_url('lowongan/kategori/').$getPosisi[2]->nama ?>">Graphic &amp; UI/UX Design</a></h3>
                                <span class="icon flaticon-idea"></span>
                                <p><span class="number"><?php echo $getPosisi[2]->jumlah_posisi ?></span> <span>Open position</span></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="top-category text-center">
                                <h3><a href="<?php echo base_url('lowongan/kategori/').$getPosisi[3]->nama ?>">Accounting &amp; Finance</a></h3>
                                <span class="icon flaticon-accounting"></span>
                                <p><span class="number"><?php echo $getPosisi[3]->jumlah_posisi ?></span> <span>Open position</span></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="top-category text-center">
                                <h3><a href="<?php echo base_url('lowongan/kategori/').$getPosisi[4]->nama ?>">Restaurant &amp; Food</a></h3>
                                <span class="icon flaticon-dish"></span>
                                <p><span class="number"><?php echo $getPosisi[4]->jumlah_posisi ?></span> <span>Open position</span></p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="top-category text-center">
                                <h3><a href="<?php echo base_url('lowongan/kategori/').$getPosisi[5]->nama ?>">Health &amp; Hospital</a></h3>
                                <span class="icon flaticon-stethoscope"></span>
                                <p><span class="number"><?php echo $getPosisi[5]->jumlah_posisi ?></span> <span>Open position</span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-7 heading-section text-center ftco-animate">
                <span class="subheading">Job Categories</span>
                <h2 class="mb-0">Top Categories</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 ftco-animate">
                <ul class="category text-center">
                    <?php foreach($jabatan[0] as $j1) { ?>
                        <li><a href="<?php echo base_url('lowongan/pencarian/').$j1->nama ?>" ><?php echo $j1->nama ?> <br><span class="number"><?php echo $j1->jumlah ?></span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-3 ftco-animate">
                <ul class="category text-center">
                    <?php foreach($jabatan[1] as $j1) { ?>
                        <li><a href="<?php echo base_url('lowongan/pencarian/').$j1->nama ?>" ><?php echo $j1->nama ?> <br><span class="number"><?php echo $j1->jumlah ?></span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-3 ftco-animate">
                <ul class="category text-center">
                    <?php foreach($jabatan[2] as $j1) { ?>
                        <li><a href="<?php echo base_url('lowongan/pencarian/').$j1->nama ?>" ><?php echo $j1->nama ?> <br><span class="number"><?php echo $j1->jumlah ?></span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-3 ftco-animate">
                <ul class="category text-center">
                    <?php foreach($jabatan[3] as $j1) { ?>
                        <li><a href="<?php echo base_url('lowongan/pencarian/').$j1->nama ?>" ><?php echo $j1->nama ?> <br><span class="number"><?php echo $j1->jumlah ?></span> <span>Open position</span><i class="ion-ios-arrow-forward"></i></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section services-section">
    <div class="container">
        <div class="row d-flex">
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-resume"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Search Millions of Jobs</h3>
                    </div>
                </div>      
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-team"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Easy To Manage Jobs</h3>
                    </div>
                </div>    
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-career"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Top Careers</h3>
                    </div>
                </div>      
            </div>
            <div class="col-md-3 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block">
                    <div class="icon"><span class="flaticon-employees"></span></div>
                    <div class="media-body">
                        <h3 class="heading mb-3">Search Expert Candidates</h3>
                    </div>
                </div>      
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pr-lg-5">
                <div class="row justify-content-center pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <span class="subheading">Recently Added Jobs</span>
                        <h2 class="mb-4">Featured Jobs Posts For This Week</h2>
                    </div>
                </div>
                <div class="row">
                <?php $i=0; foreach($allLowongan as $lowongan) { ?>
                    <div class="col-md-12 ftco-animate">
                        <div class="job-post-item p-4 d-block d-lg-flex align-items-center">
                            <div class="one-third mb-4 mb-md-0">
                                <div class="job-post-item-header align-items-center">
                                    <span class="subadge"><?php echo $lowongan->tipePekerjaan ?></span>
                                    <h2 class="mr-3 text-black"><a href="<?php echo base_url('lowongan/detail_lowongan/').$lowongan->id_lowongan ?>"><?php echo $lowongan->nama_jabatan ?></a></h2>
                                </div>
                                <div class="job-post-item-body d-block d-md-flex">
                                    <div class="mr-3"><span class="icon-layers"></span> <a href="#"><?php echo $lowongan->nama_perusahaan ?></a></div>
                                    <div><span class="icon-my_location"></span> <span><?php echo $lowongan->nama_provinsi.', '.$lowongan->nama_kabupaten ?></span></div>
                                </div>
                            </div>

                            <div class="one-forth ml-auto d-flex align-items-center mt-4 md-md-0">
                                <a href="<?php echo base_url('lowongan/detail_lowongan/').$lowongan->id_lowongan ?>" class="btn btn-primary py-2">Apply Job</a>
                            </div>
                        </div>
                    </div><!-- end -->  
                <?php if ($i++>7) break; } ?>
                </div>
            </div>
            <div class="col-lg-3 sidebar">
                <div class="row justify-content-center pb-3">
                    <div class="col-md-12 heading-section ftco-animate">
                        <h2 class="mb-4">Top Recruitments</h2>
                    </div>
                </div>
                <?php foreach($rekruter as $rekruter) { ?>
                    <div class="sidebar-box ftco-animate">
                        <div class="">
                            <a href="<?php echo base_url('lowongan/perusahaan/').$rekruter->nama_perusahaan ?>" class="company-wrap"><img src="<?php echo base_url('assets/upload/perusahaan/').$rekruter->foto_perusahaan ?>" class="img-fluid" alt="Foto Perusahaan"></a>
                            <div class="text p-3">
                                <h3><a href="<?php echo base_url('lowongan/perusahaan/').$rekruter->nama_perusahaan ?>"><?php echo $rekruter->nama_perusahaan ?></a></h3>
                                <p><span class="number"><?php echo $rekruter->jumlah_posisi ?></span> <span>Open position</span></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>



<!-- <section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-7 text-center heading-section ftco-animate">
                <span class="subheading">Testimonial</span>
                <h2 class="mb-4">Happy Clients</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel ftco-owl">
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_3.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_1.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap py-4">
                            <div class="text">
                                <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                <div class="d-flex align-items-center">
                                    <div class="user-img" style="background-image: url(images/person_2.jpg)"></div>
                                    <div class="pl-3">
                                        <p class="name">Roger Scott</p>
                                        <span class="position">Marketing Manager</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- <section class="ftco-section ftco-candidates bg-primary">
    <div class="container">
        <div class="row justify-content-center pb-3">
        <div class="col-md-10 heading-section heading-section-white text-center ftco-animate">
        <span class="subheading">Candidates</span>
        <h2 class="mb-4">Latest Candidates</h2>
        </div>
    </div>
    </div>
    <div class="container">
    <div class="row">
        <div class="col-md-12 ftco-animate">
            <div class="carousel-candidates owl-carousel">
                <div class="item">
                    <a href="#" class="team text-center">
                        <div class="img" style="background-image: url(images/person_1.jpg);"></div>
                        <h2>Danica Lewis</h2>
                        <span class="position">Western City, UK</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="team text-center">
                        <div class="img" style="background-image: url(images/person_2.jpg);"></div>
                        <h2>Nicole Simon</h2>
                        <span class="position">Western City, UK</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="team text-center">
                        <div class="img" style="background-image: url(images/person_3.jpg);"></div>
                        <h2>Cloe Meyer</h2>
                        <span class="position">Western City, UK</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="team text-center">
                        <div class="img" style="background-image: url(images/person_4.jpg);"></div>
                        <h2>Rachel Clinton</h2>
                        <span class="position">Western City, UK</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="team text-center">
                        <div class="img" style="background-image: url(images/person_5.jpg);"></div>
                        <h2>Dave Buff</h2>
                        <span class="position">Western City, UK</span>
                    </a>
                </div>
                <div class="item">
                    <a href="#" class="team text-center">
                        <div class="img" style="background-image: url(images/person_6.jpg);"></div>
                        <h2>Dave Buff</h2>
                        <span class="position">Western City, UK</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    </div>
</section> -->
		
    <!-- <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-12">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->