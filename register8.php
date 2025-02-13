<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Registration Form</title>
</head>
<body>

<div>
    <p>Please complete this form to register:</p>

    <form action="handle_reg.php" method="post">
    
        <p>
            <label for="email">Email Address:</label>
            <input type="text" id="email" name="email" size="30">
        </p>
    
        <p>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" size="20">
        </p>
    
        <p>
            <label for="confirm">Confirm Password:</label>
            <input type="password" id="confirm" name="confirm" size="20">
        </p>
    
        <p>Date of Birth:</p>
        <select name="month">
            <option value="">Month</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
        <select name="day">
            <option value="">Day</option>
			<?php 
			for ($i = 1; $i <= 31; $i++) {
				print "<option value=\"$i\">$i</option>\n";
			}
			?>
		</select>
		<input type="text" name="year"
		value="YYYY" size="4"></p>
    
        <p>Favorite Color:</p>
        <select name="color">
            <option value="">Pick One</option>
            <option value="red">Red</option>
            <option value="yellow">Yellow</option>
            <option value="green">Green</option>
            <option value="blue">Blue</option>
            <option value="pink">Pink</option>
            <option value="white">White</option>    
        </select>
    
        <p>
            <input type="checkbox" name="terms" value="yes" id="terms"> 
            <label for="terms">I agree to the terms (whatever they may be).</label>
        </p>
    
        <input type="submit" name="submit" value="Register">
    
    </form>
</div>

</body>
</html>
	