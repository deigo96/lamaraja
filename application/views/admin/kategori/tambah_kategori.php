<style>
    label.error{
        font-weight: 300;
        color: red;
    }
</style>
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="sparkline10-list mg-tb-30 responsive-mg-t-0 table-mg-t-pro-n dk-res-t-pro-0 nk-ds-n-pro-t-0">
            <div class="sparkline10-hd">
                <div class="main-sparkline10-hd">
                    <h1>Tambah Kategori</h1>
                </div>
            </div>
            <div class="sparkline10-graph">
                <div class="input-knob-dial-wrap">
                    <form action="#" method="POST" id="form-tambah-kategori">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="text" name="namaKategori" class="form-control" id="namaKategori" placeholder="Nama Kategori" />
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="login-btn-inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                            <input type="submit" value="Submit" class="btn btn-md btn-primary login-submit-cs">
                                        </div>
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
<script>
    var base_url = "<?php echo base_url() ?>";
</script>