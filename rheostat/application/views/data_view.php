
	<table border="1">
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Birth Day</th>
			<th>Gender</th>
			<th>Address</th>
			<th>User Type</th>
			<th>Email</th>
			<th>Tel Number</th>
			<th>Registered Date</th>
		</tr>
		<?php if(isset($record)) : foreach($record as $row): ?>
                <?php echo "<tr>";?>
				<?php echo "<td>".$row->first_name."</td>";?>
				<?php echo "<td>".$row->last_name."</td>";?>
				<?php echo "<td>".$row->birth_day."</td>";?>
				<?php echo "<td>".$row->gender."</td>";?>
				<?php echo "<td>".$row->address."</td>";?>
				<?php echo "<td>".$row->user_type."</td>";?>
				<?php echo "<td>".$row->e_mail."</td>";?>
				<?php echo "<td>".$row->tel_number."</td>";?>
				<?php echo "<td>".$row->registered_date."</td>";?>
				<?php endforeach; ?>
				<?php echo "</tr>";?>
				<?php else: ?>				
				No records were returned.
		<?php endif; ?>
		
		
	</table> 

