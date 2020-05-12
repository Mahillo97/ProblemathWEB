window.addEventListener("load", tabsCollapse);

function tabsCollapse() {
    
    $('[data-toggle="tab"]').click(function (e) {
        if ($(this).hasClass("active")) {

            e.preventDefault();
            e.stopPropagation();

            $(this).removeClass("active");

            $($(this).attr("href")).removeClass("active");
            $($(this).attr("href")).removeClass('in');

            $(this).attr("aria-expanded", false);
        }
    })
}