<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<tite>Feedback</title>
	</head>
<body>
	<form action="handle_form.php"
	method="post">
	<div><p>Please complete this
		form to submit your feedback:
		</p>
		<p>First name: <input type="text" name="first_name" size="20" required></p>
		<p>Last name: <input type="text" name="last_name" size="20" required></p>
		<p>Email Address: <input type=
			"email" name="email" size="20"
			required></p>
			
	<p>Response: This is...
	<input type="radio"
	name="response"
	value="Excellet" required>
	Excellent
	<input type="radio"
	name="response"
	value="Boring"> Boring</p>
	
	Comments: <textarea
		name="comments" rows="3"
		cols="40" required>
		</textarea></p>
	
	<input type="submit"
		name="submit" value="Send My
		Feedback">

</form>

</div>
</body>
</html>