function globalMask(text) {
    $(".app").addClass("blurred-mask");
    $(".app-global-mask h1").text(text);
    $(".app-global-mask").show();
}

$(function () {
    var timeout = null;
    var delay = 500;
    var scrollLsItemName = "app_scrolls";

    function defer(fn) {
        clearTimeout(timeout);
        timeout = setTimeout(fn, delay);
    }

    function saveScroll(top) {
        try {
            var lsItem = localStorage.getItem(scrollLsItemName);
            var scrolls = lsItem ? JSON.parse(lsItem) : [];
            var index = scrolls.findIndex(function (scr) {
                return scr.href === window.location.href;
            });

            if (index < 0) {
                scrolls.push({
                    href: window.location.href,
                    top: top,
                });
            } else {
                scrolls[index].top = top;
            }

            localStorage.setItem(scrollLsItemName, JSON.stringify(scrolls));
        } catch (e) {}
    }

    function getScrollTop() {
        try {
            var lsItem = localStorage.getItem(scrollLsItemName);
            var scrolls = lsItem ? JSON.parse(lsItem) : [];
            var index = scrolls.findIndex(function (scr) {
                return scr.href === window.location.href;
            });
            return index < 0 ? 0 : scrolls[index].top;
        } catch (e) {
            return 0;
        }
    }

    $(window).on("scroll", function (e) {
        var scrollTop = $(window).scrollTop();
        defer(function () {
            saveScroll(scrollTop);
        });
    });

    $(window).scrollTop(getScrollTop());

    $(".form-control").on("keyup change", function (e) {
        $(this).parent().removeClass("has-error");
        $(this).next("span.text-danger").html("");
    });

    $("form").on("submit", function (e) {
        var loadingText = $('[name="global-mask-text"]').val();
        if ($(this).data("loading-text")) {
            loadingText = $(this).data("loading-text");
        }
        globalMask(loadingText);
        return true;
    });

    $("a.ajaxable").on("click", function (e) {
        e.preventDefault();
        var loadingText = $('[name="global-mask-text"]').val();
        globalMask(loadingText);
        window.location.href = $(this).attr("href");
    });
});
