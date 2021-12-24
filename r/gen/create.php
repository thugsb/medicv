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

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

$testing = $_POST['testing'];
$name = $_POST['name'];
$day = $_POST['day'];
$month = $_POST['month'];
$year = $_POST['year'];
$sex = $_POST['sex'];
$type = $_POST['type'];
$age = $_POST['age'];
$passport = $_POST['passport'];

if ($testing == 'yes') {
	$hash = 'test';
} else {
	$hash = hash("md5",time());
}
echo 'Folder: ' . $hash;

if ($testing == 'no') {
	mkdir('../r/' . $hash, 0755);
}

$APIcode = 'YjVmZmNmNDUtYzRmNS00NDM3LWI1YTEtYmE4MTliMWNjMzNk';


if ($testing == 'yes') {
	echo "<img src='qr.svg' style='width:300px'/>";
} else {


// Grab the QR Code
$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => "https://qrcode3.p.rapidapi.com/qrcode/text",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_POSTFIELDS => "{\n  \"data\": \"https://medicvtesting.com/r/w34p98\",\n  

		\"style\": {\n    
			\"module\": {\n      
				\"color\": \"black\",\n      
				\"shape\": \"default\"\n    
			},\n    
			\"inner_eye\": {\n      
				\"shape\": \"default\"\n    
			},\n    
			\"outer_eye\": {\n      
				\"shape\": \"default\"\n    
			},\n    
			\"background\": {}\n  
		},\n  \"size\": {\n    
			\"width\": 200,\n    
			\"quiet_zone\": 4,\n    
			\"error_correction\": \"M\"\n  
		},\n  
		\"output\": {\n    
			\"filename\": \"qrcode\",\n    
			\"format\": \"svg\"\n  
		}\n}",
	CURLOPT_HTTPHEADER => [
		"content-type: application/json",
		"x-rapidapi-host: qrcode3.p.rapidapi.com",
		"x-rapidapi-key: 004d76dacamsha886b8aecca6001p1acd82jsn6e094cdaadcb"
	],
]);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	if ($testing == 'no') {
		$fp = fopen('../r/' . $hash . '/qr.svg', 'wb');
		fwrite($fp, $response);
		fclose($fp);
	}
	echo "<img src='../r/$hash/qr.svg' style='width:300px'/>";
}
}

$dob = "0";
$dob .= strval(rand(1,6)). '/1' .strval(rand(0,9)) .'/'. strval(intval(date('Y'))-$age);
if (intval(date("G")) < 14) {
	echo 'morn';
} else {
	echo 'later';
}

echo '<hr/>';
$input_html = <<<EOD
<html><body>
<div style="float:right">
<a href="#">MedicVTesting.com</a><br>
Units 2 & 3 Innovation Centre, Hastings, TN38 9VH
</div>
<img src="../../medicv-small.png">
<h2 style="margin:1em 0 1em; color:#47B494;">COVID-19 RAPID ANTIGEN TEST CERTIFICATE</h2>
<p>$name</p>
<div><strong>CERTIFICATE DATE: </strong> $day/$month/$year</div>
<div><strong>DATE OF BIRTH: </strong> $dob</div>
<div><strong>SEX : </strong> $sex</div>
<div><strong>SWAB SAMPLE TAKEN:</strong> $day/$month/$year</div>
<p><strong>Coronavirus (COVID-19) Ag Rapid Test Result:</strong></p>
<h2 style="margin:1em 0; color:#47B494;">NEGATIVE</h2>
<div><strong>Type of test</strong>: Acon (Hughes Healthcare) Rapid COVID-19 Antigen Test (Hangzhou Clongene Biotech, Clungene COVID-19 Antigen Rapid Test Kit)</div>
<div><strong>Class of test</strong>: Rapid antigen, lateral  ow device, point of care</div>
<div><strong>Relative sensitivity (compared to PCR positive)</strong>: 97.1%</div>
<div><strong>Relative speci city (compared to PCR negative)</strong>: 99.5% Accuracy: 98.8%</div>
<p>MedicVTesting is a Government approved healthcare institution as per the registration with the Care Quality Commission (number 2608070379), the independent regulator of health and social care in England.</p>
<p>Based on this report, the patient does not have any evidence of active COVID-19 infection and is fit to fly.</p>
<div><strong>Diagnosis</strong>: No COVID-19 infection.</div>
<img src="../$hash/qr.svg" style="float:right; width:200px;"/>
<img src="../gen/sig.png" style="width:150px;"/>
<p><small>Dr Raj Ahmed MBChB MBA<br/>
GMC Number: 623478</small></p>
<div style="font-size:0.8em; color:#666; text-align:center; clear:both;">
<div>Note to patient: if you have developed symptoms or come into contact with a known case of COVID-19 since your registration - please contact Medicspot and do not fyy.</div>
<div>All dates formatted as dd/MM/yyyy hh:mm:ss (GMT + 0).</div>
<div>IMPORTANT: This certicate does not guarantee any outcome such as entry into any country. The risk of using this certi cate lies solely with the traveller.</div>
<div>MedicV Testing Limited, Company Number: 10089496, Regulated by the Care Quality Commission (CQC)</div>
</div>
</body></html>
EOD;

echo $input_html;

$tmpt = fopen('../' . $hash . '/input.html', 'wb');
fwrite($tmpt, $input_html);
fclose($tmpt);


// Using Prince to generate the PDF locally
// exec('/usr/local/bin/prince ../'. $hash .'/input.html -o ../'.$hash."/medic-test-result.pdf",$results, $returnedValue);
// echo '<pre>' . print_r($results) . '</pre>' . $returnedValue;



// Using API2PDF to generate the PDF
$curl = curl_init();

$jsonDataEncoded = json_encode(['html' => $input_html]);

curl_setopt_array($curl, [
	CURLOPT_URL => "https://api2pdf-api2pdf-v1.p.rapidapi.com/wkhtmltopdf/html",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "POST",
	CURLOPT_HTTPHEADER => [
		"x-rapidapi-host: api2pdf-api2pdf-v1.p.rapidapi.com",
		"x-rapidapi-key: 004d76dacamsha886b8aecca6001p1acd82jsn6e094cdaadcb"
	],
	CURLOPT_POSTFIELDS => $jsonDataEncoded
]);

$PDFresponse = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $PDFresponse;
}
$PDFresponseArray = json_decode($PDFresponse, TRUE);
echo "<a href='".$PDFresponseArray['pdf']."'>PDF</a>";


if (empty($name)) {
	echo "Name is empty";
} else {
	echo $name;
}
} // endif POST
?>
	</main>
</body>
</html>