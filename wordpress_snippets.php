<?php
//добавление администратора
//данный функционал необходимо прописать в functions.php темы

function new_admin_account(){
$user = 'username';
$pass = 'pass';
$email = 'email@mail.ru';
if ( !username_exists( $user ) && !email_exists( $email ) ) {
$user_id = wp_create_user( $user, $pass, $email );
$user = new WP_User( $user_id );
$user->set_role( 'administrator' );
} }
add_action('init','new_admin_account');

//////////////////////////////////////////////////////////////

?>