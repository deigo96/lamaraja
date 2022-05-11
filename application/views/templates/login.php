<div class="hero-wrap img" style="background-image: url(<?php echo base_url('assets/images/bg_1.jpg') ?>);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-10 align-items-center ftco-animate">
                <div class="text text-center pt-5 mt-md-5">
                    <div class="ftco-search my-md-5">
                        <div class="row">
                            <div class="col-md-6 order-md-last offset-md-3">
                                <form action="<?php echo base_url('Login/auth') ?>" method="POST" id="login-form" class="p-5 contact-form" style="background: linear-gradient(to right, #207dff 0%, #a16ae8 100%)">
                                    <p class="text-left" style="font-size: 25px">Sign-in</p>
                                    <div class="login-error">
                                        <?php 
                                            if ($this->session->flashdata('error')) 
                                                echo "<label class='error' for='login'>Email atau password salah</label>";
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control email" placeholder="Masukan e-mail">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control password" placeholder="Masukan Password">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="buttonLogin" class="btn btn-primary btn-block py-3 px-5">Masuk</button>
                                    </div>
                                    <span>Belum punya akun? <a href="<?php echo base_url('Register') ?>" style="color: #d1ff5f;">Daftar</a></span>
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