// Initialize AOS (Animate On Scroll)
document.addEventListener("DOMContentLoaded", function () {
    AOS.init();
});

// Initialize WOW.js (Scroll Animations)
document.addEventListener("DOMContentLoaded", function () {
    new WOW().init();
});

// Ripple Effect on Click and Hover for Buttons with 'mesh-button-*' Classes
document.body.addEventListener("click", createRipple);
document.body.addEventListener("mouseover", createRipple);

function createRipple(e) {
    if (e.target.className.startsWith("mesh-button")) {
        let btn = e.target;
        let rect = btn.getBoundingClientRect();
        let x = e.clientX - rect.left;
        let y = e.clientY - rect.top;

        let ripples = document.createElement("span");
        ripples.classList.add("ripple");
        ripples.style.left = `${x}px`;
        ripples.style.top = `${y}px`;

        btn.appendChild(ripples);

        setTimeout(() => {
            ripples.remove();
        }, 1500);
    }
}

// jQuery Document Ready
        $(document).ready(function () {
            // Show modal on page load
            $("#trasferAlert").modal("show");
        
            // Scroll Event for Navbar Styling
           $(window).scroll(function () {
            var scrollThreshold = $(window).height() * 0.03;
        
            if ($(this).scrollTop() >= scrollThreshold) {
                $(".mesh-nav-controls").css({
                    background: "radial-gradient(60.63% 60.63% at 57.15% 51.07%, rgb(0 110 145), #042033 100%)",
                    color: "white",
                    height: "70px",
                });
            } else {
                if (window.location.pathname === "/private-tutors/nclex") {
                    $(".mesh-nav-controls").css({
                        background: "radial-gradient(60.63% 60.63% at 57.15% 51.07%, rgb(0, 110, 145), rgb(4, 32, 51) 100%)",
                        color: "white",
                        height: "90px",
                    });
                } else {
                    $(".mesh-nav-controls").css({
                        background: "transparent",
                        color: "white",
                        height: "90px",
                    });
                }
            }
        });


    // Highlight Active Navigation Link Based on URL Path
    var path = window.location.pathname;
    var routes = {
        "/": "home",
        "/teas-test-prep": "teas",
        "/ngn-nclex-rn": "nclex",
        "/hesi-test-prep": "hesi",
        "/nursing": "nursing",
    };

    var activeLinkId = routes[path];
    if (activeLinkId) {
        var activeLink = document.getElementById(activeLinkId);
        if (activeLink) {
            activeLink.classList.add("active");
        }
    }
});
