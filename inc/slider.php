<div class="slidersection templete clear shadow-2xl overflow-hidden relative group">

    <div class="slides" id="slides">
        <img src="images/slide/01.jpg" alt="Update 1">
        <img src="images/slide/02.jpg" alt="Update 2">
        <img src="images/slide/03.jpg" alt="Update 3">
    </div>

    <button class="prev" onclick="prevSlide()"><i class="fa fa-chevron-left"></i></button>
    <button class="next" onclick="nextSlide()"><i class="fa fa-chevron-right"></i></button>

    <div class="absolute bottom-4 left-6 z-20">
        <div class="bg-black/50 backdrop-blur-md px-3 py-1 rounded-lg border border-white/10">
            <span class="text-[#3DDC84] text-[10px] font-black tracking-[0.3em] uppercase">Expert Insights //</span>
        </div>
    </div>
</div>

<style>
/* New Slider Styles */
.slidersection {
    position: relative;
    width: 958px; /* Matching your container */
    height: 400px; /* Ektu height baralam premium looker jonno */
    margin: 20px auto;
    border-radius: 24px; /* Android style rounded corners */
    border: 1px solid rgba(255, 255, 255, 0.05);
    background: #0b0e14;
}

.slides {
    display: flex;
    height: 100%;
    transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); /* Smooth Android animation */
}

.slides img {
    width: 958px;
    height: 400px;
    object-fit: cover;
    flex-shrink: 0;
    filter: brightness(0.8); /* Images ektu dark jate text fute uthe */
    transition: 0.5s;
}

/* Hover korle image bright hobe */
.slidersection:hover .slides img {
    filter: brightness(1);
}

/* Modern Android Style Buttons */
.prev, .next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(11, 14, 20, 0.6);
    backdrop-filter: blur(8px);
    color: #3DDC84; /* Android Green */
    border: 1px solid rgba(61, 220, 132, 0.2);
    width: 50px;
    height: 50px;
    border-radius: 50%; /* Circular button */
    cursor: pointer;
    font-size: 14px;
    z-index: 30;
    transition: all 0.3s;
    opacity: 0; /* Normal e hide thakbe */
}

/* Hover korle button show korbe */
.slidersection:hover .prev, 
.slidersection:hover .next {
    opacity: 1;
}

.prev { left: 20px; }
.next { right: 20px; }

.prev:hover, .next:hover {
    background: #3DDC84;
    color: #000;
    box-shadow: 0 0 20px rgba(61, 220, 132, 0.4);
}

/* Hide navigation markers if not needed */
.clear { overflow: hidden; }
</style>

<script>
let currentIndex = 0;
const slides = document.getElementById("slides");
const totalSlides = slides.children.length;

function updateSlide() {
    const slideWidth = document.querySelector('.slidersection').offsetWidth;
    slides.style.transform = "translateX(-" + (currentIndex * slideWidth) + "px)";
}

function nextSlide() {
    currentIndex++;
    if(currentIndex >= totalSlides){
        currentIndex = 0;
    }
    updateSlide();
}

function prevSlide() {
    currentIndex--;
    if(currentIndex < 0){
        currentIndex = totalSlides - 1;
    }
    updateSlide();
}

// Auto slide (Optional: Pro vibe)
setInterval(nextSlide, 5000);
</script>