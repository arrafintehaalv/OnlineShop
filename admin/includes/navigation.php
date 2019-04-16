<!-- Top Navbar  -->
	<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<a href="/E/admin/index.php" class="navbar-brand">Shaunta's Boutique Admin</a>
		<ul class="nav navbar-nav">
			<li><a href="brands.php">Brands</a></li>
			<li><a href="categories.php">Categories</a></li>
			<li><a href="products.php">Products</a></li>
			<li><a href="archived_products.php">Archived Products</a></li>
			<?php if(has_permission('admin')): ?>
				<li><a href="users.php">Users</a></li>
			<?php endif; ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hello <?=$user_data['last']?>!
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					<li><a href="change_password.php">Change Password</a></li>
					<li><a href="logout.php">Log Out</a></li>
				</ul>
			</li>

				<!-- Menu Items -->
			<!--<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $parent['category']; ?><span class="caret"></span></a>
				<ul class="dropdown-menu" role="menu">
					
					<li><a href="#"><?php echo $child['category'] ?></a></li>
				
				</ul>
			</li> -->	
		
		
	</div>
	</nav>