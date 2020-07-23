    <section class="content">
        <div class="">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                             Slide Foto & Running Text
                            </h2>
                        </div>
                        <div class="body">

                        <form id="form_validation" method="POST" enctype="multipart/form-data">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="hidden" name="id" value="<?php echo $rs_marque['id_marque']; ?>">
                                    <input type="text" class="form-control" name="isi" required value="<?php echo $rs_marque['isi']; ?>">
                                    <label class="form-label">Running Text</label>
                                </div>
                            </div>

                             <div class="form-group form-float">
                                <label class="form-label">Slide Foto</label>
                                <input type="file" class="form-control" name="foto">
                            </div>
                            
                            <button class="btn btn-primary waves-effect" type="submit">SUBMIT</button>
                        </form>
                        <br />
                          
             <?php
            $message = $this->session->flashdata('message');
            echo $message == '' ? '' : '<div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                '.$message.'</div>';?>
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
                                    <?php  foreach($rs_slide as $row): ?>
                                       <tr>
                                        <td><img src="<?php echo base_url(); ?>/assets/images/slidefoto/<?php echo $row['foto'];?>" class="img-responsive"/></td>
                                        <td>
                               <a type="button" class="btn bg-red waves-effect" data-type="cancel" href="<?php echo site_url('admin2/slide_del');echo "/".$row['id_slide'];?>">   <i class="material-icons">clear</i></a></td>
                                    </tr>
                                 <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>