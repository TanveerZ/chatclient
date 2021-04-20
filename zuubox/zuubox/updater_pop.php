
<link rel="stylesheet" href="css/updater.css">
<form class="updater up" method="post" enctype="multipart/form-data">
<div class="recent-box-sc"> 
    <div class="month_title">
      <img src="img/top_title_updater.PNG" class="img-responsive">
      <div class="window-btn window-btn2" >
    	<button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
    </div>
      <h4><span id='headmonth'></span></h4>
    </div>
   <!--  <a class="close-btn pull-right" style="top: -2px;
    right: -1px;">x</a> -->

    <div class="col-xs-12">
      <div class="row" style="margin: -13px 0px 5px 2px;">
          <input type="text" name="searchupdater" id="searchupdater" placeholder="Search" >            
      </div>

      <div class="row">
            <div class="col-xs-2">                       
                  <div class="monthlist">  
                        <ul style="list-style-type: none">
                             <li class="month" style="background-color: orange"><?php echo $year;?></li>
                              <li id="<?php echo date('Y').'-01'; ?>" class="month <?php if(date('m')=='01') echo "active";?>">January</li>
                              <li id="<?php echo date('Y').'-02'; ?>" class="month <?php if(date('m')=='02') echo "active";?>">February</li>
                              <li id="<?php echo date('Y').'-03'; ?>" class="month <?php if(date('m')=='03') echo "active";?>">March
                              </li>
                              <li id="<?php echo date('Y').'-04'; ?>" class="month <?php if(date('m')=='04') echo "active";?>">April
                              </li>
                              <li id="<?php echo date('Y').'-05'; ?>" class="month <?php if(date('m')=='05') echo "active";?>">May
                              </li>
                              <li id="<?php echo date('Y').'-06'; ?>" class="month <?php if(date('m')=='06') echo "active";?>">June
                              </li>
                                             <li id="<?php echo date('Y').'-07'; ?>" class="month <?php if(date('m')=='07') echo "active";?>">July
                              </li>
                              <li id="<?php echo date('Y').'-08'; ?>" class="month <?php if(date('m')=='08') echo "active";?>">August</li>
                              <li id="<?php echo date('Y').'-09'; ?>" class="month <?php if(date('m')=='09') echo "active";?>">September</li>
                              <li id="<?php echo date('Y').'-10'; ?>" class="month <?php if(date('m')=='10') echo "active";?>">October</li>
                              <li id="<?php echo date('Y').'-11'; ?>" class="month <?php if(date('m')=='11') echo "active";?>">November</li>
                              <li id="<?php echo date('Y').'-12'; ?>" class="month <?php if(date('m')=='12') echo "active";?>">December</li>
                        </ul>       
                  </div>
            </div>
            
              <div class="updaterdata">
                  
            </div>
      </div> 
      </div>     		
</div>
	 
 </div>  
</form>

<script type="text/javascript">
    $('ul li').click(function() { 
  var yearmonth = $(this).attr('id');

  var arr = yearmonth.split('-');
  $("#headmonth").html(moment(arr[1], 'MM').format('MMMM'));
  
     $.ajax({
         type:"POST",
        url:"updatermonth.php",
        data:{yearmonth:yearmonth},
        success:function(result){
          $(".updaterdata").html(result);
        }
    });
    $('ul li').removeClass('active');
    $(this).addClass('active');
        
});
  function currendata(){
    var yearmonth='<?php echo date('Y-m');?>';
var arr = yearmonth.split('-');
 
  
$("#headmonth").html(moment(arr[1], 'MM').format('MMMM'));

    $.ajax({
         type:"POST",
        url:"updatermonth.php",
        data:{yearmonth:yearmonth},
        success:function(result){
      $(".updaterdata").html(result);

        }
        });
  }
  currendata();

</script>

  <script type="text/javascript">
     $('#searchupdater').keypress(function(event) 
      { if (event.keyCode == 13)
         { event.preventDefault(); } 
       });
    
            $('#searchupdater').keyup(function(){                            
              var searchupdater = document.getElementById('searchupdater').value;  

               $.ajax({
                type:"POST",
                url:"updater-searchajax.php",
                data:{searchupdater:searchupdater},
                success:function(result){
                  $(".updaterdata").html(result);
                }
               });

            });

          </script>