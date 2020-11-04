<!doctype html>
<html lang="en">

<head>
	<title>
		<?=__app_name?> Database Error
	</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link
		href='<?=__app_base_url?>assets/lib/bootstrap/css/bootstrap.min.css'
		rel='stylesheet' type='text/css' />
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="text-center"><?=$heading?>
				</h1>
				<p class="text-center"><?=$message?>
				</p>
			</div>
		</div>
	</div>
</body>

</html>