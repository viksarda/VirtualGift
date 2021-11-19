var scrolled = 0;
$(".scroll-left").on("click" ,function(){
    scrolled=scrolled-20;
    $("ol").animate({
        scrollLeft:  scrolled
    });
});
$(".scroll-right").on("click" ,function(){
    scrolled=scrolled+20;
    $("ol").animate({
        scrollLeft:  scrolled
    });
});