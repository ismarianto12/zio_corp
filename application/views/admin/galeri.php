<section class="content">
        <div class="">
            <!-- Image Gallery -->
      
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                GALLERY
                                </h2>
                            
                        </div>
                        
                            <div class="Card" style="padding-left: 0px;padding-right: 0px"> 
                                  <div class="header bg-light-blue">
                                         <h2>Video
                            </h2>
                        </div>
                        <div class="body">
                                <?php 
                                    foreach($rs_galerivideo as $video) { 
                                        if($video['pilihan'] == 'embed') { 
                                            echo $video['link_embed']; ?>
                                            <a href="<?php echo site_url(); ?>/<?php echo $link; ?>/deletevideo/<?php echo $video['id_video']; ?>" class="label label-danger">Hapus</a><br /><br />
                                       <?php }else{
                                            ?>
                                            <center><iframe width="100%" height="315" src="<?php echo base_url();?>assets/images/galeri/video/<?php echo $video['video']; ?>" frameborder="0" allowfullscreen></iframe><a href="<?php echo site_url(); ?>/<?php echo $link; ?>/deletevideo/<?php echo $video['id_video']; ?>" class="label label-danger">Hapus</a></center><br />

                                            <?php
                                        } 
                                    }
                                ?>
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                         <span class="input-group-addons">
                                              <label class="form-label">Pilih</label> 
                                        </span>
                                        <div class="form-line">
                                            <select class="form-control" id="pilihzzz" name="pilih">
                                                <option value="local">Upload Video</option>
                                                <option value="embed">Embed Youtube</option>
                                            </select>
                                        </div>
                                        
                                    </div>
                                    <div class="form-group" style="display: none;" id="linkembedzzz">
                                        <span class="input-group-addons">
                                              <label class="form-label">Masukan Link Embed Video</label> 
                                        </span>
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="link_embed">
                                        </div>
                                    </div>
                                    <div class="form-group" id="videogalerizzz">
                                        <span class="input-group-addons">
                                              <label class="form-label">Tambah Video</label> 
                                        </span>
                                        <div class="form-line">
                                            <input type="file" class="form-control" name="video_galeri">
                                        </div>
                                    </div>
                                    <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                                </form>
                              </div>
                            <hr>
                        </div>

                       
                    <div class="body">

                        <form method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <span class="input-group-addons">
                                      <label class="form-label">Tambah Foto</label> 
                                </span>
                                <div class="form-line">
                                    <input type="file" class="form-control" name="foto_galeri">
                                </div>
                            </div>
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form><br />

                        <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Foto</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php  foreach($rs_galerigambar as $gambar): ?>
                                       <tr>
                                        <td><img src="<?php echo base_url();?>assets/images/galeri/gambar/<?php echo $gambar['foto_galeri']; ?>" class="img-responsive"></td>
                                        <td> 
                               <a type="button" class="btn bg-red waves-effect" data-type="cancel" href="<?php echo site_url('admin2/galeri_gambar_del');echo "/".$gambar['id_gambar'];?>">   <i class="material-icons">clear</i></a> </button> </td>
                                    </tr>
                                 <?php endforeach;?>
                                    </tbody>
                                </table>

                        
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>