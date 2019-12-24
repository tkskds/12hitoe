<?php $randNum = rand(); ?>

<form method="get" action="<?php bloginfo('url'); ?>">
  <div class="search_form_wrap">
    <input id="s<?php echo $randNum ?>" name="s" type="text" required>
    <label for="s<?php echo $randNum ?>" class="input_placeholder">検索キーワードを入力</label>
    <button type="submit" aria-label="検索ボタン"><i class="fas fa-search"></i></button>
  </div>
</form>
