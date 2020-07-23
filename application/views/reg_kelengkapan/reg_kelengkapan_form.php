<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2><?= strip_tags($page_title) ?></h2>
                    </div>
                    <div class="body" style="overflow: auto;">
                        <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered'>
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />

                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>No Registrasi<?php echo form_error('no_registrasi') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" placeholder="No Registrasi" value="<?php echo $no_registrasi; ?>" />
                                </div>
                            </div>

                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="checkbox" id="form_pendaftar" name="form_pendaftar" class="filled-in" value="1">
                                <label for="form_pendaftar"><b>Form Pendaftar<?php echo form_error('form_pendaftar') ?></b></label>
                            </div>

                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="checkbox" id="ktp" name="ktp" class="filled-in" value="1">
                                <label for="ktp"><b>KTP <?php echo form_error('ktp') ?></b></label>
                            </div>

                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="checkbox" id="npwp" name="npwp" class="filled-in" value="1">
                                <label for="npwp">Npwp <?php echo form_error('npwp') ?></label>
                            </div>
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="checkbox" id="pas_foto" name="pas_foto" class="filled-in" value="1">
                                <label for="pas_foto">Pas Foto <?php echo form_error('pas_foto') ?></label>
                            </div>
                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="checkbox" id="data_orang_tua" name="data_orang_tua" class="filled-in" value="1">
                                <label for="data_orang_tua">Data Orang Tua <?php echo form_error('data_orang_tua') ?></label>
                            </div>

                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="checkbox" id="data_ujian" name="data_ujian" class="filled-in" value="1">
                                <label for="data_ujian">Data Ujian <?php echo form_error('data_ujian') ?></label>
                            </div>

                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="checkbox" id="data_ijazah" name="data_ijazah" class="filled-in" value="1">
                                <label for="data_ijazah">Data Ijazah <?php echo form_error('data_ijazah') ?></label>
                            </div>

                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="checkbox" id="data_nilai" name="data_nilai" class="filled-in" value="1">
                                <label for="data_nilai">Data Nilai <?php echo form_error('data_nilai') ?></label>
                            </div>

                            <div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">
                                <input type="checkbox" id="data_sertifikat" name="data_sertifikat" class="filled-in" value="1">
                                <label for="data_sertifikat">Data Sertifikat <?php echo form_error('data_sertifikat') ?></label>
                            </div>

                            <div class='form-actions'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='row'>
                                            <div class='col-md-offset-3 col-md-9'>
                                                <button type="submit" class="btn btn-info"><i class='fa fa-check'></i><?php echo $button ?></button>
                                                <a href="<?php echo site_url('reg_kelengkapan') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


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