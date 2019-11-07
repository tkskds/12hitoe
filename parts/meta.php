<?php
//変数定義のあと、出力部分

  //投稿・固定ページ用 meta
  if (is_single() && !is_home() || is_page() && !is_front_page()){

    $title = get_the_title();

    //ディスクリプション
    if(!empty($post->post_excerpt)){

        $description = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', strip_tags($post->post_excerpt));

    } elseif(!empty($post->post_content)){

        $description = str_replace(array("\r\n", "\r", "\n", "&nbsp;"), '', strip_tags($post->post_content));
        $description_count = mb_strlen($description, 'utf8');

        if($description_count > 120){
          $description = mb_substr($description, 0, 120, 'utf8').'……';
        }

    } else {

        $description = '';

    } //END ディスクリプション

    //タグ
    if (has_tag()){

      $tags = get_the_tags();
      $kwds = array();
      $i = 0;
      foreach($tags as $tag){
        $kwds[] = $tag->name;
        if($i === 4){
          break;
        }
        $i++;
      }

      $keywords = implode(',',$kwds);

    }else{

      $keywords = '';

    } //END タグ

    $page_type = 'article';

    $page_url = get_the_permalinks();

    //OGP画像
    if(!empty(get_post_thumbnail_id())){

        $ogp_img_data = wp_get_attachment_image_src(get_post_thumbnail_id(),'full');
        $ogp_img = $ogp_img_data[0];

    } //END OGP画像

  }  // END 投稿・固定ページ用 meta
  else
  { //その他のページ用 meta
    if (is_category()){

        $title = single_cat_title("", false).'の記事一覧';
        if (!empty(category_description())){
          $description = stript_tags(category_description());
        }else{
          $description = 'カテゴリー『'.single_cat_title("", false).'』の記事一覧ページです。';
        }

    } elseif (is_tag()){

        $title = single_tag_title("", false).'の記事一覧';
        if (!empty(tag_description())){
          $description = strip_tags(tag_description());
        }else{
          $description =  'タグ『'.single_cat_title("", false).'』の記事一覧ページです。';
        }

    } elseif (is_year()){

        $title = get_the_time("Y年").'の記事一覧';
        $description = '『'.get_the_time("Y年").'』に投稿された記事一覧ページです。';

    } elseif (is_month()){

        $title = get_the_time("Y年m月").'の記事一覧';
        $description = '『'.get_the_time("Y年m月").'』に投稿された記事一覧ページです。';

    } elseif (is_day()){

        $title = get_the_time("Y年m月d日").'の記事一覧';
        $description = '『'.get_the_time("Y年m月d日").'』に投稿された記事一覧ページです。';

    } elseif (is_author()){

        $author_id = get_query_var('author');
        $author_name = get_the_author_meta('display_name', $author_id);
        $title = $author_name.'が投稿した記事一覧';
        $description = '『'.$author_name.'』が投稿した記事一覧ページです。';

    } else {

        $title = '';
        $description = get_bloginfo('description');

    }

    //カテゴリー
    $allcats = get_categories();
    if (!empty($allcats)){
      $kwds[] = array();
      $i = 0;
      foreach($allcats as $allcat){
        $kwds[] = $allcat->name;
        if($i === 4){
          break;
        }
        $i++;
      }
      $keywords = implode(',',$kwds);
    } else {
      $keywords = '';
    }

    //ページタイプ
    $page_type = 'website';

    //URL
    $http = is_ssl() ? 'https'.'://' : 'http'.'://';
    $page_url = $http.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];

  } //END その他のページ用 meta

  //OGP画像用
  if(empty($ogp_img)){
    $ogp_img = get_template_directory_uri().'/images/ogp_img.jpg';
  }

  //タイトル
  if(!empty($title)){
    $output_title = $title.' | '.get_bloginfo('name');
  } else {
    $title = get_bloginfo('name');
    $output_title = get_bloginfo('name');
  }

?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0 ">

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

<!--TWITTER-->
<meta name="twitter:site" content="@twitterアカウント">
<meta name="twitter:card" content="summary">
<meta name="twitter:creator" content="@twitterアカウント">
<meta name="twitter:description" content="<?php echo $description; ?>">
<meta name="twitter:image:src" content="<?php echo $ogp_img; ?>">

<!--スタイルシートの呼び出し-->
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous"><!--font-awesomeのスタイルシートの呼び出し-->

<!--アイコン-->
<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
<link rel="icon" type="image/png" size="256x256" href="<?php echo get_template_directory_uri(); ?>/images/android-chrome.png">
