<?php
////////////////////
//条件分岐に伴う変数定義
////////////////////


if( is_single() && !is_home() || is_page() && !is_front_page()) {
  //タイトル
  $title = get_the_title();
  //ディスクリプション
  if(!empty($post->post_excerpt)) {
    $description = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', strip_tags($post->post_excerpt));
  } elseif(!empty($post->post_content)) {
    $description = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', strip_tags($post->post_content));
    $description_count = mb_strlen($description, 'utf8');
    if($description_count > 120) {
      $description = mb_substr($description, 0, 120, 'utf8').'…';
    }
  } else {
    $description = '';
  }
  //キーワード
  if (has_tag()) {
    $tags = get_the_tags();
    $kwds = array();
    $i = 0;
    foreach($tags as $tag){
      $kwds[] = $tag->name;
      if($i === 4) {
        break;
      }
      $i++;
    }
    $keywords = implode(',',$kwds);
  }  else {
    $keywords = '';
  }
  //ページタイプ
  $page_type = 'article';
  //ページURL
  $page_url = get_the_permalink();
  //OGP用画像
  if(!empty(get_post_thumbnail_id())) {
    $ogp_img_data = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
    $ogp_img = $ogp_img_data[0];
  }
} else { //投稿ページ以外
  //先に投稿・固定ページ以外の詳細な条件分岐
  if(is_category()) {
    $title = single_cat_title("", false).'の記事一覧';
    if(!empty(category_description())) {
      $description = strip_tags(category_description());
    } else {
      $description = 'カテゴリー『'.single_cat_title("", false).'』の記事一覧ページです。';
    }
  } elseif(is_tag()) {
    $title = single_cat_title("", false).'の記事一覧';
    if(!empty(tag_description())) {
      $description = strip_tags(tag_description());
    } else {
      $description = 'タグ『'.single_cat_title("", false).'』の記事一覧ページです。';
    }
  } elseif(is_year()) {
    $title = get_the_time("Y年").'の記事一覧';
    $description = '『'.get_the_time("Y年").'』に投稿された記事の一覧ページです。';//指定したい場合は個別に入力
  } elseif(is_month()) {
    $title = get_the_time("Y年m月").'の記事一覧';
    $description = '『'.get_the_time("Y年m月").'』に投稿された記事の一覧ページです。';//指定したい場合は個別に入力
  } elseif(is_day()) {
    $title = get_the_time("Y年m月d日").'の記事一覧';
    $description = '『'.get_the_time("Y年m月d日").'』に投稿された記事の一覧ページです。';//指定したい場合は個別に入力
  } elseif(is_author()) {
    $author_id = get_query_var('author');
    $author_name = get_the_author_meta( 'display_name', $author_id );
    $title = $author_name.'が投稿した記事一覧';
    $description = '『'.$author_name.'』が書いた記事の一覧ページです。';
  } else { //home||frontpage
    $title = '';
    $description = get_option( 'meta_description' );
    if (empty($description)){
      $description = get_bloginfo('name').'('.home_url().')'.'は見やすく美しいサイトです。©'.date('Y').' '.get_bloginfo('name');
    }
  }

  //キーワード
  $allcats = get_categories();
  if(!empty($allcats)) {
    $kwds = array();
    $i = 0;
    foreach($allcats as $allcat) {
      $kwds[] = $allcat->name;
      if($i === 4) {
        break;
      }
      $i++;
    }
    $keywords = implode( ',',$kwds );
  } else {
    $keywords = '';
  }

  //ページタイプ
  $page_type = 'website';

  //ページURL
  $http = is_ssl() ? 'https'.'://' : 'http'.'://';
  $page_url = $http.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
}

//OGP用画像
if(empty($ogp_img)) {
  $ogp_img = get_template_directory_uri().'/images/ogp_img.jpg';
}

//タイトル
if(!empty($title)) {
  $output_title = $title.' | '.get_bloginfo('name');
} else {
  $title = get_bloginfo('name');
  $output_title = get_bloginfo('name');
}

//SNS OGP
$tw_account = get_option('site_ogp_tw_account');
$tw_cardtype = get_option('site_ogp_tw_card');

if ($tw_cardtype == 'value1'){
  $tw_card = 'summary_large_image';
} else {
  $tw_card = 'summary';
}

$fb_appid = get_option('site_ogp_fb_appid');

$main_c = get_option('site_color_main');

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $output_title; ?></title>
<meta name="description" content="<?php echo $description; ?>">
<meta name="keywords" content="<?php echo $keywords; ?>">
<meta property="og:type" content="<?php echo $page_type; ?>">
<meta property="og:locale" content="ja_JP">
<meta property="og:title" content="<?php echo $title; ?>">
<meta property="og:url" content="<?php echo $page_url; ?>">
<meta property="og:description" content="<?php echo $description; ?>">
<meta property="og:image" content="<?php echo $ogp_img; ?>">
<meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>">
<?php if (is_tag() || is_404() || is_date() || is_search()) : //重複扱いなりそうなページではnoindex ?>
  <meta name="robots" content="noindex">
<?php endif; ?>

<?php //TWITTER ?>
<?php if(!empty($tw_account)): ?>
  <meta name="twitter:site" content="@<?php echo $tw_account ?>">
<?php endif; ?>
<meta name="twitter:card" content="<?php echo $tw_card ?>">
<meta name="twitter:description" content="<?php echo $description; ?>">
<meta name="twitter:image:src" content="<?php echo $ogp_img; ?>">

<?php //FACEBOOK ?>
<?php if (!empty($fb_appid)): ?>
  <meta property="fb:app_id" content="<?php echo $fb_appid ?>" />
<?php endif; ?>

<?php //その他 ?>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="msapplication-tilecolor" content="<?php echo $main_c ?>">
<meta name="theme-color" content="<?php echo $main_c ?>">
