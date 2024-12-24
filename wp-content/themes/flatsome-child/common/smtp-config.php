<?php
// Setting Smtp websiter
add_action('phpmailer_init', function ($phpmailer) {
    if (!is_object($phpmailer))
    $phpmailer = (object) $phpmailer;
    $phpmailer->Mailer     = 'smtp';
    $phpmailer->Host       = 'smtp.gmail.com';
    $phpmailer->SMTPAuth   = 1;
    $phpmailer->Port       = 587;
    $phpmailer->SMTPSecure = 'TLS';
    $phpmailer->FromName   = get_field('from_name','option');
    $phpmailer->Username   = get_field('user_name','option');
    $phpmailer->Password   = get_field('password','option');
    $phpmailer->From       = get_field('from','option');
});