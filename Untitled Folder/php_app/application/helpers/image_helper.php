<?php

function image_thumb( $image_path = '', $image_name = '', $height, $width ) {
    // Get the CodeIgniter super object
    $CI =& get_instance();
    $CI->load->library('image_lib');

    // Path to image thumbnail
    $image_thumb = $image_path . '/' . $height . '_' . $width . '_' .  $image_name; 

    if ( !file_exists( $image_thumb ) ) {

        // CONFIGURE IMAGE LIBRARY
        $config['image_library']    = 'gd';
        $config['source_image']     = FCPATH . $image_path . "/" . $image_name;
        $config['new_image']        = FCPATH . $image_path . '/' . $height . '_' . $width . '_' .  $image_name;
        $config['maintain_ratio']   = TRUE;
        $config['height']           = $height;
        $config['width']            = $width;
        $CI->image_lib->initialize( $config );
        $CI->image_lib->resize();
        $CI->image_lib->clear();
    }


    return base_url($image_thumb);
}