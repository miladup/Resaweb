// Fonction pour aller à la diapositive précédente dans le carrousel d'images
function prevSlide(button) {
    // 1.a : Interactivité dans les formulaires et autres éléments de l'interface utilisateur
    const slider = button.parentElement.querySelector('.slider');
    const activeSlide = slider.querySelector('.slider-img.active');
    const allSlides = slider.querySelectorAll('.slider-img');
    let newIndex = Array.from(allSlides).indexOf(activeSlide) - 1;
    if (newIndex < 0) newIndex = allSlides.length - 1;
    activeSlide.classList.remove('active');
    allSlides[newIndex].classList.add('active');
}

// Fonction pour aller à la diapositive suivante dans le carrousel d'images
function nextSlide(button) {
    // 1.a : Interactivité dans les formulaires et autres éléments de l'interface utilisateur
    const slider = button.parentElement.querySelector('.slider');
    const activeSlide = slider.querySelector('.slider-img.active');
    const allSlides = slider.querySelectorAll('.slider-img');
    let newIndex = Array.from(allSlides).indexOf(activeSlide) + 1;
    if (newIndex >= allSlides.length) newIndex = 0;
    activeSlide.classList.remove('active');
    allSlides[newIndex].classList.add('active');
}

// Fonction pour trier les cabanes selon le critère sélectionné
function sortCabanes() {
    // 2.b : Fonctionnalité de tri parmi les résultats de la recherche
    const container = document.getElementById('cabanes-container');
    const blocks = Array.from(container.getElementsByClassName('block'));
    const sortOption = document.getElementById('sort').value;
    blocks.sort((a, b) => {
        if (sortOption === 'nom_cabane') {
            return a.getAttribute('data-nom_cabane').localeCompare(b.getAttribute('data-nom_cabane'));
        } else if (sortOption === 'prix_par_nuit') {
            return parseFloat(a.getAttribute('data-prix_par_nuit')) - parseFloat(b.getAttribute('data-prix_par_nuit'));
        } else if (sortOption === 'max_personnes') {
            return parseInt(a.getAttribute('data-max_personnes')) - parseInt(b.getAttribute('data-max_personnes'));
        }
    });
    blocks.forEach(block => container.appendChild(block));
}

// raccourcir le texte
// 1.b si le fichier contient des expressions régulières ou du code de traitement des chaines de caractères
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

// lier le footer 
document.addEventListener("DOMContentLoaded", function() {
    fetch("footer.html")
        .then(response => response.text())
        .then(data => {
            document.getElementById("footer-placeholder").innerHTML = data;
        })
        .catch(error => console.error('Error fetching the footer:', error));
});
