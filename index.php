</<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>JioFox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="  crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.js"></script>
	<script src="assets/js/jquery.validate.js"></script>
    <style>
        .fakeimg {
            height: 200px;
            width : 100%;
            background: #aaa;
        }
  </style>
</head>
<body>
<?php 
$url = $_SERVER["REQUEST_URI"];
$urlExplode = explode("/",$url);
//print_r($urlExplode);
//echo sizeof($urlExplode);
$path ="";
if(sizeof($urlExplode)>2) {
$path = $urlExplode[2];
}
if($path != "admin" && $path != ""){
    echo 'yes';
    include 'app/postview.php'; 
}
else if($path == "admin"){
    include 'app/admin.php';
}
else{
    include 'app/home.php';
}


?>
</script>
</body>
</html>
