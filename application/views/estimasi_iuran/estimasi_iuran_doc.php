 
    <body>
        <h2>Estimasi_iuran List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Jenis Id</th>
		<th>Subkategori Id</th>
		<th>Nilai</th>
		<th>Quantity</th>
		<th>Tot Bayar</th>
		<th>Jhitungadmin1</th>
		<th>Jhitungadmin2</th>
		<th>Jhitungadmin3</th>
		<th>Jpemadmin</th>
		<th>User Id</th>
		<th>Update At</th>
		<th>Creaate At</th>
		
            </tr><?php
            foreach ($estimasi_iuran_data as $estimasi_iuran)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $estimasi_iuran->jenis_id ?></td>
		      <td><?php echo $estimasi_iuran->subkategori_id ?></td>
		      <td><?php echo $estimasi_iuran->nilai ?></td>
		      <td><?php echo $estimasi_iuran->quantity ?></td>
		      <td><?php echo $estimasi_iuran->tot_bayar ?></td>
		      <td><?php echo $estimasi_iuran->jhitungadmin1 ?></td>
		      <td><?php echo $estimasi_iuran->jhitungadmin2 ?></td>
		      <td><?php echo $estimasi_iuran->jhitungadmin3 ?></td>
		      <td><?php echo $estimasi_iuran->jpemadmin ?></td>
		      <td><?php echo $estimasi_iuran->user_id ?></td>
		      <td><?php echo $estimasi_iuran->update_at ?></td>
		      <td><?php echo $estimasi_iuran->creaate_at ?></td>	
                </tr>
                <?php
            }
            ?>
        