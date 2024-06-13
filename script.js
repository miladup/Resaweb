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

//  tri cabanes

function sortCabanes() {
    const sortBy = document.getElementById('sort').value;
    const cabanesContainer = document.getElementById('cabanes-container');
    const categories = Array.from(cabanesContainer.getElementsByClassName('category'));

    categories.forEach(category => {
        const blocks = Array.from(category.getElementsByClassName('block'));
        blocks.sort((a, b) => {
            const aValue = a.dataset[sortBy];
            const bValue = b.dataset[sortBy];

            if (sortBy === 'nom_cabane') {
                return aValue.localeCompare(bValue);
            } else {
                return parseFloat(aValue) - parseFloat(bValue);
            }
        });
        blocks.forEach(block => {
            category.appendChild(block);
        });
    });
}

// raccourcir le texte

document.addEventListener('DOMContentLoaded', () => {
    console.log('DOM fully loaded and parsed');
    truncateDescriptions(200);
});

function truncateDescriptions(maxLength) {
    const descriptions = document.getElementsByClassName('description');
    Array.from(descriptions).forEach(description => {
        if (description.textContent.length > maxLength) {
            description.textContent = description.textContent.substring(0, maxLength) + '...';
        }
    });
}

document.addEventListener("DOMContentLoaded", function() {
    fetch("footer.html")
        .then(response => response.text())
        .then(data => {
            document.getElementById("footer-placeholder").innerHTML = data;
        })
        .catch(error => console.error('Error fetching the footer:', error));
});
