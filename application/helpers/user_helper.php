<?php

if ( !function_exists( 'isLogged' ) ) {
    function isLogged()
    {
        $CI =& get_instance();
        if ( $CI->session->userdata( 'logged_in' ) ) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}



if ( !function_exists( 'getUserEmail' ) ) {
    function getUserEmail()
    {
        $CI =& get_instance();
        if ( $CI->session->userdata( 'email' ) ) {
            return $CI->session->userdata( 'email' );
        } else {
            return FALSE;
        }
    }
}

if ( !function_exists( 'getUsername' ) ) {
    function getUsername()
    {
        $CI =& get_instance();
        if ( $CI->session->userdata( 'username' ) ) {
            return $CI->session->userdata( 'username' );
        } else {
            return "";
        }
    }
}