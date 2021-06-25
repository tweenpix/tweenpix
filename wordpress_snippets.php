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


//корректное окончание для товаров
function perfect_end ( $number, $titles, $show_number = 1 ){
    // perfect_end ( 2, 'книга, книги, книг' );     // 2 книги
        if( is_string( $titles ) ){
            $titles = preg_split( '/, */', $titles );
        }
        if( empty( $titles[2] ) ){
            $titles[2] = $titles[1];
        }
        $cases = [ 2, 0, 1, 1, 1, 2 ];
        $intnum = abs( (int) strip_tags( $number ) );
        $title_index = ( $intnum % 100 > 4 && $intnum % 100 < 20 )? 2 : $cases[ min( $intnum % 10, 5 ) ];
    
        return ( $show_number ? "$number " : '' ) . $titles[ $title_index ];
    }

?>