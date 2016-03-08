<!doctype html>
<html>
<head>
  <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
  <?php 
  $targetImgs= $_POST['deleteImg'];

  foreach ($targetImgs as $targetImg) {
    if(unlink($targetImg) == false){
        echo "<p>Some error occured in somefiles</p>";
        break;
    }
    else{
        echo "<p>delete one file</p>";
    }
}
?>
</body>
</html>