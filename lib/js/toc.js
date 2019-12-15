const tocWrap = document.querySelector(".toc_body");
const tocSide = document.querySelector(".widget_toc_body");

if (tocWrap){
  let postContent = document.querySelector(".painttoc");
  let hTags       = postContent.querySelectorAll("h2, h3");
  if (hTags.length > 0) {
    let tocList   = document.createElement("ul");
    let listSrc   = "";
    let h3List    = "";
    for (let i = 0; i < hTags.length; i++) {
      let theHeading = hTags[i];
      theHeading.setAttribute('id', "toc_id" + i);
      if (theHeading.tagName === 'H2') {
          if (h3List !== "") {
              listSrc += '<ul>' + h3List + '</ul>';
              h3List = "";
          }
          listSrc += '</li><li><a href="#toc_id' + i + '">' + theHeading.textContent + '</a>';
      } else if (theHeading.tagName === 'H3') {
          h3List += '<li><a href="#toc_id' + i + '">' + theHeading.textContent + '</a></li>';
      }
    }
    if (h3List !== "") {
        listSrc += '<ul>' + h3List + '</ul></li>';
    } else {
        listSrc += '</li>';
    }
    tocList.innerHTML = listSrc;
    tocWrap.appendChild(tocList);
    //　サイドバーに目次ウィジェットがある場合
    if(tocSide){
      let tocListSide = tocList.cloneNode(true);
      tocSide.appendChild(tocListSide);
    }
  }
}
