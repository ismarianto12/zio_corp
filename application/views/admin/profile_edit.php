    <section class="content">
        <div class="">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Profile</h2>
                        </div>
         
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="hidden" name="id" value="<?php echo $rs_profile['id_profile'];?>" required>
                                        <input type="hidden" name="foto_terdahulu" value="<?php echo $rs_profile['foto_profile']; ?>">
                                        <input type="text" class="form-control" name="judul" autocomplete="off" value="<?php echo $rs_profile['judul_profile'];?>"required>
                                        <label class="form-label">Judul Profile</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label class="form-label">Deskripsi</label>
                                    <div class="form-line">
                                        <textarea class="form-control" id="tinymce" name="deskripsi" rows="12" autocomplete="off" required><?php echo $rs_profile['deskripsi'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" name="file_profile">
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