<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Download</title>
  </head>
  <link rel="stylesheet" href="style.css" />
  <body>
    <nav class="navbar">
      <a href="index.html">
        <img class="img" src="img/logo.jpg" alt="logo"
      /></a>
    </nav>
</body>
</html>

<?php
// session_start();
require_once('./vendor/autoload.php');
$file = $_POST['pdffile'];
$watermark = $_POST['watermark'];
use Ilovepdf\Ilovepdf;

$ilovepdf = new Ilovepdf('project_public_8ab5fb726991843a14a6eb1f7d2486b1_nGJfM293e72a2b32f1ff3a0c451bbfd9d4a96',
 'secret_key_1b93b541dc61f601820e2b66a0848542_Lpekmc74c906e0288025d1354bbe2f0a0339e');

$myTaskConvertOffice = $ilovepdf->newTask('watermark');
// Add files to task for upload
    $file1 = $myTaskConvertOffice->addFile("test/". $file);
    $myTaskConvertOffice->setText($watermark);
    $myTaskConvertOffice->setTransparency(25);
    $myTaskConvertOffice->setLayer('below');
    $myTaskConvertOffice->setVerticalPosition('middle');
    $myTaskConvertOffice->setHorizontalPosition('center');
    $myTaskConvertOffice->setMosaic(true);
// Execute the task
$myTaskConvertOffice->execute();
// Download the package files
$myTaskConvertOffice->download("./test/");

echo "<h2> <center>Watermark has been sucessfully added. </center> </h2>";
echo "<i>click on the logo to go to the home page </i>";
?>