const darkModeMediaQuery  = window.matchMedia('(prefers-color-scheme: dark)');
const darkModeOn          = darkModeMediaQuery.matches;
const btn                 = document.querySelector("#mode_switch");

darkModeMediaQuery.addListener((e) => {
  const darkModeOn = e.matches;
  if (darkModeOn) {
    document.body.classList.remove('light_theme');
    document.body.classList.add('dark_theme');
  }else{
    document.body.classList.remove('dark_theme');
    document.body.classList.add('light_theme');
  }
});

btn.addEventListener("change", () => {
  if (btn.checked == true){
    document.body.classList.remove("light_theme");
    document.body.classList.add("dark_theme");
  }else{
    document.body.classList.remove("dark_theme");
    document.body.classList.add("light_theme");
  }
});
