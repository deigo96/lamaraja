<div class="hero-wrap hero-wrap-2" style="background-image: url('<?php echo base_url('assets/images/bg_1.jpg') ?>');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-start">
            <div class="col-md-12 ftco-animate text-center mb-5">
                <p class="breadcrumbs mb-0"><span class="mr-3"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span></span></p>
                <h1 class="mb-3 bread">Kontak</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section contact-section bg-light">
    <div class="container">
        <div class="row d-flex mb-5 contact-info">
            <div class="col-md-12 mb-4">
                <h2 class="h3">Informasi Kontak</h2>
            </div>
            <div class="w-100"></div>
            <div class="col-md-3">
                <p><span>Alamat:</span> <?php echo $kontak->alamat ?></p>
            </div>
            <div class="col-md-3">
                <p><span>Telepon:</span> <a href="tel://1234567920"><?php echo $kontak->telepon ?></a></p>
            </div>
            <div class="col-md-3">
                <p><span>Email:</span> <a href="mailto:info@yoursite.com"><?php echo $kontak->email ?></a></p>
            </div>
            <div class="col-md-3">
                <p><span>Website</span> <a href="#"><?php echo $kontak->nama_website ?></a></p>
            </div>
        </div>
        <div class="row block-9">
            <div class="col-md-6 order-md-last d-flex">
                <form action="<?php echo base_url('kontak/sendMail') ?>" class="bg-white p-5 contact-form" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea id="" cols="30" rows="7" name="pesan" class="form-control" placeholder="Message" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" value="Send Message" class="btn btn-primary py-3 px-5">Send Message</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 d-flex">
                <div class="map bg-white">
                    <iframe
                        src="https://www.google.com/maps?q=lippor cikarang&output=embed"
                        width="540" height="562" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <!-- <div class="map-inside">
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>