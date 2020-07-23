
    <section class="content">
        <div class="">
            
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            Mading Hari ini
                        </div>
                        <div class="body">
                            <?php  foreach($event as $row): ?>      
                                <div class="card">
                                    <div class="header bg-green">
                                        <h2>
                                            <?php echo $row['event_title'];?> <small><?php echo $row['start_date'];?></small>
                                        </h2>
                                        <ul class="header-dropdown m-r-0">
                                            <?php
                                                if($row['status'] == 'Selesai')
                                                {
                                                    $statusa = 'Selesai';
                                                    ?>
                                                        <li class="dropdown">
                                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                            
                                                               <i class="material-icons col-light-green">done</i>
                                                            </a>
                                                        </li>
                                                    <?php
                                                }
                                                else
                                                {
                                                    $statusa = 'Belum';
                                                    ?>
                                                        <li class="dropdown">
                                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a href="<?php echo site_url()?>/<?php echo $link; ?>/selesaikanevent/<?php echo $row['id'] ?>">Selesaikan</a></li>
                                                            </ul>
                                                        </li>
                                                    <?php
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                    <div class="body">
                                        <?php echo $row['event_description'];?><br>
                                           Lokasi : <?php echo $row['event_location'];?><br>
                                           Tanggal Event: <?php echo $row['start_date']; ?><br>
                                           Status: <?php echo $statusa; ?><br />
                                           
                                           <?php if($row['status'] == 'Selesai') { ?>
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
                                          <?php } ?>
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