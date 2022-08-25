$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    input = $(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$(".bi-eye-fill").click(function () {
    input = $(this).parent().find("input");
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

$('#homePageCarousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoPlaySpeed: 300,
    // autoplayHoverPause: true,
    dots: false,
    nav: true,
    navText: [$('.owl-navigation-homePage_carousel .owl-nav-prev'), $('.owl-navigation-homePage_carousel .owl-nav-next')],
    responsive: {
        0: {
            items: 1
        },
        960: {
            items: 1
        }
    }
});
$('#ProductPageCarousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoPlaySpeed: 1000,
    autoplayHoverPause: true,
    dots: true,
    nav: false,
    navText: [$('.owl-navigation-homePage_carousel .owl-nav-prev'), $('.owl-navigation-homePage_carousel .owl-nav-next')],
    responsive: {
        0: {
            items: 1
        },
        960: {
            items: 1
        }
    }
});
$('#ingredientsPageCarousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoPlaySpeed: 1000,
    autoplayHoverPause: true,
    dots: true,
    nav: false,
    navText: [$('.owl-navigation-ingredientsPage_carousel .owl-nav-prev'), $('.owl-navigation-ingredientshomePage_carousel .owl-nav-next')],
    responsive: {
        0: {
            items: 1
        },
        960: {
            items: 1
        }
    }
});


$('.ingredientsCarousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: false,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
})

var owl = $('.ingredientsCarousel');
owl.owlCarousel();
// Go to the next item
$('.ingredients-prev').click(function () {
    owl.trigger('prev.owl.carousel');
})
// Go to the previous item
$('.ingredients-next').click(function () {
    owl.trigger('next.owl.carousel');
})


const list = document.getElementById('list')
const grid = document.getElementById('grid')
const products = document.getElementById('products')
// const rows = document.getElementsByClassName('row')
const singleProduct = document.querySelectorAll('.singleProduct')
// const ProductViewList = document.querySelectorAll('.productViewList')
const singleProductCard = document.querySelectorAll('.singleProductCard')

list.addEventListener('click', () => {
    list.classList.add('actived')
    grid.classList.remove('actived')
    singleProductCard.forEach(ele => {
        ele.classList.remove('productCard')
        ele.classList.add('productCardList')
    })
})
grid.addEventListener('click', () => {
    list.classList.remove('actived')
    grid.classList.add('actived')
    singleProductCard.forEach(ele => {
        ele.classList.remove('productCardList')
        ele.classList.add('productCard')
    })
})

// const accordion = document.getElementsByClassName('contentBox').getElementsByClassName('label');


// for (var i = 0; i < accordion.length; i++) {
// const label = accordion[i].querySelector('.label')
// accordion[i].addEventListener('click', function () {
// this.classList.toggle('active');
// })
// }


$("#accordion .card-link").click(function () {
    $(this).children().children().toggleClass("downArrow").toggleClass('upArrow');
});

