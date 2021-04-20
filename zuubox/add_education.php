<?php
require_once("include/config.php");
require_once("include/functions.php");

$users = new User();
$cells = $users->select_allrecords('tbl_cell','*');

$allcountry=$users->select_allrecords('tbl_country','*');

?>
<form class="add-edu1 education-formmain">
    <div class="window-btn">
          <!--   <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
            <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
            <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="display: none;"></button>
            <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button> -->
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
    <div class="add-eduform">
            <div class="form-group">
              <label>Name of school<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of school" id="school">
            </div>
            <div class="form-group">
              <label>Name of high school<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of high school" id ="highschool">
            </div>
            <div class="form-group">
              <label>Name of institute<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of institute" id="institude">
            </div>
            <div class="form-group">
              <label>Name of collage<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of collage" id="collage">
            </div>
            <div class="form-group">
              <label>Name of university<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of university" id="univercity">
            </div>
            <div class="form-group">
              <label>Name of technical schedule</label>
              <input type="text" class="form-control" placeholder="Name of technical schedule" id="technical">
            </div>
            <div class="form-group">
              <label>Name of special training</label>
              <input type="text" class="form-control" placeholder="Name of special training" id="special">
            </div>
            <button type="button" class="btn btn-default" id="saveeduction">Submit</button>
    </div>
    <!--<div class="add-eduform">
            <div class="form-group">
              <label>Name of school<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of school" id="school1">
            </div>
            <div class="form-group">
              <label>Ex Date<span>*</span></label>
              <input type="date" class="form-control" placeholder="Ex Date" id ="date1">
            </div>
            <div class="form-group">
              <label>Cites<span>*</span></label>
              <input type="text" class="form-control" placeholder="Cites" id="cites1">
            </div>
            <div class="form-group">
              <label>States<span>*</span></label>
              <input type="text" class="form-control" placeholder="States" id="states1">
            </div>
            <div class="form-group">
              <label>Type of certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="certificates" id="certificates1">
            </div>
            <div class="form-group">
              <label>Type of diplomas</label>
              <input type="text" class="form-control" placeholder="Diplomas" id="diplomas1">
            </div>
            <div class="form-group">
              <label>Type of degrees</label>
              <input type="text" class="form-control" placeholder="Degrees" id="degrees1">
            </div>
            <button type="button" class="btn btn-default" id="saveeduction1">Submit</button>
    </div>--->
</form>


<form class="add-edu2 education-formmain">
    <div class="window-btn">
          <!--   <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
            <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
            <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="display: none;"></button>
            <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button> -->
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
    
    <div class="add-eduform">
            <div class="form-group">
              <label>Name of High school<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of High school" id="High school1">
            </div>
            <div class="form-group">
              <label>Ex Date<span>*</span></label>
              <input type="date" class="form-control" placeholder="Ex Date" id ="Date2">
            </div>
            <div class="form-group">
              <label>Cites<span>*</span></label>
              <input type="text" class="form-control" placeholder="Cites" id="Cites2">
            </div>
            <div class="form-group">
              <label>States<span>*</span></label>
              <input type="text" class="form-control" placeholder="States" id="States2">
            </div>
            <div class="form-group">
              <label>Type of certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="certificates" id="certificates2">
            </div>
            <div class="form-group">
              <label>Type of diplomas</label>
              <input type="text" class="form-control" placeholder="Diplomas" id="diplomas2">
            </div>
            <div class="form-group">
              <label>Type of degrees</label>
              <input type="text" class="form-control" placeholder="Degrees" id="degrees2">
            </div>
            <button type="button" class="btn btn-default" id="saveeduction2">Submit</button>
    </div>
</form>


<form class="add-edu3 education-formmain">
    <div class="window-btn">
          <!--   <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
            <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
            <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="display: none;"></button>
            <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button> -->
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
   
    <div class="add-eduform">
            <div class="form-group">
              <label>Name of Institute<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of Institute" id="Institute3">
            </div>
            <div class="form-group">
              <label>Ex Date<span>*</span></label>
              <input type="date" class="form-control" placeholder="Ex Date" id ="Date3">
            </div>
            <div class="form-group">
              <label>Cites<span>*</span></label>
              <input type="text" class="form-control" placeholder="Cites" id="Cites3">
            </div>
            <div class="form-group">
              <label>States<span>*</span></label>
              <input type="text" class="form-control" placeholder="States" id="States3">
            </div>
            <div class="form-group">
              <label>Type of certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="certificates" id="certificates3">
            </div>
            <div class="form-group">
              <label>Type of diplomas</label>
              <input type="text" class="form-control" placeholder="Diplomas" id="Diplomas3">
            </div>
            <div class="form-group">
              <label>Type of degrees</label>
              <input type="text" class="form-control" placeholder="Degrees" id="Degrees3">
            </div>
            <button type="button" class="btn btn-default" id="saveeduction3">Submit</button>
    </div>
</form>


