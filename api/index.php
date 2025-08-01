<?php
add_filter( 'rest_url_prefix', function() {
    return 'v1';
} );

require_once get_template_directory() . '/api/order.php'; 