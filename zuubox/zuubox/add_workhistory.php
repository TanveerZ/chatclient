<?php
require_once("include/config.php");
require_once("include/functions.php");

$users = new User();
$cells = $users->select_allrecords('tbl_cell','*');
$allcountry=$users->select_allrecords('tbl_country','*');


?>

<script type="text/javascript">
  $("#addButton").click(function () {

   
  var newTextBoxDiv = $(document.createElement('div')).attr("id", 'TextBoxDiv' + counter);
                
  newTextBoxDiv.after().html('<label>Textbox # : </label>' + '<input type="text" name="textbox" id="textbox" value="" >');
            
  newTextBoxDiv.appendTo("#TextBoxesGroup");

        //alert("hi");
});
</script>
<!--- add work history school -->
<form class="add-workschool work-formmain">
    <div class="window-btn">     
      <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
    <div class="add-workform">
      <div id="TextBoxesGroup">
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">From Date<span>*</span></label>
                <div class="col-xs-12"> <input type="date" class="form-control" id="frmdate"></div>     
              </div>
            </div>
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">To Date<span>*</span></label>
                <div class="col-xs-12"><input type="date" class="form-control" id="todate"></div>      
              </div>
            </div>
              
            <div class="form-group">
              <label>School Name<span>*</span></label>
              <input type="text" class="form-control" placeholder="School Name" id ="workschool" name="workschool">
            </div>
            <div class="form-group">
              <label>City<span>*</span></label>
              <input type="text" class="form-control" placeholder="City" id="workcity" name="workcity">
            </div>

            <div class="form-group">
              <label>State<span>*</span></label>
              <input type="text" class="form-control" placeholder="State" id="workstate" name="workstate">
            </div>

            <div class="form-group">
              <label>Type Of Certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="Certificates" id="certificates" name="certificates">
            </div>
            <div class="form-group">
              <label>Type Of Diplomas<span>*</span></label>
              <input type="text" class="form-control" placeholder="Diplomas" id="diplomas" name="diplomas">
            </div>

            <div class="form-group">
              <label><span>Type Of Degress*</span></label>
              <input type="text" class="form-control" placeholder="Degress" id="degress" name="degress">
            </div>
            <hr>
            
            </div>

            <button type="button" class="btn btn-default" id="saveschool">Submit</button>
    </div>
</form>
<!-- add work history high school -->
 <form class="add-workhigh work-formmain"> 
    <div class="window-btn">           
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
    <div class="add-workform">
      <div id="TextBoxesGroup">
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">From Date<span>*</span></label>
                <div class="col-xs-12"> <input type="date" class="form-control" id="frmdatehigh"></div>        
              </div>
            </div>
             <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">To Date<span>*</span></label>
                <div class="col-xs-12"><input type="date" class="form-control" id="todatehigh"></div>             
              </div>
            </div>
            <div class="form-group">
              <label>High School Name<span>*</span></label>
              <input type="text" class="form-control" placeholder="School Name" id ="highschool" name="highschool">
            </div>
            <div class="form-group">
              <label>City<span>*</span></label>
              <input type="text" class="form-control" placeholder="City" id="highcity" name="highcity">
            </div>

            <div class="form-group">
              <label>State<span>*</span></label>
              <input type="text" class="form-control" placeholder="State" id="highstate" name="highstate">
            </div>

            <div class="form-group">
              <label>Type Of Certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="Certificates" id="highcertificates" name="certificates">
            </div>
            <div class="form-group">
              <label>Type Of Diplomas<span>*</span></label>
              <input type="text" class="form-control" placeholder="Diplomas" id="highdiplomas" name="highdiplomas">
            </div>

            <div class="form-group">
              <label><span>Type Of Degress*</span></label>
              <input type="text" class="form-control" placeholder="Degress" id="highdegress" name="highdegress">
            </div>
            <hr>
            
            </div>
            <button type="button" class="btn btn-default" id="savehighschool">Submit</button>
    </div>
</form>

