<?php
function rest_api_insert_code_receiver( WP_REST_Request $request ) {
    $api_key = get_option('haysky_code_receiver_api_key');
    $status = get_option('haysky_code_receiver_status');
    if ($request['api_key']!=$api_key || $status == 'disable') {
        $result = 'API Disabled  or Invalid Key';
    } else {
        $code = $request["code"];
        $file_path = dirname(__FILE__).'/../'.$request["file_path"];
        $myfile = fopen($file_path, "w");
        if ($myfile) {
            $res = fwrite($myfile, $code);
            if ($res) {
                $result = 'Code Updated';
            } else {
                $result = 'Error occured while handling file. Check file path.';
            }
        } else {
            $result = 'Unable to Open file';
        }
    }
    return $result;
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'code_receiver', 'insert', array(
        'methods' => 'POST',
        'callback' => 'rest_api_insert_code_receiver'
    ));
});