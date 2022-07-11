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
                    <h1>Edit Jabatan</h1>
                </div>
            </div>
            <div class="sparkline10-graph">
                <div class="input-knob-dial-wrap">
                    <form action="#" method="POST" id="edit-form-jabatan">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="chosen-select-single mg-b-20">
                                    <select data-placeholder="Pilih Kategori..." name="id_kategori" id="idKategori" class="chosen-select" tabindex="-1">
                                        <?php 
                                            foreach($getKategori as $get) { 
                                            $selected = "";
                                            if($get->kategori_id == $getJabatan->id_kategori)
                                                $selected = "selected"
                                        ?> 
                                            <option value="<?php echo $get->kategori_id ?>" <?php echo $selected ?>><?php echo $get->nama ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <input type="text" name="nama" class="form-control" value="<?php echo $getJabatan->nama ?>" id="edit_nama_jabatan" placeholder="Nama Jabatan" />
                                <!-- <input type="hidden" name="id_jabatan" value="<?php echo $getK ?>"> -->
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            </div>
                        </div>
                        <div class="form-group-inner">
                            <div class="login-btn-inner">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="login-horizental cancel-wp pull-left form-bc-ele">
                                            <input type="submit" value="Submit" class="btn btn-sm btn-primary login-submit-cs">
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
    var id = "<?php echo $getJabatan->id_jabatan ?>";
</script>