const startAnimation = (entries, observer) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            if (!entry.target.classList.contains("animate")) {
                entry.target.classList.add("animate");
            }
            observer.unobserve(entry.target);
        }
    });
};

const observer = new IntersectionObserver(startAnimation);
const options = { root: null, rootMargin: "0px", threshold: 1.0 };

document
    .querySelectorAll("main *")
    .forEach((el) => observer.observe(el, options));
