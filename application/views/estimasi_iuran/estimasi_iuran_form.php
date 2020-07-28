<link href="<?= base_url('assets/css/sweet-alert.css') ?>" rel="stylesheet" />
<script type="text/javascript" src="<?= base_url('assets/js/sweet-alert.js') ?>"></script>

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
                            <center>     
                            <h3 class='box-title m-b-0'>Form Estimasi Iuran </h3>
                            <sub><b>Nomor Form : A/12-2020/A</b></sub>
                            </center>
                                <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered'>
                                    <div class='form-body'> 
                                        <br /><br /><br /><br />
                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Jenis Iuran <?php echo form_error('jenis_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jenis_id" id="jenis_id">
                                                    <?php 
                                                    $data = $this->db->get_where('jenis',['category !='=>'1']);
                                                    foreach ($data->result_array() as $dat) {
                                                        $selected = ($dat['id'] == $jenis_id) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?= $dat['id'] ?>" <?= $selected  ?>><?= $dat['jenisnm'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Subkategori <?php echo form_error('subkategori_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="subkategori_id" id="subkategori_id">
                                                    <?php
                                                    $sdata = $this->db->get_where('subkategori',['category !='=>'1']);
                                                    foreach ($sdata->result_array() as $ldat) {
                                                        $selected = ($ldat['id'] == $subkategori_id) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?= $ldat['id'] ?>" <?= $selected  ?>><?= ucfirst($ldat['kategorinm']) ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="varchar" class='control-label col-md-3'><b>B. Jasa Hitung admin 1<?php echo form_error('quantity') ?></b></label>
                                            <div class='col-md-9'>
                                                <input type="text" class="form-control" name="jhitungadmin1" id="jhitungadmin1" placeholder="Jasa Hitung admin 1" value="<?php echo $jhitungadmin1; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Jenis<?php echo form_error('jenis_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jenis_id" id="jenis_id">
                                                    <?php 
                                                    $data = $this->db->get_where('jenis',['category'=>'1']);
                                                    foreach ($data->result_array() as $dat) {
                                                        $selected = ($dat['id'] == $jenis_id) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?= $dat['id'] ?>" <?= $selected  ?>><?= $dat['jenisnm'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Subkategori <?php echo form_error('subkategori_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="subkategori_id" id="subkategori_id">
                                                    <?php
                                                    $sdata = $this->db->get_where('subkategori',['category'=>'1']);
                                                    foreach ($sdata->result_array() as $ldat) {
                                                        $selected = ($ldat['id'] == $subkategori_id) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?= $ldat['id'] ?>" <?= $selected  ?>><?= ucfirst($ldat['kategorinm']) ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="varchar" class='control-label col-md-3'><b>C. Jasa Hitung admin 1 <?php echo form_error('quantity') ?></b></label>
                                            <div class='col-md-9'>
                                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Jenis <?php echo form_error('jenis_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jenis_id" id="jenis_id">
                                                    <?php 
                                                    $data = $this->db->get_where('jenis',['category'=>'1']);
                                                    foreach ($data->result_array() as $dat) {
                                                        $selected = ($dat['id'] == $jenis_id) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?= $dat['id'] ?>" <?= $selected  ?>><?= $dat['jenisnm'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Subkategori <?php echo form_error('subkategori_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="subkategori_id" id="subkategori_id">
                                                    <?php
                                                    $sdata = $this->db->get_where('subkategori',['category'=>'1']);
                                                    foreach ($sdata->result_array() as $ldat) {
                                                        $selected = ($ldat['id'] == $subkategori_id) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?= $ldat['id'] ?>" <?= $selected  ?>><?= ucfirst($ldat['kategorinm']) ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="varchar" class='control-label col-md-3'><b>D. Jasa Hitung admin 1 <?php echo form_error('quantity') ?></b></label>
                                            <div class='col-md-9'>
                                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Jenis <?php echo form_error('jenis_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jenis_id" id="jenis_id">
                                                    <?php 
                                                    $data = $this->db->get_where('jenis',['category'=>'1']);
                                                    foreach ($data->result_array() as $dat) {
                                                        $selected = ($dat['id'] == $jenis_id) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?= $dat['id'] ?>" <?= $selected  ?>><?= $dat['jenisnm'] ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Subkategori <?php echo form_error('subkategori_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="subkategori_id" id="subkategori_id">
                                                    <?php
                                                    $sdata = $this->db->get_where('subkategori',['category'=>'1']);
                                                    foreach ($sdata->result_array() as $ldat) {
                                                        $selected = ($ldat['id'] == $subkategori_id) ? 'selected' : '';
                                                        ?>
                                                        <option value="<?= $ldat['id'] ?>" <?= $selected  ?>><?= ucfirst($ldat['kategorinm']) ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="varchar" class='control-label col-md-3'><b>E. Jasa Pembayaran admin <?php echo form_error('quantity') ?></b></label>
                                            <div class='col-md-9'>
                                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Jasa Pembayaran admin" value="5000" readonly/>
                                            </div>
                                        </div>

  
                                        <div class="form-group">
                                            <label for="varchar" class='control-label col-md-3'><b>Tot Bayar<?php echo form_error('tot_bayar') ?></b></label>
                                            <div class='col-md-9'>
                                                <input type="text" class="form-control" name="tot_bayar" id="tot_bayar" placeholder="Tot Bayar" value="<?php echo $tot_bayar; ?>" />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="varchar" class='control-label col-md-3'><b>Nilai<?php echo form_error('nilai') ?></b></label>
                                            <div class='col-md-9'>
                                                <div id="tampil_nilai"></div>
                                                <input type="hidden" class="form-control" name="nilai" id="nilai" placeholder="Nilai" /> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="varchar" class='control-label col-md-3'><b>Quantity<?php echo form_error('quantity') ?></b></label>
                                            <div class='col-md-9'>
                                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Quantity" value="<?php echo $quantity; ?>" />
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>User Id<?php echo form_error('user_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <?= $this->session->userdata('username') ?>
                                            </div>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                        <input type="hidden" name="user_id" value="<?php echo $this->session->id_user; ?>" />

                                        <div class='form-actions'>
                                            <div class='row'>
                                                <div class='col-md-12'>
                                                    <div class='row'>
                                                        <div class='col-md-offset-3 col-md-9'>
                                                            <button type="submit" class="btn btn-info"><i class='fa fa-save'></i>Simpan Data</button>
                                                            <a href="<?php echo site_url('estimasi_iuran') ?>" class="btn btn-default"><i class='fa fa-share'></i>Cancel</a>


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

            <script>
                $(function() {
                    $('#subkategori_id').change(function() {
                        var subkategori_id = $(this).val();
                        $.ajax({
                            url: '<?= base_url('subkategori/get_id') ?>',
                            type: 'POST',
                            data: 'subkategori_id=' + subkategori_id,
                            dataType: 'json',
                            success: function(data) {
                                swal('success', 'Nilai adalah ' + data.nilai);
                                $('#tampil_nilai').html('<b>Nilai :</b>' + data.nilai);
                                $('#nilai').val(data.nilai);
                            },
                            error: function(error, data, xhr) {
                                alert('error' + error);
                            }
                        });
                    });

                    //get total data
                    var total = 0;
                    $('#tot_bayar').attr('readonly', true);
                    $('#tot_bayar').html('<div class="alert alert-info">Sedang Meload data ..</div>');

                    $("#quantity").keyup(function() {
                        nilai = parseInt($('#nilai').val());
                        if (nilai == '') {
                            swal('error', 'silahkan entrikan nilai terlebih dahulu');
                        } else {
                            total = parseInt(this.value) * parseInt(nilai);
                            $('#tot_bayar').attr('readonly', true);
                            $("#tot_bayar").val(total);
                        }
                    });
                });
            </script>