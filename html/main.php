<?php
	session_start();
	$link = new mysqli("localhost","root","","relentless");

	date_default_timezone_set('UTC');

	if ($link->connect_errno) {
		printf("Connect failed: %s\n", $link->connect_error);
		exit();
	}

	if (isset($_GET['sort']))
		$sort = $_GET['sort'];
	else
		$sort = "new";

?>


<html>
    <head>
		<title>Relentless - Library</title>
		
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
		
		<script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </head>
    <body class="blog-page">
		
		<div class="blog-header">
			<div class="header-title">
				<h1 class="text-black">Relentless</h1>
				<h5 class="text-black font-italic">The most innovative bookstore in the west</h5>	
			</div>
			<?php
				if(!isset($_SESSION["user"])){
					?>
					<div class="header-user">
						<a class="text-black sign-out" href="../index.php">Please sign in</a>
					</div>
					<?php
				}
				else{
			?>
			<div class="header-user">
				<p class="text-black username">Welcome, <?php print $_SESSION["user"]["name"]; ?></p>
                <a class="text-black sign-out" href="cart.php">Go to your cart</a><br/>
				<a class="text-black sign-out" href="../index.php">Sign out</a>
			</div>
		</div>
		
		<div class="blog-main">
			<div class="row">
				<div class="card" style="width: 97%; margin-left: 1.55%;">
					<div class="card-body">
						<table class="table" style="margin-bottom: 0px;">
							<tr>
							<h3 style="float: left; padding-left: 3%;">Shop</h3>
								<div class="dropdown" id="sort" style="float: right; padding-right: 3.5%;">
									<button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 6px;">
										Sort
									</button>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
										<a class="dropdown-item" href="main.php?sort=new">New first</a>
										<a class="dropdown-item" href="main.php?sort=old">Old first</a>
										<a class="dropdown-item" href="main.php?sort=name">Name &#40;A-Z&#41;</a>
										<a class="dropdown-item" href="main.php?sort=name2">Name &#40;Z-A&#41;</a>
										<a class="dropdown-item" href="main.php?sort=genre">Genre</a>
										<a class="dropdown-item" href="main.php?sort=isbn">ISBN</a>
                                        <a class="dropdown-item" href="main.php?sort=auth">Author &#40;A-Z&#41;</a>
										<a class="dropdown-item" href="main.php?sort=auth2">Author &#40;Z-A&#41;</a>
									</div>
								</div>
							</tr>
						</table>
						<div class="container text-center" style="margin-left: 1.8%;">
							<div class="row">
								<?php
									if(isset($_SESSION["user"])){
										
										if($sort == "new"){
											$result = $link->query("SELECT * FROM library ORDER BY date DESC;");
										}else if($sort == "old"){
											$result = $link->query("SELECT * FROM library ORDER BY date ASC;");
										}else if($sort == "name"){
											$result = $link->query("SELECT * FROM library ORDER BY title ASC;");			
										}else if($sort == "name2"){
                                            $result = $link->query("SELECT * FROM library ORDER BY title DESC;");						
										}else if($sort == "genre"){
											$result = $link->query("SELECT * FROM library ORDER BY category ASC;");			
										}else if($sort == "auth"){
                                            $result = $link->query("SELECT * FROM library ORDER BY author ASC;");						
										}else if($sort == "auth2"){
                                            $result = $link->query("SELECT * FROM library ORDER BY author DESC;");						
										}else{
											$result = $link->query("SELECT * FROM library ORDER BY isbn ASC;");	
                                        }
											
										if(!$result)
												die ('Can\'t query library because: ' . $link->error);
											else
											{
												$i = 0;
												while($row = $result->fetch_assoc() ): ?>

													<div style="padding: 0px;">
														<a href="listing.php?id=<?php echo $row['isbn'] ?>" class="box-link book" data-isbn="<?php echo $row['isbn']; ?>">
															<div class="card box-card" style="margin: 5px; width: 185px;">
																<div class="text-center">
																	<img src="../img/book.png" class="card-img-top" alt="..." style="width: 80px; auto; margin: 12px 22px 12px 22px;">
																</div>
																<div style="padding: 0px; margin-top: 8px; margin-bottom: 12px; height: 100px;">
																	<strong><?php echo $row["title"]; ?></strong>
																	<br/>
                                                                    <?php echo $row["author"]; ?>
                                                                    <br/>
																	<span class="badge badge-new" style="margin-top: 5px;"><?php echo $row["category"]; ?></span>
																</div>
															</div>
														</a>									
													</div>				

												<?php $i++;

												endwhile;
											}
										}
									$result->close();}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<a id="to-cart" href="cart.php" class="position-fixed m-2" style="right: 0; bottom: 0;">
			<div class="card px-2 py-1" style="border-radius: 50%; height: 7rem; width: 7rem; " ><img src="../img/cart.png" class="w-75 h-75 m-auto"></div>
		</a>
	<script type="text/javascript" src="../js/main-handlers.js"></script>
    </body>
</html>
