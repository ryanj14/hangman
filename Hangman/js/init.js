// Initializes the hangman game
function init() {
  initScore();
  document.getElementById("guess").innerHTML = "Guess the word, it's " + randLength + " letters long";
  underscore();
  initDef();
  countWord();
  underWord();
}

function initScore() {
  let score = document.getElementById("plzwork").value;
  document.getElementById("score").innerHTML = score;
}

init();
