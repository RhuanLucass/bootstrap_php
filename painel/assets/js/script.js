const menus = document.querySelectorAll('#ul-aside li a, #header-menu li a');
let scrolled = false;
const height = document.getElementById('nav-menu').clientHeight + 15;


menus.forEach(link => link.addEventListener('click', clickMenu));

function clickMenu(e){
  e.preventDefault();

  if(scrolled === false){
    const element = e.target;
    const to = getScrollTop(element) - height;

    scrollToPosition(to);
    scrolled = true;

    setTimeout(() => {
      scrolled = false;
    }, 1500);
  }
}

function getScrollTop(element) {
  const id = element.getAttribute("ref");
  return document.getElementById(id+'-section').offsetTop;
}

function scrollToPosition(to) {
  smoothScrollTo(to, 1500);
}

function smoothScrollTo(endY, duration) {
  const startY = window.scrollY;
  const distanceY = endY - startY;
  const startTime = new Date().getTime();

  duration = typeof duration !== "undefined" ? duration : 400;

  // Easing function
  const easeInOutQuart = (time, from, distance, duration) => {
    if ((time /= duration / 2) < 1)
      return (distance / 2) * time * time * time * time + from;
    return (-distance / 2) * ((time -= 2) * time * time * time - 2) + from;
  };

  const timer = setInterval(() => {
    const time = new Date().getTime() - startTime;
    const newY = easeInOutQuart(time, startY, distanceY, duration);
    if (time >= duration) {
      clearInterval(timer);
    }
    window.scrollTo(0, newY);
  }, 1000 / 60); // 60 fps
}

window.addEventListener('scroll', menuPosition);

function menuPosition(){
  const windowTop = window.scrollY + window.innerHeight * 0.5;
  const sections = document.querySelectorAll('section[id$=-section]');
  let element, idSlice;
  if(windowTop <= sections[1].offsetTop){
    idSlice = sections[0].id.slice(0, -8);
    element = document.querySelector(`a[ref=${idSlice}]`);
    removeClasses();
    addClasses(element);
  }else if(windowTop > sections[1].offsetTop && windowTop <= sections[2].offsetTop){
    idSlice = sections[1].id.slice(0, -8);
    element = document.querySelector(`a[ref=${idSlice}]`);
    removeClasses();
    addClasses(element);
  }else if(windowTop > sections[2].offsetTop){
    idSlice = sections[2].id.slice(0, -8);
    element = document.querySelector(`a[ref=${idSlice}]`);
    removeClasses();
    addClasses(element);
  }
}

function removeClasses(){
  const actives = document.querySelectorAll('#ul-aside li.active, #header-menu li a.active');
  const textWhite = document.querySelector('#ul-aside li a.text-white');
  actives.forEach(active => active.classList.remove('active'));
  textWhite.classList.remove('text-white');
}

function addClasses(element){
  const headerMenu = document.querySelector(`#header-menu a[ref=${element.getAttribute('ref')}]`);
  const ulAside = document.querySelector(`#ul-aside li a[ref=${element.getAttribute('ref')}]`);
  headerMenu.classList.add('active');
  ulAside.parentNode.classList.add('active');
  ulAside.classList.add('text-white');
}

const navbarSite = document.getElementById('navbarSite');
const navMobile = document.querySelectorAll('#header-menu li a');

navMobile.forEach(nav => nav.addEventListener('click', closeMenu));

function closeMenu(){
  navbarSite.classList.remove('show');
}

const btnAbout = document.getElementById('btn-about');
// btnAbout.addEventListener('click', hideAlert);

function hideAlert(e){
  e.preventDefault();

  // sendAjax();
  // setTimeout(() => {
  //   const alert = document.getElementsByClassName('alert');
    
  // }, 2000);
  
}