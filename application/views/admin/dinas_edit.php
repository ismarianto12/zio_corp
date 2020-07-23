    <section class="content">
        <div class="">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Dinas</h2>
                        </div>
         
                        <div class="body">
                            <form id="form_validation" method="POST">
                                <div class="form-group form-float">
                                    <div class="form-line"><input type="hidden" name="id" value="<?php echo $rs_dinas['id_dinas'];?>" required>
                                        <input type="text" class="form-control" name="nama" value="<?php echo $rs_dinas['nama_dinas'];?>"required>
                                        <label class="form-label">Nama</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="alamat" value="<?php echo $rs_dinas['alamat_dinas'];?>" required>
                                        <label class="form-label">Alamat</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="no_telepon" value="<?php echo $rs_dinas['no_telepon'];?>">
                                        <label class="form-label">No Telepon</label>
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
           
         
           
        </div>
 
    </section>