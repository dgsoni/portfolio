/*  Project: Lab Assignment 08 - shell
	Name:	 Dharmishta Ghosh
	Class:   COMP267 Fall 2015
	File:    shell.js

      Revision history:  
      Date of change:  11/16/2015
      Reason for change:  Had to reset the statistics for the third button and needed
		 more work with disabling and enabling of buttons.
      What was changed: Redefined the third button which now resets the statistics
		for the game. Did the adjustments with disabling and enabling of buttons.
*/

var ES = "";
var RBTN_STR = "radBtn"; 
var wonCnt = 0;
var gameCnt = 0;
var playChoice;
var nodeWon = document.getElementById("gamewon");
var nodePlay = document.getElementById("gameplay");

var radBtn1 = document.getElementById("radio1").value;
var radBtn2 = document.getElementById("radio2").value;
var radBtn3 = document.getElementById("radio3").value;

var playAgain = function() {
	disableFun("btnPlay");
	enableFun("btnGuess");
	enableFun("btnStat");
};

var makeGuess = function() {
			if (document.getElementById("radio1").checked)
			{
				playChoice = radBtn1;
			}		

			if (document.getElementById("radio2").checked)
			{
				playChoice = radBtn2;
			}
		
			if (document.getElementById("radio3").checked)
			{ 
				playChoice = radBtn3;
			}
			alert("Player Choice: " + playChoice);
			randNo = Math.floor(1 + Math.random() * 3);
			alert("Computer choice: " + randNo);
			gameCnt++;
			if (playChoice == randNo) 
			{
				alert("Congratulations!\n" + "You won");
				wonCnt++;
				nodeWon.innerHTML = "You won " + wonCnt + " games.";
				nodePlay.innerHTML = "You played " + gameCnt + " games.";
			}
			else
			{
				alert("Sorry, wrong guess!\n" + "The pea was under shell " + randNo);
				nodeWon.innerHTML = "You won " + wonCnt + " games.";
				nodePlay.innerHTML = "You played " + gameCnt + " games.";
			}
			disableRadio();
			disableFun("btnGuess");
			enableFun("btnPlay");
			enableFun("btnStat");
};
	

var resetStats = function() {
	wonCnt = 0;
	gameCnt = 0;
	nodeWon.innerHTML = ES;
	nodePlay.innerHTML = ES;
	disableRadio();
	enableFun("btnGuess");
	disableFun("btnPlay");
	disableFun("btnStat");
};	

var disableFun = function(btn) {
	document.getElementById(btn).disabled = true;
};

var enableFun = function(btn) {
	document.getElementById(btn).disabled = false;
};

var disableRadio = function() {
	document.getElementById("radio1").checked = false;
	document.getElementById("radio2").checked = false;
	document.getElementById("radio3").checked = false;
};
	
var init = function() {
	var nodePlay = document.getElementById("btnPlay");	
	nodePlay.addEventListener("click", playAgain);

	var nodeGuess = document.getElementById("btnGuess");
	nodeGuess.addEventListener("click", makeGuess);

	var nodeStats = document.getElementById("btnStat");
	nodeStats.addEventListener("click", resetStats);
		
};
document.addEventListener("DOMContentLoaded", init);