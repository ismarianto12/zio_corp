<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    Data Dinas
                </div>
                <div class="body">
                    <form method="POST" style="">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="keyword" autocomplete="off">
                                        <label class="form-label">Cari Nama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
                                <button type="submit" class="btn-sm btn btn-primary"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <?php foreach($rs_member as $m => $dinas) { ?>
                            <div class="col-md-6 col-sm-6 col-lg-6 col-xs-6">
                                <div class="card profile-card">
                                    <div class="card profile-card">
                                        <a href="<?php echo site_url(); ?>/<?php echo $link; ?>/doneevent2/<?php echo $dinas['id_user']; ?>">
                                            <div class="profile-header" style="background-color: transparent; padding: 0px 0;">
                                                <?php if($dinas['foto_sampul'] != '') { ?>
                                                     <img src="<?php echo base_url(); ?>assets/images/akundinas/photo_profile/<?php echo $dinas['foto_sampul']; ?>" alt="AdminBSB - Profile Image" width="100%" height="100px;" />
                                                <?php } else { ?>
                                                    <img src="<?php echo base_url(); ?>assets/images/akundinas/photo_profile/noimage.jpg" alt="AdminBSB - Profile Image" width="100%" height="100px;" />
                                                <?php } ?>
                                            </div>
                                            <div class="profile-body">
                                                <div class="image-area" style="border: none;">
                                                    <?php if($dinas['user_pic'] != '') { ?>
                                                        <img src="<?php echo base_url(); ?>assets/images/akundinas/photo_profile/<?php echo $dinas['user_pic']; ?>" alt="AdminBSB - Profile Image" width="50%" height="70px;" />
                                                    <?php } else { ?>
                                                        <img src="<?php echo base_url(); ?>assets/images/akundinas/photo_profile/noimage.jpg" alt="AdminBSB - Profile Image" width="50%" height="70px;"/>
                                                    <?php } ?>
                                                </div>
                                                <div class="content-area">
                                                    <p><?php echo $dinas['nama']; ?></p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>