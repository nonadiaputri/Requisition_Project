 <?php  
 //excel.php  
 header("Content-type: application/vnd-ms-excel");
 header("Content-Disposition: attachment; filename=hasil.xlsx");
 echo $_GET["data"];  
 ?>  