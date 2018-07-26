<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php foreach ($content as $row) :
	$x = 1;
?>
	<?php echo $x.' '.$row['news_name'].'<br>'; ?>
<?php $x++; 
endforeach; ?>

<?php echo $halaman; ?>
</body>
</html>