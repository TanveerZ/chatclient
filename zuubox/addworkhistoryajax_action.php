  <?php

  session_start();  

  require_once("include/config.php");

  require_once("include/functions.php");

  $user = new User(); 
  extract($_POST);

    if(isset($workschool))
    {    
      $_SESSION['schoolname'] = $workschool;
      $_SESSION['frmdateschool'] = $frmdate;
      $_SESSION['todateschool'] = $todate;
      $_SESSION['cityschool'] = $workcity;
      $_SESSION['stateschool'] = $workstate;
      $_SESSION['certificatesschool'] = $certificates;
      $_SESSION['diplomasschool'] = $diplomas;
      $_SESSION['degressschool'] = $degress;
    }

    if(isset($highschool))
     {
        $_SESSION['highschool'] = $highschool;
        $_SESSION['frmdatehigh'] = $frmdatehigh;
        $_SESSION['todatehigh'] = $todatehigh;
        $_SESSION['highcity'] = $highcity;
        $_SESSION['highstate'] = $highstate;
        $_SESSION['highcertificates'] = $highcertificates;
        $_SESSION['highdiplomas'] = $highdiplomas;
        $_SESSION['highdegress'] = $highdegress;
     }

    if(isset($institutes_nm))
     {
        $_SESSION['institutes_nm'] = $institutes_nm;
        $_SESSION['frmdateinstitute'] = $frmdateinstitute;
        $_SESSION['todateinstitute'] = $todateinstitute;
        $_SESSION['institutecity'] = $institutecity;
        $_SESSION['institutestate'] = $institutestate;
        $_SESSION['institutecertificates'] = $institutecertificates;
        $_SESSION['institutediplomas'] = $institutediplomas;
        $_SESSION['institutedegress'] = $institutedegress;
     } 

     if(isset($clg_name))
     {
        $_SESSION['clg_name'] = $clg_name;
        $_SESSION['frmdateclg'] = $frmdateclg;
        $_SESSION['todateclg'] = $todateclg;
        $_SESSION['clg_city'] = $clg_city;
        $_SESSION['clg_state'] = $clg_state;
        $_SESSION['clg_certificates'] = $clg_certificates;
        $_SESSION['clg_diplomas'] = $clg_diplomas;
        $_SESSION['clg_degress'] = $clg_degress;
     } 

     if(isset($uni_name)) 
     {
        $_SESSION['uni_name'] = $uni_name;
        $_SESSION['frmdateuni'] = $frmdateuni;
        $_SESSION['todateuni'] = $todateuni;
        $_SESSION['uni_city'] = $uni_city;
        $_SESSION['uni_state'] = $uni_state;
        $_SESSION['uni_certificates'] = $uni_certificates;
        $_SESSION['uni_diplomas'] = $uni_diplomas;
        $_SESSION['uni_degress'] = $uni_degress;
     } 


     if(isset($tech_name))
     {
        $_SESSION['tech_name'] = $tech_name;
        $_SESSION['frmdatetech'] = $frmdatetech;
        $_SESSION['todatetech'] = $todatetech;
        $_SESSION['tech_city'] = $tech_city;
        $_SESSION['tech_state'] = $tech_state;
        $_SESSION['tech_certificates'] = $tech_certificates;
        $_SESSION['tech_diplomas'] = $tech_diplomas;
        $_SESSION['tech_degress'] = $tech_degress;
     } 

     if(isset($spc_training)) 
     {
        $_SESSION['spc_training'] = $spc_training;
        $_SESSION['frmdatespc'] = $frmdatespc;
        $_SESSION['todatespc'] = $todatespc;
        $_SESSION['spc_city'] = $spc_city;
        $_SESSION['spc_state'] = $spc_state;       
     } 

  ?>

