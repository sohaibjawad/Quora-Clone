<!DOCTYPE html>
<html>
<head>
	<title>Sign Up | Quora</title>
	<link rel="stylesheet" type="text/css" href="../../frontend/css/app.css">
	<link rel="stylesheet" type="text/css" href="../../frontend/css/home.css">
	<script type="text/javascript" src="../../frontend/js/jquery-3.4.1.min.js"></script>
</head>
<body id="loginPage">

	<div class="box">
		<h1>Quora</h1>
		<p class="tagline">A place to share knowledge and better understand the world</p>
		<form action="../utilities/signup_try.php" method="POST">
			<table>
				<tr>
					<td>
						<input type="text" name="f_name" placeholder="First Name" autocomplete="off" tabindex="1" required>
						<br><br>
						<input id="valid" type="text" name="userName" placeholder="Username" autocomplete="off" tabindex="3" required>
						<br><br>
						<select name="type" tabindex="5">
							<option value="Student">I am a student</option>
							<option value="Work">I work</option>
							<option value="Other">Other</option>
						</select>
						<br><br>
						<a href="index.php" class="suBtn2">Back</a>
					</td>
					<td>
						<input type="text" name="l_name" placeholder="Last Name" autocomplete="off" tabindex="2" required>
						<br><br>
						<input type="password" name="password" placeholder="Password" tabindex="4" required>
						<br><br>
						<input type="date" name="dob" placeholder="Date of Birth" tabindex="6" required>
						<br><br>
						<input type="submit" value="Sign Up">
					</td>
				</tr>
			</table>
		</form>
		<?php
		include("../../frontend/html/footer.html");
		?>
	</div>

	<script>
	var temp = "";

	var xhttp = new XMLHttpRequest();

	$('#valid').keydown(function(e){

		if((e.keyCode >= 65 && e.keyCode <= 122) || (e.keyCode >= 48 && e.keyCode <= 57)){
			temp = temp + String.fromCharCode(e.keyCode);
		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				if(this.responseText == "no"){
					$('#valid').css("background", "#a01e1e");
					$('#valid').css("color", "white");
				}
				else{
					$('#valid').css("background", "#eaecef");
					$('#valid').css("color", "black");
				}
			}
		};

		xhttp.open("GET", "../utilities/checkValid.php?id="+temp, true);
		xhttp.send();
		}

		else if(e.keyCode == 08 && temp.length != 0) // IF BACKSPACE PRESSED
				{
						temp = temp.slice(0, (temp.length)-1);
						xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				if(this.responseText == "no"){
					$('#valid').css("background", "#a01e1e");
					$('#valid').css("color", "white");
				}
				else{
					$('#valid').css("background", "#eaecef");
					$('#valid').css("color", "black");
				}
			}
		};

		xhttp.open("GET", "../utilities/checkValid.php?id="+temp, true);
		xhttp.send();
				}

		else{

		}


	});

	</script>

</body>
</html>