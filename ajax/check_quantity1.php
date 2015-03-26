    <?php
                          include('db_conn.php');
                          	
                          	$item=$_GET['item'];
                          	

                          	$select_query="SELECT * FROM items WHERE item_name='$item'";
                            $execute=mysql_query($select_query);
                            $row=mysql_fetch_array($execute);
                            $row_available=$row['available'];
                            	echo '<div class="col-md-7">';
                            	echo '<input type="number" class="span2 form-control" min="1"  name="quantity_issuing" id="quantity_returned" placeholder="Quantity"/ required>';
                              echo '</div>';
                              echo '<div class="col-md-5">';
                              echo '<input type="number" id="prev_quantity" name="quantity" class="span3 form-control" value="'.$row_available.'" readonly/><br>';
                              echo '</div>'
                          ?>