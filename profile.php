<?php

session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
	header("Location: index.php");

}

if (!isset($_GET['id'])) {
	header("Location: index.php");
}
	
	$userData = $db->users->findOne(array('_id'=> $_SESSION['user']));
	$profile_id = $_GET['id'];
	$profileData = $db->users->findOne(array('_id'=> new MongoDB\BSON\Object("$profile_id")));

	function get_recent_tweets($db)
	{
		$id = $_GET['id'];
		$result = $db->users->findOne(array('_id'=> new MongoDB\BSON\Object("$id")));
		$recent_tweets = iterator_to_array($result);
		return $recent_tweets;
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Twitter-clone</title>
</head>
<body>

	<?php
 include 'header.php';?>

 <div>
 	<?php
 	$recent_tweets = get_recent_tweets($db);
 	foreach ($recent_tweet as $tweet) {
 		echo '<p><a href="profile.php?id=' .$tweet['authorId'] '">
 		' .$tweet['authorName'] .' ></a></p>';
 		echo '<p>' .$tweet['body']. '</p>';
 		echo '<p>' $tweet['created']'</p>';
 		echo '<hr>';
 	}
	?>
 </div>
	
</body>
</html>