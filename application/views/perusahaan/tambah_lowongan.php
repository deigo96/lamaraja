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
                <h1 class="mb-3 bread">Post A Job</h1>
                <input type="hidden" name="status_perusahaan" id="status-perusahaan" value="<?php echo $getData->status ?>">
            </div>
        </div>
    </div>
</div>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-6 mb-5">
                <form action="#" id="tambahLowongan" method="POST" class="p-5 bg-white">
                    <!-- <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="option-price-1">
                            <input type="checkbox" id="option-price-1"> <span class="text-success">$500</span> For 30 days
                            </label>
                        </div>
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="option-price-2">
                            <input type="checkbox" id="option-price-2"> <span class="text-success">$300</span> / Monthly Recurring
                            </label>
                        </div>
                    </div> -->
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="Kategori" class="font-weight-bold">Kategori</label>
                            <select name="kategori" id="kategori" class="form-control chosen-select" data-placeholder="Pilih Kategori">
                                <option value="">Pilih Kategori</option>
                                <?php 
                                    foreach($getKategori as $kategori){
                                        echo "<option value='$kategori->kategori_id'>".$kategori->nama."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="Jabatan" class="font-weight-bold">Jabatan</label>
                            <select name="jabatan" id="jabatan" class="form-control chosen-select" data-placeholder="Pilih Jabatan">
                                <option value="">Pilih Jabatan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="tipeLowongan" class="font-weight-bold">Tipe Pekerjaan</label>
                            <select name="tipePekerjaan" id="tipePekerjaan" class="form-control chosen-select">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Internship">Internship</option>
                                <option value="Freelance">Freelance</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="Provinsi" class="font-weight-bold">Provinsi</label>
                            <select name="provinsi" id="provinsi" class="form-control chosen-select" data-placeholder="Pilih Provinsi">
                                <option value="">Pilih Provinsi</option>
                                <?php 
                                    foreach($getProvinsi as $provinsi){
                                        echo "<option value='$provinsi->id'>".$provinsi->name."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group mb-5">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="Kabupaten/Kota" class="font-weight-bold">Kabupaten/Kota</label>
                            <select name="kabupaten" id="kabupaten" class="form-control chosen-select" data-placeholder="Pilih Kabupaten/Kota">
                                <option value="">Pilih Kabupaten/Kota</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12"><h3>Kualifikasi</h3></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="Pendidikan" class="font-weight-bold">Pendidikan</label>
                            <select name="pendidikan" id="pendidikan" class="form-control chosen-select" data-placeholder="Pilih">
                                <option value="">Pilih</option>
                                <option value="SMA/SMK">SMA/SMK</option>
                                <option value="D3">D3</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="Jurusan" class="font-weight-bold">Jurusan</label>
                            <input type="text" name="jurusan" id="jurusan" class="form-control jurusan" placeholder="Jurusan">
                        </div>
                    </div>
                    <div id="newRow"></div>
                    <button id="addRowKualifikasi" type="button" class="btn btn-warning">Tambah Kualifikasi</button>
                    <div class="row form-group mt-5">
                        <div class="col-md-12"><h3>Deskripsi</h3></div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 mb-3 mb-md-0">
                            <label for="Deskripsi" class="font-weight-bold">Deskripsi</label>
                            <input type="text" name="deskripsi[]" id="deskripsi" class="form-control deskripsi" placeholder="Deskripsi">
                        </div>
                    </div>
                    <div id="newRowDeskripsi"></div>
                    <button id="addRowDeskripsi" type="button" class="btn btn-warning">Tambah Deskripsi</button>
                    
                    <div class="row form-group mt-5">
                        <div class="col-md-12">
                            <input type="submit" value="Post" class="btn btn-primary btn-block py-2 px-5">
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">Kontak Info</h3>
                    <?php if(!empty($kontak)) { ?>
                        <p class="mb-0 font-weight-bold">Alamat</p>
                        <p class="mb-4"><?php echo $kontak->alamat_lengkap ?></p>

                        <p class="mb-0 font-weight-bold">Telepon</p>
                        <p class="mb-4"><?php echo $kontak->telepon_perusahaan ?></p>

                        <p class="mb-0 font-weight-bold">Kontak Email</p>
                        <p class="mb-4"><?php echo $kontak->kontak_email ?></p>
                    <?php } ?>
                </div>
                <!-- <div class="p-4 mb-3 bg-white">
                    <h3 class="h5 text-black mb-3">More Info</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa ad iure porro mollitia architecto hic consequuntur. Distinctio nisi perferendis dolore, ipsa consectetur</p>
                    <p><a href="#" class="btn btn-primary  py-2 px-4">Learn More</a></p>
                </div> -->
            </div>
        </div>
    </div>
</section>
		
<section class="ftco-section-parallax">
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
</section>

<script>
    var baseUrl = "<?php echo base_url() ?>";
    var namaPerusahaanLowongan = "<?php echo $getData->nama_perusahaan ?>";
</script>
