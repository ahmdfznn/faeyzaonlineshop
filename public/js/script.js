
gsap.set('#navbar', {
    duration: 1,
    y: -100
})

gsap.from('#subtitle', {
    duration: 1,
    delay: 0.8,
    y: -100,
    opacity: 0,
    ease: 'back'
})

gsap.from('#search', {
    duration: 1,
    delay: 0.8,
    x: -250,
    opacity: 0,
    ease: 'back'
})

gsap.from('#submain', {
    duration: 1,
    delay: 0.8,
    opacity: 0,
    y: 100
})

gsap.from('#main', {
    duration: 1,
    height: 0
})

gsap.from('#subnav', {
    duration: 1,
    opacity: 0,
    height: '0'
})

gsap.from('#toggle', {
    duration: 1,
    delay: 0.8,
    opacity: 0,
    x: 100,
    ease: 'back'
})


$('#shopping-cart').on('click', function () {
    $('#cart').addClass('cart')
})

// Action OnScroll

$(window).scroll(function () {

    var scroll = $(window).scrollTop()
    var height = $(window).height()

    if (scroll >= height * 0.3 && scroll <= height * 1.3) {
         gsap.to('#navbar', {
              duration: 1,
              y: 0
         })
         gsap.to('#backgroud-iklan', {
            duration: 2,
            x: 0,
            ease: 'back'
         })
         gsap.to('#search', {
            duration: 1,
            delay: 0.5,
            x: -250,
            opacity: 0,
            ease: 'back'
        })
         gsap.to('#subtitle', {
              duration: 1,
              delay: 0.5,
              y: -100,
              opacity: 0,
              ease: 'back'
         })
         gsap.to('#submain', {
              duration: 1,
              delay: 0.3,
              opacity: 0,
              y: 100
         })
         gsap.to('#toggle', {
              duration: 1,
              delay: 0.3,
              opacity: 0,
              x: 100,
              ease: 'back'
         })
    }

    if (scroll <= height * 0.3) {
         gsap.to('#navbar', {
              duration: 1,
              y: -100
         })
         gsap.to('#backgroud-iklan', {
            duration: 2,
            x: '-100vw',
            ease: 'back'
         })
         gsap.to('#search', {
            duration: 1,
            delay: 0.5,
            x: 0,
            opacity: 1,
            ease: 'back'
        })
         gsap.to('#subtitle', {
              duration: 1,
              delay: 0.5,
              y: 0,
              opacity: 1,
              ease: 'back'
         })
         gsap.to('#submain', {
              duration: 1,
              delay: 0.3,
              opacity: 1,
              y: 0
         })
         gsap.to('#toggle', {
              duration: 1,
              delay: 0.3,
              opacity: 1,
              x: 0,
              ease: 'back'
         })
    }

    // if (scroll < height * 1.3) {
    //     gsap.to('#backgroud-iklan', {
    //         duration: 1,
    //         x: 0,
    //         ease: 'back'
    //      })
    // }

    if (scroll >= height * 1.3) {
        gsap.to('#backgroud-iklan', {
            duration: 1,
            x: '-100vw'
         })
    }

    if (scroll >= height * 2.5) {
        $('.developer').each(function (i, e) {
            setTimeout(function() {
                $('.developer').eq(i).css({
                    'opacity': '1',
                    'margin-top': '0',
                    'transition': '1s'
                })
            }, 250 * (i + 1))
        })

    }

    if (scroll <= height * 2.5) {
        $('.developer').each(function (i, e) {
            setTimeout(function() {
                $('.developer').eq(i).css({
                    'opacity': '0',
                    'margin-top': '-64px',
                    'transition': '1s'
                })
            }, 250 * (i + 1))
        })
    }

        // If ScrollTop to Screen Height max 2

        if (scroll < height * 1.5) {

            setTimeout(function() {
                $('#h1contact').css({
                    'transform': 'translateY(-10vh)',
                    'opacity': '0',
                    'transition': '0.5s'
                })
            }, 50)
            setTimeout(function() {
                $('#hr').css({
                    'transform': 'translateX(30vw)',
                    'opacity': '0',
                    'transition': '0.5s'
                })
            }, 150)
            $('.label').each(function (i) {
                setTimeout(function() {
                    $('.label').eq(i).css({
                        'transform': 'translateX(-20vw)',
                        'opacity': '0',
                        'transition': '0.5s'
                    })
                }, 200 * (i + 1))
            })
            $('.input').each(function (i) {
                setTimeout(function() {
                    $('.input').eq(i).css({
                        'transform': 'translateX(30vw)',
                        'opacity': '0',
                        'transition': '0.5s'
                    })
                }, 200 * (i + 1.5))
            })
            setTimeout(function() {
                $('#kirimpesan').css({
                    'transform': 'translateY(10vh)',
                    'opacity': '0',
                    'transition': '0.5s'
                })
            }, 1000)
        }

        // If ScrollTop to Screen Height min 2

        if (scroll > height * 1.5) {

            setTimeout(function() {
                $('#h1contact').css({
                    'transform': 'translateY(0)',
                    'opacity': '1',
                    'transition': '0.5s'
                })
            }, 50)
            setTimeout(function() {
                $('#hr').css({
                    'transform': 'translateX(0)',
                    'opacity': '1',
                    'transition': '0.5s'
                })
            }, 150)
            $('.label').each(function (i) {
                setTimeout(function() {
                    $('.label').eq(i).css({
                        'transform': 'translateX(0)',
                        'opacity': '1',
                        'transition': '0.5s'
                    })
                }, 200 * (i + 1))
            })
            $('.input').each(function (i) {
                setTimeout(function() {
                    $('.input').eq(i).css({
                        'transform': 'translateX(0)',
                        'opacity': '1',
                        'transition': '0.5s'
                    })
                }, 200 * (i + 1.5))
            })
            setTimeout(function() {
                $('#kirimpesan').css({
                    'transform': 'translateY(0)',
                    'opacity': '1',
                    'transition': '0.5s'
                })
            }, 1000)
        }
})

