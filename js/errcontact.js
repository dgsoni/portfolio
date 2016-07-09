/*  Project: contact page
	Name:	 Dharmishta Ghosh
	Class:   COMP296 Spring 2016
	File:    errcontact.js

      Revision history: 
      Date of change:  
      Reason for change:  					  
      What was changed: 
*/

var checkForm = function(yourinfo) {
	var regex = /^[A-Z][a-z]+\s[A-Z][a-z]+$/;
	var regexp = /^\d{3}-\d{3}-\d{4}$/;
	var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if (yourinfo.fullName.value == "" || yourinfo.fullName.value == null)
	{
		alert("Please type in your full name.");
		yourinfo.fullName.focus();
		return(false);
	}
	if (regex.test(yourinfo.fullName.value) == false)
	{
		alert("Full Name must contain First Name space and Last Name!");
		yourinfo.fullName.focus();
		return(false);
	}
	if (yourinfo.phone.value == "" || yourinfo.phone.value == null)
	{
		alert("Please type in your phone.");
		yourinfo.phone.focus();
		return(false);
	}
	if (regexp.test(yourinfo.phone.value) == false)
	{
		alert("Phone must be in the format xxx-xxx-xxxx");
		yourinfo.phone.focus();
		return(false);
	}
	if (yourinfo.email.value == "" || yourinfo.email.value == null)
	{
		alert("Please type in your email.");
		yourinfo.email.focus();
		return(false);
	}
	if (reg.test(yourinfo.email.value) == false)
	{
		alert("Your email is invalid, enter again.");
		return(false);
	}
		return(true);
};

/*var listenFunction = function() {
	alert("You clicked the Send Button");
};
var init = function() {
	var node = document.getElementById("btnListen");
	node.addEventListener("click", listenFunction);
};
document.addEventListener("DOMContentLoaded", init);
*/