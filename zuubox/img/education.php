<?php
require_once("include/config.php");
require_once("include/functions.php");

$users = new User();
$cells = $users->select_allrecords('tbl_cell','*');

$allcountry=$users->select_allrecords('tbl_country','*');


?>
<form class="education1">
<div class="window-btn">
    	<button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="display: none;"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
</div>
<img class="img-responsive" src="img/education_header.png" alt="education_header">
dsfkl
</form>