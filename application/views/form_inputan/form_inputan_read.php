<?php
if ($get == 'yes') { ?>
	<link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
<?php
}
?>
<section class="content">
	<div class="">
		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					<div class="header">
						<h2><i class="material-icons col-light-blue">mms</i><?= ucfirst(strtolower($page_title)) ?></h2>
					</div>
					<div class="body" style="overflow: auto;">
						<div class='table-responsive'>

							<table class="table">
								<tr>
									<td>Nama</td>
									<td><?php echo $nama; ?></td>
								</tr>
								<tr>
									<td>Email</td>
									<td><?php echo $email; ?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td><?php echo $alamat; ?></td>
								</tr>
								<tr>
									<td>Nomor Pendaftaran</td>
									<td><?php echo $nomor_pendaftaran; ?></td>
								</tr>
								<tr>
									<td>Area</td>
									<td><?php echo $area; ?></td>
								</tr>
								<tr>
									<td>Penerima</td>
									<td><?php echo $penerima; ?></td>
								</tr>
								<tr>
									<td>Alamat penerima</td>
									<td><?php echo $alamatpen; ?></td>
								</tr>
								<tr>
									<td>Tanggal</td>
									<td><?php echo $tanggal; ?></td>
								</tr>
								<tr>
									<td>Transportasi Angkutan</td>
									<td><?php echo $transportasi_angkutan; ?></td>
								</tr>
								<tr>
									<td>Keterangan</td>
									<td><?php echo $keterangan; ?></td>
								</tr>
								<tr>
									<td>Nilai</td>
									<td><?php echo number_format($nilai,0,0,'.'); ?></td>
								</tr>
								<tr>
									<td>Jenis1</td>
									<td><?php echo $jenis1; ?></td>
								</tr>
								<tr>
									<td>Ukuran1</td>
									<td><?php echo $ukuran1; ?></td>
								</tr>
								<tr>
									<td>Jumlah1</td>
									<td><?php echo $jumlah1; ?></td>
								</tr>
								<tr>
									<td>Satuan1</td>
									<td><?php echo $satuan1; ?></td>
								</tr>
								<tr>
									<td>Keterangan1</td>
									<td><?php echo $keterangan1; ?></td>
								</tr>
								<tr>
									<td>Jenis2</td>
									<td><?php echo $jenis2; ?></td>
								</tr>
								<tr>
									<td>Ukuran2</td>
									<td><?php echo $ukuran2; ?></td>
								</tr>
								<tr>
									<td>Jumlah2</td>
									<td><?php echo $jumlah2; ?></td>
								</tr>
								<tr>
									<td>Satuan2</td>
									<td><?php echo $satuan2; ?></td>
								</tr>
								<tr>
									<td>Keterangan2</td>
									<td><?php echo $keterangan2; ?></td>
								</tr>
								<tr>
									<td>Jenis3</td>
									<td><?php echo $jenis3; ?></td>
								</tr>
								<tr>
									<td>Ukuran3</td>
									<td><?php echo $ukuran3; ?></td>
								</tr>
								<tr>
									<td>Jumlah3</td>
									<td><?php echo number_format($jumlah3, 0, 0, '.');; ?></td>
								</tr>
								<tr>
									<td>Satuan3</td>
									<td><?php echo $satuan3; ?></td>
								</tr>
								<tr>
									<td>Keterangan3</td>
									<td><?php echo $keterangan3 ?></td>
								</tr>
								<tr>
									<td>Jenis4</td>
									<td><?php echo $jenis4 ?></td>
								</tr>
								<tr>
									<td>Ukuran4</td>
									<td><?php echo $ukuran4; ?></td>
								</tr>
								<tr>
									<td>Jumlah4</td>
									<td><?php echo number_format($jumlah4, 0, 0, '.'); ?></td>
								</tr>
								<tr>
									<td>Satuan4</td>
									<td><?php echo $satuan4; ?></td>
								</tr>
								<tr>
									<td>Keterangan4</td>
									<td><?php echo $keterangan4 ?></td>
								</tr>
								<tr>
									<td>Jenis5</td>
									<td><?php echo $jenis5 ?></td>
								</tr>
								<tr>
									<td>Ukuran5</td>
									<td><?php echo $ukuran5; ?></td>
								</tr>
								<tr>
									<td>Jumlah5</td>
									<td><?php echo number_format($jumlah5, 0, 0, '.'); ?></td>
								</tr>
								<tr>
									<td>Satuan5</td>
									<td><?php echo $satuan5; ?></td>
								</tr>
								<tr>
									<td>Keterangan5</td>
									<td><?php echo $keterangan5; ?></td>
								</tr>

								<tr>
									<td><a href="<?php echo site_url('form_inputan/detail/' . $id . '/?print=yes') ?>" class="btn btn-default"><i class='fa fa-print'></i>Print</a></td>
									<td><a href="<?php echo site_url('form_inputan') ?>" class="btn btn-default"><i class='fa fa-home'></i>Back To Home</a></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>