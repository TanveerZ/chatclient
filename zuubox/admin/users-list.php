<?php
include_once("include/config.php");
include_once("connection.php");
include_once("include/functions.php");
$user = new User();

if(!isset($_SESSION['admin_id'])) { 
 header('location: login.php'); exit;
}

$rowsPerPage  = 10;
$base_pgname = basename($_SERVER['PHP_SELF']);

$where_cond = "";
$where_link = "";
$search = "";
$date   = "";

if(isset($_REQUEST['name']) && trim($_REQUEST['name']!=''))
{
  $search = mysqli_real_escape_string($con, trim($_REQUEST['name']));

  $where_cond = " first_name like '%".$search."%' OR last_name like '%".$search."%' OR phone_number like '%".$search."%' OR email like '%".$search."%' OR mailbox_key like '%".$search."%'";
  $where_link = "&name=".$search;
}

if(isset($_REQUEST['date']) && $_REQUEST['date']!='')
{
  $date = mysqli_real_escape_string(trim($con, $_REQUEST['date']));

  if($where_cond!="")
  {
    $where_cond = $where_cond. " OR created_date like '%".$date."%'";
    $where_link = $where_link."&date=".$date;
  }
  else
  {
    $where_cond = " created_date like '%".$date."%'";
    $where_link = "&date=".$date;
  }
}

if($where_cond!="")
{
  $sql = "SELECT * FROM users WHERE `deleted` = '' AND user_type='2' AND (".$where_cond.") ORDER BY created_date DESC";
}
else
{
  $sql = "SELECT * FROM users WHERE `deleted` = '' AND user_type='2' ORDER BY created_date DESC";
}

$limtQry 	  = $user->getPagingQuery($sql, $rowsPerPage);
$pagingLink = $user->getPagingLink_search($where_link, $sql, $rowsPerPage, $base_pgname); 
$all_users  = $user->getRows($limtQry);

?>

<?php include_once("common/header.php");?>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <?php include_once("common/left_sidebar.php");?>
      <?php include_once("common/profile_section.php");?>
    </div><!-- /.navbar-collapse -->
  </nav>

  <div id="page-wrapper">
  
    <?php 
    if(isset($_SESSION['success']) && $_SESSION['success']!= "")
    {
      ?>
      <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $_SESSION['success']; ?>
        <?php unset($_SESSION['success']);?>
      </div>
      <?php 
    }

    if(isset($_SESSION['error']) && $_SESSION['error']!= "")
    {
      ?>
      <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <?php echo $_SESSION['error']; ?>
        <?php unset($_SESSION['error']);?>
      </div>
      <?php 
    }
    ?>

    <div class="row">
      <div class="col-lg-12">

        <h3>View Users Account</h3>
        <hr>
        <form method="post" id="frm_testimonials" name="frm_testimonials" role="form">
          <table>
            <tr>
              <td width="60%" style="padding:5px;">
              <input type="text" class="form-control" name="name" value="<?php echo $search; ?>" placeholder="Name or Email Or Phone No Or Z-Key" />
              </td>
              <td width="20%" style="padding:5px;">
              <input type="text" class="form-control" name="date" value="<?php echo $date; ?>" placeholder="Added Date" />
              </td>
              <td width="8%" style="padding:5px;">
                  <input type="submit" class="btn btn-primary " value="Search" id="btnsbt" name="search"> 
              </td>
              <td width="10%" style="padding:5px;">
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-primary">Clear Search</a>
              </td>
            </tr>
          </table>
        </form>
        <br>

        <div class="table-responsive">
          <?php 
          if($all_users) 
          {
            ?>
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th width="5%"><center>#</center></th>
                  <th><center>Name</center></th>
                  <th><center>Email</center></th>
                  <th><center>Phone No</center></th>
                  <th><center>Z-Key</center></th>
                  <th><center>Added Date</center></th>
                  <th><center>Link</center></th>
                </tr>
              </thead>
                
              <tbody>
                <?php
                $i = 1;
                if(isset($_GET['page']))
                {
                  $pns = $_GET['page'] - $i;
                  $i = $rowsPerPage * $pns  + 1;
                }
                else
                {
                  $i = $rowsPerPage * 0  + 1;
                }
                   
                foreach($all_users as $users)
                {
                  
                  ?>
                  <tr>
                    <td><?php echo $i++; ?></td>

                    <td>
                      <?php 
                        echo $users['first_name']." ".$users['last_name'];
                      ?>
                    </td>

                    <td>
                      <?php 
                        echo $users['email'];
                      ?>
                    </td>

                    <td>
                      <?php 
                        echo $users['phone_number'];
                      ?>
                    </td>

                    <td>
                      <?php 
                        echo $users['mailbox_key'];
                      ?>
                    </td>
                    
                    <td>
                      <center><?php echo date("m/d/Y h:i:s",strtotime($users['created_date'])); ?></center>
                    </td>

                    <td>
                        <center><a href="javascript:delete_me(<?php echo $users['user_id']?>);"><img width="16" height="16" src="images/delete.png" title="Delete" /></a></center>
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
            <?php
          } 
          else 
          {
            ?>
            <h4>No stories found.</h4>      
            <?php 
          }
          ?>       
        </div>                                                               
      </div>
    </div><!-- /.row -->
        
    <div class="row">
    	<div class="col-lg-12">
        <?php echo $pagingLink; ?>
        <br><br><br><br><br><br>
      </div>
    </div>
        
  </div><!-- /#page-wrapper -->
</div><!-- /#wrapper -->   

<?php include_once("common/footer.php"); ?>

<script type="text/javascript">
function delete_me(user_id)
{
  var res = confirm("Are you sure, you want to delete this user's account?");
  if(res == true)
  {
    window.location='delete-user.php?deleteid='+user_id;
  }
}
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

<script>
  $(document).ready(function(){
    var date_input=$('input[name="date"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
      format: 'yyyy-mm-dd',
      container: container,
      todayHighlight: true,
      autoclose: true,
    })
  })
</script>