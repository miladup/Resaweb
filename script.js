//slider ->

function showSlides(container, index) {
    const slides = container.getElementsByClassName('slider-img');
    if (index >= slides.length) {
        index = 0;
    } else if (index < 0) {
        index = slides.length - 1;
    }
    for (let i = 0; i < slides.length; i++) {
        slides[i].classList.remove('active');
    }
    slides[index].classList.add('active');
    container.setAttribute('data-index', index);
}

function nextSlide(button) {
    const container = button.parentElement.querySelector('.slider');
    let index = parseInt(container.getAttribute('data-index')) || 0;
    showSlides(container, index + 1);
}

function prevSlide(button) {
    const container = button.parentElement.querySelector('.slider');
    let index = parseInt(container.getAttribute('data-index')) || 0;
    showSlides(container, index - 1);
}

document.addEventListener('DOMContentLoaded', () => {
    const sliders = document.querySelectorAll('.slider');
    sliders.forEach(slider => {
        slider.setAttribute('data-index', 0);
        showSlides(slider, 0);
    });
});
