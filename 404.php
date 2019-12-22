<?php get_header(); ?>
  <div class="row contentArea showPage">
    <main id="main"
          class="<?php
                    //サイト構造がサイドバーを含むものならグリッドクラス付与
                    $sideOn = get_option('site_bone_type');
                    if ($sideOn == 'value1' || $sideOn == 'value3'){
                      echo 'col s12 l9';
                      }
                  ?> main">
      <div class="main__container articleShow_wrap">
        <article class="notFound">
          <div class="article_container">
            <div class="article_title">
                <h1>記事が見つかりませんでした</h1>
            </div>
            <div class="article_thumbnail">
              <img src="<?php echo get_template_directory_uri()?>/images/NotFound/<?php echo rand(1,5)?>.png" alt="NotFound" class="fadeinimg lazyload" width="520" height="300">
            </div>
            <div class="article_content">
              <p>記事が見つかりませんでした。下記から検索ができます。</p>
              <div class="notfound_block">
                <p><span class="main_c"><i class="fas fa-search"></i></span>検索して探す</p>
                <form method="get" action="<?php bloginfo('url'); ?>">
                  <div class="search_form_wrap">
                    <input id="s_nf" name="s" type="text" required>
                    <label for="s_nf" class="input_placeholder">検索キーワードを入力</label>
                    <button type="submit" aria-label="検索ボタン"><i class="fas fa-search"></i></button>
                  </div>
                </form>
              </div>
              <div class="notfound_block notfound_cat">
                <ul>
                  <?php wp_list_categories('title_li=<p><span class="main_c"><i class="fas fa-folder-open"></i></span>カテゴリから探す</p>'); ?>
                </ul>
              </div>
              <?php $tag_num = wp_count_terms('post_tag'); ?>
              <?php if ($tag_num.size > 0): ?>
              <div class="notfound_block article_tag">
                <p><span class="main_c"><i class="fas fa-tag"></i></span>タグから探す</p>
                <?php wp_tag_cloud(); ?>
              </div>
              <?php endif; ?>
            </div>
          </div>
        </article>
        <style>
        article.notFound h1{
          text-align: center;
        }
        input#s_nf:focus ~ .input_placeholder{
          display: none;
        }
        .notfound_block:first-of-type {
          margin-top: 30px;
          padding-top: 30px;
          border-top: 5px dashed #efefef;
        }
        .notfound_block{
          padding: 0;
          margin-bottom: 50px;
        }
        .notfound_block p{
          font-size: 1.1em;
          font-weight: bold;
        }
        .notfound_cat>ul>li{
          padding-left: 0;
        }
        .notfound_cat>ul>li::before {
          display: none;
        }
        span.main_c>svg{
          margin-right: 10px;
        }
        .article_tag span{
          font-size:1em;
          margin-right: 0;
        }
        </style>
      </div>
    </main>
    <?php if ($sideOn == 'value1' || $sideOn == 'value3'){ get_sidebar(); } ?>
  </div>
<?php get_footer(); ?>
