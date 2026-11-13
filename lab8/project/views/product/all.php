<h1>Все продукты</h1>
<table>
	<tr><th>id</th><th>name</th><th>price</th><th>quantity</th><th>category</th><th>ссылка</th></tr>
	<?php foreach ($products as $id => $product): ?>
	<tr>
		<td><?= $id ?></td>
		<td><?= $product['name'] ?></td>
		<td><?= $product['price'] ?></td>
		<td><?= $product['quantity'] ?></td>
		<td><?= $product['category'] ?></td>
		<td><a href="<?= BASE_PATH ?>/product/<?= $id ?>/">подробнее</a></td>
	</tr>
	<?php endforeach; ?>
</table>