<!-- add work history institute -->
 <form class="add-workinstitute work-formmain">
    <div class="window-btn">           
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
    <div class="add-workform">
      <div id="TextBoxesGroup">
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">From Date<span>*</span></label>
                <div class="col-xs-12"> <input type="date" class="form-control" id="frmdateinstitute"></div>       
              </div>
            </div>
              <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">To Date<span>*</span></label>
                <div class="col-xs-12"><input type="date" class="form-control" id="todateinstitute"></div>            
              </div>
            </div>
            <div class="form-group">
              <label>Institute Name<span>*</span></label>
              <input type="text" class="form-control" placeholder="School Name" id ="institutes_nm" name="institutes_nm">
            </div>
            <div class="form-group">
              <label>City<span>*</span></label>
              <input type="text" class="form-control" placeholder="City" id="institutecity" name="institutecity">
            </div>

            <div class="form-group">
              <label>State<span>*</span></label>
              <input type="text" class="form-control" placeholder="State" id="institutestate" name="institutestate">
            </div>

            <div class="form-group">
              <label>Type Of Certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="Certificates" id="institutecertificates" name="institutecertificates">
            </div>
            <div class="form-group">
              <label>Type Of Diplomas<span>*</span></label>
              <input type="text" class="form-control" placeholder="Diplomas" id="institutediplomas" name="institutediplomas">
            </div>

            <div class="form-group">
              <label><span>Type Of Degress*</span></label>
              <input type="text" class="form-control" placeholder="Degress" id="institutedegress" name="institutedegress">
            </div>
            <hr>
            
            </div>
            <button type="button" class="btn btn-default" id="saveinstitute">Submit</button>
    </div>
</form>

<!-- add work history collage -->
 <form class="add-workcollage work-formmain"> 
    <div class="window-btn">           
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
    <div class="add-workform">
      <div id="TextBoxesGroup">
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">From Date<span>*</span></label>
                <div class="col-xs-12"> <input type="date" class="form-control" id="frmdateclg"></div>            
              </div>
            </div>
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">To Date<span>*</span></label>
                <div class="col-xs-12"><input type="date" class="form-control" id="todateclg"></div>             
              </div>
            </div>
              
            <div class="form-group">
              <label>Collage Name<span>*</span></label>
              <input type="text" class="form-control" placeholder="Collage Name" id ="clg_name" name="clg_name">
            </div>
            <div class="form-group">
              <label>City<span>*</span></label>
              <input type="text" class="form-control" placeholder="City" id="clg_city" name="clg_city">
            </div>

            <div class="form-group">
              <label>State<span>*</span></label>
              <input type="text" class="form-control" placeholder="State" id="clg_state" name="clg_state">
            </div>

            <div class="form-group">
              <label>Type Of Certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="Certificates" id="clg_certificates" name="clg_certificates">
            </div>
            <div class="form-group">
              <label>Type Of Diplomas<span>*</span></label>
              <input type="text" class="form-control" placeholder="Diplomas" id="clg_diplomas" name="clg_diplomas">
            </div>

            <div class="form-group">
              <label><span>Type Of Degress*</span></label>
              <input type="text" class="form-control" placeholder="Degress" id="clg_degress" name="clg_degress">
            </div>
            <hr>
            
            </div>
            <button type="button" class="btn btn-default" id="savecollage">Submit</button>
    </div>
</form>

