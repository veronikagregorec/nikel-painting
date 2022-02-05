<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


function load_style() {
    wp_register_style('css', get_template_directory_uri() . '/style.css', array(), false, 'all');
    wp_enqueue_style('css');
    wp_enqueue_style('font', "https://fonts.googleapis.com/icon?family=Material+Icons", array(),'1.0', 'all');
}

add_action('wp_enqueue_scripts', 'load_style');


function load_scripts() {
    wp_enqueue_script('ajaxscript', "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js", '3.5.1', true);
    wp_enqueue_script('myscript', get_template_directory_uri()."/script.js", array(), '1.0', true);
}

add_action('wp_enqueue_scripts', 'load_scripts');


function add_tags(){
add_theme_support('title-tag');
add_theme_support('menus');
}

add_action('after_setup_theme', 'add_tags');


register_nav_menus( array( 
		'new-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location'
    )
);


add_action('wp_ajax_enquiry', 'enquiry_form');
add_action('wp_ajax_nopriv_enquiry', 'enquiry_form');
function enquiry_form(){
    if(!wp_verify_nonce($_POST['nonce'], 'ajax-nonce')){
        wp_send_json_error('Nepravilen nonce', 401);
        die();
    }

    $formdata = [];
    wp_parse_str($_POST['enquiry'], $formdata);

    $admin_email = get_option('admin_email');
    
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = 'From:' .  $admin_email ;
    $headers = array(
        'Reply-To' => $formdata['emails'],
    );

    $send_to = $admin_email;

    $subject = 'From: ' . $formdata['names'];
    
    $message="";
    foreach($formdata as $emptyField){
        $message .= $emptyField . "\n";
    }

    mail($send_to, $subject, $message, $headers);
}

add_action( 'phpmailer_init', 'custom_mailer' );
function custom_mailer(PHPMailer $phpmailer){

    $phpmailer->SetFrom('janeznovak@email.com', 'Janez Novak');
    $phpmailer->Host       = 'smtp.google.com';
    $phpmailer->Port       = 587;
    $phpmailer->SMTPAuth   = true;
    $phpmailer->SMTPSecure = 'tls';
    $phpmailer->Username   = 'janeznovak@email.com';
    $phpmailer->Password   = '*******';
    $phpmailer->isSMTP();
}

function new_excerpt() {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt');

function disable_version() {
    return '';
}
add_filter('the_generator','disable_version');
remove_action('wp_head', 'wp_generator');

?>