
document.getElementById('burger').addEventListener('click', function () {
    this.classList.toggle('active');
    document.getElementById('menu').classList.toggle('show');
});

function initializeSearchFeature() {
    const data = [
        { id: 'nav-news', title: 'News', link: '/news' },
        { id: 'nav-media', title: 'Media Center', link: '/media' },
        { id: 'nav-social', title: 'Social Media', link: '/social' },
        { id: 'nav-entertainment', title: 'Entertainment', link: '/entertainment' },
        { id: 'nav-article', title: 'Article', link: '/article' }
    ];

    // Utility Functions
    const getElement = (id) => document.getElementById(id);
    const toggleClass = (element, className, action) => element.classList[action](className);
    const addBlurEffect = (state) => {
        const contentWrapper = getElement('content-wrapper');
        if (contentWrapper) toggleClass(contentWrapper, 'blur-background', state);
    };
    const renderSuggestions = (filteredData) => {
        const suggestionsBox = getElement('m-suggestions');
        suggestionsBox.innerHTML = '';
        filteredData.forEach(item => {
            const li = document.createElement('li');
            li.textContent = item.title;
            li.dataset.id = item.id;
            suggestionsBox.appendChild(li);
        });
        suggestionsBox.style.display = filteredData.length ? 'block' : 'none';
    };

    // Event Handlers
    const showSearchPopup = (event) => {
        event.preventDefault();
        event.stopPropagation();
        toggleClass(getElement('group'), 'show', 'add');
        getElement('mobile-input').focus();
        addBlurEffect('add');
    };

    const closeSearchPopup = (event) => {
        const groupElement = getElement('group');
        const searchButton = getElement('m-search');

        // Check if the click is outside the search popup and not on dots or slider controls
        const clickedElement = event.target;
        const isDotClick = clickedElement.closest('.hero-dots');
        const isSliderClick = clickedElement.closest('.hero-slider');

        if (!groupElement.contains(event.target) && event.target.id !== 'm-search' && !isDotClick && !isSliderClick) {
            toggleClass(groupElement, 'show', 'remove');
            addBlurEffect('remove');
        }
    };

    const handleSearchInput = () => {
        const query = getElement('mobile-input').value.toLowerCase();
        const noResults = document.querySelector('.m-noresults');
        const suggestionsBox = getElement('m-suggestions');

        // Hide the "No Results" message and suggestions box initially
        noResults.style.display = 'none';
        suggestionsBox.innerHTML = '';  // Clear previous suggestions
        suggestionsBox.style.display = 'none';  // Hide suggestions by default

        if (query) {
            const filteredData = data.filter(item => item.title.toLowerCase().includes(query));

            if (filteredData.length) {
                // Render the filtered suggestions and show the suggestions box
                renderSuggestions(filteredData);
                suggestionsBox.style.display = 'block';
            } else {
                // If no results are found, show the "No Results" message
                noResults.style.display = 'block';
            }
        }
    };


    const handleSuggestionClick = (event) => {
        if (event.target.tagName.toLowerCase() === 'li') {
            const selectedItem = data.find(item => item.id === event.target.dataset.id);
            if (selectedItem) window.location.href = selectedItem.link;
        }
    };

    const handleSearchButtonClick = (event) => {
        event.preventDefault();
        const query = getElement('mobile-input').value.toLowerCase();
        const noResults = document.querySelector('.m-noresults');
        const filteredData = data.filter(item => item.title.toLowerCase().includes(query));

        if (filteredData.length) {
            window.location.href = filteredData[0].link;
        } else {
            noResults.style.display = 'block';
        }
    };

    // Event Listeners
    getElement('m-search').addEventListener('click', showSearchPopup);
    document.addEventListener('click', closeSearchPopup);
    getElement('mobile-input').addEventListener('input', handleSearchInput);
    getElement('m-suggestions').addEventListener('click', handleSuggestionClick);
    getElement('mobile-input').addEventListener('keydown', (event) => {
        if (event.key === 'Enter') handleSearchButtonClick(event);
    });
}
  // Hero Section slider
  document.addEventListener('DOMContentLoaded', initializeSearchFeature);
    let list = document.querySelector('.hero-slider .hero-list');
    let items = document.querySelectorAll('.hero-slider .hero-list .hero-item');
    let dots = document.querySelectorAll('.hero-slider .hero-dots li');
    let prev = document.getElementById('hero-prev');
    let next = document.getElementById('hero-next');

    let active = 0;
    let lengthitems = items.length - 1;


    let firstClone = items[0].cloneNode(true);
    let lastClone = items[lengthitems].cloneNode(true);
    list.appendChild(firstClone);
    list.insertBefore(lastClone, items[0]);

    let newItems = document.querySelectorAll('.hero-slider .hero-list .hero-item');
    let newLength = newItems.length - 1;


    list.style.left = `-${newItems[1].offsetLeft}px`;

    next.onclick = function () {
        clearInterval(autoslide);
        if (active + 1 > lengthitems) {
            active = 0;
            transitionToNextSlide(true);  // Seamless transition to first slide
        } else {
            active = active + 1;
            transitionToNextSlide();
        }
        restartAutoSlide();
    }

    prev.onclick = function () {
        clearInterval(autoslide);
        if (active - 1 < 0) {
            active = lengthitems;
            transitionToPrevSlide(true);
        } else {
            active = active - 1;
            transitionToPrevSlide();
        }
        restartAutoSlide();
    }

    let autoslide = setInterval(() => { next.click(); }, 3000);

    function transitionToNextSlide(isSeamless = false) {
        let offset = newItems[active + 1].offsetLeft;
        list.style.transition = isSeamless ? 'none' : 'left 1s';
        list.style.left = `-${offset}px`;

        updateActiveDot();

        if (isSeamless) {
            setTimeout(() => {
                list.style.transition = 'left 1s';
                active = 0;
                list.style.left = `-${newItems[1].offsetLeft}px`;
            }, 50);
        }
    }

    function transitionToPrevSlide(isSeamless = false) {
        let offset = newItems[active + 1].offsetLeft;
        list.style.transition = isSeamless ? 'none' : 'left 1s';
        list.style.left = `-${offset}px`;

        updateActiveDot();

        if (isSeamless) {
            setTimeout(() => {
                list.style.transition = 'left 1s';
                active = lengthitems;
                list.style.left = `-${newItems[lengthitems + 1].offsetLeft}px`;
            }, 50);
        }
    }

    function updateActiveDot() {
        let lastactiveDot = document.querySelector('.hero-slider .hero-dots li.hero-active');
        if (lastactiveDot) lastactiveDot.classList.remove('hero-active');
        dots[active].classList.add('hero-active');
    }

    function reloadslider() {
        let checkleft = newItems[active + 1].offsetLeft;
        list.style.left = -checkleft + 'px';
    }

    function restartAutoSlide() {
        autoslide = setInterval(() => { next.click(); }, 3000);
    }

    dots.forEach((li, key) => {
        li.addEventListener('click', function () {
            clearInterval(autoslide);
            active = key;
            reloadslider();
            restartAutoSlide();
        })
    })
