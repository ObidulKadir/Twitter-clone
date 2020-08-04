<?php
	
	session_start();

	require_once('dbconnect.php');

	if (isset($_SESSION['user'])) {
		# code...
		header("Location: index.php");
	}

	$userData = $db->users->findOne(array('_id' => _SESSION['user']));

	function get_recent_tweets($db){
		$result = $db->following->find(array( 'follower' => $_SESSION['user']));
		$result = iterator_to_array($result);

		$users_following = array();

		foreach ($result as $entry) {
			$user_following[] = $entry['user'];
		}
		$result = $db->tweets->find( array('authorId' => array('$in' => $users_following)));
		$recent_tweets = iterator_to_array($result);

		return $recent_tweets;
	}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Twiter-clone</title>
</head>
<body>
	<?php

		include 'header.php';
	?>

	<form method="post" action="create_tweet.php">
		<fieldset>
			<label for="tweet">What's happend? </label><br>
			<textarea name="body" id="" cols="4" rows="58"></textarea><br>
			<input type="submit" value="tweet">
		</fieldset>
	</form>
	
</body>
</html>