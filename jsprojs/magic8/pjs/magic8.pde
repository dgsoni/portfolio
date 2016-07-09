/** Project name : magic8ball
    Name         : Dharmishta Ghosh
    Class        : COMP267 Fall 2015 
 *  Filename     : magic8.pde
    Date         : December 14, 2015
**/

/** constants **/
var PARAM = 500;
var FG = color( 128, 128, 0);
var BG = color(192, 192, 192);
var FPS = 1;
var HEFT = 10;
var TR = 6;
var SZ = 20;
var CX = PARAM/2;
var CY = PARAM/2;
var BASE = 20;
var POSITIVE = 9;
var NEUTRAL = 14;
var NEGATIVE = 19;
var butText = "ASK Me";
var RESPONSES = ["It is cretain","It is \ndecidedly so","Without a doubt","Yes, \ndefinitely","You may \nrely on it",
	    "As I see it, \nyes","Most likely","Outlook good","Yes","Signs \npoint to yes",
	    "Reply hazy \ntry again","Ask again \nlater","Better not \ntell you now","Cannot \npredict now",
	    "Concentrate \nand ask again",
	    "Don't \ncount on it","My reply \nis no","My sources \nsay no","Outlook \nnot so good","Very doubtful"]; 
boolean overBut = false;

/** MagicBall class constructor **/
var MagicBall = function(x, y, s) {

	this.xpos = x;
	this.ypos = y;
	this.syze = s;

};

/** MagicBall class prototypes **/
MagicBall.prototype.drawMagicBall = function(x,y) {
	pushMatrix();
		translate(this.xpos, this.ypos);
		//translate(this.xpos + x * this.syze, this.ypos + y * this.syze);
		//outerCircle
		fill(0, 0, 0);
		ellipse(0, 0, 19 * this.syze, 19 * this.syze);
		//middleCircle
		fill(165, 0, 165);
		ellipse(0, 0, 15 * this.syze, 15 * this.syze);
		//innerCircle
		fill(0, 0, 0);
		ellipse(0, 0, 13 * this.syze, 13 * this.syze);
	popMatrix();
};

MagicBall.prototype.drawHexagon = function() {
//Hexagon shape
	pushMatrix();
	translate(this.xpos - 140, this.ypos - 120);
		fill(255,255,255);
		shapeMode(CENTER);
		beginShape();
		  vertex(90,30);
		  vertex(190,30);
		  vertex(250,120);
		  vertex(190,210);
		  vertex(140,210);
		  vertex(120,210);
		  vertex(90,210);
		  vertex(30,120);
	        endShape();
	popMatrix();
};

MagicBall.prototype.drawButton = function() {
	pushMatrix();
	translate(this.xpos - 200, this.ypos + 170);
		fill(0,0,0);
		rect(0, 0, 5 * this.syze, 3 * this.syze);
	popMatrix();
};

MagicBall.prototype.display = function() {
	this.drawMagicBall(13,13);
	this.drawHexagon();
	this.drawButton();
};

MagicBall.prototype.mouseClick = function() {
	if (mouseX >= 50 && mouseX <= 150 && mouseY >= 420 && mouseY <= 480)
		overBut = true;
	else
		overBut = false;
};

MagicBall.prototype.randMsg = function() {
	var i = Math.floor(Math.random() * BASE);
	
	if (i >= 0 && i <= POSITIVE) {
		fill(255,140,0);
		text(RESPONSES[i],250,250);
	}
	else if (i > POSITIVE && i <= NEUTRAL) {
		fill(0,139,69);
		text(RESPONSES[i],250,250);
	} 
	else if (i > NEUTRAL && i <= NEGATIVE) {
		fill(220,20,60);
		text(RESPONSES[i],250,250);
	}
	else {
		fill(0,0,0);
		text("Wrong response",250,250);
	}
	
};

/** draw the background **/
var drawEnvironment = function() {
	background(BG);
};

var eball;
/** setup **/
setup = function(){
	size(PARAM, PARAM);
	frameRate(FPS);
	smooth();
	noStroke();
	eball = new MagicBall(CX, CY, SZ);

// create and use the font for the text
	var myFont = createFont("Arial",20);
	textFont(myFont);
};

/** draw **/
draw = function(){
	drawEnvironment();
	eball.display();
	fill(255,255,255);
	textAlign(CENTER);
	text(butText,100,455);
	textAlign(CENTER);
	eball.mouseClick();
	if (overBut) {
	    eball.randMsg();
	    overBut = false;
	}
};

