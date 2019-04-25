<div class="Slide-Container">
	<div class="slide fade"><img src="images/slideshow/363.jpg" style="vertical-align:middle"></div>
    <div class="slide fade"><img src="images/slideshow/330.jpg" style="vertical-align:middle"></div>
    <div class="slide fade"><img src="images/slideshow/banner_49ae49a2.png" style="vertical-align:middle"></div>
    <div class="slide fade"><img src="images/slideshow/329.jpg" style="vertical-align:middle"></div>
    <div style="text-align:center">
    	<span class="dot" onClick="currentSlide(0)"></span>
        <span class="dot" onClick="currentSlide(1)"></span>
        <span class="dot" onClick="currentSlide(2)"></span>
        <span class="dot" onClick="currentSlide(3)"></span>
    </div>
    <script>
		var slideIndex; //slideIndex đại diện cho mỗi slide (Vd: Hình 1 là slideindex=0 ....)
		function showSlides() {
			var i;
			var slides = document.getElementsByClassName("slide");
			var dots = document.getElementsByClassName("dot");
			for (i = 0; i < slides.length; i++) {
         		slides[i].style.display = "none";  
      		}
			for (i = 0; i < dots.length; i++) {
          		dots[i].className = dots[i].className.replace(" active", "");
    		}
			slides[slideIndex].style.display = "block";  
			dots[slideIndex].className += " active";
			slideIndex++; //Chuyển silde kế tiếp
			if (slideIndex > slides.length - 1) {	//Nếu slide cuối
				slideIndex = 0;			//Chuyển về slide đầu
			}
			setTimeout(showSlides, 5000);	//Lệnh tự động chuyển đồi sau 5s
		}
		showSlides(slideIndex = 0);
		function currentSlide(n) {
    		showSlides(slideIndex = n);
  		}
	</script>
</div>