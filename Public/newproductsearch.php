<table class="table table-striped">
<tr>
<th>Name</th>
<th>Price</th>
</tr>
<?php
$searchquery = '%'.$_REQUEST['searchquery'].'%';
$sql = "select * from product where Title like ?";
///print "<pre>cat = $cat</pre>";
//print "<pre>sql = $sql</pre>";
print"<form>
<input type='button' class='btn btn-dark' value='Back' onclick='history.back()' style = 'position:absolute; left:15px; top:-42px;'>
</form>";

if( $stmt = $mysqli->prepare($sql) ) {
	$stmt->bind_param("s", $searchquery);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
		print "<tr><td><a href='?p=productinfo&pid=$row[ID]'>$row[Title]</a></td>".
			"<td>$row[Price] &euro;</td></tr>";
	}

}
?>

</table>