// Toggle Humburger Menu

// Action OnClick

sessionStorage.setItem('toggle', 'close')

$('.toggles').on('click', function (e) {
    var get = sessionStorage.getItem('toggle')
    if (get == 'close') {

         sessionStorage.setItem('toggle', 'open')

         $('body').css('overflow-y', 'hidden')

         $('.toggles span:nth-child(1)').css({
              'transform': 'rotate(45deg)',
              'transform-origin': '0% 100%',
              'margin-top': '-5px'
         })
         $('.toggles span:nth-child(2)').css({
              'opacity': '0',
              'transform': 'rotate(135deg)'
         })
         $('.toggles span:nth-child(3)').css({
              'transform': 'rotate(-45deg)',
              'transform-origin': '0% 0%',
              'margin-top': '5px'
         })

         // Sidebar Menu

         gsap.to('#search', {
              duration: 0.8,
              width: '100vw'
         })
    }
    if (get == 'open') {

         sessionStorage.setItem('toggle', 'close')

         $('body').css('overflow-y', 'auto')

         $('.toggles span:nth-child(1)').css({
              'transform': 'rotate(0)',
              'transform-origin': '0% 100%',
              'margin-top': '0'
         })
         $('.toggles span:nth-child(2)').css({
              'opacity': '1',
              'transform': 'rotate(0)'
         })
         $('.toggles span:nth-child(3)').css({
              'transform': 'rotate(0)',
              'transform-origin': '0% 0%',
              'margin-top': '0px'
         })

         // Sidebar Menu

         gsap.to('#search', {
              duration: 0.8,
              width: '0'
         })
    }
})

$('#up-arrow').on('click', function () {
    $('html, body').animate({
         scrollTop: 0
    }, 1000, 'easeInOutExpo')
})


$('#names').on('click', function () {
    $('#name').removeAttr('disabled');
})
$('#name').on('keyup', function (e) {
    if (e.keyCode == 13) {
        $(this).attr('disabled', true)
    }
})

$('#name').blur(function () {
    $(this).attr('disabled', 'true')
})


