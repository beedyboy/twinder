<script src="packages/js/jquery-1.7.2.min.js" type="text/javascript"></script>
<link rel="shortcut icon" href="packages/images/aculogo.png">	
<script type="text/javascript" src="packages/js/bootstrap-transition.js"></script>
<script type="text/javascript" src="packages/js/bootstrap-collapse.js"></script>
<!---- catch submit time 
<script type="text/javascript" src="packages/js/time.js"></script>-->
<!----hover pop up -->
<script src="packages/js/main.js" type="text/javascript"></script>
<script src="packages/js/mouseover_popup.js" type="text/javascript"></script>
<!-- notify -->
<link href="packages/css/notify/jquery_notification.css" type="text/css" rel="stylesheet" media="screen, projection"/>
<script type="text/javascript" src="packages/js/notify/jquery_notification_v.1.js"></script>
<!-- notify end -->
<!-- datatable -->
<style type="text/css" title="currentStyle">
@import "packages/css/datatable/demo_page.css";
@import "packages/css/datatable/demo_table_jui.css";
@import "packages/css/datatable/jquery-ui-1.8.4.custom.css";
</style>
<script type="text/javascript" language="javascript" src="packages/js/dataTables/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8">
jQuery(document).ready(function() {
oTable = jQuery('#log').dataTable({
"bJQueryUI": true,
"sPaginationType": "full_numbers"
} );
oTable = jQuery('#attendance').dataTable({
"bJQueryUI": true,
"sPaginationType": "full_numbers"
} );
oTable = jQuery('#record').dataTable({
"bJQueryUI": true,
"sPaginationType": "full_numbers"
} );
oTable = jQuery('#cadet_list').dataTable({
"bJQueryUI": true,
"sPaginationType": "full_numbers"
} );
oTable = jQuery('#passed').dataTable({
"bJQueryUI": true,
"sPaginationType": "full_numbers"
} );								
});		
</script>
<script type="text/javascript" src="packages/js/qtip/jquery.qtip.min.js"></script>
<link href="packages/js/qtip/jquery.qtip.min.css" rel="stylesheet" type="text/css" media="screen, projection">
<link rel="icon" href="packages/images/chmsc.png" type="image" />
<link rel="stylesheet" href="packages/css/font-awesome.css">