<!-- Navigation -->
	<nav class="navbar bg-light navbar-light navbar-expand-lg">
		<div class="container">
			<!-- <a href="index.php" class="navbar-brand"><img src="media/img/wifi.png" 
				alt="logo" title="logo"></a> --!>
			
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarResponsive">
				<span class="navbar-toggler-icon"></span>		
			</button>

			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item"><a href="index.php" class="nav-link active">Home</a></li>
					<li class="nav-item"><a href="" class="nav-link">About</a></li>
                    <?php
                        if(!isset($_SESSION['username'])){
                        echo "<li class='nav-item'><a href='/login.php' class='nav-link'>Login</a></li>";
                        echo "<li class='nav-item'><a href='/signup.php' class='nav-link'>SIGN UP</a></li>";
                    }else{
                        echo "<li class='nav-item'><a href='/logout.php' class='nav-link'>Logout</a></li>";
                    } ?>
				</ul>
		    </div>
		</div>	
	</nav>
	<!-- End Navigation -->
