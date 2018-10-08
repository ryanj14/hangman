// Initializes the hangman game
function init() {
  document.getElementById("guess").innerHTML = "Guess the word, it's " + randLength + " letters long";
  underscore();
  initDef();
  countWord();
  underWord();
}

init();
