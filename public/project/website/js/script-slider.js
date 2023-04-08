"use strict";
const slides = document.querySelectorAll(".section-2 .slide");
const btnLeft = document.querySelector(".arrow-left");
const btnRight = document.querySelector(".arrow-right");
let curSlide = 0;
const maxSlide = slides.length;
const goToSlide = function (slide) {
  slides.forEach(
    (s, i) => (s.style.transform = `translateX(${100 * (i - slide)}%)`)
  );
};
goToSlide(0);

const nextSlide = function () {
  if (curSlide === maxSlide - 1) {
    curSlide = 0;
  } else {
    curSlide++;
  }
  goToSlide(curSlide);
};

const privSlide = function () {
  if (curSlide === 0) {
    curSlide = maxSlide - 1;
  } else {
    curSlide--;
  }
  goToSlide(curSlide);
};

btnRight.addEventListener("click", nextSlide);
btnLeft.addEventListener("click", privSlide);
document.addEventListener("keydown", function (e) {
  // if (e.key === "ArrowLeft") privSlide();
  // e.key === "ArrowRight" && nextSlide();
});
////////////////////////
("use strict");
const slide = document.querySelectorAll(".section-3 .slide");
const btnLef = document.querySelector(".section-3 .arrow-left");
const btnRigh = document.querySelector(".section-3 .arrow-right");
let curSlid = 0;
const maxSlid = slide.length;
const goToSlid = function (slid) {
  slide.forEach(
    (s, i) => (s.style.transform = `translateX(${100 * (i - slid)}%)`)
  );
};
goToSlid(0);

const nextSlid = function () {
  if (curSlid === maxSlid - 1) {
    curSlid = 0;
  } else {
    curSlid++;
  }
  goToSlid(curSlid);
};

const privSlid = function () {
  if (curSlid === 0) {
    curSlid = maxSlid - 1;
  } else {
    curSlid--;
  }
  goToSlid(curSlid);
};

btnRigh.addEventListener("click", nextSlid);
btnLef.addEventListener("click", privSlid);
document.addEventListener("keydown", function (e) {});
//////////////////////////////////////
("use strict");
const slid = document.querySelectorAll(".section-7 .slide");
const btnLe = document.querySelector(".section-7 .arrow-left");
const btnRig = document.querySelector(".section-7 .arrow-right");
let curSli = 0;
const maxSli = slid.length;
const goToSli = function (slidess) {
  slid.forEach(
    (s, i) => (s.style.transform = `translateX(${100 * (i - slidess)}%)`)
  );
};
goToSli(0);

const nextSli = function () {
  if (curSli === maxSli - 1) {
    curSli = 0;
  } else {
    curSli++;
  }
  goToSli(curSli);
};

const privSli = function () {
  if (curSli === 0) {
    curSli = maxSli - 1;
  } else {
    curSli--;
  }
  goToSli(curSli);
};

btnRig.addEventListener("click", nextSli);
btnLe.addEventListener("click", privSli);
document.addEventListener("keydown", function (e) {});

///////////
