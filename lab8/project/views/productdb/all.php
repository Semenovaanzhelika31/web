<h1><?= $h1 ?></h1>
<table>
	<tr><th>id</th><th>название</th><th>цена</th><th>количество</th><th>ссылка</th></tr>
	<?php foreach ($products as $product): ?>
	<tr>
		<td><?= $product['id'] ?></td>
		<td><?= $product['name'] ?></td>
		<td><?= $product['price'] ?></td>
		<td><?= $product['quantity'] ?></td>
		<td><a href="<?= BASE_PATH ?>/db-product/<?= $product['id'] ?>/">подробнее</a></td>
	</tr>
	<?php endforeach; ?>
</table>