<!-- add work history university -->
 <form class="add-workuniversity work-formmain"> 
    <div class="window-btn">           
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
    <div class="add-workform">
      <div id="TextBoxesGroup">
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">From Date<span>*</span></label>
                <div class="col-xs-12"> <input type="date" class="form-control" id="frmdateuni"></div>             
              </div>
            </div>
             <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">To Date<span>*</span></label>
                <div class="col-xs-12"><input type="date" class="form-control" id="todateuni"></div>             
              </div>
            </div> 
            <div class="form-group">
              <label>University Name<span>*</span></label>
              <input type="text" class="form-control" placeholder="School Name" id ="uni_name" name="uni_name">
            </div>
            <div class="form-group">
              <label>City<span>*</span></label>
              <input type="text" class="form-control" placeholder="City" id="uni_city" name="uni_city">
            </div>

            <div class="form-group">
              <label>State<span>*</span></label>
              <input type="text" class="form-control" placeholder="State" id="uni_state" name="uni_state">
            </div>

            <div class="form-group">
              <label>Type Of Certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="Certificates" id="uni_certificates" name="uni_certificates">
            </div>
            <div class="form-group">
              <label>Type Of Diplomas<span>*</span></label>
              <input type="text" class="form-control" placeholder="Diplomas" id="uni_diplomas" name="uni_diplomas">
            </div>

            <div class="form-group">
              <label><span>Type Of Degress*</span></label>
              <input type="text" class="form-control" placeholder="Degress" id="uni_degress" name="uni_degress">
            </div>
            <hr>
            
            </div>
            <button type="button" class="btn btn-default" id="saveuniversity">Submit</button>
    </div>
</form>

<!-- add work history technical -->
 <form class="add-worktechnical work-formmain"> 
    <div class="window-btn">           
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
    <div class="add-workform">
      <div id="TextBoxesGroup">
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">From Date<span>*</span></label>
                <div class="col-xs-12"> <input type="date" class="form-control" id="frmdatetech"></div>
                <label class="col-xs-12">To Date<span>*</span></label>            
              </div>
            </div>
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">To Date<span>*</span></label>
                <div class="col-xs-12"><input type="date" class="form-control" id="todatetech"></div>             
              </div>
            </div>
              
            <div class="form-group">
              <label>Technical Name<span>*</span></label>
              <input type="text" class="form-control" placeholder="School Name" id ="tech_name" name="tech_name">
            </div>
            <div class="form-group">
              <label>City<span>*</span></label>
              <input type="text" class="form-control" placeholder="City" id="tech_city" name="tech_city">
            </div>

            <div class="form-group">
              <label>State<span>*</span></label>
              <input type="text" class="form-control" placeholder="State" id="tech_state" name="tech_state">
            </div>

            <div class="form-group">
              <label>Type Of Certificates<span>*</span></label>
              <input type="text" class="form-control" placeholder="Certificates" id="tech_certificates" name="tech_certificates">
            </div>
            <div class="form-group">
              <label>Type Of Diplomas<span>*</span></label>
              <input type="text" class="form-control" placeholder="Diplomas" id="tech_diplomas" name="tech_diplomas">
            </div>

            <div class="form-group">
              <label><span>Type Of Degress*</span></label>
              <input type="text" class="form-control" placeholder="Degress" id="tech_degress" name="tech_degress">
            </div>
            <hr>
            
            </div>
            <button type="button" class="btn btn-default" id="savetechnical">Submit</button>
    </div>
</form>

<!-- add work history spacial -->
 <form class="add-workspacial work-formmain">
    <div class="window-btn">           
            <button type="button" class="close-btn-sub pull-right">x</button>
    </div>
    <div class="add-workform">
      <div id="TextBoxesGroup">
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">From Date<span>*</span></label>
                <div class="col-xs-12"> <input type="date" class="form-control" id="frmdatespc"></div>          
              </div>
            </div>
            <div class="form-group">
              <div class ="row">
                <label class="col-xs-12">To Date<span>*</span></label>
                <div class="col-xs-12"><input type="date" class="form-control" id="todatespc"></div>             
              </div>
            </div>
             
            <div class="form-group">
              <label>Special Traning<span>*</span></label>
              <input type="text" class="form-control" placeholder="Special Training  Name" id ="spc_training" name="spc_training">
            </div>
            <div class="form-group">
              <label>City<span>*</span></label>
              <input type="text" class="form-control" placeholder="City" id="spc_city" name="spc_city">
            </div>

            <div class="form-group">
              <label>State<span>*</span></label>
              <input type="text" class="form-control" placeholder="State" id="spc_state" name="spc_state">
            </div>

           
            <hr>
            
            </div>
            <button type="button" class="btn btn-default" id="savespecial">Submit</button>
    </div>
