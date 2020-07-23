    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Edit news         
                </h2>
            </div>
            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit news</h2>
                        </div>
         
                        <div class="body">
                            <form id="form_validation" method="POST" enctype="multipart/form-data">
                                <div class="form-group form-float">
                                    <div class="form-line"><input type="hidden" name="id" value="<?php echo $rs_news['id_news'];?>" required>
                                        <input type="text" class="form-control" name="judul" value="<?php echo $rs_news['judul'];?>"required>
                                        <label class="form-label">Judul</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="isi" required><?php echo $rs_news['isi'];?></textarea>
                                        <label class="form-label">Deskripsi</label>
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name="gambar">
                                        <label class="form-label">Foto</label>
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