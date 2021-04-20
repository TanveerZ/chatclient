
<link rel="stylesheet" href="css/cell_layout.css">
<!-- <link type="text/css" rel="stylesheet" media="all" href="css/skin.css" /> -->

<script type="text/javascript" src="<?php echo SITEPATH;?>js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="<?php echo SITEPATH;?>js/jquery.photocradle-0.4.3.min.js"></script>


<form class="cell_layout" method="post" enctype="multipart/form-data">
   <div class="window-btn window-btn2">
    <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
</div>
<div id="main">
 
</div>


</form> 


<!-- seaction form -->
<div class="modal " id="sectionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Section </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form role="form" method="POST" enctype="multipart/form-data" name="add-form" id="section-form" >
            <div class="modal-body">

                <div class="form-group">
                    <label class="col-form-label">Description</label>
                    <textarea class="form-control" name="sectionDisc" id="sectionDisc"></textarea>
                </div>
                    <input type="hidden" name="section_id" id="section_id">
                    <input type="hidden" name="cell_id" id="cell_id">
                <div class="form-group">
                    <label class="col-form-label">Image</label>
                    <input type="file" class="form-control" name="sectionImg" id="sectionImg" >
                </div>  
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="save_section">Save Section</button>
            </div>
        </form>
    </div>
  </div>
</div> 

<script>

// $('#save_section').click(function(){
//     console.log("button submit");
//     alert("save");
// });
$("#section-form").on('submit', function(e){
    console.log("form submit");
    e.preventDefault();
    $.ajax({
        type: 'POST',
        url: 'user_cell_ajax.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData:false,
        success: function(response){
            $("#section-form")[0].reset(); 
            alert(response.msg);
            $('#sectionModal').modal('hide');
        }
    });
});

$(function(){

var options = {
    firstImageIndex: 5,
    borderWeight: 4
},

params = {
    sources: [
        {
            thumbnail: 'img/originals/1.jpg',
            preview: 'img/originals/1.jpg',
            original: 'img/originals/1.jpg',
            title: 'Woods troll'
        }, {
            thumbnail: 'img/originals/2.jpg',
            preview: 'img/originals/2.jpg',
            original: 'img/originals/2.jpg',
            title: 'A frosty tree New Zealand'
        }, {
            thumbnail: 'img/originals/3.jpg',
            preview: 'img/originals/3.jpg',
            original: 'img/originals/3.jpg',
            title: 'Bloody fog'
        }, {
            thumbnail: 'img/originals/3.jpg',
            preview: 'img/originals/3.jpg',
            original: 'img/originals/3.jpg',
            title: 'Blue dock'
        }, {
            thumbnail: 'img/originals/3.jpg',
            preview: 'img/originals/3.jpg',
            original: 'img/originals/3.jpg',
            title: 'Daisy wallpaper'
        }, {
            thumbnail: 'img/originals/3.jpg',
            preview: 'img/originals/3.jpg',
            original: 'img/originals/3.jpg',
            title: 'Flower'
        } 
    ]
};

//$( '.photocradle' ).photocradle( params, options );

});

</script>