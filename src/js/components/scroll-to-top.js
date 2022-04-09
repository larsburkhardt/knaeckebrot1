const scrollToTopBtn = document.querySelector(".scrollToTopBtn");
const rootElement = document.documentElement;
const TOGGLE_RATIO = 0.10;

function handleScroll() {
    // do something on scroll
    let scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
    if ((rootElement.scrollTop / scrollTotal) > TOGGLE_RATIO ) {
        //show button
        scrollToTopBtn.classList.add("show-scroll-btn")
    } else {
        //hide button
        scrollToTopBtn.classList.remove("show-scroll-btn")
    }
}

function scrollToTop() {
    //scroll to top logic
    rootElement.scrollTo({
        top: 0,
        behavior: "smooth"
    })
}
scrollToTopBtn.addEventListener("click", scrollToTop);
document.addEventListener("scroll", handleScroll);
