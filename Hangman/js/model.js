var ggg = document.getElementById('plzwork');
var counter =  ggg.value;
var wordLength = 0;
var defPoint;
var lives = 7;
var strWhite = ' ';
var strTest = ' ';

// List of randomly choosen words
var listWord = [
  'apple', 'juice', 'cheese', 'computer', 'phone', 'cookie'
  ,'bag', 'snickers', 'nine', 'mouse', 'tatoo', 'electricity'];

// Definitions for the words
var definitions = [
  "An edible fruit produce on a tree"
  ,"Type of beverage"
  ,"Dairy Product"
  ,"Electronic device"
  ,"Communication device"
  ,"Type of dessert"
  ,"Carrying device"
  ,"Candy bar"
  ,"A number"
  ,"Small animal"
  ,"a form of body modification where a design is made by inserting ink"
  ,"is the set of physical phenomena associated with the presence and motion of electric charge"];

  var rand = listWord[Math.floor(Math.random() * listWord.length)]; // Selects a random word
  var randLength = rand.length;                                     // Length of random word

// List of alphabets
var listAlpha = [
  'a','b','c','d','e', 'f', 'g', 'h', 'i', 'j', 'k'
  ,'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u'
  ,'v', 'w', 'x', 'y', 'z']; 

// Adds spaces between each character
function underWord() {
  for(var i = 0; i < rand.length; i++) {
    strWhite += rand.charAt(i) + ' ';
  }
}

// Replaces the character at the specified index in the string with the replacement letter
function replaceAt(string, index, replace) {
  return string.substring(0, index) + replace + string.substring(index + 1);
}

 // Counts the number of unique characters in the string
 function countWord() {
  var test = "";
  for(var i =0; i < rand.length; i ++) {
    if(test.indexOf(rand.charAt(i))==-1) {
      test += rand[i];   
    }
  }
  for(var n = 0; n < test.length; n++) {
    wordLength++;
  }
}

// Creates the blank string with underscore corresponding to the random word's length
function underscore() {
  var whiteSpace = randLength + 1;
  var totalLength = whiteSpace + randLength;
  for(var i = 0; i < totalLength; i++) {
    if(i % 2 == 0) {
      strTest += " ";
    } else {
      strTest += "_";
    }
  }
  document.getElementById("word").innerHTML = strTest;
}