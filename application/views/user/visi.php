    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    Visi & Misi
                  
                </h2>
            </div>
            <!-- Basic Validation -->

        <div class="row clearfix">
                
                        
                <?php foreach ($rs_visi as $row) {
                    # code...
                ?>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 ol-sm-12 col-md-12 col-lg-12">
                                    <div class="panel-group" id="accordion_13" role="tablist" aria-multiselectable="true">
                                        <div class="panel panel-col-pink">
                                            <div class="panel-heading" role="tab" id="headingOne_13">
                                                <h4 class="panel-title">
                                                    <a role="button" data-toggle="collapse" data-parent="#accordion_13" href="#collapseOne_13" aria-expanded="true" aria-controls="collapseOne_13">
                                                       Visi
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne_13" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne_13">
                                                <div class="panel-body">
                                                    <?php echo $row['visi'];?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel panel-col-pink">
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
                                        </div>
                                        
                                </div>

                                 
                             </div>
                        </div>
                    </div>
                </div>
                <?php } 
                ?>
        </div> 
    </section>