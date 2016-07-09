/*  Project: Painting
	Name:	 Dharmishta Ghosh
	Class:   COMP296 Spring 2016
	File:    paint.js

      Revision history: 
      Date of change:  
      Reason for change:  					  
      What was changed: 
*/

		$(document).ready(function() {
			var slider = $("#image_list"); // slider = ul element
			var leftProperty, newLeftProperty;
			// the click event handler for the right button
			$("#right_button").click(function(){
				//get value of the current left property
				leftProperty = parseInt(slider.css("left"));
				//determine new value of the left property
				if (leftProperty - 300 <= - 1200)
				{
					newLeftProperty = 0;
				}
				else {
					newLeftProperty = leftProperty - 300;
				}
				//use the animate method to change the left property
				slider.animate( {left: newLeftProperty}, 1000);
			}); //end click

			// the click event handler for the left button
			$("#left_button").click(function(){
				//get value of the current left property
				leftProperty = parseInt(slider.css("left"));
				//determine new value of the left property
				if (leftProperty < 0)
				{
					newLeftProperty = leftProperty + 300;
				}
				else {
					newLeftProperty = 0;
				}
				//use the animate method to change the left property
				slider.animate( {left: newLeftProperty}, 1000);
			}); //end click
		}); //end ready		