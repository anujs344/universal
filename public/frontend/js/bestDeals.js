// best deals carousel
$('.bestDealsCarousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
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
});

$('.bestDealsProductsCarousel').owlCarousel({
    loop: true,
    margin: 10,
    dots: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        900: {
            items: 3
        },
        1100: {
            items: 4
        }
    }
});