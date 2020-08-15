<section class="content">
    <div class="">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>Data list form inputan</h2>
                    </div>
                    <div class="body" style="overflow: auto;"> 
                    <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered'>
                    <input type="hidden" name="redirect" value="<?= base_url().$this->uri->segment(1) ?>">
                        <div class='form-body'>
                            ** ) Harap Isikan data yang di butuhkan pada form.
                            <br /><br /><br /><br />
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Nama<?php echo form_error('nama') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Email<?php echo form_error('email') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="alamat" class='control-label col-md-3'><b>Alamat<?php echo form_error('alamat') ?></b></label>

                                <div class='col-md-9'>
                                    <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Nomor Pendaftaran<?php echo form_error('nomor_pendaftaran') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="nomor_pendaftaran" id="nomor_pendaftaran" placeholder="Nomor Pendaftaran" value="<?php echo $nomor_pendaftaran; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Area<?php echo form_error('area') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="area" id="area" placeholder="Area" value="<?php echo $area; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Penerima<?php echo form_error('penerima') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="penerima" id="penerima" placeholder="Penerima" value="<?php echo $penerima; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Alamatpen<?php echo form_error('alamatpen') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="alamatpen" id="alamatpen" placeholder="Alamatpen" value="<?php echo $alamatpen; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="date" class='control-label col-md-3'><b>Tanggal<?php echo form_error('tanggal') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Transportasi Angkutan<?php echo form_error('transportasi_angkutan') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="transportasi_angkutan" id="transportasi_angkutan" placeholder="Transportasi Angkutan" value="<?php echo $transportasi_angkutan; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Keterangan<?php echo form_error('keterangan') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan" value="<?php echo $keterangan; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Nilai<?php echo form_error('nilai') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="number" class="form-control" name="nilai" id="nilai" placeholder="Nilai" value="<?php echo $nilai; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jenis .1<?php echo form_error('jenis1') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jenis1" id="jenis1" placeholder="Jenis1" value="<?php echo $jenis1; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Ukuran .1<?php echo form_error('ukuran1') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="ukuran1" id="ukuran1" placeholder="Ukuran1" value="<?php echo $ukuran1; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jumlah .1<?php echo form_error('jumlah1') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jumlah1" id="jumlah1" placeholder="Jumlah1" value="<?php echo $jumlah1; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Satuan .1<?php echo form_error('satuan1') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="satuan1" id="satuan1" placeholder="Satuan1" value="<?php echo $satuan1; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Keterangan .1<?php echo form_error('keterangan1') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="keterangan1" id="keterangan1" placeholder="Keterangan1" value="<?php echo $keterangan1; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jenis .2<?php echo form_error('jenis2') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jenis2" id="jenis2" placeholder="Jenis2" value="<?php echo $jenis2; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Ukuran .2<?php echo form_error('ukuran2') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="ukuran2" id="ukuran2" placeholder="Ukuran2" value="<?php echo $ukuran2; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jumlah .2<?php echo form_error('jumlah2') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jumlah2" id="jumlah2" placeholder="Jumlah2" value="<?php echo $jumlah2; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Satuan .2<?php echo form_error('satuan2') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="satuan2" id="satuan2" placeholder="Satuan2" value="<?php echo $satuan2; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Keterangan .2<?php echo form_error('keterangan2') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="keterangan2" id="keterangan2" placeholder="Keterangan2" value="<?php echo $keterangan2; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jenis .3<?php echo form_error('jenis3') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jenis3" id="jenis3" placeholder="Jenis3" value="<?php echo $jenis3; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Ukuran .3<?php echo form_error('ukuran3') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="ukuran3" id="ukuran3" placeholder="Ukuran3" value="<?php echo $ukuran3; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jumlah .3<?php echo form_error('jumlah3') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jumlah3" id="jumlah3" placeholder="Jumlah3" value="<?php echo $jumlah3; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Satuan .3<?php echo form_error('satuan3') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="satuan3" id="satuan3" placeholder="Satuan3" value="<?php echo $satuan3; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Keterangan .3<?php echo form_error('keterangan3') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="keterangan3" id="keterangan3" placeholder="Keterangan3" value="<?php echo $keterangan3; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jenis .4<?php echo form_error('jenis4') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jenis4" id="jenis4" placeholder="Jenis4" value="<?php echo $jenis4; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Ukuran .4<?php echo form_error('ukuran4') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="ukuran4" id="ukuran4" placeholder="Ukuran4" value="<?php echo $ukuran4; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jumlah .4<?php echo form_error('jumlah4') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jumlah4" id="jumlah4" placeholder="Jumlah4" value="<?php echo $jumlah4; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Satuan .4<?php echo form_error('satuan4') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="satuan4" id="satuan4" placeholder="Satuan4" value="<?php echo $satuan4; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Keterangan4<?php echo form_error('keterangan4') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="keterangan4" id="keterangan4" placeholder="Keterangan4" value="<?php echo $keterangan4; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jenis5<?php echo form_error('jenis5') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jenis5" id="jenis5" placeholder="Jenis5" value="<?php echo $jenis5; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Ukuran5<?php echo form_error('ukuran5') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="ukuran5" id="ukuran5" placeholder="Ukuran5" value="<?php echo $ukuran5; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Jumlah5<?php echo form_error('jumlah5') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="jumlah5" id="jumlah5" placeholder="Jumlah5" value="<?php echo $jumlah5; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Satuan5<?php echo form_error('satuan5') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="satuan5" id="satuan5" placeholder="Satuan5" value="<?php echo $satuan5; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="varchar" class='control-label col-md-3'><b>Keterangan5<?php echo form_error('keterangan5') ?></b></label>
                                <div class='col-md-9'>
                                    <input type="text" class="form-control" name="keterangan5" id="keterangan5" placeholder="Keterangan5" value="<?php echo $keterangan5; ?>" />
                                </div>
                            </div> 
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />  
                            <div class='form-actions'>
                                <div class='row'>
                                    <div class='col-md-12'>
                                        <div class='row'>
                                            <div class='col-md-offset-3 col-md-9'> 
                                                <button type="submit" class="btn btn-info"><i class='fa fa-check'></i>Simpan </button>
                                                <a href="<?= site_url() ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>  
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
</section>