const indexWrap = document.querySelector('.index_wrap');

if (indexWrap){

  let postContent = document.querySelector('.post_content');
  let hTags       = postContent.querySelectorAll('h2, h3');

  if (hTags.length > 0) {
    let indexList = document.createElement("ul");
    let listSrc   = "";
    let h3List    = "";

    for (let i = 0; i < hTags.length; i++) {
      let theHeading = hTags[i];
      theHeading.setAttribute('id', "index_id" + i);
      if (theHeading.tagName === 'H2') {
          if (h3List !== "") {
              listSrc += '<ul>' + h3List + '</ul>';
              h3List = "";
          }
          listSrc += '</li><li><a href="#index_id' + i + '">' + theHeading.textContent + '</a>';
      } else if (theHeading.tagName === 'H3') {
          h3List += '<li><a href="#index_id' + i + '">' + theHeading.textContent + '</a></li>';
      }
    }

    if (h3List !== "") {
        listSrc += '<ul>' + h3List + '</ul></li>';
    } else {
        listSrc += '</li>';
    }

    indexList.innerHTML = listSrc;
    indexWrap.appendChild(indexList);

  }

}
