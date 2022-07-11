<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h1>Kategori </h1>
                            <div class="add-product">
                                <a href="<?php echo base_url('admin/kategori/tambah_kategori') ?>">Tambah Kategori</a>
                            </div>
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
                                        <th data-field="name" data-editable="false">Kategori</th>
                                        <th data-field="admin" data-editable="false">Admin ID</th>
                                        <th data-field="tanggal" data-editable="false">Tanggal Buat</th>
                                        <th data-field="complete">Aksi</th>
                                        <!-- <th data-field="task" data-editable="true">Task</th>
                                        <th data-field="date" data-editable="true">Date</th>
                                        <th data-field="price" data-editable="true">Price</th>
                                        <th data-field="action">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php foreach ($getKategori as $get) { ?> 
                                        <tr>
                                            <td></td>
                                            <td><?php echo $get->kategori_id ?></td>
                                            <td><?php echo $get->nama ?></td>
                                            <td><?php echo $get->id_admin ?></td>
                                            <td><?php echo $get->tanggal ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/kategori/edit_kategori/').$get->kategori_id ?>" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                                <a href="#" id="hapus-kategori" onclick="hapusKategori(<?php echo $get->kategori_id ?>)" data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tr>
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