<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/E/core/init.php';
	if(!has_permission('admin')){
		permission_error_redirect('index.php');
	}
	include 'includes/head.php';
	include 'includes/navigation.php';

	$productQ = $db->query("SELECT * FROM products WHERE deleted = 1");
	if(isset($_GET['restore'])){
		$id = sanitize($_GET['restore']);
		$db->query("UPDATE products SET deleted = 0 WHERE id = '$id' ");
		header('Location : archived_products.php');
	}
?>

<h2 class="text-center">Archived Products</h2><br><br>
<table class="table table-bordered table-condensed table-striped">
	<thead>
		<th></th>
		<th>Product</th>
		<th>Price</th>
		<th>Category</th>
		<th>Sold</th>
	</thead>
	<tbody>
		<?php while($product = mysqli_fetch_assoc($productQ)) : 
			$childID = $product['categories'];
			$result = $db->query("SELECT * FROM categories WHERE id = '{$childID}'");
			$child = mysqli_fetch_assoc($result);
			$parentID = $child['parent'];
			$presult = $db->query("SELECT * FROM categories WHERE id = '$parentID'");
			$parent = mysqli_fetch_assoc($presult);
			$category = $parent['category'].' ~ '.$child['category'];
		?>
		<tr>
			<td>
				<a class="btn btn-xs btn-default" href="archived_products.php?restore=<?php echo $product['id']; ?>"><span class="glyphicon glyphicon-refresh"></span></a>
			</td>
			<td><?php echo $product['title']; ?></td>
			<td><?php echo money($product['price']); ?></td>
			<td><?php echo $category; ?></td>
			
			<td>0</td>
		</tr>
		<?php endwhile; ?>
	</tbody>
</table>

<?php include 'includes/footer.php';?>