<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Semua <span class="table-project-n">Lowongan</span></h1>
                            <!-- <div class="add-product">
                                <a href="<?php echo base_url('admin/jabatan/tambah_jabatan') ?>">Tambah Jabatan</a>
                            </div> -->
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">
                            <div id="toolbar">
                                <select class="form-control dt-tb">
                                    <option value="">Export Basic</option>
                                    <option value="all">Export All</option>
                                    <option value="selected">Export Selected</option>
                                </select>
                            </div>
                            <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                <thead>
                                    <tr>
                                        <th data-field="state" data-checkbox="true"></th>
                                        <th data-field="id">ID</th>
                                        <th data-field="perusahaan" data-editable="false">Perusahaan</th>
                                        <th data-field="pelamar" data-editable="false">Jumlah Pelamar</th>
                                        <th data-field="jabatan" data-editable="false">Jabatan</th>
                                        <th data-field="kategori" data-editable="false">Kategori</th>
                                        <th data-field="lokasi" data-editable="false">Lokasi</th>
                                        <th data-field="tanggal" data-editable="false">Tanggal</th>
                                        <th data-field="complete">Status</th>
                                        <!-- <th data-field="task" data-editable="true">Task</th>
                                        <th data-field="date" data-editable="true">Date</th>
                                        <th data-field="price" data-editable="true">Price</th>
                                        <th data-field="action">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($getLowongan as $get) { ?> 
                                        <tr>
                                            <td></td>
                                            <td><?php echo $get->id_lowongan ?></td>
                                            <td><?php echo $get->nama_perusahaan ?></td>
                                            <td><?php echo $get->jumlah_pelamar ?></td>
                                            <td><?php echo $get->nama_jabatan ?></td>
                                            <td><?php echo $get->nama_kategori ?></td>
                                            <td><?php echo $get->nama_kabupaten.', '.$get->nama_provinsi ?></td>
                                            <td><?php echo $get->tanggal_post ?></td>
                                            <td>
                                                <?php
                                                    if($get->status == 1){
                                                        $status = '<span class="pull-center label-success label-3 label">Buka</span>';
                                                    }else{
                                                        $status = '<span class="pull-center label-info label-4 label">Tutup</span>';
                                                    }
                                                    echo $status;
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Static Table End -->