// ナビ
document.addEventListener('DOMContentLoaded', function() {
  var sideNav = document.querySelectorAll('.sidenav');
  var instancesNav = M.Sidenav.init(sideNav);
  var fixedBtn = document.querySelectorAll('.fixed-action-btn');
  var instancesFixedBtn = M.FloatingActionButton.init(fixedBtn);
});