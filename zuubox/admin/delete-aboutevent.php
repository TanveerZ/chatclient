<?php
require_once("classes/cls-event.php");
if (isset($_GET['event_id'])) {
    $delete_ids = base64_decode($_GET['event_id']);
}
$obj_event = new Event();
$condition = "`event_id` in(" . $delete_ids . ")";
$all_owner = $obj_event->deleteevent($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Event has been deleted successfully.";
header("location:view_aboutevent.php");
?>