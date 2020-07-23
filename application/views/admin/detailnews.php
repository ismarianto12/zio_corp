<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        Detail Data News
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="panel panel-default panel-post">
                                <div class="panel-heading">
                                    <div class="media">
                                        <div class="media-left">
                                            <?php if($rs_news['user_pic'] != ""){ ?>
                                                <img src="<?php echo base_url(); ?>assets/images/bupati/photo_profile/<?php echo $rs_news['user_pic']; ?>" width="40px" height="40px" />
                                            <?php } else { ?>
                                                <a href="#">
                                                    <img src="<?php echo base_url(); ?>assets/images/user-lg.jpg" />
                                                </a>
                                            <?php } ?>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="#"><?php echo $rs_news['nama']; ?></a>
                                            </h4>
                                            <?php if($this->session->userdata('id_user') == '0'){ echo "Admin"; }else{ echo "Admin"; } ?>
                                            - <?php echo $rs_news['created_at']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="post">
                                        <div class="post-heading">
                                            <p><?php echo $rs_news['judul']; ?></p>
                                        </div>
                                        <div class="post-content">
                                            <?php if($rs_news['gambar'] != ""){ ?>
                                                <img src="<?php echo base_url();?>assets/images/news/<?php echo $rs_news['gambar'] ?>" class="img-responsive" />
                                            <?php } ?>
                                            <div style="margin-top: 10px; margin-left: 10px; margin-right: 10px;">
                                            <p>
                                                <?php echo $rs_news['isi'] ?>
                                            </p>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />
                        <?php foreach($rs_detailnews as $dn => $detail){?>
                            <div class="media">
                                <div class="media-left">
                                    <?php if($detail->user_pic != ""){ ?>
                                        <a href="#">
                                            <img src="<?php echo base_url(); ?>assets/images/bupati/photo_profile/<?php echo $detail->user_pic; ?>" width="64" height="50" />
                                        </a>
                                    <?php } else { ?>
                                        <a href="javascript:void(0);">
                                            <img class="media-object" src="http://placehold.it/64x64" width="64" height="50">
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $detail->nama; ?></h4> 
                                    <?php if($detail->role == '0'){ echo "Admin"; }else if($detail->role == '1'){ echo "Bupati"; }else if($detail->role == '2'){ echo "Dinas"; } ?> 
                                    - <?php echo $detail->tanggal_respon; ?><br />
                                        <?php
                                            if($detail->status_respon == 'Aktif')
                                            {
                                                $classLabel = 'label label-danger';
                                                $kataLabel = 'Non Aktifkan Respon';
                                                $kataRespon = $detail->respon;
                                                $colorRespon = '';
                                            }
                                            else
                                            {
                                                $classLabel = 'label label-success';
                                                $kataLabel = 'Aktifkan Respon';
                                                $kataRespon = '<span style="color: red;">Respon ini telah di non aktifkan oleh admin</span>';
                                            }
                                        ?>
                                        <?php if($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1'){ ?>
                                            <a class="<?php echo $classLabel; ?>" href="<?php echo site_url(); ?>/<?php echo $link; ?>/nonaktifrespon/<?php echo $detail->id_detailnews; ?>/<?php echo $detail->id_news; ?>/<?php echo $detail->status_respon ?>"> <?php echo $kataLabel; ?>
                                            </a> &nbsp; | &nbsp; 
                                        <?php } ?>
                                        
                                        <?php if($this->session->userdata('id_role') == '0' || $this->session->userdata('id_role') == '1' || $this->session->userdata('id_user') == $detail->id_user) { ?>    
                                            <a class="label label-danger" href="<?php echo site_url(); ?>/<?php echo $link; ?>/hapusdetailnews/<?php echo $detail->id_detailnews; ?>/<?php echo $detail->id_news; ?>">
                                                Hapus
                                            </a>
                                        <?php } ?>
                                </div>
                                <p style="margin-top: 10px;"><?php echo $kataRespon; ?></p>
                            </div>
                            <hr />
                        <?php } ?>
                        
                        <?php 
                            if($rs_news['status_kolom_respon'] == 'Aktif')
                            {
                                ?>
                                <form id="form_validation" method="POST">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" id="balasan" name="respon" placeholder="Respon..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn bg-light-blue waves-effect">
                                            <i class="material-icons">send</i>
                                            <span>Balas</span>
                                        </button>
                                    </div>
                                </form>

                            <?php
                            }
                            else
                            {
                                ?>
                                    <p style="color: red; margin-bottom: 10px;">Kolom respon telah di non aktifkan oleh admin</p>
                                <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>