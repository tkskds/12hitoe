<?php
  $comment_ttl = get_option('csite_article_omment_ttl') ? get_option('site_article_comment_ttl') : 'COMMENT' ;
  $args_form   = array(
    'title_reply'          => 'コメントする',
    'title_reply_to'       => '返信する',
    'cancel_reply_link'    => 'キャンセル',
    'label_submit'         => '送信する',
    'comment_notes_before' => '<p class="commentNotesBefore">入力エリアすべてが必須項目です。メールアドレスが公開されることはありません。</p><br>',
    'comment_notes_after'  => '<p class="commentNotesAfter">内容をご確認の上、送信してください。</p><br>',
    'fields'               => array(
      'author'             => '<p class="comment_form_author">'.
                              '<input id="comment_author" name="author" type="text" value="'.
                               esc_attr( $commenter['comment_author'] ).
                               '" size="30"'.$aria_req.' placeholder="お名前" /></p>',
      'email'              => '<p class="comment_form_email">'.
                              '<input id="comment_email" name="email" '.
                              ($html5 ? 'type="email"' : 'type="text"').
                              ' value="'.esc_attr($commenter['comment_author_email']).
                              '" size="30"'.$aria_req.'placeholder="メールアドレス" /></p>',
      'url'                => '',
    ),
    'comment_field'        => '<p class="comment_form_comment"><label for="comment_comment">コメント欄</label>'.
                              '<textarea id="comment_comment" name="comment" cols="50" rows="6" aria-required="true"'.
                              $aria_req.' placeholder="コメント内容を入力" /></textarea></p>',
  );
 ?>

<div class="comment">
  <h3 class="comment_ttl article_af_ttl"><?php echo $comment_ttl ?></h3>
  <div class="comment_box">
    <?php if(have_comments()): ?>
      <div class="comment_lists">
        <?php wp_list_comments(array('style'=>'div','callback'=>'callback_comment')); ?>
      </div>
    <?php endif; ?>
    <?php comment_form($args_form); ?>
  </div>
</div>
