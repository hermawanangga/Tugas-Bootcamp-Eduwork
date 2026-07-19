// =========================
// PORTFOLIO FILTER
// =========================

const filterButtons = document.querySelectorAll(".portfolio-filter button");
const portfolioItems = document.querySelectorAll(".portfolio-item");

filterButtons.forEach((button) => {
  button.addEventListener("click", () => {
    filterButtons.forEach((btn) => btn.classList.remove("active"));

    button.classList.add("active");

    const filter = button.dataset.filter;

    portfolioItems.forEach((item) => {
      const category = item.querySelector(".portfolio-card").dataset.category;

      if (filter === "all" || filter === category) {
        item.style.display = "flex";
      } else {
        item.style.display = "none";
      }
    });
  });
});

// =========================
// TESTIMONIAL SWIPER
// =========================

const testimonialSwiper = new Swiper(".testimonialSwiper", {
  loop: true,

  centeredSlides: true,

  slidesPerView: 1,

  spaceBetween: 25,

  speed: 650,

  grabCursor: true,

  autoplay: {
    delay: 3500,
    disableOnInteraction: false,
    pauseOnMouseEnter: true,
  },

  pagination: {
    el: ".swiper-pagination",
    clickable: true,
    dynamicBullets: false,
  },

  breakpoints: {
    0: {
      slidesPerView: 1,
    },

    768: {
      slidesPerView: 1.2,
    },

    992: {
      slidesPerView: 1.45,
    },

    1200: {
      slidesPerView: 1.5,
    },
  },
});
