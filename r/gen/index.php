<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="no-js" lang="en">
<head>
	<title>MedicVTesting</title>
	<meta charset="utf-8"/>
	<meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<meta name="viewport" content="width=device-width"/>
	<meta name="theme-color" content="#3aaa37"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel='stylesheet' href='styles.css'/>
	<script src="scripts.js"></script>
</head>
<body>
	<main>
		<form action="create.php" method="POST">
			<div class="form-field date-select">
				<div class="text-label" for="year">Testing? </div>
				<label for='yes'><input type="radio" id="yes" name="testing" checked="checked" value="yes"/>Yes</label>
				<label for='no'><input type="radio" id="no" name="testing" value="no"/>No</label>
			</div>
			<div class="form-field">
				<label class="text-label" for="name">Name:* </label>
				<input type="text" name="name" id="name" required="true"/>
			</div>
			<div class="form-field">Test Date: </div>
<div class="form-field date-select date-days">
<?php
foreach(range(1,31) as $day) {
	$active = '';
	if ($day == intval(date('d'))+1) {
		$active = " checked='checked'";
	}
	echo "<label for='day-$day'><input type='radio'$active name='day' value='$day' id='day-$day'/>" . $day . '</label>';
}
?>
</div>
<div class="form-field date-select date-months">
<?php
$months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
foreach($months as $key => $month) {
	$active = '';
	if ($month == date('M')) {
		$active = " checked='checked'";
	}
	$mkey = $key+1;
	echo "<label for='month-$mkey'><input type='radio'$active name='month' value='$mkey' id='month-$mkey'/>" . $month . '</label>';
}
?>
</div>
<div class="form-field date-select date-years">
<?php
foreach(range(intval(date("Y")), intval(date("Y"))+1) as $year) {
	$active = '';
	if ($year == intval(date('Y'))) {
		$active = " checked='checked'";
	}
	echo "<label for='year-$year'><input type='radio'$active name='year' value='$year' id='year-$year'/>" . $year . '</label>';
}
?>
</div>
			<div class="form-field date-select">
				<div class="text-label" for="year">Sex: </div>
				<label for='male'><input type="radio" id="male" name="sex" checked="checked" value="male"/>Male</label>
				<label for='female'><input type="radio" id="female" name="sex" value="female"/>Female</label>
			</div>
			<div class="form-field date-select">
				<div class="text-label" for="year">Type: </div>
				<label for='flow'><input type="radio" id="flow" name="type" checked="checked" value="flow"/>Flow</label>
				<label for='PCR'><input type="radio" id="PCR" name="type" value="PCR"/>PCR</label>
			</div>
			<div class="form-field">
				<label class="text-label" for="name">Age: </label>
				<input type="text" name="age" id="age" value="40"/>
			</div>
			<div class="form-field">
				<label class="text-label" for="name">Passport: </label>
				<input type="text" name="passport" id="passport"/>
			</div>
			<input type="submit" value="Create"/>
		</form>
	</main>
</body>
</html>