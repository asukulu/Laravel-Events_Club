<script>
	var i = 0; // Start point
	var images = [];
	var time = 4000;

	// Image List
	images[0] = '/img/ka.jpg';
	images[1] = '/img/ru.jpg';
	images[2] = '/img/sp.jpg';
	images[3] = '/img/swi.jpg';

	// Change Image
	function changeImg(){
		document.slide.src = images[i];

		if(i < images.length - 1){
			i++;
		} else {
			i = 0;
		}

		setTimeout("changeImg()", time);
	}

	window.onload = changeImg;

</script>
<strong><h1> WELCOME TO ASTON ACTIVE</h1></strong>
<img name="slide" width="1200" height="600">

