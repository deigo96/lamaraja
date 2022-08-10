<style>
    .container{
        border: 1px solid rgba(0, 0, 0, 0.02);
    box-shadow: 0px 5px 21px -14px rgb(0 0 0 / 14%);
    }
    /* .ftco-footer{
        background: linear-gradient(to right, #207dff 0%, #a16ae8 100%);
    }
    .ftco-footer-social li a span {
        color: #212529 !important;
    } */
</style>
<footer class="ftco-footer ftco-bg-dark ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Lamaraja</h2>
                    <p>Mudah mencari kapan dan dimana aja</p>
                    <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-3">
                        <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                        <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                    </ul>
                </div>
            </div>
            <?php 
                $idPerusahaan = $this->session->userdata("id_perusahaan");
                $idUser = $this->session->userdata("id_user");
                $namaPer = $this->session->userdata("nama_perusahaan");
                if($idPerusahaan != NULL){
                    $displayUser = "none";
                }
                else if($idUser != NULL){
                    $displayPer = "none";
                }
                else {
                    $footerperusahaan = base_url('perusahaan/login_perusahaan');
                    $footeruser = base_url('login');

                }
            ?>
            <div class="col-md" style="display: <?php echo isset($displayPer ) ? $displayPer : "" ?>">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Employers</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo isset($footerperusahaan) ? $footerperusahaan : base_url("perusahaan/kandidat")  ?>" class="pb-1 d-block">Candidate</a></li>
                        <li><a href="<?php echo isset($footerperusahaan) ? $footerperusahaan : base_url("perusahaan/tambah_lowongan")  ?>" class="pb-1 d-block">Post a Job</a></li>
                        <li><a href="<?php echo isset($footerperusahaan) ? $footerperusahaan : base_url("perusahaan/profile_perusahaan/index/").$namaPer  ?>" class="pb-1 d-block">Profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md" style="display: <?php echo isset($displayUser ) ? $displayUser : "" ?>">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Candidate</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo isset($footeruser) ? $footeruser : base_url("lowongan") ?>" class="pb-1 d-block">Lowongan</a></li>
                        <li><a href="<?php echo isset($footeruser) ? $footeruser : base_url("Profile/lihat_profile/").$idUser ?>" class="pb-1 d-block">Profile</a></li>
                        <li><a href="<?php echo isset($footeruser) ? $footeruser : base_url("") ?>" class="pb-1 d-block">Dashboard</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4 ml-md-4">
                    <h2 class="ftco-heading-2">Akun</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo base_url('login') ?>" class="pb-1 d-block">Pelamar</a></li>
                        <li><a href="<?php echo base_url('perusahaan/login_perusahaan') ?>" class="pb-1 d-block">Perusahaan</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have a Questions?</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Alamat: Jl. Riverside 1 No.26 Waterfront Estate RT/RW 003/019, Cibatu, Cikarang Selatan, Jawa Barat</span></li>
                            <li><a href="https://wa.me/6282135277397" target="blank"><span class="icon icon-phone"></span><span class="text">+62 82135277397</span></a></li>
                            <li><a href="mailto:deigosiahaan@gmail.com"><span class="icon icon-envelope"></span><span class="text">deigosiahaan@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> & modified by <a href="https://github.com/deigo96">deigosiahaan</a>
                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
            </div>
        </div>
    </div>
</footer>
    
  

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


    <script src="<?php echo base_url('assets/') ?>js/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="<?php echo base_url('assets/js/bootbox.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery-migrate-3.0.1.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/bootstrap.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.easing.1.3.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.waypoints.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.stellar.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.magnific-popup.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/aos.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.animateNumber.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/scrollax.min.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/main.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/jquery.validate.min.js"></script>
    <!-- chosen JS
		============================================ -->
    <script src="<?php echo base_url('assets/admin/') ?>js/chosen/chosen.jquery.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>js/chosen/chosen-active.js"></script>
    <!-- select2 JS
		============================================ -->
    
    <script src="<?php echo base_url('assets/admin/') ?>js/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url('assets/admin/') ?>js/select2/select2-active.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/auth.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/auth-perusahaan.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/perusahaan.js"></script>
    <script src="<?php echo base_url('assets/') ?>js/custom.js"></script>
    <!-- <script src="<?php echo base_url('assets/') ?>js/pagination.js"></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php 
        if ($this->session->flashdata('success')) {
            echo $this->session->flashdata('success');
    } ?>
</body>
</html>