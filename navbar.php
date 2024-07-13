
<nav class="navbar navbar-expand-lg navbar-dark sticky-top" style="background-color:brown;">
	<a class="navbar-brand" href="#">
      <img src="assets/img/<?php echo $_SESSION['shop_img']?>" alt="Shop Name" width="35" height="35" style="border-radius: 20px;"><?php echo "  ". $_SESSION['shop_name'] ?>
    </a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNav">
		<ul class="navbar-nav m-auto">
			<li class="nav-item">
				<a href="index.php?page=home " class="nav-link nav-home" aria-current="page"><span class='icon-field'><i class="fa fa-home"></i></span> Home</a>
			</li>
			<li class="nav-item">
				<a href="index.php?page=inventory" class="nav-link nav-inventory"><span class='icon-field'><i class="fa fa-list"></i></span> Inventory</a>
			</li>
			<li class="nav-item">
				<a href="index.php?page=sales" class="nav-link nav-sales"><span class='icon-field'><i class="fa fa-coins"></i></span> Sales</a>
			</li>
			<?php if ($_SESSION['login_type'] == 2) : ?>
				<li class="nav-item">
					<a href="index.php?page=product" class="nav-link nav-product"><span class='icon-field'><i class="fa fa-boxes"></i></span> Product List</a>
				</li>
			<?php endif; ?>
			<li class="nav-item">
				<a href="index.php?page=receiving" class="nav-link"><span class='icon-field'><i class="fa fa-file-alt"></i></span> Receiving</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" ><span class='icon-field'><i class="fa fa-list"></i></span>
					Lists
				</a>
				<ul class="dropdown-menu" style="background-color:brown;">
					<li class="nav-item">
						<a href="index.php?page=categories" class="dropdown-item"><span class='icon-field'><i class="fa fa-list"></i></span> Category List</a>
					</li>
					<li class="nav-item">
						<a href="index.php?page=product" class="dropdown-item"><span class='icon-field'><i class="fa fa-boxes"></i></span> Product List</a>
					</li>
					<li class="nav-item">
						<a href="index.php?page=supplier" class="dropdown-item"><span class='icon-field'><i class="fa fa-truck-loading"></i></span> Supplier List</a>
					</li>
					<li class="nav-item">
						<a href="index.php?page=customer" class="dropdown-item"><span class='icon-field'><i class="fa fa-user-friends"></i></span> Customer List</a>
					</li>
					<li class="nav-item">
						<a href="index.php?page=credit" class="dropdown-item"><span class='icon-field'><i class="fa fa-credit-card"></i></span> Udhaar List</a>
					</li>
				</ul>
			</li>
			<li class="nav-item">
				<a href="index.php?page=expenses" class="nav-link"><span class='icon-field'><i class="fa fa-money-bill"></i></span> Extra Expenses</a>
			</li>
			<?php if ($_SESSION['login_type'] == 1) : ?>
				<li class="nav-item">
					<a href="index.php?page=users" class="nav-link"><span class='icon-field'><i class="fa fa-users"></i></span> Users</a>
				</li>
			<?php endif; ?>
			<li class="nav-item">
				<a href="index.php?page=account" class="nav-link"><span class='icon-field'><i class="fa fa-portrait"></i></span> Account</a>
			</li>
			<li class="nav-item">
				<a href="ajax.php?action=logout" class="nav-link nav-logout mx-auto"><span class='icon-field'><i class="fa fa-power-off"></i></span> Logout</a>
			</li>
		</ul>
	</div>
</nav>

<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>
<?php if ($_SESSION['login_type'] != 1) : ?>
	<style>
		.nav-link {
			display: none !important;
		}

		.nav-sales,
		.nav-home,
		.nav-logout,
		.nav-inventory,
		.nav-product {
			display: block !important;
		}
	</style>
<?php endif ?>