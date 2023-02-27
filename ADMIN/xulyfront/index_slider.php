<section id="Slider">
        <div class="aspect-ratio-169">
            <img src="img/img1.jpg">
            <img src="img/img2.jpg">
            <img src="img/img3.jpg">

        </div>
        <div class="dot-container">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </section>
</body>
<script>
    const header = document.querySelector("header")
window.addEventListener("scroll",function(){
    x = window.pageYOffset
    if(x>0){
        header.classList.add("sticky")
    }
    else {
        header.classList.remove("sticky")
    }
})



    const imgPosition = document.querySelectorAll(".aspect-ratio-169 img")
    const imgContainer = document.querySelector('.aspect-ratio-169')
    const dotItem = document.querySelectorAll(".dot")
    let imgNumber = imgPosition.length
    let index = 0
    imgPosition.forEach(function (image, index) {
        image.style.left = index * 100 + "%"
        dotItem[index].addEventListener("click",function(){
            slider(index)
        })
    })
    function imgSlide() {
        index++;
        if (index >= imgNumber) { index = 0 }
        slider(index)
    }
    setInterval(imgSlide, 3000)
    function slider(index){
        imgContainer.style.left = "-"+index*100+"%"
        const dotActive = document.querySelector(".active")
        dotActive.classList.remove("active")
        dotItem[index].classList.add("active")
    }
</script>

</html>