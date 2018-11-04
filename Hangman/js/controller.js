// Checks the users button guess
function checkGuess(btn, letter) {
  if(checkWord(letter, btn) == false) {
    counter--;
    lives--;
  } else {
    replace(letter);
    wordLength--;
  }
  if(wordLength == 0) {
    disableButtons();
  }
  score();
  message();
}

// Resests the hang man game
function resetGame () { 
  strTest = " ";
  strWhite = " ";
  wordLength = 0;
  if(lives == 0) {
    counter = 0;
  }
  lives = 7;
  score();
  document.getElementById('jjj').value = counter;
  rand = listWord[Math.floor(Math.random() * listWord.length)];
  randLength = rand.length;
  document.getElementById("guess").innerHTML = "Guess the word, it's " + randLength + " letters long";
  enableButtons();
  initDef();
  underWord();
  underscore();
  countWord();
}
