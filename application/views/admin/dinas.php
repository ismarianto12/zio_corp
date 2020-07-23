
    <section class="content">
        <div class="">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                             Dinas
                            <div class="right">
                                <a href="<?php echo site_url();?>/admin/dinas_add" class="btn btn-sm btn-primary">Buat Dinas</a>
                            </div>
                        </div>
                        <div class="body">
                            <?php foreach($rs_dinas as $row): ?>
                                <div class="card">
                                    <div class="body">
                                        <p><b>Nama Dinas:</b> <?php echo $row['nama_dinas'];?></p>
                                        <p><b>Alamat:</b> <?php echo $row['alamat_dinas'];?></p>
                                        <p><b>Telepon:</b> <?php echo $row['no_telepon'];?></p>
                                        <p><b>Aksi:</b> <a href="<?php echo site_url('admin/dinas_edit');echo "/".$row['id_dinas'];?>"><label class="label label-warning">Edit</label></a> | <a href="<?php echo site_url('admin/dinas_del');echo "/".$row['id_dinas'];?>"><label class="label label-danger">Delete</label></a></p>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>