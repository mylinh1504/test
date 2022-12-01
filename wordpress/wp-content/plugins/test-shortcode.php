<?php 
    /*
     Plugin Name: shortcode tutorial
     plugin author: linh 
     */

    
    function create_shortcode(){
        echo 'hello shortcode';
    }
    add_shortcode('shortcode1', 'create_shortcode');

?>