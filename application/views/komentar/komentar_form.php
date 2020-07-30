<section class="content">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2><?= ucfirst($page_title) ?></h2>
                </div>
                <div class="body" style="overflow: auto;">
                    <div class='row'>
                        <div class='col-sm-12'>
                            <?= $this->session->flashdata('message') ?>
                            <div class=\'white-box\'>
                                <h3 class=\'box-title m-b-0\'></h3>
                                <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered'>
                                    <div class='form-body'>

                                        <br /><br /><br /><br />
                                        <div class="form-group">
                                            <label for="komentar" class='control-label col-md-3'><b>Komentar<?php echo form_error('komentar') ?></b></label>

                                            <div class='col-md-9'>
                                                <textarea class="form-control" rows="3" name="komentar" id="komentar" placeholder="Komentar"><?php echo $komentar; ?></textarea>
                                            </div>
                                        </div>

                                        <input type="hidden" name="id" value="<?php echo $id; ?>" />


                                        <div class='form-actions'>
                                            <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='row'>
                                                        <div class='col-md-offset-3 col-md-9'>
                                                            <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button>
                                                            <a href="<?php echo site_url('komentar') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>