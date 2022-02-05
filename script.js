const scrollBtn = document.querySelector(".scroll-to-top");

const refreshButton = () => {
    if (document.documentElement.scrollTop <= 150) {
        scrollBtn.style.display = "none";
    } else {
        scrollBtn.style.display = "block";
    }
};
refreshButton();

scrollBtn.addEventListener("click", () => {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
});

document.addEventListener("scroll", (e) => {
    refreshButton();
});

var dropdown = document.querySelector("nav .dropdown");
var button = document.querySelector("nav .menu");

function menu() {
    if (dropdown.style.display === "grid") {
        dropdown.style.display = "none";
        button.innerHTML = "menu";
    }
    else {
        dropdown.style.display = "grid";
        button.innerHTML = "close";
    }
}

window.addEventListener("resize", function () {
        if (window.innerWidth > 768) {
            dropdown.style.display = "none";
            button.innerHTML = "menu";
        }
});


const modal = document.querySelector(".modal");
const previews = document.querySelectorAll(".gallery img");
const original = document.querySelector(".big-img");
const caption = document.querySelector(".caption");


previews.forEach(preview => {
    preview.addEventListener("click", () => {
        modal.classList.add("open");
        original.classList.add("open");

        const originalSrc = preview.getAttribute("src");
        original.src = originalSrc;
        const altText = preview.alt;
        caption.textContent = altText;
    });
});

modal.addEventListener("click", (e)  => {
    if (e.target.classList.contains("modal")) {
        modal.classList.remove("open");
        original.classList.remove("open");
    }
});