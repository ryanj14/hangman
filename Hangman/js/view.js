// Creates the buttons using JS
window.onload = createButton = () => {
  for (var i = 0; i < listAlpha.length; i++) {  
    var btn = document.createElement("button");
    btn.id = i;
    btn.className = "btn btn-primary";
    btn.value = listAlpha[i];
    var border = document.getElementById("rowButtons");
    var t = document.createTextNode(listAlpha[i]);
    btn.appendChild(t);
    border.appendChild(btn);
    btn.onclick = function() {checkGuess(this.id, this.value);};
  }
}

// enables all the alphabet buttons
enableButtons = () => {
  for (var i = 0; i < listAlpha.length; i++) { 
    var num = i.toString();
    document.getElementById(num).disabled = false;
  }
}

// Disables all the alphabet buttons
disableButtons = () => {
  for (var i = 0; i < listAlpha.length; i++) { 
    var num = i.toString();
    document.getElementById(num).disabled = true;
  }
}

// Replaces the underscore with the correct letter
replace = (letter) => {
  for(var i = 0; i < strWhite.length; i++) {
      if(strWhite[i] == letter) {
        counter++;
        strTest = replaceAt(strTest, i + 1, letter);
      } 
    }
  document.getElementById("word").innerHTML = strTest;
}

// Checks the letter button with the word
checkWord = (letter, idNum) => {
  var num = idNum.toString();
  for(var i = 0; i < rand.length; i++) {
    if(rand.indexOf(letter) > -1) {
      document.getElementById(num).disabled = true;
      return true;
    } else {
      return false;
    }
  }
}

// Initializes the definitions for the random word
initDef = () => {
  for(var h = 0; h < listWord.length; h++) {
    if(rand == listWord[h]) {
      defPoint = h;
    }
  }
  document.getElementById("def").innerHTML = "Definition for this word is: \"" + definitions[defPoint] + "\"";
}

// Changes the guess div with the win/loose message
message = () => {
  if(lives == 0) {
    document.getElementById("guess").innerHTML = "You loose!";
    disableButtons();
  }
  if(wordLength == 0) {
    document.getElementById("guess").innerHTML = "You win!";
    disableButtons();
  }
}

// Updates the score
score = () => {
  let z = document.getElementById("jjj");
  let x = document.getElementById("score");
  var y = document.getElementById("lives");
  z.value = counter;
  z.innerHTML = counter;
  x.innerHTML = counter;
  y.innerHTML = lives;
}
