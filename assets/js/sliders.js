document.addEventListener("DOMContentLoaded",(function(){new Swiper("#ntfslider",{effect:"coverflow",grabCursor:!0,centeredSlides:!0,slidesPerView:"auto",slideToClickedSlide:!0,coverflowEffect:{rotate:0,stretch:20,depth:300,modifier:1.4,slideShadows:!1},autoplay:{delay:1500,pauseOnMouseEnter:!0},speed:1e3,initialSlide:4,loop:!0,pagination:{el:".swiper-pagination",clickable:!0},breakpoints:{1199:{coverflowEffect:{rotate:0,stretch:0,depth:300,modifier:1.2,slideShadows:!1}}}}),new Swiper("#trademarkslider",{slidesPerView:1,centeredSlides:!0,spaceBetween:30,initialSlide:1,autoHeight:!0,pagination:{el:".swiper-pagination",clickable:!0},breakpoints:{1199:{slidesPerView:3,initialSlide:!1},1399:{slidesPerView:3,initialSlide:!1}}})}));