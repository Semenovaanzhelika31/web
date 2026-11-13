<h1><?= $h1 ?></h1>
<table>
	<tr><th>id</th><th>name</th><th>age</th><th>salary</th></tr>
	<?php foreach ($users as $id => $user): ?>
	<tr>
		<td><?= $id ?></td>
		<td><?= $user['name'] ?></td>
		<td><?= $user['age'] ?></td>
		<td><?= $user['salary'] ?></td>
	</tr>
	<?php endforeach; ?>
</table>
