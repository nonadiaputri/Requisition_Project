<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php 
foreach($css_files as $file): ?>
	<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
</head>
<body>
	<div>
		<a href='<?php echo site_url('grocery_crud/examples/customers_management')?>'>Customers</a> |
		<a href='<?php echo site_url('grocery_crud/examples/orders_management')?>'>Orders</a> |
		<a href='<?php echo site_url('grocery_crud/examples/products_management')?>'>Products</a> |
		<a href='<?php echo site_url('grocery_crud/examples/offices_management')?>'>Offices</a> | 
		<a href='<?php echo site_url('grocery_crud/examples/employees_management')?>'>Employees</a> |		 
		<a href='<?php echo site_url('grocery_crud/examples/film_management')?>'>Films</a> |
		<a href='<?php echo site_url('grocery_crud/examples/multigrids')?>'>Multigrid [BETA]</a>
		
	</div>
	<div style='height:20px;'></div>  
    <div style="padding: 10px">
		<?php echo $output; ?>
    </div>
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
</body>
</html>
