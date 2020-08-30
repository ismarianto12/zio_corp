<link href="<?= base_url('assets/css/sweet-alert.css') ?>" rel="stylesheet" />
<script type="text/javascript" src="<?= base_url('assets/js/sweet-alert.js') ?>"></script>
<?php
$role = $this->session->id_role;
$role_ck = ($role == 0) ? 'readonly' : '';
?>
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
                            <div class='white-box'>
                                <center>
                                    <h3 class='box-title m-b-0'>Form Estimasi Iuran </h3>
                                    <sub><b>Nomor Form : <?= $no_form ?></b></sub>
                                </center>
                                <form action="<?php echo $action; ?>" method="post" class='form-horizontal form-bordered'>
                                    <div class='form-body'>
                                        <br /><br /><br /><br />
                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Jenis Iuran <?php echo form_error('jenis_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="type_id" id="type">
                                                    <?php
                                                    $data = $this->db->get_where('jenis', ['category !=' => '1']);
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
                                                <select class="form-control" name="subkategori_id" id="subkategori_id" required>
                                                    <option value="">--Pilih Sub -- </option>
                                                    <?php
                                                    $sdata = $this->db->get_where('subkategori', ['category !=' => '1']);
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

                                        <div class="form-group" id="jhitungadmin1">
                                            <label for="varchar" class='control-label col-md-3'><b>B. Jasa Hitung admin 1<?php echo form_error('jhitungadmin1') ?></b></label>
                                            <div class='col-md-9'>
                                                <input type="text" class="form-control" name="jhitungadmin1" id="jhitungadmin1" placeholder="Jasa Hitung admin 1" value="2.000" <?= $role_ck ?> />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Jenis<?php echo form_error('jenis_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jenis_id" id="jenis_id1">
                                                    <?php
                                                    $data = $this->db->get_where('jenis', ['category' => '1']);
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
                                        <div class="form-group" id="jsubkategori_id1">
                                            <label for="int" class='control-label col-md-3'><b>Subkategori <?php echo form_error('subkategori_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jsubkategori_id" id="jsubkategori_id">
                                                    <?php
                                                    $sdata = $this->db->get_where('subkategori', ['category' => '1']);
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
                                            <label for="varchar" class='control-label col-md-3'><b>C. Jasa Hitung admin 1 <?php echo form_error('jhitungadmin2') ?></b></label>
                                            <div class='col-md-9'>
                                                <input type="text" class="form-control" name="jhitungadmin2" id="jhitungadmin2" placeholder="Jasa Hitung admin" value="2.000" <?= $role_ck ?> />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Jenis <?php echo form_error('jenis_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jenis_id" id="jenis_id2" required>
                                                    <option val=""> - Silahkan Pilih Sub Kategori - </option>
                                                    <?php
                                                    $data = $this->db->get_where('jenis', ['category' => '1']);
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
                                        <div class="form-group" id="jsubkategori_id2">
                                            <label for="int" class='control-label col-md-3'><b>Subkategori <?php echo form_error('subkategori_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jsubkategori_id" id="jsubkategori_id" required>
                                                    <option val=""> - Silahkan Pilih Sub Kategori - </option>
                                                    <?php
                                                    $sdata = $this->db->get_where('subkategori', ['category' => '1']);
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
                                            <label for="varchar" class='control-label col-md-3'><b>D. Jasa Hitung admin 1 <?php echo form_error('jhitungadmin3') ?></b></label>
                                            <div class='col-md-9'>
                                                <input type="text" class="form-control" name="jhitungadmin3" id="jhitungadmin3" placeholder="Jasa Hitung admin" value="2.000" <?= $role_ck ?> />
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="int" class='control-label col-md-3'><b>Jenis <?php echo form_error('jenis_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jenis_id" id="jenis_id3">
                                                    <?php
                                                    $data = $this->db->get_where('jenis', ['category' => '1']);
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
                                        <div class="form-group" id="jsubkategori_id3">
                                            <label for="int" class='control-label col-md-3'><b>Subkategori <?php echo form_error('subkategori_id') ?></b></label>
                                            <div class='col-md-9'>
                                                <select class="form-control" name="jsubkategori_id" id="jsubkategori_id">
                                                    <?php
                                                    $sdata = $this->db->get_where('subkategori', ['category' => '1']);
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
                                                <input type="text" class="form-control" name="jpemadmin" id="jpemadmin" placeholder="Jasa Pembayaran admin" value="5000" <?= $role_ck ?> />
                                                <small> * ) Nilai Yang di tetapkan 50.000, entri data jika ingin mengubah</small>
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

                                        <?php if ($this->session->id_role != '') {  ?>
                                            <div class="form-group">
                                                <label for="int" class='control-label col-md-3'><b>User Id<?php echo form_error('user_id') ?></b></label>
                                                <div class='col-md-9'>
                                                    <?= $this->session->userdata('username') ?>
                                                </div>
                                            </div>
                                        <?php } else {
                                        } ?>

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
                    $('#jsubkategori_id1').hide();
                    $('#jsubkategori_id2').hide();
                    $('#jsubkategori_id3').hide();

                    $('#jenis_id1').change(function() {
                        var jenis_id1 = $(this).val();
                        if (jenis_id1 == 9) {
                            $('#jsubkategori_id1').show();
                        } else {
                            $('#jsubkategori_id1').hide();
                        }
                    });


                    $('#jenis_id2').change(function() {
                        jenis_id3 = $(this).val();
                        if (jenis_id3 == 9) {
                            $('#jsubkategori_id2').show();
                        } else {
                            $('#jsubkategori_id2').hide();
                        }
                    });

                    $('#jenis_id3').change(function() {
                        jenis_id3 = $(this).val();
                        if (jenis_id3 == 9) {
                            $('#jsubkategori_id3').show();
                        } else {
                            $('#jsubkategori_id3').hide();
                        }
                    });

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
                        $('#tot_bayar').html('<div class="alert alert-info">Sedang Meload data ..</div>');

                        nilai = parseInt($('#nilai').val());
                        jhitungadmin1 = 2000;
                        jhitungadmin2 = 2000;
                        jhitungadmin3 = 2000;
                        jpemadmin = $('#jpemadmin').val();

                        if (nilai == '') {
                            swal('error', 'silahkan entrikan nilai terlebih dahulu');
                        } else {
                            var total = (parseInt(this.value) * parseInt(nilai)) + parseInt(jhitungadmin1) + parseInt(jhitungadmin2) + parseInt(jhitungadmin3) + parseInt(jpemadmin);
                            //$('#tot_bayar').attr('readonly', true);
                            var n = total.toFixed(2);
                            $("#tot_bayar").val(n);
                        }
                    });
                });
            </script>

            <script>
                $(function() {
                    //hitung admin 1   
                    $('#subkategori_id').hide();
                    $('#jhitungadmin1').hide();
                    $('#type_id').on('change', function() {
                        $('#subkategori_id').show();

                    });
                    $('#subkategori_id').on('change', function() {
                        $('#jhitungadmin1').show();

                    });

                    //hitung admin 2  
                    $('#jsubkategori_id1').hide();
                    $('#jhitungadmin3').hide();
                    $('#jenis_id2').val();

                    $('#jenis_id1').on('change', function() {
                        $('#jsubkategori_id1').show();
                        $('#jenis_id2').show();
                        $('#jhitungadmin3').show();

                    });
                    $('#jhitungadmin2').hide();
                    $('#jsubkategori_id1').on('change', function() {
                        $('#jhitungadmin2').show();

                    });


                    //hitung admin 3 
                    $('#jpemadmin').hide();
                    $('#jenis_id3').on('change', function() {
                        $('#jpemadmin').show();
                    });
                    // $('#jsubkategori_id1').on('change', function() {
                    //     $('#jhitungadmin2').show();

                    // });
                    // //hitung admin 4
                    // $('#subkategori_id').on('change', function() {

                    // });
                });
            </script>