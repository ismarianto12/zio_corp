<section class="content">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    Data Alumni/Member
                </div>
                <div class="body">
                    <form method="POST" style="">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9" style="margin-bottom: 0px;">
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="keyword" autocomplete="off">
                                        <label class="form-label">Cari Nama</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3" style="margin-bottom: 0px;">
                                <button type="submit" class="btn-sm btn btn-primary"><i class="material-icons">search</i></button>
                            </div>
                        </div>
                    </form>

                    <div class="row">
                        <div class="panel panel-default panel-post" style="border-color: transparent;">
                            <?php foreach($rs_member as $m => $dinas) { ?>
                                <?php if($this->session->userdata('id_role') == '0'){ ?>
                                        <div class="panel-heading">
                                            <div class="media">
                                                <div class="media-left">
                                                    <img src="<?php echo base_url(); ?>assets/images/bupati/photo_profile/<?php echo $dinas['user_pic']; ?>" width="50px;" width="50px" />
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading">
                                                        <a href="<?php echo site_url(); ?>/<?php echo $link; ?>/detailmember/<?php echo $dinas['id_user']; ?>"><?php echo $dinas['nama']; ?></a>
                                                    </h4>
                                                    Member
                                                </div>
                                            </div>
                                        </div>
                                <?php } else { ?>
                                    <div class="panel-heading">
                                        <div class="media">
                                            <div class="media-left">
                                                <img src="<?php echo base_url(); ?>assets/images/bupati/photo_profile/<?php echo $dinas['user_pic']; ?>" width="50px;" width="50px" />
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">
                                                    <a href="#"><?php echo $dinas['nama']; ?></a>
                                                </h4>
                                                Member
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>