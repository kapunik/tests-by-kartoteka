// вставляйте конд ниже целиком в консоль браузера
// в алерете вылезет первая строчка новости
// а в футере появятся часы



var a = document.querySelector('.news_item>div>p>span');
alert (a.textContent);


var myNode = document.querySelector('.kart-phone');
var timeNode = document.createElement('div');
timeNode.id = 'targetTime';
myNode.appendChild(timeNode);
    function getCurrentTimeString() {
      return new Date().toTimeString().replace(/ .*/, '');
   }
    setInterval(
      () => timeNode.textContent = getCurrentTimeString(),
      1000
   );