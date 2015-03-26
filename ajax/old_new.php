<?php
include('db_conn.php');
 	$option=$_GET['str'];
 	if($option=='new')
 	{
 		echo'<input type="text" class="form-control" name="item_name" placeholder="Item Name" required autofocus />';
 		echo '<input type="hidden" name="old_new" value="new"/>';
 	}
 	else
 	{
 		echo '<input type="hidden" name="old_new" value="old"/>';
 		echo '<select name="item_name" class="form-control">';
        echo '<option>Select item</option>';
        $sql = "SELECT item_name FROM items";
        $result = mysql_query($sql);
        while ($row = mysql_fetch_array($result)) {
            echo "<option value='" . $row['item_name'] ."'>" . $row['item_name'] ."</option>";
        }
        echo '</select>';
	}
	?>