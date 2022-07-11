<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid px-md-4	">
        <a class="navbar-brand" href="#">LamarAja</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?php echo base_url('perusahaan/kandidat') ?>" class="nav-link">Kandidat</a></li>
                <li class="nav-item"><a href="<?php echo base_url('kontak') ?>" class="nav-link">Kontak</a></li>
                <li class="nav-item"><a href="<?php echo base_url('perusahaan/tambah_lowongan') ?>" class="nav-link">Tambah Lowongan</a></li>
                <?php if(!userLog() && !companyLog()){?>
                    <li class="nav-item cta mr-md-1"><a href="<?php echo base_url('home') ?>" class="nav-link">Pelamar</a></li>
                <?php } ?>
            </ul>
            <?php if(companyLog()) { ?> 
                <?php if(isset($getData)): ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $getData->nama_perusahaan ?> <span class="notif-perusahaan"></span>
                        </button> 
                        <div class="dropdown-menu">
                            <a class="dropdown-item resetNotifPerusahaan" href="<?php echo base_url('perusahaan/profile_perusahaan/index/').$getData->nama_perusahaan ?>"><i class="icon icon-user"></i> Profile <span class="notif-perusahaan"></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" id="logOutPerusahaan"><i class="icon icon-sign-out"></i> Keluar</a>
                        </div>
                    </div>
                <?php endif; ?>
            <?php } ?>
        </div>
    </div>
</nav>
<!-- END nav -->
<script>
    var baseUrl = "<?php echo base_url() ?>";
</script>