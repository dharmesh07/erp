						
                          <?php
                          	include('db_conn.php');
                          	$event_type=$_GET['event_type'];
                            $sql = "SELECT name FROM $event_type";
                            $result = mysql_query($sql);
                            echo '<select id="event_name" name="event_name" class="form-control" >';
                       		echo "<option>select ".$event_type."</option>";
                            while ($row = mysql_fetch_array($result)) {
                            echo "<option value='" . $row['name'] ."'>" . $row['name'] ."</option>";
                            }
                            echo "</select>";
                          ?>

                         
                      