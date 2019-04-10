<?php

	$link = new mysqli("localhost:3306","root","","relentless");

	date_default_timezone_set('UTC');

	if ($link->connect_errno) {
		printf("Connect failed: %s\n", $link->connect_error);
		exit();
	}

	$ISBN = $_GET['id'];

?>

<html>
    <head>
		<title>Relentless - Book Listing</title>
		
        <link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">
		
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </head>

    <body class="blog-page">

    	<div class="blog-header">
			<div class="header-title">
				<h1><a href="/html/main.php?sort=name">Relentless</a></h1>
				<h5>The most innovative bookstore in the west</h5>	
			</div>
			<?php
				if(!isset($_COOKIE["bloguser"])){
					?>
					<div class="header-user">
						<a 	href="../index.php">Please sign in</a>
					</div>
					<?php
				}
				else{
			?>
			<div class="header-user">
				<p username">Welcome, <?php print $_COOKIE["bloguser"]?></p>
                <a sign-out" href="cart.php">Go to your cart</a><br/>
				<a sign-out" href="../index.php">Sign out</a>
			</div>
		</div>

		<?php
		}
		?>


    	<?php

			$result = $link->query("SELECT * FROM library WHERE ISBN = $ISBN;");	
			
			if(!$result)
					die ('Can\'t query library because: ' . $link->error);
				else
				{
					while($row = $result->fetch_assoc() ):
						echo "<div class='blog-main'> <div class='card-body'> <div class='card' style='width: 97%; margin-left: 1.55%; padding: 15px';>";
						echo "<div class='text-center'><img src='../img/book.png' class='card-img-top' alt='...' style='width: 280px; auto; margin: 12px 22px 12px 22px;'></div>";
						echo "<div> ISBN: ";?> <?php echo $row['ISBN'];?>     <?php echo "</div>";
						echo "<div> Title: ";?> <?php echo $row['title'];?>    <?php echo "</div>";
						echo "<div> Genre: ";?> <?php echo $row['category'];?> <?php echo "</div>";
						echo "<div> Author: ";?> <?php echo $row['author'];?>   <?php echo "</div>";
						echo "<div> Summary:";?> <?php echo $row['summary'];?>  <?php echo "</div>";
						echo "</div> </div>";
					endwhile;
				}
			$result->close();
		?>

		<div class="card-body">
				<form name="myForm" method="post" id="submitPost" action="index.php">
						<label for="rating"><h5>Rating:</h5></label></br>
						<input type="text" maxlength="3" size="3" name="rating"/>
						<label for="rating">/100</label>
						<label for="review"><h3>Review:</h3></label>
						<textarea class="form-control" name="review" rows="10" ></textarea>
					<input type="hidden" name="action" value="review" />
					<input type="button" value="Submit" onclick="postReview()" />
				</form>
			</div>
		</div>

			<?php

			$result = $link->query("SELECT * FROM review WHERE ISBN = $ISBN;");	
			
			if(!$result)
				die ('Can\'t query library because: ' . $link->error);
			else{
				echo "<div class='blog-main'> <div class='card-body'> <div class='card' style='width: 97%; margin-left: 1.55%; padding: 15px';>";
				while($row = $result->fetch_assoc() ):
				echo "<div> Reviewer: ";?> <?php echo $row['username'];?>     <?php echo "</div>";
				echo "<div> Review: ";?> <?php echo $row['review'];?>    <?php echo "</div>";
				echo "<div> Rating: ";?> <?php echo $row['rating'];?> <?php echo "</div> </br>";
				endwhile;
				echo "</div>";
			}
			$result->close();
			?>


		<script>

		  //taken and edited from ajax.php prodived by Dr Prather
		  function postReview()
		  {
		    var rating = document.getElementById("submitPost").rating.value;
		    var review = document.getElementById("submitPost").review.value;
		        
		    var jqxhr = $.ajax( 
		      {
		        method: "POST", 
		        url:"/ajax/add_review.php", 
		        data: {rank:rating, reviewText:review, isbn:<?php echo $_GET['id'] ?>, action:"upload_review"}
		      })
		      .done(function(data) {
		      		document.getElementById("submitPost").rating.value = "";
		      		var review = document.getElementById("submitPost").review.value = "";
		      })
		      .fail(function() {
		      })
		      .always(function() {
		      //alert( "complete" );
		      });  
		  }
		</script>
    </body>
</html>