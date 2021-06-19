<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
<!-- -- Semantic-UI CSS & JS files included here -- -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/button.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/table.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.min.css">
<style type="text/css">
    div.ui.dropdown{
        min-height: 1em !important;
    }
</style>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/dropdown.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/transition.js"></script>

<h1>Settings</h1>
<?php
global $wpdb;
$user_id = get_current_user_id();
if(isset($_POST["submit"])){
    $data["haysky_code_receiver_api_key"] = $_POST["haysky_code_receiver_api_key"];
    $data["haysky_code_receiver_status"] = $_POST["haysky_code_receiver_status"];
    foreach ($data as $key => $value) {
        update_option($key, $value);
    }
}
?>
<form method="post" enctype="multipart/form-data">
    <table class="ui collapsing striped table">
        <tr>
            <td>Code Receiver Api Key</td>
            <td><input type="text" name="haysky_code_receiver_api_key" size="40">
				<i class="sync green large icon"></i>
            </td>
        </tr>
        <tr>
        <td>Code Receiver Status</td>
        <td><select  class="ui search dropdown"  name="haysky_code_receiver_status" >
                <option value="">Select</option>
                <option value="enable">enable</option>
                <option value="disable">disable</option>
            </select>
        </td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Save" class="ui blue mini button"></td>
        </tr>
    </table>
</form>
<style type="text/css">
	.sync.green.large.icon{
		cursor: pointer;
	}
</style>
<?php
$data["haysky_code_receiver_api_key"] = get_option("haysky_code_receiver_api_key");
$data["haysky_code_receiver_status"] = get_option("haysky_code_receiver_status");
?>
<script type="text/javascript">
    $('input[name=haysky_code_receiver_api_key]').val('<?php echo $data["haysky_code_receiver_api_key"]; ?>');
    $('select[name=haysky_code_receiver_status]').val('<?php echo $data["haysky_code_receiver_status"]; ?>');
</script>
<script type="text/javascript">
$(".ui.dropdown").dropdown();
$('.sync.green.large.icon').click(function(){
    $('input[name=haysky_code_receiver_api_key]').val(generateUUID());
});
function generateUUID(){
	var d = new Date().getTime();
	if( window.performance && typeof window.performance.now === "function" ){
		d += performance.now();
	}
	var uuid = 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c){
		var r = (d + Math.random()*16)%16 | 0;
		d = Math.floor(d/16);
		return (c=='x' ? r : (r&0x3|0x8)).toString(16);
	});
	return uuid;
}
</script>