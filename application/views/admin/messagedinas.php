<section class="content">
    <div class="">
        <div class="row clearfix">
        	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                    	Data Pesan
                        <div class="right">
                            <button class="btn btn-sm btn-primary" id="btnbuatpesanzzz">Buat Pesan</button>
                        </div>
                    </div>
                    <div class="body">
                    	<div class="row">
                            <div id="formpesanzzz" style="display: none; margin-left: 10px;">
                                <form id="form_validation" method="POST" enctype="multipart/form-data">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <label>Gambar</label>
                                            <input type="file" name="gambar_message" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <textarea rows="4" class="form-control no-resize" id="isipesan" name="pesan" placeholder="Silahkan Isi Pesan..." required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-primary" type="submit">Kirim</button>
                                        <a href="<?php echo site_url(); ?>/dinas/message" class="btn btn-sm btn-danger">Tutup</a>
                                    </div>
                                </form>
                            </div>
                            <?php foreach($rs_message as $message => $msg) { ?>
                                <div class="panel panel-default panel-post">
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo base_url(); ?>assets/images/akundinas/photo_profile/<?php echo $msg['user_pic']; ?>" width="40px" height="40px;" />
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#"><?php echo $rs_user['nama']; ?></a>
                                                </h4>
                                                Pesan - <?php echo $msg['tanggal']; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-body">
                                        <div class="post">
                                            <div class="post-heading">
                                                <p><?php echo $msg['pesan']; ?></p>
                                            </div>
                                            <div class="post-content">
                                                <?php
                                                    if($msg['gambar_message'] != '')
                                                    {
                                                        ?>
                                                        <img src="<?php echo base_url();?>assets/images/message/<?php echo $msg['gambar_message'] ?>" class="img-responsive" />
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <ul>
                                            <li>
                                                <a href="<?php echo site_url(); ?>/dinas/detailmessage/<?php echo $msg['id_message']; ?>">
                                                    <i class="material-icons">comment</i>
                                                    <span>5 respon</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo site_url(); ?>/dinas/deletemessage/<?php echo $msg['id_message']; ?>">
                                                    <i class="material-icons">delete</i>
                                                    <span>hapus</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php } ?>
                    	</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>