<?php 
  include('db_conn.php');
                        $roll_no=$_GET['roll_no'];
                        $student="SELECT * FROM students_entry WHERE roll_no='$roll_no'";
                        $execute=mysql_query($student);
                        $row=mysql_fetch_array($execute);
                        if($row)
                        {
                          echo '<input type="text" class="form-control" name="name" value="'.$row['name'].'"/>';
                          echo '<input type="text" class="form-control" name="ph_no" value="'.$row['ph_no'].'"/>';
                          echo '<select class="form-control" name="event_type" onchange="select()" id="event_type" / autofocus>';
                          echo '<option value="" selected="selected">Select event type</option>';
                          echo '<option value="workshop" >Workshops</option>';
                          echo '<option value="event ">Events</option>';
                          echo '<option value="others">Others</option>';
                          echo '</select>';
                        
                        }
                        else
                        {
                          echo '<input type="text" class="form-control" name="name" placeholder="Name" / autofocus required>';
                          echo '<input type="text" class="form-control" name="ph_no"  placeholder="Phone Number"/ required>';
                          echo '<select class="form-control" name="event_type" onchange="select()" id="event_type">';
                          echo '<option value="" selected="selected">Select event type</option>';
                          echo '<option value="workshop" >Workshops</option>';
                          echo '<option value="event ">Events</option>';
                          echo '<option value="others">Others</option>';
                          echo '</select>';
                        }?>