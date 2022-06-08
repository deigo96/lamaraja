<style>
    label {
        margin-bottom: 0;
    }
</style>
<div class="hero-wrap img" style="background-image: url(<?php echo base_url('assets/images/bg_1.jpg') ?>);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" style="height: unset;">
            <div class="col-md-10 align-items-center ftco-animate">
                <div class="text text-center pt-5 mt-md-5">
                    <div class="ftco-search my-md-5">
                        <div class="row">
                            <div class="col-md-6 order-md-last offset-md-3">
                                <form action="#" id="register-form-perusahaan" class="p-5 contact-form" style="background: linear-gradient(to right, #207dff 0%, #a16ae8 100%)">
                                    <p class="text-left" style="font-size: 25px">Daftarkan Perusahaan</p>
                                    <div class="form-group">
                                        <input type="text" name="nama_perusahaan" class="form-control nama_perusahaan" placeholder="Masukan nama perusahaan">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email_login" class="form-control email_login" placeholder="Masukan e-mail untuk login">
                                        <?php echo form_error('email') ?>
                                    </div>
                                    <div class="form-group">
                                        <input name="no_telp" id="no_telp" class="form-control no_telp" placeholder="Masukan nomor telepon">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" id="password" class="form-control password" placeholder="Masukan Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="confirmPassword" class="form-control confirmPassword" placeholder="Masukan Ulang Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Daftar" class="btn btn-primary btn-block py-3 px-5" id="buttonRegisterPerusahaan">
                                    </div>
                                    <span>Sudah punya akun? <a href="<?php echo base_url('perusahaan/login_perusahaan') ?>" style="color: #d1ff5f;">Masuk</a></span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    var baseUrl = "<?php echo base_url() ?>";
</script>