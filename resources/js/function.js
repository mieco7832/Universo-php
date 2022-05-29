$(".hoverable").mouseenter(function () {
    $(this).removeClass("shadow-sm").addClass("shadow");
}).mouseleave(function () {
    $(this).removeClass("shadow").addClass("shadow-sm");
});

