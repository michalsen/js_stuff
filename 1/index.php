<html>
  <head>
  <style>
   .key {
    border: 1px solid black;
    border-radius: 5px;
    margin: 1em;
    font-size: 1.5em;
    padding: 1em .5em;
    transition: all .07s;
    width: 100px;
    text-align: center;
    color: orange;
    background: yellow;
    text-shadow: 0 0 5px black;
   }

   .playing {
    transform: scale(1.1);
    border-color: red;
        color: red;
    box-shadow: 0 0 10px #ffc600;
   }
  </style>
  </head>
  <body>

<div class="keys">
  <div data-key="89" class="key">
    <kbd>Yes</kbd>
  </div>
  <div data-key="78" class="key">
    <kbd>No</kbd>
  </div>
</div>
<audio data-key="78" src="sounds/n2.wav"></audio>
<audio data-key="89" src="sounds/y2.wav"></audio>


<script type="text/javascript">

function playSound(e) {
    console.log(e.keyCode);
    const audio = document.querySelector(`audio[data-key="${e.keyCode}"]`);
    const key =  document.querySelector(`.key[data-key="${e.keyCode}"]`);
    if(!audio) return;
    audio.currentTime = 0;
    audio.play();
    key.classList.add('playing');
  }

  function removeTranisition(e) {
    //console.log(e);
    if (e.proptertyName !== 'transform') return; // skip if not transform
    this.classList.remove('playing');
    //console.log(e.proptertyName);
  }

  const keys = document.querySelectorAll('.key');
  keys.forEach(key => key.addEventListener('transitionend', removeTranisition));

  window.addEventListener('keydown', playSound);
</script>
  </body>
</html>
