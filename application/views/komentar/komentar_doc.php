 
    <body>
        <h2>Komentar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Komentar</th>
		<th>Updated At</th>
		<th>Created At</th>
		<th>User Id</th>
		
            </tr><?php
            foreach ($komentar_data as $komentar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $komentar->komentar ?></td>
		      <td><?php echo $komentar->updated_at ?></td>
		      <td><?php echo $komentar->created_at ?></td>
		      <td><?php echo $komentar->user_id ?></td>	
                </tr>
                <?php
            }
            ?>
        