<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid px-md-4	">
        <a class="navbar-brand" href="index.html">LamarAja</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="browsejobs.html" class="nav-link">Browse Jobs</a></li>
                <li class="nav-item"><a href="candidates.html" class="nav-link">Canditates</a></li>
                <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                <?php if(!userLog()){?>
                    <li class="nav-item cta mr-md-1"><a href="<?php echo base_url('Login') ?>" class="nav-link">Masuk</a></li>
                    <li class="nav-item cta cta-colored"><a href="job-post.html" class="nav-link">Perusahaan</a></li>
                <?php } ?>
            </ul>
            <?php if(userLog()) { ?> 
                <?php if(isset($userData)): ?>
                    <div class="btn-group">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $userData->nama_user ?>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url('Profile/lihat_profile/').$userData->id_user ?>"><i class="icon icon-user"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" id="logOut"><i class="icon icon-sign-out"></i> Keluar</a>
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