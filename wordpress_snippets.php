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


//склонение слов
require_once('../../phpmorphy-0.3.7/src/common.php');
$dir = '../../phpmorphy-0.3.7/dicts';
$lang = 'ru_RU';
$opts = array(
    'storage' => PHPMORPHY_STORAGE_FILE,
);
try {
    $morphy = new phpMorphy($dir, $lang, $opts);
} catch(phpMorphy_Exception $e) {
    die('Error occured while creating phpMorphy instance: ' . $e->getMessage());
}
$_string = 'мужской букет из сладкой колбасы';
$_string = mb_strtoupper($_string);

$words = explode(' ', $_string);
$excepted = ['клубники', "колбас"];

echo 'доставка ';
if(count($words)>0){
foreach($words as $word) {

  $forms = $morphy->getGramInfo(mb_strtoupper($word));
  if(in_array(mb_strtolower($word),$excepted)){

    $form[0] = $word;
  }
  else{
    $form = $morphy->castFormByGramInfo(mb_strtoupper($word), null, [ 'РД', 'МН'], true);
  }
    $res = mb_strtolower($form[0]);
  echo $res.' ';
}
}


?>
