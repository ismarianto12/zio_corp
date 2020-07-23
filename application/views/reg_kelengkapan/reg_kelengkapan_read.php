<link href="<?= base_url('assets/css/sweet-alert.css') ?>" rel="stylesheet" />
<script type="text/javascript" src="<?= base_url('assets/js/sweet-alert.js') ?>"></script>
<section class="content">
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2>Data list Kelengkapan</h2>
				</div>
				<div class="body" style="overflow: auto;">

					<div class='row'>
						<div class='col-sm-12'>
							<?= $this->session->userdata('message') ?>
							<div class='white-box'>
								<h3 class='box-title m-b-0'><?= ucfirst($page_title) ?></h3>
								<div class='table-responsive'> 
									<table class="table">
										<tr>
											<td>No Registrasi</td>
											<td><?php echo $no_registrasi; ?></td>
										</tr>
										<tr>
											<td>Form Pendaftar</td>
											<td><?php echo $form_pendaftar; ?></td>
										</tr>
										<tr>
											<td>Ktp</td>
											<td><?php echo $ktp; ?></td>
										</tr>
										<tr>
											<td>Npwp</td>
											<td><?php echo $npwp; ?></td>
										</tr>
										<tr>
											<td>Pas Foto</td>
											<td><?php echo $pas_foto; ?></td>
										</tr>
										<tr>
											<td>Data Orang Tua</td>
											<td><?php echo $data_orang_tua; ?></td>
										</tr>
										<tr>
											<td>Data Ujian</td>
											<td><?php echo $data_ujian; ?></td>
										</tr>
										<tr>
											<td>Data Ijazah</td>
											<td><?php echo $data_ijazah; ?></td>
										</tr>
										<tr>
											<td>Data Nilai</td>
											<td><?php echo $data_nilai; ?></td>
										</tr>
										<tr>
											<td>Data Sertifikat</td>
											<td><?php echo $data_sertifikat; ?></td>
										</tr>
										<tr>
											<td>Create At</td>
											<td><?php echo $create_at; ?></td>
										</tr>
										<tr>
											<td>Upatated At</td>
											<td><?php echo $upatated_at; ?></td>
										</tr>
										<tr>
											<td>Created By</td>
											<td><?php echo $created_by; ?></td>
										</tr>
										<tr>
											<td></td>
											<td><a href="<?php echo site_url('reg_kelengkapan') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td>
										</tr>
									</table>
								</div>
							</div>
						</div>
					</div>
</section>