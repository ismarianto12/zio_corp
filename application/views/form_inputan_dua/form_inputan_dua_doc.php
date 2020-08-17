 
    <body>
        <h2>Form_inputan_dua List</h2>
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
            foreach ($form_inputan_dua_data as $form_inputan_dua)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $form_inputan_dua->nama ?></td>
		      <td><?php echo $form_inputan_dua->email ?></td>
		      <td><?php echo $form_inputan_dua->alamat ?></td>
		      <td><?php echo $form_inputan_dua->nomor_pendaftaran ?></td>
		      <td><?php echo $form_inputan_dua->area ?></td>
		      <td><?php echo $form_inputan_dua->penerima ?></td>
		      <td><?php echo $form_inputan_dua->alamatpen ?></td>
		      <td><?php echo $form_inputan_dua->tanggal ?></td>
		      <td><?php echo $form_inputan_dua->transportasi_angkutan ?></td>
		      <td><?php echo $form_inputan_dua->keterangan ?></td>
		      <td><?php echo $form_inputan_dua->nilai ?></td>
		      <td><?php echo $form_inputan_dua->jenis1 ?></td>
		      <td><?php echo $form_inputan_dua->ukuran1 ?></td>
		      <td><?php echo $form_inputan_dua->jumlah1 ?></td>
		      <td><?php echo $form_inputan_dua->satuan1 ?></td>
		      <td><?php echo $form_inputan_dua->keterangan1 ?></td>
		      <td><?php echo $form_inputan_dua->jenis2 ?></td>
		      <td><?php echo $form_inputan_dua->ukuran2 ?></td>
		      <td><?php echo $form_inputan_dua->jumlah2 ?></td>
		      <td><?php echo $form_inputan_dua->satuan2 ?></td>
		      <td><?php echo $form_inputan_dua->keterangan2 ?></td>
		      <td><?php echo $form_inputan_dua->jenis3 ?></td>
		      <td><?php echo $form_inputan_dua->ukuran3 ?></td>
		      <td><?php echo $form_inputan_dua->jumlah3 ?></td>
		      <td><?php echo $form_inputan_dua->satuan3 ?></td>
		      <td><?php echo $form_inputan_dua->keterangan3 ?></td>
		      <td><?php echo $form_inputan_dua->jenis4 ?></td>
		      <td><?php echo $form_inputan_dua->ukuran4 ?></td>
		      <td><?php echo $form_inputan_dua->jumlah4 ?></td>
		      <td><?php echo $form_inputan_dua->satuan4 ?></td>
		      <td><?php echo $form_inputan_dua->keterangan4 ?></td>
		      <td><?php echo $form_inputan_dua->jenis5 ?></td>
		      <td><?php echo $form_inputan_dua->ukuran5 ?></td>
		      <td><?php echo $form_inputan_dua->jumlah5 ?></td>
		      <td><?php echo $form_inputan_dua->satuan5 ?></td>
		      <td><?php echo $form_inputan_dua->keterangan5 ?></td>
		      <td><?php echo $form_inputan_dua->user_id ?></td>
		      <td><?php echo $form_inputan_dua->date_created ?></td>
		      <td><?php echo $form_inputan_dua->date_updated ?></td>	
                </tr>
                <?php
            }
            ?>
        