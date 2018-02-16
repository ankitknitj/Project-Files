<!DOCTYPE html>
<?php include 'db.php';?>
<html>
<head>
<title>Chating System In PHP</title>
<link rel="stylesheet" href="style.css"/>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Indie+Flower" />

<script>
function ajax(){
	var req = new XMLHttpRequest();
	
	req.onreadystatechange = function()
	{
		if(req.readyState == 4 && req.status == 200){
			document.getElementById('chat').innerHTML = req.responseText;
		}
	}
	req.open('GET','chat.php',true);
	req.send();
}
setInterval(function(){ajax()},1000);
</script>
</head>
<body onload="ajax();" class="bgc">
<div id="container">
		<div id="chat_box">
			<div id="chat">
				
			</div>
		</div>
		<form action="index.php" method="post">
			<input type="text" name="name" placeholder="Enter Your Name"/>
			<textarea name="msg" placeholder="Enter Your Message..."></textarea>
			<input type="submit" name="submit" value="Send Msg."/>
		</form>
		<?php
if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$msg = $_POST['msg'];
	
	$insert = "INSERT INTO CHAT (name,msg) values ('$name','$msg')";
	$run = $db->query($insert);
	
	if($run)
	{
		echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true'>";
	}
}
?>
	</div>
	
</body>
</html>
