<table class="table table-striped">
<tr>
<th>Name</th>
<th>Price</th>
</tr>
<?php
$cat = $_REQUEST['catid'];
$sql = "select * from product where Category=?";
///print "<pre>cat = $cat</pre>";
//print "<pre>sql = $sql</pre>";

if( $stmt = $mysqli->prepare($sql) ) {
	$stmt->bind_param("i", $cat);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
		print "<tr>
		        <td> <img style ='width:60px' src='Assets/img/BookCover/$row[ID].jpg'<td> ".
				"<td><a href='?p=productinfo&pid=$row[ID]'>$row[Title]</a></td>".
				"<td>$row[Price] &euro;</td>
				</tr>";
	}

}
?>

</table>

