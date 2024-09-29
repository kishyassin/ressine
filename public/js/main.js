(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();



    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 45) {
            $('.navbar').addClass('sticky-top shadow-sm');
        } else {
            $('.navbar').removeClass('sticky-top shadow-sm');
        }
    });


    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";

    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });
        console.log($videoSrc);

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        })

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        })



//   panorama
        pannellum.viewer('panorama', {
            "type": "equirectangular",
            "panorama": "./img/restaurant-panorama.jpg",
            "preview": "./img/restaurant-panorama.jpg"
        });
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        center: true,
        margin: 24,
        dots: true,
        loop: true,
        nav : false,
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            },
            992:{
                items:3
            }
        }
    });

})(jQuery);


// Select elements
let slider = document.querySelector('.slider .list');
let items = document.querySelectorAll('.slider .list .item');
let next = document.getElementById('next');
let prev = document.getElementById('prev');
let dots = document.querySelectorAll('.slider .dots li');
let bookingLinks = document.querySelectorAll('.booking-link-of-slider'); // Select all elements with this class

// Number of items in the slider
let lengthItems = items.length - 1;
let active = 0;

// Function to reload the slider position and update dots
function reloadSlider() {
    // Move the slider to the active item
    slider.style.left = -items[active].offsetLeft + 'px';

    // Update active dot
    document.querySelector('.slider .dots li.active').classList.remove('active');
    dots[active].classList.add('active');

    // Reset the interval
    clearInterval(refreshInterval);
    refreshInterval = setInterval(() => { next.click(); }, 5500);
}

// Event listeners for navigation buttons
next.onclick = function() {
    active = active + 1 <= lengthItems ? active + 1 : 0;
    reloadSlider();
};
prev.onclick = function() {
    active = active - 1 >= 0 ? active - 1 : lengthItems;
    reloadSlider();
};

// Auto-advance slider every 6 seconds
let refreshInterval = setInterval(() => { next.click(); }, 6000);

// Event listener for dots navigation
dots.forEach((li, key) => {
    li.addEventListener('click', () => {
        active = key;
        reloadSlider();
    });
});

// Recalculate positions on window resize
window.onresize = function() {
    reloadSlider();
};

// Stop and resume auto-advance on hover for all booking-link-of-slider elements
bookingLinks.forEach((link) => {
    link.addEventListener('mouseenter', () => {
        clearInterval(refreshInterval);
    });

    link.addEventListener('mouseleave', () => {
        refreshInterval = setInterval(() => { next.click(); }, 6000);
    });
});





// popular items script
var TrandingSlider = new Swiper('.tranding-slider', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    loop: true,
    slidesPerView: 'auto',
    coverflowEffect: {
      rotate: 0,
      stretch: 0,
      depth: 100,
      modifier: 2.5,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    }
  });
