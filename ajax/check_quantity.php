						
                          <?php
                          include('db_conn.php');
                          	$roll_no=$_GET['roll_no'];
                          	$item=$_GET['item'];
                          	$event_name=$_GET['event_name'];

                          	$sql = "SELECT * FROM students_entry WHERE roll_no='$roll_no' AND item='$item' AND event_name='$event_name'";
                            $result = mysql_query($sql);
                            $row = mysql_fetch_array($result);
                            if ($row) {
                            	$quantity=$row['issued']-$row['returned'];
                            	
                              echo '<div class="col-md-7">';
                              echo '<input type="number" class="span2 form-control"  min="1"  name="quantity_returned" id="quantity_returned" placeholder="Quantity Returning"/ autofocus required>';
                              echo '</div>';
                              echo '<div class="col-md-5">';
                              echo '<input type="number" id="prev_quantity" name="quantity" class="span3 form-control" value="'.$quantity.'" readonly/><br>';
                              echo '</div>';
                            }
                            else
                              echo "<center><h3>No Record found<br>Check selection </h3></center>"
                          ?>