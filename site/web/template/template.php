<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php pageTitle(); ?> | <?php siteName(); ?></title>
    <link rel="stylesheet" type="text/css" href="assets/main.css">
</head>
<body>
<div class="wrap">

    <header>
        <h2><?php siteName(); ?></h2>
        <nav class="menu">
            <?php navMenu(); ?>
        </nav>
    </header>

    <article>
        <h3><?php pageTitle(); ?></h3>
        <?php pageContent(); ?>
    </article>

	<?php
	$servername   = "127.0.0.1";
	$username = "root";
	if ($_SERVER['HTTP_HOST'] == 'localhost' || $_SERVER['HTTP_HOST'] == 'example.test') // or any other host
	{
		// development
		$password = "devpw";
	}

	else
	{
		// production
		$password = "productionpw";
	}
	// Create connection
	$conn = new mysqli($servername, $username, $password);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	echo "<h1>DataBase Connected successfully </h1>";
	?>
    <footer><small>&copy;<?php echo date('Y'); ?> <?php siteName(); ?>.<br><?php siteVersion(); ?></small></footer>

</div>
</body>
</html>