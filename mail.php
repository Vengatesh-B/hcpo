<?php session_start();?>
<html>
<head>
<title>Send your resume</title>
</head>
<body>
<?php
// Read POST request params into global vars
//$to      = $_POST['to'];
//$from    = $_POST['from'];
//$subject = $_POST['subject'];
//$message = $_POST['message'];

if(isset($_REQUEST['btsubmit']))
{

include("securimage.php");
  $img = new Securimage();
  $valid = $img->check($_POST['code']);

if($valid == true)
{

$name = $_POST['name'];
$fname = $_POST['fname'];
$sex = $_POST['sex'];
$resadd = $_POST['resadd'];
$occ = $_POST['occ'];
$occadd = $_POST['occadd'];
$city = $_POST['city'];
$dist = $_POST['dist'];
$state = $_POST['state'];
$country = $_POST['country'];
$edu = $_POST['edu'];
$dob = $_POST['dob'];
$phone = $_POST['phone'];
$bg = $_POST['bg'];
$mari = $_POST['mari'];
$aps = $_POST['aps'];
$part = $_POST['part'];
$labour= $_POST['labour'];
$ngo = $_POST['ngo'];
$eyes = $_POST['eyes'];
$body = $_POST['body'];
$blood = $_POST['blood'];
$tax = $_POST['tax'];
$pan = $_POST['pan'];
$benefit = $_POST['benefit'];
$ration = $_POST['ration'];
$vote = $_POST['vote'];
$passport = $_POST['passport'];
$help = $_POST['help'];
$year = $_POST['year'];
$date = $_POST['date'];
$intro = $_POST['intro'];
$to = 'asokan121@gmail.com';
$from = $_POST['from'];

$phone = $_POST['phone'];
$subject = $_POST['subject'];

$message='<table cellspacing=0 cellpadding=0>
<tr>
<td>1.</td>
<td>Name</td><td width="10">:</td>
<td>'.$name.'</td>
</tr>
<tr>
<td>2.</td>
<td>Father / Husband Name</td><td width="10">:</td>
<td>'.$fname.'</td>
</tr>
<tr>
<td>3.</td>
<td>Sex</td><td width="10">:</td>
<td>'.$sex.'</td>
</tr>
<tr>
<td>4.</td>
<td>Residental Address</td><td width="10">:</td>
<td>'.$resadd.'</td>
</tr>
<tr>
<td>5.</td>
<td>Occupation</td><td width="10">:</td>
<td>'.$occ.'</td>
</tr>
<tr>
<td>6.</td>
<td>Occupational Addres</td><td width="10">:</td>
<td>'.$occadd.'</td>
</tr>
<tr>
<td></td>
<td>City</td><td width="10">:</td>
<td>'.$city.'</td>
</tr>
<tr>
<td></td>
<td>District</td><td width="10">:</td>
<td>'.$dist.'</td>
</tr>
<tr>
<td></td>
<td>State</td><td width="10">:</td>
<td>'.$state.'</td>
</tr>
<tr>
<td></td>
<td>Country</td><td width="10">:</td>
<td>'.$country.'</td>
</tr>
<tr>
<td>7.</td>
<td>Educational Qualification</td><td width="10">:</td>
<td>'.$edu.'</td>
</tr>
<tr>
<td>8.</td>
<td>Date of Birth</td><td width="10">:</td>
<td>'.$dob.'</td>
</tr>
<tr>
<td>10.</td>
<td>Phone Number</td><td width="10">:</td>
<td>'.$phone.'</td>
</tr>
<tr>
<td>11.</td>
<td>Blood Group</td><td width="10">:</td>
<td>'.$bg.'</td>
</tr>
<tr>
<td>12.</td>
<td>Marital Status</td><td width="10">:</td>
<td>'.$mari.'</td>
</tr>
<tr>
<td>13.</td>
<td>Area Police Station Address</td><td width="10">:</td>
<td>'.$aps.'</td>
</tr>
<tr>
<td>14.</td>
<td>Any Participation in Public Activities</td><td width="10">:</td>
<td>'.$part.''.$labour.''.$ngo.'</td>
</tr>
<tr>
<td>15.</td>
<td>Do You Want to Donate?</td><td width="10">:</td>
<td>'.$eyes.''.$body.''.$blood.'</td>
</tr>
<tr>
<td>16.</td>
<td>Are You a Income Tax Assesse?</td><td width="10">:</td>
<td>'.$tax.'</td>
</tr>
<tr>
<td></td>
<td>If "Yes" Write Your PAN No.</td><td width="10">:</td>
<td>'.$pan.'</td>
</tr>
<tr>
<td valign="top">17.</td>
<td>Do You Get Any Benefit From State /<br />
Central Government Welfare Scheme?</td><td width="10">:</td>
<td>'.$benefit.'</td>
</tr>
<tr>
<td>18.</td>
<td>Do You Have Ration Card?</td><td width="10">:</td>
<td>'.$ration.'</td>
</tr>
<tr>
<td>19.</td>
<td>Do You Have Voters ID Card?</td><td width="10">:</td>
<td>'.$vote.'</td>
</tr>
<tr>
<td>20.</td>
<td>Do you have Passport?</td><td width="10">:</td>
<td>'.$passport.'</td>
</tr>
<tr>
<td>21.</td>
<td>Do you like to Participate in Self help Groups?</td><td width="10">:</td>
<td>'.$help.'</td>
</tr>
<tr>
<td valign="top">22.</td>
<td>Details of "Human Rights Monthly Magazine" Magazine<br />
"Subscription required"</td><td width="10">:</td>
<td>'.$year.'</td>
</tr>
<tr>
<td></td>
<td>Date<br />'.$date.'</td><td width="10"></td>
<td>Introducer Name<br />
'.$intro.'</td>
</tr></table>';

// Obtain file upload vars
$fileatt      = $_FILES['fileatt']['tmp_name'];
$fileatt_type = $_FILES['fileatt']['type'];
$fileatt_name = $_FILES['fileatt']['name'];

$headers = "From: $from";

//if (is_uploaded_file($fileatt)) {
  // Read the file to be attached ('rb' = read binary)
  if (is_uploaded_file($fileatt)) {
  $file = fopen($fileatt,'rb');
  $data = fread($file,filesize($fileatt));
  fclose($file);
  }

  // Generate a boundary string
  $semi_rand = md5(time());
  $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
  
  // Add the headers for a file attachment
  $headers .= "\nMIME-Version: 1.0\n" .
              "Content-Type: multipart/mixed;\n" .
              " boundary=\"{$mime_boundary}\"";

  // Add a multipart boundary above the plain message
  $message = "This is a multi-part message in MIME format.\n\n" .
             "--{$mime_boundary}\n" .
             "Content-Type: text/html; charset=\"iso-8859-1\"\n" .
             "Content-Transfer-Encoding: 7bit\n\n" .
             $message . "\n\n";

  // Base64 encode the file data
  $data = chunk_split(base64_encode($data));
if (is_uploaded_file($fileatt)) {
  // Add file attachment to the message
  $message .= "--{$mime_boundary}\n" .
              "Content-Type: {$fileatt_type};\n" .
              " name=\"{$fileatt_name}\"\n" .
              //"Content-Disposition: attachment;\n" .
              //" filename=\"{$fileatt_name}\"\n" .
              "Content-Transfer-Encoding: base64\n\n" .
              $data . "\n\n" .
              "--{$mime_boundary}--\n";
}


//}

// Send the message
$ok = @mail($to, $subject, $message, $headers);
if ($ok) {
//  echo "<p>Mail sent!</p>";
?>
<script>
alert('Mail Sent Successfully');
window.location.href="member.php";
</script>
<?php
} else {
//  echo "<p>Mail could not be sent. Sorry!</p>";
?>
<script>
alert('Mail Could not Sent Successfully');
window.location.href="member.php";
</script>
<?php
}

}
else
{
?>
<script>
alert('Wrong Verification Code');
</script>
<?php
}


}
?>
</body>
</html>
