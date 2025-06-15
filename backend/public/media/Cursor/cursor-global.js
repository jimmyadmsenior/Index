// Efeito de cursor personalizado global
// Requer jQuery e TweenMax/TweenLite
(function() {
  if (!window.jQuery || !window.TweenLite) return;
  var $box = [];
  var boxSize = 25;
  for (var i = 0; i < 30; i++) {
    var div = document.createElement('div');
    div.className = 'box';
    document.body.appendChild(div);
    $box.push(div);
  }
  function moveBox(e) {
    var x = e.pageX - boxSize/2;
    var y = e.pageY - boxSize/2;
    $box.forEach(function(box, index) {
      TweenLite.to(box, 0.05, { left: x + 'px', top: y + 'px', delay: 0 + (index / 750) });
      box.style.opacity = 1;
    });
  }
  window.addEventListener('mousemove', moveBox);
})();