</form>
<script type="text/javascript">
    $('#work-historypop').click(function(){  
     
    $('form.workhistory1').toggle();
    $('.login_box').hide(); 
   });
</script>


<script type="text/javascript">
        $('.close-btn-sub').click(function(){
          $('.add-workschool').hide();  
          $('.add-workhigh').hide(); 
          $('.add-workinstitute').hide();  
          $('.add-workcollage').hide();
          $('.add-workuniversity').hide();  
          $('.add-worktechnical').hide();
          $('.add-workspacial').hide(); 


    });
</script>

<!-- save school histroy ajax call -->
<script type="text/javascript">
   $('#saveschool').click(function(){

     var workschool =  $('#workschool').val();
     var frmdate =  $('#frmdate').val();
     var todate =  $('#todate').val();
     var workcity =  $('#workcity').val();
     var workstate =  $('#workstate').val();
     var certificates =  $('#certificates').val();
     var diplomas =  $('#diplomas').val();
     var degress =  $('#degress').val();

    
   $.ajax({
            type:"POST",
            url:"addworkhistoryajax_action.php",
            data:{workschool:workschool,frmdate:frmdate,todate:todate,workcity:workcity,workstate:workstate,certificates:certificates,diplomas:diplomas,degress:degress},
                success:function(result){ 
                   $('.add-workschool').hide(); 
                  // alert(result); 
                   $('.workhistory-details').html(result);
                  // $('.workhistory-sec1').hide();

                   //console.log(result);
              }
              });  
  });
</script>

<!-- save high school histroy ajax call -->
<script type="text/javascript">
   $('#savehighschool').click(function(){ 
     var frmdatehigh =  $('#frmdatehigh').val();
     var todatehigh =  $('#todatehigh').val();
     var highschool =  $('#highschool').val();
     var highcity =  $('#highcity').val();
     var highstate =  $('#highstate').val();
     var highcertificates =  $('#highcertificates').val();
     var highdiplomas =  $('#highdiplomas').val();
     var highdegress =  $('#highdegress').val();


   $.ajax({
            type:"POST",
            url:"addworkhistoryajax_action.php",
            data:{frmdatehigh:frmdatehigh,todatehigh:todatehigh,highschool:highschool,highcity:highcity,highstate:highstate,highcertificates:highcertificates,highdiplomas:highdiplomas,highdegress:highdegress},
                success:function(result){ 
                   $('.add-workhigh').hide(); 
                    $('.workhistory-details').html(result);
                   //$('.workhistory-sec1').hide();
                   //console.log(result);
              }
              });  
  });
</script>


<!-- save institute histroy ajax call -->
<script type="text/javascript">
   $('#saveinstitute').click(function(){
     var frmdateinstitute =  $('#frmdateinstitute').val();
     var todateinstitute =  $('#todateinstitute').val();
     var institutes_nm =  $('#institutes_nm').val();
     var institutecity =  $('#institutecity').val();
     var institutestate =  $('#institutestate').val();
     var institutecertificates =  $('#institutecertificates').val();
     var institutediplomas =  $('#institutediplomas').val();
     var institutedegress =  $('#institutedegress').val();


   $.ajax({
            type:"POST",
            url:"addworkhistoryajax_action.php",
            data:{frmdateinstitute:frmdateinstitute,todateinstitute:todateinstitute,institutes_nm:institutes_nm,institutecity:institutecity,institutestate:institutestate,institutecertificates:institutecertificates,institutediplomas:institutediplomas,institutedegress:institutedegress},
                success:function(result){ 
                   $('.add-workinstitute').hide();  
                   $('.workhistory-details').html(result);
                   //$('.workhistory-sec1').hide();
                   //console.log(result);
              }
              });  
  });
</script>


