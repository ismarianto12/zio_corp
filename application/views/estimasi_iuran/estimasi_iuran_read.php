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
								<div class='form-horizontal form-bordered'>
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
												<select class="form-control" name="subkategori_id" id="subkategori_id">
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

										<div class="form-group">
											<label for="varchar" class='control-label col-md-3'><b>B. Jasa Hitung admin 1<?php echo form_error('jhitungadmin1') ?></b></label>
											<div class='col-md-9'>
												<input type="text" class="form-control" name="jhitungadmin1" id="jhitungadmin1" placeholder="Jasa Hitung admin 1" value="<?php echo $jhitungadmin1; ?>" />
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
												<input type="text" class="form-control" name="jhitungadmin2" id="jhitungadmin2" placeholder="Jasa Hitung admin" value="<?php echo $jhitungadmin2; ?>" />
											</div>
										</div>

										<div class="form-group">
											<label for="int" class='control-label col-md-3'><b>Jenis <?php echo form_error('jenis_id') ?></b></label>
											<div class='col-md-9'>
												<select class="form-control" name="jenis_id" id="jenis_id2">
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
											<label for="varchar" class='control-label col-md-3'><b>D. Jasa Hitung admin 1 <?php echo form_error('jhitungadmin3') ?></b></label>
											<div class='col-md-9'>
												<input type="text" class="form-control" name="jhitungadmin3" id="jhitungadmin3" placeholder="Jasa Hitung admin" value="<?php echo $jhitungadmin3; ?>" />
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
												<input type="text" class="form-control" name="jpemadmin" id="jpemadmin" placeholder="Jasa Pembayaran admin" value="5000" readonly />
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


										<div class="form-group">
											<label for="int" class='control-label col-md-3'><b>User Id<?php echo form_error('user_id') ?></b></label>
											<div class='col-md-9'>
												<?= $this->session->userdata('username') ?>
											</div>
										</div>
										<input type="hidden" name="id" value="<?php echo $id; ?>" />
										<input type="hidden" name="user_id" value="<?php echo $this->session->id_user; ?>" />

									</div>
								</div>
							</div>
						</div>

					</div>

					<a href="" class="btn btn-primary">Cetak Data</a>
				</div>
			</div>
		</div>
	</div>
</section>