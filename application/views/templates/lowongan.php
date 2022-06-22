<style>
    .chosen-drop{
        position:relative; z-index:100
    
        }
        .hide{
            display: none;
        }
        .pencarian{
            text-align: right;
            font-size: 20px;
            font-family: monospace;
        }
        .pencarian b{
            color: black;
        }
</style>
<div class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url('assets/images/bg_1.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>About</span></p>
                <h1 class="mb-3 bread">Browse Jobs</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light" style="padding-bottom: 10em !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 pr-lg-4">
                <div class="row">
                    <?php if(isset($perusahaan)){?>
                        <div class="col-md-12">
                            <div class="pencarian">
                                <span><b><?php echo count($perusahaan) ?></b> Hasil ditemukan</span>
                            </div>
                        </div>
                        <?php foreach($perusahaan as $lowongan) { ?>
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
                                        <div>
                                            <!-- <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                                                <span class="icon-heart"></span>
                                            </a> -->
                                        </div>
                                        <a href="<?php echo base_url('lowongan/detail_lowongan/').$lowongan->id_lowongan ?>" class="btn btn-primary py-2">Apply Job</a>
                                    </div>
                                </div>
                            </div><!-- end -->
                        <?php } ?>
                    <?php }elseif(isset($lowongan)) { ?>
                        <div class="col-md-12">
                            <div class="pencarian">
                                <span><b><?php echo count($lowongan) ?></b> Hasil ditemukan</span>
                            </div>
                        </div>
                        <?php foreach($lowongan as $lowongan) { ?>
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
                                        <div>
                                            <!-- <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                                                <span class="icon-heart"></span>
                                            </a> -->
                                        </div>
                                        <a href="<?php echo base_url('lowongan/detail_lowongan/').$lowongan->id_lowongan ?>" class="btn btn-primary py-2">Apply Job</a>
                                    </div>
                                </div>
                            </div><!-- end -->
                        <?php } ?>
                    <?php } elseif(isset($lowonganByJabatan)) { ?>
                        <div class="col-md-12">
                            <div class="pencarian">
                                <span><b><?php echo count($lowonganByJabatan) ?></b> Hasil ditemukan</span>
                            </div>
                        </div>
                        <?php foreach($lowonganByJabatan as $lowongan) { ?>
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
                                        <div>
                                            <!-- <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                                                <span class="icon-heart"></span>
                                            </a> -->
                                        </div>
                                        <a href="<?php echo base_url('lowongan/detail_lowongan/').$lowongan->id_lowongan ?>" class="btn btn-primary py-2">Apply Job</a>
                                    </div>
                                </div>
                            </div><!-- end -->
                        <?php } ?>
                    <?php }else { ?>
                        <?php foreach($allLowongan as $lowongan) { ?>
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
                                        <div>
                                            <!-- <a href="#" class="icon text-center d-flex justify-content-center align-items-center icon mr-2">
                                                <span class="icon-heart"></span>
                                            </a> -->
                                        </div>
                                        <a href="<?php echo base_url('lowongan/detail_lowongan/').$lowongan->id_lowongan ?>" class="btn btn-primary py-2">Apply Job</a>
                                    </div>
                                </div>
                            </div><!-- end -->
                        <?php } ?>
                    <?php } ?>
                </div>
                <!-- <div class="row mt-5">
                    <div class="col text-center">
                        <div class="block-27" id="demo">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-3 sidebar">
                <div class="sidebar-box bg-white p-4 ftco-animate">
                    <h3 class="heading-sidebar">Kategori</h3>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.4/pagination.css" rel="stylesheet" /> -->
<script>
//     $('body').layout(
//     { applyDefaultStyles: true }
// );
$('.sidebar').click(function(){
    //alert("OK");
    $('#chosen_select').toggleClass('hide');
});
</script>
<!-- <div id="wrapper">
  <section>
    <div class="data-container"></div>
    <div id="demo"></div>
  </section>
</div> -->

<!-- <script>
    $('#demo').pagination({
    dataSource: [1, 2, 3, 4, 5, 6, 7],
    callback: function(data, pagination) {
        // template method of yourself
        var html = template(data);
        dataContainer.html(html);
    }
})
</script><template>
  <el-pagination
    :page-size="20"
    :pager-count="11"
    layout="prev, pager, next"
    :total="1000"
  />
</template> -->
