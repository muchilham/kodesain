$(window).load(function(){
    var $container = $('.creations-container');
    $container.isotope({
        filter: '*',
        animationOptions: { 
            duration: 750,
            easing: 'ease',
            queue: false
        }
    });

    $('.creations-filter li').click(function(){
        $('.creations-filter .active').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');
        $container.isotope({
            filter: selector,
            animationOptions: {
                duration: 750,
                easing: 'ease',
                queue: false
            }
         });
         return false;
        }); 
    });