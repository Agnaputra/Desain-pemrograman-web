let currentIndex = 0;
const slides = $(".slide");

function showSlide(index) {
  slides.removeClass("active");
  if (index >= slides.length) {
    currentIndex = 0;
  } else if (index < 0) {
    currentIndex = slides.length - 1;
  } else {
    currentIndex = index;
  }
  slides.eq(currentIndex).addClass("active");
}

function changeSlide(direction) {
  showSlide(currentIndex + direction);
}

setInterval(() => {
  changeSlide(1);
}, 3000);
