<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Cari Nomor Registrasi</h2>
                    </div>
                    <div class="body" style="overflow: auto;">

                        <form action="" method="post" class='form-horizontal form-bordered'>
                            <div class='form-body'>
                                ** ) Entrikan No Registrasi.
                                <br /><br /><br /><br />
                                <div class="form-group">
                                    <label for="varchar" class='control-label col-md-3'><b>No Registrasi</b></label>
                                    <div class='col-md-9'>
                                        <input type="text" class="form-control" name="no_registrasi" id="no_registrasi" placeholder="No Registrasi" value="" />
                                    </div>
                                </div>
                            </div>

                            <div class='form-actions'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='row'>
                                            <div class='col-md-offset-3 col-md-9'>
                                                <button type="submit" name="kirim" class="btn btn-info"><i class='fa fa-check'></i>Check Data</button>
                                                <a href="<?php echo site_url('reg_kelengkapan') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php if (isset($_POST['kirim'])) {  ?>
                            <div class='row'>
                                <div class='col-sm-12'>
                                    <div class='white-box'>
                                        <h3 class='box-title m-b-0'>Detail Nomor Registrasi <?= $no_registrasi ?></h3>
                                        <div class='table-responsive'>
                                            <table class="table">
                                                <tr>
                                                    <td>No Registrasi</td>
                                                    <td><?php echo ($no_registrasi) ?  $no_registrasi :'<div class="alert alert-danger">Maaf system tidak menemukan no registrasi '.$this->input->post('no_registrasi').'</div>'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Form Pendaftar</td>
                                                    <td><?php echo ($form_pendaftar) ? 'Ada' :'Tidak ada'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Ktp</td>
                                                    <td><?php echo ($ktp) ? 'Ada' : 'Tidak ada'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Npwp</td>
                                                    <td><?php echo ($npwp) ? 'Ada' : 'Tidak ada'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Pas Foto</td>
                                                    <td><?php echo ($pas_foto) ? 'Ada' : 'Tidak ada'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Data Orang Tua</td>
                                                    <td><?php echo ($data_orang_tua) ? 'Ada' : 'Tidak ada'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Data Ujian</td>
                                                    <td><?php echo ($data_ujian) ? 'Ada' : 'Tidak ada'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Data Ijazah</td>
                                                    <td><?php echo ($data_ijazah) ? 'Ada' : 'Tidak ada'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Data Nilai</td>
                                                    <td><?php echo ($data_nilai) ? 'Ada' : 'Tidak ada'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td>Data Sertifikat</td>
                                                    <td><?php echo ($data_sertifikat) ? 'Ada' : 'Tidak ada'; ?></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td><a href="<?php echo site_url() ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
</section>