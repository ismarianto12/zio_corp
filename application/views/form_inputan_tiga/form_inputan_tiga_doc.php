 
    <body>
        <h2>Form_inputan_tiga List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>Email</th>
		<th>Alamat</th>
		<th>Nomor Pendaftaran</th>
		<th>Area</th>
		<th>Penerima</th>
		<th>Alamat penerima</th>
		<th>Tanggal</th>
		<th>Transportasi Angkutan</th>
		<th>Keterangan</th>
		<th>Nilai</th>
		<th>Jenis1</th>
		<th>Ukuran1</th>
		<th>Jumlah1</th>
		<th>Satuan1</th>
		<th>Keterangan1</th>
		<th>Jenis2</th>
		<th>Ukuran2</th>
		<th>Jumlah2</th>
		<th>Satuan2</th>
		<th>Keterangan2</th>
		<th>Jenis3</th>
		<th>Ukuran3</th>
		<th>Jumlah3</th>
		<th>Satuan3</th>
		<th>Keterangan3</th>
		<th>Jenis4</th>
		<th>Ukuran4</th>
		<th>Jumlah4</th>
		<th>Satuan4</th>
		<th>Keterangan4</th>
		<th>Jenis5</th>
		<th>Ukuran5</th>
		<th>Jumlah5</th>
		<th>Satuan5</th>
		<th>Keterangan5</th>
		<th>User Id</th>
		<th>Date Created</th>
		<th>Date Updated</th>
		
            </tr><?php
            foreach ($form_inputan_tiga_data as $form_inputan_tiga)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $form_inputan_tiga->nama ?></td>
		      <td><?php echo $form_inputan_tiga->email ?></td>
		      <td><?php echo $form_inputan_tiga->alamat ?></td>
		      <td><?php echo $form_inputan_tiga->nomor_pendaftaran ?></td>
		      <td><?php echo $form_inputan_tiga->area ?></td>
		      <td><?php echo $form_inputan_tiga->penerima ?></td>
		      <td><?php echo $form_inputan_tiga->alamatpen ?></td>
		      <td><?php echo $form_inputan_tiga->tanggal ?></td>
		      <td><?php echo $form_inputan_tiga->transportasi_angkutan ?></td>
		      <td><?php echo $form_inputan_tiga->keterangan ?></td>
		      <td><?php echo $form_inputan_tiga->nilai ?></td>
		      <td><?php echo $form_inputan_tiga->jenis1 ?></td>
		      <td><?php echo $form_inputan_tiga->ukuran1 ?></td>
		      <td><?php echo $form_inputan_tiga->jumlah1 ?></td>
		      <td><?php echo $form_inputan_tiga->satuan1 ?></td>
		      <td><?php echo $form_inputan_tiga->keterangan1 ?></td>
		      <td><?php echo $form_inputan_tiga->jenis2 ?></td>
		      <td><?php echo $form_inputan_tiga->ukuran2 ?></td>
		      <td><?php echo $form_inputan_tiga->jumlah2 ?></td>
		      <td><?php echo $form_inputan_tiga->satuan2 ?></td>
		      <td><?php echo $form_inputan_tiga->keterangan2 ?></td>
		      <td><?php echo $form_inputan_tiga->jenis3 ?></td>
		      <td><?php echo $form_inputan_tiga->ukuran3 ?></td>
		      <td><?php echo $form_inputan_tiga->jumlah3 ?></td>
		      <td><?php echo $form_inputan_tiga->satuan3 ?></td>
		      <td><?php echo $form_inputan_tiga->keterangan3 ?></td>
		      <td><?php echo $form_inputan_tiga->jenis4 ?></td>
		      <td><?php echo $form_inputan_tiga->ukuran4 ?></td>
		      <td><?php echo $form_inputan_tiga->jumlah4 ?></td>
		      <td><?php echo $form_inputan_tiga->satuan4 ?></td>
		      <td><?php echo $form_inputan_tiga->keterangan4 ?></td>
		      <td><?php echo $form_inputan_tiga->jenis5 ?></td>
		      <td><?php echo $form_inputan_tiga->ukuran5 ?></td>
		      <td><?php echo $form_inputan_tiga->jumlah5 ?></td>
		      <td><?php echo $form_inputan_tiga->satuan5 ?></td>
		      <td><?php echo $form_inputan_tiga->keterangan5 ?></td>
		      <td><?php echo $form_inputan_tiga->user_id ?></td>
		      <td><?php echo $form_inputan_tiga->date_created ?></td>
		      <td><?php echo $form_inputan_tiga->date_updated ?></td>	
                </tr>
                <?php
            }
            ?>
        