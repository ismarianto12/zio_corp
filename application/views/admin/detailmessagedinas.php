<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        Detail Data Pesan
                    </div>
                    <div class="body">
                        <div class="row">
                            <div class="panel panel-default panel-post">
                                <div class="panel-heading">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="<?php echo base_url(); ?>assets/images/akundinas/photo_profile/<?php echo $rs_message['user_pic']; ?>" width="40px" height="40px;" />
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">
                                                <a href="#"><?php echo $rs_message['nama']; ?></a>
                                            </h4>
                                            Pesan - <?php echo $rs_message['tanggal']; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div class="post">
                                        <div class="post-heading">
                                            <p><?php echo $rs_message['pesan']; ?></p>
                                        </div>
                                        <div class="post-content">
                                            <?php
                                                if($rs_message['gambar_message'] != '')
                                                {
                                                    ?>
                                                    <img src="<?php echo base_url();?>assets/images/message/<?php echo $rs_message['gambar_message'] ?>" class="img-responsive" />
                                                    <?php
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php foreach($rs_detailmessage as $dm => $detail){?>
                            <div class="media">
                                <div class="media-left">
                                    <?php if($detail->user_pic != ""){ 
                                        if($detail->role == '0') { ?>
                                            <a href="#">
                                                <img src="<?php echo base_url(); ?>assets/images/profile/<?php echo $detail->user_pic; ?>" width="64" height="55" />
                                            </a>
                                        <?php } else if($detail->role == '1') { ?>
                                            <a href="#">
                                                <img src="<?php echo base_url(); ?>assets/images/bupati/photo_profile/<?php echo $detail->user_pic; ?>" width="64" height="55" />
                                            </a>
                                        <?php } else if($detail->role == '2') { ?>
                                            <a href="#">
                                                <img src="<?php echo base_url(); ?>assets/images/akundinas/photo_profile/<?php echo $detail->user_pic; ?>" width="64" height="55" />
                                            </a>
                                        <?php } ?>
                                    <?php } else { ?>
                                        <a href="javascript:void(0);">
                                            <img class="media-object" src="http://placehold.it/64x64" width="64" height="64">
                                        </a>
                                    <?php } ?>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><?php echo $detail->nama; ?> <?php if($this->session->userdata('id_user') != $detail->id_user) { echo '(Admin)'; } ?></h4> Pesan - <?php echo $detail->tanggal; ?><br /> 
                                        <?php if($this->session->userdata('id_user') == $detail->id_user) { ?>
                                        <a href="<?php echo site_url(); ?>/dinas/hapusdetailmessage/<?php echo $detail->id_detail; ?>/<?php echo $detail->id_message; ?>">
                                            Hapus
                                        </a>
                                        <?php } ?>
                                </div>
                                <p style="margin-top: 10px;"><?php echo $detail->balasan; ?></p>
                            </div>
                            <hr />
                        <?php } ?>

                        <form id="form_validation" method="POST">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" id="balasan" name="balasan" placeholder="Balas Pesan...." required></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn bg-light-blue waves-effect">
                                    <i class="material-icons">send</i>
                                    <span>Balas</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>