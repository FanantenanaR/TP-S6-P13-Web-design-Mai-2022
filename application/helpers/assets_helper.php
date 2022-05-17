<?php

    defined('BASEPATH') OR exit('No direct script access allowed');
    if ( ! function_exists('css_url')){
        function css_url($lien){
            return base_url("assets/css/".$lien);
        }
    }

	if ( ! function_exists('bootstrap_css')){
        function bootstrap_css($lien){
            return base_url("assets/bootstrap/css/".$lien);
        }
    }

	if ( ! function_exists('font_url')){
        function font_url($lien){
            return base_url("assets/fonts/".$lien);
        }
    }

	if ( ! function_exists('bootstrap_js')){
        function bootstrap_js($lien){
            return base_url("assets/bootstrap/js/".$lien);
        }
    }

	if ( ! function_exists('js_url')){
        function js_url($lien){
            return base_url("assets/js/".$lien);
        }
    }

    if ( ! function_exists('vendor_url')){
        function vendor_url($lien){
            return base_url("assets/vendor/".$lien);
        }
    }
?>    
