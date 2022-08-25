$('.owl-carousel').owlCarousel({
    loop: true,
    margin: 2,
    dots: false,
    nav: false,
    responsive: {
        0: {
            items: 2
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
})

var owl = $('.owl-carousel');
owl.owlCarousel();
// Go to the next item
$('.owl-prev').click(function () {
    owl.trigger('prev.owl.carousel');
})
// Go to the previous item
$('.owl-next').click(function () {
    owl.trigger('next.owl.carousel');
})

const plus = document.getElementById('plus')
const quantityNumber = document.getElementById('quantityNumber')
const minus = document.getElementById('minus')

plus.addEventListener('click', () => {
    quantityNumber.value++;
});
minus.addEventListener('click', () => {
    if (quantityNumber.value > 1) {
        quantityNumber.value--;
    }
});


$("#descreptionHeading").click(function () {
    $("#reviews").hide();
    $(".descreptionText").show();

    $("#reviewsHeading").removeClass("selected");
    $("#reviewsHeading").addClass("unSelected");
    $("#descreptionHeading").removeClass('unSelected');
    $("#descreptionHeading").addClass('selected');

});
$("#reviewsHeading").click(function () {
    $("#reviews").show();
    $(".descreptionText").hide();
    $("#descreptionHeading").removeClass('selected');
    $("#descreptionHeading").addClass('unSelected');
    $("#reviewsHeading").removeClass("unSelected");
    $("#reviewsHeading").addClass("selected");
});
