  
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                 Event
              
                </h2>
            </div>
            
            <!-- Exportable Table -->
            
                        <?php 
                        $tgl=date('Y-m-d');
                        foreach ($event as $row1) { 
                          if($row1['start_date']>$tgl)
                            {
                                $warna="bg-green";}
                        else{
                                $warna="bg-cyan";
                            }

                            ?>
                       <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> 
                         <div class="card">
                        <div class="header <?php echo $warna;?>">
                            <h2>
                                <?php echo $row1['event_title'];?> <small><?php echo $row1['start_date'];?></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li>
                                    <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse" data-loading-color="amber">
                                       
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                      
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                           <?php echo $row1['event_description'];?><br>
                           Lokasi : <?php echo $row1['event_location'];?>
                        </div>
                    </div>
                </div>
                <?php } /* ?>
                  <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                     <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                              
                                <li role="presentation"><a href="#next_event" data-toggle="tab">Event Selanjutnya</a></li>
                                <li role="presentation"><a href="#last_event" data-toggle="tab">Last Event</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                  
                                <div role="tabpanel" class="tab-pane fade" id="next_event">
                                    <?php foreach ($next_event as $row2) {
                                        
                                   ?>
                                    <b><?php echo $row2['event_title'];?></b><small><br><?php echo $row2['start_date'];?>.</small>
                                    <?php echo $row2['event_description'];?>
                                   <hr>
                                <?php } ?>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="last_event">
                                    <?php foreach ($last_event as $row3) {
                                     ?>
                                    <b><?php echo $row3['event_title'];?> </b>
                                    <br>
                                    <?php echo $row3['start_date'];?>
                                    <p>
                                       <?php echo $row3['event_description'];?>
                                    </p>
                                    <hr>
                                <?php } ?>
                                </div>
                                
                            </div>
                        </div>
                        </div> 
                        <?php */ ?>
                    </div>
                </div>
          
    </section>

