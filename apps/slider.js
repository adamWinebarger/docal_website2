//slider.js
//this is going to handle our back-end code for the
// blaze slider so that that stuff isn't getting sent
// out with the html page
// const fs = require('fs')
// const path = require('path')
// const express = require('express')
// const app = express()

const sliderEl = document.querySelector(".blaze-slider");

      const blazeSlider = new BlazeSlider(sliderEl, {
        all: {
          enableAutoplay: true,
          slidesToScroll: 3,
          slidesToShow: 3,
          transitionDuration: 700,
          autoplayInterval: 5000,
          loop: true,
          draggable: true
        },
        "(max-width: 900px)": {
          slidesToShow: 2,
          slidesToShow: 2,
          slidesGap: "40px"
        },
        "(max-width: 500px)": {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      });

      // listen for slide event
      blazeSlider.onSlide(
        (pageIndex, firstVisibleSlideIndex, lastVisibleSlideIndex) => {
          console.log({
            pageIndex,
            firstVisibleSlideIndex,
            lastVisibleSlideIndex
          });
        }
      );
