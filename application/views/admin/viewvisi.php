    <section class="content">
        <div class="container-fluid">
            <!-- Basic Validation -->

        <div class="row clearfix">
                
                        
                <?php foreach ($rs_visi as $row) {
                    # code...
                ?>
                <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                    <div class="panel-group" id="accordion_13" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingOne_13">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_13" href="#collapseOne_13" aria-expanded="true" aria-controls="collapseOne_13">
                                                       Pengumuman
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_13" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_13">
                                                <div class="panel-body">
                                                    <?php if($row['gambar_misi'] != '') { ?> 
                                                        <div class="thumbnail">
                                                        <img src="<?php echo base_url();?>assets/images/misi/<?php echo $row['gambar_misi'] ?>" class="img-responsive">
                                                        </div>
                                                    <?php } ?>
                                                    <h3>Pengumuman 1 </h3>
                                                    <p>
                                                        <?php echo $row['visi'];?>
                                                    </p>
                                                    <h3>Pengumuman 2
                                                    </h3>
                                                    <p>
                                                        <?php echo $row['misi'];?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                       <!--  <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingTwo_13">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_13" href="#collapseTwo_13" aria-expanded="false"
                                                       aria-controls="collapseTwo_13">
                                                        Misi
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo_13" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_13">
                                                <div class="panel-body">
                                                   <?php echo $row['misi'];?>
                                                </div>
                                            </div>
                                        </div> -->
                                        
                                </div>

                                 
                             </div>
                        </div>
                    </div>
                <?php } 
                ?>
        </div> 
    </section>