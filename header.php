	<header class="header-fluid" id="myheader">    
		<nav class="navbar navbar-inverse" id="mynav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				</button>    
				<a class="navbar-brand" href="index.php">Project name</a>  
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<?php
					if( !isset($_SESSION['member_id']) or $_SESSION['member_id']=='' )
					{
				?>				
					<ul class="nav navbar-nav navbar-right">
						<li><a href="index.php">Home</a></li>
						<li><a href="#">About</a></li>
						<li><a href="#">Link</a></li>				
						<li><a href="#">Contact</a></li>
						<li><a href="sign.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
				<?php
					}else{
				?>
					<ul class="nav navbar-nav">
						<a href="index.php"><li>Home</li></a>
						<a href="user.php?name=<?=$_SESSION['name']?>"><li>Timeline</li></a>
						<a href="notifications.php"><li>Notifications</li></a>
						<a href="profile.php"><li>Profile</li></a>
						<a href="messages.php"><li>Messages</li></a>
						<a href="settings.php"><li>Settings</li></a>
						<a href="logout.php"><li>Logout</li></a>
					</ul>
				<?php
				}
				?>										
			</div>
		</div>
		</nav>
</header>     