<a href="#" class="btn-box" id="work-historypop">Add</a>
  <h1>AVATOR</h1>
    <ul class="workdetails">  
       <!-- high school-->
    <?php if(isset($_SESSION['schoolname'])){?>    
      <li>
        <div class="row">
          <div class="col-xs-4">
            <h6><?php echo $_SESSION['schoolname']; ?>:</h6>
            <h6>Ex.<?php  $fdate=strtotime($_SESSION['frmdateschool']);  
                         echo $frmdate = date('m/Y',$fdate);
                ?> - <?php $tdate = strtotime($_SESSION['todateschool']);echo $todate = date('m/Y',$tdate) ?> </h6>                           
          </div>
          <div class="col-xs-8">
            <h6 class="text-right"><?php echo  $_SESSION['cityschool']; ?>, <?php echo   $_SESSION['stateschool']; ?></h6>
              <div class="ed-right text-right">
                <h6><?php echo  $_SESSION['certificatesschool']; ?>,<?php echo  $_SESSION['diplomasschool']; ?>, <?php echo  $_SESSION['degressschool']; ?></h6>                                  
              </div>
          </div>
        </div>   
      </li>

      <?php
        }
        /* highschool*/
       if(isset($_SESSION['highschool'])){?>    
      <li>
        <div class="row">
          <div class="col-xs-4">
            <h6><?php  if(isset($_SESSION['highcity'])){ echo $_SESSION['highschool']; }?>:</h6>
            <h6>Ex.<?php 
 if(isset($_SESSION['highcity'])){
            $fdate = strtotime($_SESSION['frmdatehigh']);  
                         echo $frmdate = date('m/Y', $fdate);
                       }
                ?> - <?php 
 if(isset($_SESSION['todatehigh'])){
  $tdate = strtotime($_SESSION['todatehigh']);echo $todate = date('m/Y',$tdate);
}?> </h6>                           
          </div>
          <div class="col-xs-8">
            <h6 class="text-right"><?php if(isset($_SESSION['highcity'])){ echo  $_SESSION['highcity'];} ?>, <?php  if(isset($_SESSION['highcity'])){ echo $_SESSION['highstate']; }?></h6>
              <div class="ed-right text-right">
                <h6><?php  if(isset($_SESSION['highcity'])){ echo  $_SESSION['highcertificates']; }?>,<?php  if(isset($_SESSION['highcity'])){ echo  $_SESSION['highdiplomas'];} ?>, <?php  if(isset($_SESSION['highcity'])){ echo $_SESSION['highdegress'];} ?></h6>

              </div>
          </div>
        </div>   
      </li>
      <?php
      }
      /*institutes*/
         if(isset($_SESSION['institutes_nm'])){?>    
      <li>
        <div class="row">
          <div class="col-xs-4">
            <h6><?php echo $_SESSION['institutes_nm']; ?>:</h6>
            <h6>Ex.<?php  $fdate=strtotime($_SESSION['frmdateinstitute']);  
                         echo $frmdate = date('m/Y',$fdate);
                ?> - <?php $tdate = strtotime($_SESSION['todateinstitute']);echo $todate = date('m/Y',$tdate) ?> </h6>                           
          </div>
          <div class="col-xs-8">
            <h6 class="text-right"><?php echo  $_SESSION['institutecity']; ?>, <?php echo   $_SESSION['institutestate']; ?></h6>
              <div class="ed-right text-right">
                <h6><?php echo  $_SESSION['institutecertificates']; ?>,<?php echo  $_SESSION['institutediplomas']; ?>, <?php echo  $_SESSION['institutedegress']; ?></h6>
                                                                 
              </div>
          </div>
        </div>   
      </li>
        <?php
        }
        /*collage*/
      if(isset($_SESSION['clg_name'])){?>    
      <li>
        <div class="row">
          <div class="col-xs-4">
            <h6><?php echo $_SESSION['clg_name']; ?>:</h6>
            <h6>Ex.<?php  $fdate=strtotime($_SESSION['frmdateclg']);  
                         echo $frmdate = date('m/Y',$fdate);
                ?> - <?php $tdate = strtotime($_SESSION['todateclg']);echo $todate = date('m/Y',$tdate) ?> </h6>                           
          </div>
          <div class="col-xs-8">
            <h6 class="text-right"><?php echo  $_SESSION['clg_city']; ?>, <?php echo   $_SESSION['clg_state']; ?></h6>
              <div class="ed-right text-right">
                <h6><?php echo  $_SESSION['clg_certificates']; ?>,<?php echo  $_SESSION['clg_diplomas']; ?>, <?php echo  $_SESSION['clg_degress']; ?></h6>
                                                                        
              </div>
          </div>
        </div>   
      </li>
       <?php }
        /*University*/
       if(isset($_SESSION['uni_name'])){?>    
      <li>
        <div class="row">
          <div class="col-xs-4">
            <h6><?php echo $_SESSION['uni_name']; ?>:</h6>
            <h6>Ex.<?php  $fdate=strtotime($_SESSION['frmdateuni']);  
                         echo $frmdate = date('m/Y',$fdate);
                ?> - <?php $tdate = strtotime($_SESSION['todateuni']);echo $todate = date('m/Y',$tdate) ?> </h6>                           
          </div>
          <div class="col-xs-8">
            <h6 class="text-right"><?php echo  $_SESSION['uni_city']; ?>, <?php echo   $_SESSION['uni_state']; ?></h6>
              <div class="ed-right text-right">
                <h6><?php echo  $_SESSION['uni_certificates']; ?>,<?php echo  $_SESSION['uni_diplomas']; ?>, <?php echo  $_SESSION['uni_degress']; ?></h6>
                                                                                    
              </div>
          </div>
        </div>   
      </li>
       <?php }
       /*Technical */
         if(isset($_SESSION['tech_name'])){?>    
      <li>
        <div class="row">
          <div class="col-xs-4">
            <h6><?php echo $_SESSION['tech_name']; ?>:</h6>
            <h6>Ex.<?php  $fdate=strtotime($_SESSION['frmdatetech']);  
                         echo $frmdate = date('m/Y',$fdate);
                ?> - <?php $tdate = strtotime($_SESSION['todatetech']);echo $todate = date('m/Y',$tdate) ?> </h6>                           
          </div>
          <div class="col-xs-8">
            <h6 class="text-right"><?php echo  $_SESSION['tech_city']; ?>, <?php echo   $_SESSION['tech_state']; ?></h6>
              <div class="ed-right text-right">
                <h6><?php echo  $_SESSION['tech_certificates']; ?>,<?php echo  $_SESSION['tech_diplomas']; ?>, <?php echo  $_SESSION['tech_degress']; ?></h6>
                                                                                           
              </div>
          </div>
        </div>   
      </li>
          <?php
           }
           /*Special */
        if(isset($_SESSION['spc_training'])){?>
           <li>
            <div class="row">
              <div class="col-xs-4">
                <h6><?php echo  $_SESSION['spc_training']; ?>:</h6>
                <h6>Ex.<?php  $fdate=strtotime($_SESSION['frmdatespc']);  
                             echo $frmdate = date('m/Y',$fdate);
                    ?> - <?php $tdate = strtotime($_SESSION['todatespc']);echo $todate = date('m/Y',$tdate) ?> </h6>                        
              </div>
              <div class="col-xs-8">
                <h6 class="text-right"><?php echo  $_SESSION['spc_city']; ?>, <?php echo  $_SESSION['spc_state']; ?></h6>
                      
              </div>
            </div>   
          </li>

          <?php
            }
          ?>       
    </ul>

            <script type="text/javascript">            
              $('#add-edu').click(function(){
               $('.add-edu1').toggle();
               $('.login_box').hide();
             });
            </script>    

             <script type="text/javascript">
              $('#add-work').click(function(){
                $('.add-work1').toggle();
              });
            </script>

             <script type="text/javascript">
              $('#add-work2').click(function(){
                $('.add-work2').hide();
                $('.add-work1').toggle();
                });
            </script>
<script type="text/javascript">
    $('#work-historypop').click(function(){   
   $('.add-workschool').show();  
   //$('.workhistory-sec1').show();
   //$('.workhistory-details').hide();

    //$('.login_box').hide(); 
   });
</script>

