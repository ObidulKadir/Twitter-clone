<div>
	<spane>Welcome, <?php  echo $userData['username']; ?></spane><br>

	[<a href="home.php">Home</a>]
	[<a href="profile.php?id=<?php echo $_SESSION['user'] ; ?>">View Profile</a>]
	[<a href="userlist.php">View User List</a>]
	[<a href="logout.php">Log out</a>]

</div>