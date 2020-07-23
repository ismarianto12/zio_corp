    <section class="content">
        <div class="">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Sponsor</h2>
                        </div>
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" name="foto_terdahulu" value="<?php echo $rs_sponsor['foto_sponsor']; ?>">
                                        <input type="hidden" name="id" value="<?php echo $rs_sponsor['id_sponsor']; ?>">
                                        <input type="text" class="form-control" autocomplete="off" name="nama" value="<?php echo $rs_sponsor['nama_sponsor']; ?>" required>
                                        <label class="form-label">Nama Sponsor</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" autocomplete="off" value="<?php echo $rs_sponsor['email_sponsor']; ?>" name="email" required>
                                        <label class="form-label">Email</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" autocomplete="off" name="notelp" value="<?php echo $rs_sponsor['notelp_sponsor']; ?>" required>
                                        <label class="form-label">No Telepon</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input class="form-control" name="alamat" autocomplete="off" id="alamatsponsorzzz" required value="<?php echo $rs_sponsor['alamat_sponsor']; ?>">
                                        <label class="form-label">Alamat</label>
                                        <input type="hidden" name="long" id="long">
                                        <input type="hidden" name="lat" id="lat">
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="deskripsi" rows="8" autocomplete="off" required><?php echo $rs_sponsor['deskripsi_sponsor']; ?></textarea>
                                        <label class="form-label">Deskripsi</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="foto_sponsor">
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