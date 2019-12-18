<ul>
  <li>
    <a href="#" data-target="mobile-sidenav" class="waves-effect sidenav-trigger" aria-label="ナビメニューボタン">
      <i class="fas fa-list-ul"></i>
    </a>
  </li>
  <li>
    <a href="#modalSearch" class="waves-effect modal-trigger" aria-label="検索ボタン">
      <i class="fas fa-search"></i>
    </a>
  </li>
  <li>
    <a href="#modalShare" class="waves-effect modal-trigger" aria-label="シェアボタン">
      <i class="fas fa-share-alt"></i>
    </a>
  </li>
  <li>
    <a href="#" class="waves-effect" aria-label="トップへ戻るボタン">
      <i class="fas fa-angle-up"></i>
    </a>
  </li>
</ul>
<div id="modalSearch" class="modal bottom-sheet">
  <div class="modal-content">
    <h4>Search</h4>
    <?php get_search_form(); ?>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect btn-flat">CLOSE</a>
  </div>
</div>
<div id="modalShare" class="modal bottom-sheet">
  <div class="modal-content">
    <h4>Share</h4>
    <?php get_template_part('parts/others/sharebutton'); ?>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect btn-flat">CLOSE</a>
  </div>
</div>
