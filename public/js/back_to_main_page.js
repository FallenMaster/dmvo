function start() {
   if (location.pathname !== '/start') {
      testtimeout();
      eventListeners();
   }
}

function eventListeners() {
   var el = document.querySelector('.page');
   el.addEventListener('touchstart', stoper, false);
   el.addEventListener('touchend', stoper, false);
   el.addEventListener('touchcancel', stoper, false);
   el.addEventListener('touchmove', stoper, false);
   el.addEventListener('mousemove', stoper, false);
}

function redirectToMain() {
   location.assign('http://' + location.host + '/start');
}

var timer;
function testtimeout() {
   timer = setTimeout(redirectToMain, 120000);
}

function stoper()	{
   clearTimeout(timer);
   testtimeout();
}

start();
