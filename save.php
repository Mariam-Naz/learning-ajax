<?php
	include 'database.php';
	$id = $_GET['id'];
	$sql =  query("SELECT * from products where id =  ". escape($_GET['id']) ."");
    confirm($sql);
$row=(mysqli_fetch_row($sql));
echo json_encode($row);
while ($row = mysqli_fetch_array($sql)) {
    
?>
        <tr>
        <td><?=$row['id']; ?></td>
        <td><?=$row['name']; ?></td>
        <td><?=$row['price']; ?></td>
        </tr>
    <?php
}
    
    ?>