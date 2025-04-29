import './bootstrap';

// Back to top button functionality
document.addEventListener("DOMContentLoaded", function () {
    const backToTopButton = document.querySelector(".fixed.bottom-6.right-6 button");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
            backToTopButton.classList.remove("opacity-0");
            backToTopButton.classList.add("opacity-100");
        } else {
            backToTopButton.classList.remove("opacity-100");
            backToTopButton.classList.add("opacity-0");
        }
    });

    backToTopButton.addEventListener("click", function () {
        window.scrollTo({
            top: 0,
            behavior: "smooth",
        });
    });
});

// Sticky header on scroll
document.addEventListener("DOMContentLoaded", function () {
    const header = document.querySelector("header");
    const mainContent = document.querySelector("main");

    window.addEventListener("scroll", function () {
        if (window.scrollY > 100) {
            header.classList.add(
                "fixed",
                "top-0",
                "left-0",
                "right-0",
                "z-50",
                "shadow-md",
                "animate-slideDown"
            );
            mainContent.style.marginTop = header.offsetHeight + "px";
        } else {
            header.classList.remove(
                "fixed",
                "top-0",
                "left-0",
                "right-0",
                "z-50",
                "shadow-md",
                "animate-slideDown"
            );
            mainContent.style.marginTop = "0";
        }
    });
});

// Reply button functionality
document.addEventListener("DOMContentLoaded", function () {
    const replyButtons = document.querySelectorAll(".ri-reply-line").forEach((button) => {
        button.closest("button").addEventListener("click", function () {
            const replyForm = document.querySelector(".bg-[#1e293b].rounded-lg.p-5");
            replyForm.scrollIntoView({ behavior: "smooth" });
            document.querySelector("textarea").focus();
        });
    });
});
