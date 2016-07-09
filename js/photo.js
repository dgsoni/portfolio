/*  Project: Painting
	Name:	 Dharmishta Ghosh
	Class:   COMP296 Spring 2016
	File:    photo.js

      Revision history: 
      Date of change:  
      Reason for change:  					  
      What was changed: 
*/

		var i = 0;
		var timeout;
		function preLoadImages(){
			if (document.images)
			{
				eupic = new Array();
				eupic[0] = new Image();
				eupic[0] = "../photos/eur001.jpg";
				eupic[1] = new Image();
				eupic[1] = "../photos/eur011.jpg";
				eupic[2] = new Image();
				eupic[2] = "../photos/eur058.jpg";
				eupic[3] = new Image();
				eupic[3] = "../photos/eur082.jpg";
				eupic[4] = new Image();
				eupic[4] = "../photos/eur139.jpg";
				eupic[5] = new Image();
				eupic[5] = "../photos/eur267.jpg";
				eupic[6] = new Image();
				eupic[6] = "../photos/eur344.jpg";
				eupic[7] = new Image();
				eupic[7] = "../photos/eur390.jpg";
				eupic[8] = new Image();
				eupic[8] = "../photos/eur394.jpg";
				eupic[9] = new Image();
				eupic[9] = "../photos/eur403.jpg";
			}
			else {
				alert("There are no images to preload");
			}
		}

		function startSlideShow(){
			if (i < eupic.length)
			{
				document.images["europe_pic"].src = eupic[i];
				i++;
			}
			else {
				i = 0;
				document.images["europe_pic"].src = eupic[i];
			}
			timeout = setTimeout('startSlideShow()',1500);
		}

		function stopSlideShow(){
			clearTimeout(timeout);
		}