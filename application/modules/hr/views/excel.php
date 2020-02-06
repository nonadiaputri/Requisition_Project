 <?php  
 //excel.php  
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=hasil.xls");
 echo $_GET["data"];  
 ?>  