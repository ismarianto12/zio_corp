
    <section class="content">
        <div class="">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            Event Yang Terlaksana
                        </div>
                        <div class="body">
                            <?php  foreach($done_event as $row): ?>      
                                <div class="card">
                                    <div class="header bg-green">
                                        <h2>
                                            <?php echo $row['event_title'];?> <small><?php echo $row['start_date'];?></small>
                                        </h2>
                                        <ul class="header-dropdown m-r-0">
                                            <li class="dropdown">
                                                <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                
                                                   <i class="material-icons col-light-green">done</i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <?php echo $row['event_description'];?><br>
                                           Lokasi : <?php echo $row['event_location'];?><br>
                                           Tanggal Event: <?php echo $row['start_date']; ?><br>
                                           Status: Selesai <br />
                                           <button class="btn bg-cyan waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo $row['id'];?>" aria-expanded="false"
                                    aria-controls="collapseExample<?php echo $row['id'];?>">
                                                Gambar
                                            </button>
                                            <div class="collapse" id="collapseExample<?php echo $row['id'];?>">
                                                <div class="well">
                                                   <?php if($row['foto']==NULL)
                                                   {
                                                    $gambar=base_url()."assets/images/noimage.jpg";
                                                   }else{
                                                    $gambar=base_url()."assets/images/events/".$row['foto'];
                                                   }
                                                   ?>
                                                    <img src="<?php echo $gambar;?>" width="100%"/>
                                                </div>
                                            </div>
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