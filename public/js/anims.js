const startAnimation = (entries, observer) => {
    entries.forEach((entry) => {
        if (entry.isIntersecting) {
            console.log(entry.target);
            if (!entry.target.classList.contains("animate")) {
                entry.target.classList.add("animate");
            }
            observer.unobserve(entry.target);
        }
        // if (entry.target.classList.contains)
        //     entry.target.classList.toggle("animate", entry.isIntersecting);
    });
};

const observer = new IntersectionObserver(startAnimation);
const options = { root: null, rootMargin: "0px", threshold: 1.0 };

document
    .querySelectorAll("main *")
    .forEach((el) => observer.observe(el, options));
