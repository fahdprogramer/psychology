$(document).ready(function () {
    // Function to animate elements
    function animateElements() {
        $('.spotlight').each(function () {
            var elementPos = $(this).offset().top;
            var topOfWindow = $(window).scrollTop();
            var directionClass = $(this).data('animation-direction'); // Assuming you use data attribute to specify animation direction

            if (elementPos < topOfWindow + $(window).height() - 100) {
                $(this).addClass('animate__animated ' + directionClass);
            }
        });
    }

    // Initial check to animate elements already in view
    animateElements();

    // Animate elements on scroll
    $(window).scroll(function () {
        animateElements();
    });

    // Smooth scroll for links with class "scrolly"
    $('.scrolly').on('click', function (event) {
        event.preventDefault();
        var target = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 800);
    });

    // Smooth scroll for the "more" button
    $('.more').on('click', function (event) {
        event.preventDefault();
        var target = $(this).attr('href');
        $('html, body').animate({
            scrollTop: $(target).offset().top
        }, 800);
    });
});