<!-- save collage histroy ajax call -->
<script type="text/javascript">
   $('#savecollage').click(function(){  

     var frmdateclg =  $('#frmdateclg').val();
     var todateclg =  $('#todateclg').val();
     var clg_name =  $('#clg_name').val();
     var clg_city =  $('#clg_city').val();
     var clg_state =  $('#clg_state').val();
     var clg_certificates =  $('#clg_certificates').val();
     var clg_diplomas =  $('#clg_diplomas').val();
     var clg_degress =  $('#clg_degress').val();

   $.ajax({
            type:"POST",
            url:"addworkhistoryajax_action.php",
            data:{frmdateclg:frmdateclg,todateclg:todateclg,clg_name:clg_name,clg_city:clg_city,clg_state:clg_state,clg_certificates:clg_certificates,clg_diplomas:clg_diplomas,clg_degress:clg_degress},
                success:function(result){ 
                   $('.add-workcollage').hide();  
                   $('.workhistory-details').html(result);
                   //$('.workhistory-sec1').hide();
                   //console.log(result);
              }
              });  
  });
</script>

<!-- save university histroy ajax call -->
<script type="text/javascript">
   $('#saveuniversity').click(function(){ 
     var frmdateuni =  $('#frmdateuni').val();
     var todateuni =  $('#todateuni').val();
     var uni_name =  $('#uni_name').val();
     var uni_city =  $('#uni_city').val();
     var uni_state =  $('#uni_state').val();
     var uni_certificates =  $('#uni_certificates').val();
     var uni_diplomas =  $('#uni_diplomas').val();
     var uni_degress =  $('#uni_degress').val();

   $.ajax({
            type:"POST",
            url:"addworkhistoryajax_action.php",
            data:{frmdateuni:frmdateuni,todateuni:todateuni,uni_name:uni_name,uni_city:uni_city,uni_state:uni_state,uni_certificates:uni_certificates,uni_diplomas:uni_diplomas,uni_degress:uni_degress},
                success:function(result){ 
                   $('.add-workuniversity').hide();
                    $('.workhistory-details').html(result);
                   //$('.workhistory-sec1').hide();
                   //console.log(result);
              }
              });  
  });
</script>

<!-- save technical histroy ajax call -->
<script type="text/javascript">
   $('#savetechnical').click(function(){  
     var frmdatetech =  $('#frmdatetech').val();
     var todatetech =  $('#todatetech').val();
     var tech_name =  $('#tech_name').val();
     var tech_city =  $('#tech_city').val();
     var tech_state =  $('#tech_state').val();
     var tech_certificates =  $('#tech_certificates').val();
     var tech_diplomas =  $('#tech_diplomas').val();
     var tech_degress =  $('#tech_degress').val();

   $.ajax({
            type:"POST",
            url:"addworkhistoryajax_action.php",
            data:{frmdatetech:frmdatetech,todatetech:todatetech,tech_name:tech_name,tech_city:tech_city,tech_state:tech_state,tech_certificates:tech_certificates,tech_diplomas:tech_diplomas,tech_degress:tech_degress},
                success:function(result){ 
                  $('.add-worktechnical').hide();
                    $('.workhistory-details').html(result);
                   //$('.workhistory-sec1').hide();
                   //console.log(result);
              }
              });  
  });
</script>


<!-- save special histroy ajax call -->
<script type="text/javascript">
   $('#savespecial').click(function(){   
     var frmdatespc =  $('#frmdatespc').val();
     var todatespc =  $('#todatespc').val();
     var spc_training =  $('#spc_training').val();
     var spc_city =  $('#spc_city').val();
     var spc_state =  $('#spc_state').val();
     
   $.ajax({
            type:"POST",
            url:"addworkhistoryajax_action.php",
            data:{frmdatespc:frmdatespc,todatespc:todatespc,spc_training:spc_training,spc_city:spc_city,spc_state:spc_state},
                success:function(result){ 
                  $('.add-workspacial').hide();
                  $('.workhistory-details').html(result);
                  //$('.workhistory-sec1').hide();
                   //console.log(result);
              }
              });  
  });
</script>

