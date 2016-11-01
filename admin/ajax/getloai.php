<?php
require_once("../lib/classQuanTri.php");
$qt = new quantri;

$idTL = (int) $_POST['idTL'];
$rs = mysql_query('SELECT * FROM loaisp WHERE idTL = '.$idTL);
while($row = mysql_fetch_assoc($rs)){
?>   
<option value="<?php echo $row['IDDB'];?>"><?php echo $row['Ten'];?></option>
<?php    
}
?>
