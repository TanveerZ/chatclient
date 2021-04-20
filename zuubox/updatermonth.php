<?php

session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();


if ($_SERVER['HTTP_HOST'] == "localhost") {

  $SERVER = 'localhost';
  $USERNAME = 'root';
  $PASSWORD = '';
  $DATABASE = 'codesevenstudio';
} else {
  $SERVER = 'localhost';
  $USERNAME = 'zuuboxco_eli';
  $PASSWORD = 'Qawsed@123';
  $DATABASE = 'zuuboxco_DB';
}

$con = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die('Oops connection error -> ' . mysqli_error($con));

//$current_date=date('Y-m-d');

$yearmonth=$_REQUEST['yearmonth'];
            
$uid=$_SESSION['user_id'];

$addwhere="u_id='".$uid."' AND date like '".$yearmonth."%'";
$lastaddevent=$user->select_row('tbl_userevents','*',$addwhere);

$updatewhere="u_id='".$uid."' AND date like '".$yearmonth."%' ORDER BY  date  DESC limit 1";
$lastupdateevent=$user->select_row('tbl_userevents','*',$updatewhere);

$updatewhere1="id='".$uid."' AND  add_date like '".$yearmonth."%' ORDER BY  add_date  DESC limit 1";
$lastupdateprofile=$user->select_row('tbl_singup','*',$updatewhere1);

$query = "SELECT tbl_event_category_master.*, tbl_places.place_name, tbl_event_category.name as activity_name FROM tbl_event_category_master
        LEFT JOIN tbl_places ON tbl_event_category_master.city_id = tbl_places.id
        LEFT JOIN tbl_event_category ON tbl_event_category_master.event_category_id = tbl_event_category.id
        WHERE user_id ='".$uid."' AND date like '".$yearmonth."%' ORDER BY tbl_event_category_master.date DESC,tbl_event_category_master.id DESC limit 1";

$sql = mysqli_query($con, $query);
    $num_rows = mysqli_num_rows($sql);
    if ($num_rows > 0) {
      while ($row = mysqli_fetch_assoc($sql)) {
        $data = $row;
      }
      $lastaddactivity = $data;
    }
    // print_r($lastaddactivity);die;
?>
            
            <div class="col-xs-9">
              <div class="updaterdata">
                  <div class="panel panel-default">
                    <div class="panel-heading">Currently Update Profile Section</div>
                        <div class="panel-body">
                              <div class="row">
                                <?php if(isset($lastupdateprofile['update_section']))
                                  {
                                ?>
                                    <div class="col-xs-9">
                                          <label>Update Section</label>
                                          <div>
                                             <?php 

                                                echo $lastupdateprofile['update_section'];
                                              ?>
                                          </div>
                                    </div>
                                    <div class="col-xs-3">
                                          <label>Updated Date</label>
                                          <div>
                                            <?php 
                                               echo $lastupdateprofile['add_date'];
                                            ?>    
                                          </div>
                                    </div>
                                    <?php
                                  }
                                  else
                                  {
echo '<div class="col-xs-12">Profile Section Not update </div>';
                                  }
                                    ?>
                                  
                               </div>
                        </div>
                  </div>

                <div class="panel panel-default">
                 <div class="panel-heading">Last Add Activity</div>
                <div class="panel-body">
                  <div class="row">

                    <?php if(isset($lastaddactivity['activity_name']))
                    {
                    ?>
                    <div class="col-xs-4">
                      <label>Activity Type</label>
                      <div>
                      <?php 
                        echo $lastaddactivity['activity_name'];
                      ?>  
                      </div>  
                    </div>
                    <div class="col-xs-4">
                      <label>Place Name</label>
                      <div>
                      <?php 
                        echo $lastaddactivity['place_name'];
                      ?>  
                    </div>
                    </div>
                    <?php /*
                    <div class="col-xs-3">
                      <label>Activity </label>
                      <div>
                      <?php 
                        echo $lastaddactivity['content'];
                      ?>  
                    </div>
                    </div>
                    */?>
                    <div class="col-xs-4">
                      <label>Activity Date</label>
                      <div>
                      <?php 
                        echo $lastaddactivity['date'];
                      ?>  
                    </div>
                    </div>
                  <?php

                    }
                    else
                    {
                      echo '<div class="col-xs-12">Activity not add';
                    }
                  ?>

                  </div>
                </div>
                  </div>




              <div class="panel panel-default">
                 <div class="panel-heading">Last Add Event</div>
                <div class="panel-body">
                  <div class="row">

                    <?php if(isset($lastaddevent['event_type']))
                    {
                    ?>
                    <div class="col-xs-3">
                      <label>Event Type</label>
                      <div>
                      <?php 
                        echo $lastaddevent['event_type'];
                      ?>  
                      </div>  
                    </div>
                    <div class="col-xs-3">
                      <label>Event Name</label>
                      <div>
                      <?php 
                        echo $lastaddevent['event_name'];
                      ?>  
                    </div>
                    </div>
                    <div class="col-xs-3">
                      <label>Event Priority</label>
                      <div>
                      <?php 
                        echo $lastaddevent['priority'];
                      ?>  
                    </div>
                    </div>
                    <div class="col-xs-3">
                      <label>Event Date</label>
                      <div>
                      <?php 
                        echo $lastaddevent['date'];
                      ?>  
                    </div>
                    </div>
                  <?php

                    }
                    else
                    {
                      echo '<div class="col-xs-12">Event not add';
                    }
                  ?>

                  </div>
                </div>
                  </div>

                  <div class="panel panel-default">
                <div class="panel-heading">Last Update Event</div>
                <div class="panel-body">
                  <div class="row">
                    <?php if(isset($lastupdateevent['event_type']))
                    {
                      ?>

                    <div class="col-xs-3">
                      <label>Event Type</label>
                      <div>
                      <?php 
                        echo $lastupdateevent['event_type'];
                      ?>  
                      </div>  
                    </div>
                    <div class="col-xs-3">
                      <label>Event Name</label>
                      <div>
                      <?php 
                        echo $lastupdateevent['event_name'];
                      ?>  
                    </div>
                    </div>
                    <div class="col-xs-3">
                      <label>Event Priority</label>
                      <div>
                      <?php 
                        echo $lastupdateevent['priority'];
                      ?>  
                    </div>
                    </div>
                    <div class="col-xs-3">
                      <label>Event Date</label>
                      <div>
                      <?php 
                        echo $lastupdateevent['date'];
                      ?>  
                    </div>
                    </div>
                    <?php
                  }
                  else
                  {
                    echo '<div class="col-xs-12">Event not update</div>';
                  }
                    ?>
                  

                  </div>
                </div>
                  </div>
            </div>

</div>


                    