<form class="add-edu4 education-formmain">
    <div class="window-btn">
          <!--   <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
            <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
            <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="display: none;"></button>
            <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button> -->
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
   
    <div class="add-eduform">
            <div class="form-group">
              <label>Name of Collage<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of Collage" id="Collage4">
            </div>
            <div class="form-group">
              <label>Ex Date<span>*</span></label>
              <input type="date" class="form-control" placeholder="Ex Date" id ="Date4">
            </div>
            <div class="form-group">
              <label>Cites<span>*</span></label>
              <input type="text" class="form-control" placeholder="Cites" id="Cites4">
            </div>
            <div class="form-group">
              <label>States<span>*</span></label>
              <input type="text" class="form-control" placeholder="States" id="States4">
            </div>
            <div class="form-group">
              <label>Type of certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="certificates" id="certificates4">
            </div>
            <div class="form-group">
              <label>Type of diplomas</label>
              <input type="text" class="form-control" placeholder="Diplomas" id="Diplomas4">
            </div>
            <div class="form-group">
              <label>Type of degrees</label>
              <input type="text" class="form-control" placeholder="Degrees" id="Degrees4">
            </div>
            <button type="button" class="btn btn-default" id="saveeduction4">Submit</button>
    </div>
</form>


<form class="add-edu5 education-formmain">
    <div class="window-btn">
          <!--   <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
            <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
            <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="display: none;"></button>
            <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button> -->
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
   
    <div class="add-eduform">
            <div class="form-group">
              <label>Name of University<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of University" id="University5">
            </div>
            <div class="form-group">
              <label>Ex Date<span>*</span></label>
              <input type="date" class="form-control" placeholder="Ex Date" id ="Date5">
            </div>
            <div class="form-group">
              <label>Cites<span>*</span></label>
              <input type="text" class="form-control" placeholder="Cites" id="Cites5">
            </div>
            <div class="form-group">
              <label>States<span>*</span></label>
              <input type="text" class="form-control" placeholder="States" id="States5">
            </div>
            <div class="form-group">
              <label>Type of certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="certificates" id="certificates5">
            </div>
            <div class="form-group">
              <label>Type of diplomas</label>
              <input type="text" class="form-control" placeholder="Diplomas" id="Diplomas5">
            </div>
            <div class="form-group">
              <label>Type of degrees</label>
              <input type="text" class="form-control" placeholder="Degrees" id="Degrees5">
            </div>
            <button type="button" class="btn btn-default" id="saveeduction5">Submit</button>
    </div>
</form>

<form class="add-edu6 education-formmain">
    <div class="window-btn">
          <!--   <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
            <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
            <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="display: none;"></button>
            <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button> -->
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
   
    <div class="add-eduform">
            <div class="form-group">
              <label>Name of Technical School<span>*</span></label>
              <input type="text" class="form-control" placeholder="Name of Technical School" id="Technical school6">
            </div>
            <div class="form-group">
              <label>Ex Date<span>*</span></label>
              <input type="date" class="form-control" placeholder="Ex Date" id ="Date6">
            </div>
            <div class="form-group">
              <label>Cites<span>*</span></label>
              <input type="text" class="form-control" placeholder="Cites" id="">
            </div>
            <div class="form-group">
              <label>States<span>*</span></label>
              <input type="text" class="form-control" placeholder="States" id="States6">
            </div>
            <div class="form-group">
              <label>Type of certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="certificates" id="certificates6">
            </div>
            <div class="form-group">
              <label>Type of diplomas</label>
              <input type="text" class="form-control" placeholder="Diplomas" id="Diplomas6">
            </div>
            <div class="form-group">
              <label>Type of degrees</label>
              <input type="text" class="form-control" placeholder="Degrees" id="Degrees6">
            </div>
            <button type="button" class="btn btn-default" id="saveeduction6">Submit</button>
    </div>
</form>



<script type="text/javascript">
        $('.close-btn-sub').click(function(){
			$('.add-edu1').hide();
			$('.add-edu2').hide(); 
			$('.add-edu3').hide(); 
			$('.add-edu4').hide();  
			$('.add-edu5').hide(); 
			$('.add-edu6').hide();             
    });
</script>


<script type="text/javascript">
   $('#saveeduction').click(function(){

    var school = $("#school").val();
    var highschool = $("#highschool").val();
    var institude = $("#institude").val();
    var collage = $("#collage").val();
    var univercity = $("#univercity").val();
    var technical = $("#technical").val();
    var special = $("#special").val();

    if(school === '' || highschool === '' || institude === '' || collage ==='' || univercity ===''  )
    {
      alert('Please fill mandatory fildes');
    }
    else
    {
        $.ajax({
            type:"POST",
            url:"addeducationajax_action.php",
            data:{school:school,highschool:highschool,institude:institude,collage:collage,univercity:univercity,technical:technical,special:special},
                success:function(result){ 
                   $('.add-edu1').hide(); 
                   //alert(result);
                /*alert('You have successfully add event.');      
                $('.new_event').hide();*/
                $('.edication-sec1').html(result);
              }
              });  
    }
      });
</script>