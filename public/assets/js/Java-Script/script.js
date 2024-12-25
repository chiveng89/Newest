function initializeSearchFeature() {
    const data = [
        { id: 'nav-news', title: 'News', link: '/news' },
        { id: 'nav-media', title: 'Media Center', link: '/media' },
        { id: 'nav-social', title: 'Social Media', link: '/social' },
        { id: 'nav-entertainment', title: 'Entertainment', link: '/entertainment' },
        { id: 'nav-article', title: 'Article', link: '/article' },
    ];

    function showSearchPopup(event) {
        event.preventDefault();
        const searchPopup = document.getElementById('search-popup');
        if (searchPopup) {
            searchPopup.style.display = 'flex';
            document.getElementById('search-input').focus();
        }
    }

    function closeSearchPopup() {
        const searchPopup = document.getElementById('search-popup');
        if (searchPopup) {
            searchPopup.style.display = 'none';
        }
    }

    function hideSearchPopupOnClick(event) {
        const searchPopup = document.getElementById('search-popup');
        if (event.target === searchPopup) {
            searchPopup.style.display = 'none';
        }
    }

    function handleSearchInput(event) {
        const searchInput = document.getElementById('search-input');
        const suggestionsBox = document.getElementById('suggestions');
        const noResults = document.querySelector('.no-results');
        const query = searchInput.value.toLowerCase();
        suggestionsBox.innerHTML = '';
        noResults.style.display = 'none';

        if (query.length > 0) {
            const filteredData = data.filter(item => item.title.toLowerCase().includes(query));
            if (filteredData.length > 0) {
                filteredData.forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = item.title;
                    li.dataset.id = item.id;
                    suggestionsBox.appendChild(li);
                });
                suggestionsBox.style.display = 'block';
            } else {
                noResults.style.display = 'block';
            }
        } else {
            suggestionsBox.style.display = 'none';
        }

        if (event.key === 'Enter') {
            handleSearchButtonClick();
        }
    }

    function handleSuggestionClick(event) {
        const target = event.target;
        if (target.tagName.toLowerCase() === 'li') {
            const id = target.dataset.id;
            const selectedItem = data.find(item => item.id === id);
            if (selectedItem) {
                window.location.href = selectedItem.link;
            }
        }
    }

    function handleSearchButtonClick() {
        const searchInput = document.getElementById('search-input');
        const noResults = document.querySelector('.no-results');
        const query = searchInput.value.toLowerCase();
        const filteredData = data.filter(item => item.title.toLowerCase().includes(query));

        if (filteredData.length > 0) {
            const selectedItem = filteredData[0];
            window.location.href = selectedItem.link;
        } else {
            noResults.style.display = 'block';
        }
    }

    const navSearch = document.getElementById('nav-search');
    const closeSearchPopupBtn = document.getElementById('close-search-popup');
    const searchPopup = document.getElementById('search-popup');
    const searchInput = document.getElementById('search-input');
    const suggestionsBox = document.getElementById('suggestions');
    const searchButton = document.getElementById('search-button');
    const searchIcon = document.getElementById('search-icon');

    if (navSearch) navSearch.onclick = showSearchPopup;
    if (closeSearchPopupBtn) closeSearchPopupBtn.onclick = closeSearchPopup;
    if (searchPopup) searchPopup.onclick = hideSearchPopupOnClick;
    if (searchInput) {
        searchInput.oninput = handleSearchInput;
        searchInput.onkeydown = handleSearchInput;
    }
    if (suggestionsBox) suggestionsBox.onclick = handleSuggestionClick;
    if (searchButton) searchButton.onclick = handleSearchButtonClick;
    if (searchIcon) searchIcon.onclick = showSearchPopup;
}

document.addEventListener('DOMContentLoaded', initializeSearchFeature);
// Most view & Related view
document.addEventListener('DOMContentLoaded', () => {
    function initializeAOS() {
        const isSmallScreen = window.innerWidth <= 500;

        if (!isSmallScreen) {
            AOS.init({
                duration: 800,
                easing: 'ease-in-out',
                once: false,
                mirror: true,
                offset: 100
            });

            console.log('AOS initialized with settings:', {
                duration: 800,
                offset: 100
            });
        }
    }

    initializeAOS();

    window.addEventListener('resize', () => {
        setTimeout(() => {
            initializeAOS(); // Re-run initialization to handle resize
        }, 150);
    });
});



    const containers = document.querySelectorAll('.re-card-wrapper');
    const dotContainers = document.querySelectorAll('.dot-indicator-parent');
    let isDown = false;
    let startX;
    let scrollLeft;

// Generate dots dynamically based on the number of visible cards
function generateDots(container, dotContainer) {
    const visibleCards = Math.round(container.clientWidth / container.querySelector('.re-card-child').clientWidth);
    const totalCards = container.querySelectorAll('.re-card-child').length;
    const dotCount = Math.max(totalCards - visibleCards + 1, 1); // Ensure at least 1 dot
    dotContainer.innerHTML = ''; // Clear any existing dots

    for (let i = 0; i < dotCount; i++) {
        const dot = document.createElement('img');
        const baseUrl = window.location.origin; // Get the base URL
        dot.src = i === 0
            ? baseUrl + '/assets/image/dot.svg'  // Set active dot for the first position
            : baseUrl + '/assets/image/dot2.svg'; // Set inactive dots for other positions
        dot.classList.add('dot-indicator');
        dotContainer.appendChild(dot);
    }

    return dotContainer.querySelectorAll('.dot-indicator');
}

// Update dots and add scroll and click functionality
function initializeDotFunctionality(container, dotContainer) {
    let dots = generateDots(container, dotContainer);

    container.addEventListener('scroll', () => updateDots(container, dots));

    window.addEventListener('resize', () => {
        dots = generateDots(container, dotContainer); // Re-generate dots on resize
        updateDots(container, dots); // Update dots on resize
        attachDotClickEvents(container, dots);
    });

    attachDotClickEvents(container, dots);

    // Handle mouse drag scrolling
    container.addEventListener('mousedown', (e) => {
        isDown = true;
        container.classList.add('active');
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
    });

    container.addEventListener('mouseleave', () => {
        isDown = false;
        container.classList.remove('active');
    });

    container.addEventListener('mouseup', () => {
        isDown = false;
        container.classList.remove('active');
    });

    container.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 2; // The multiplier (2) can be adjusted for scroll speed
        container.scrollLeft = scrollLeft - walk;
        updateDots(container, dots); // Update dots on scroll
    });

    updateDots(container, dots); // Initialize dots on load
}

// Attach click events to dots
function attachDotClickEvents(container, dots) {
    dots.forEach((dot, index) => {
        dot.addEventListener('click', function() {
            const cardWidth = container.querySelector('.re-card-child').clientWidth;
            container.scrollTo({
                left: index * cardWidth,
                behavior: 'smooth'
            });
        });
    });
}

// Function to update dot indicators based on scroll position
function updateDots(container, dots) {
    const cardWidth = container.querySelector('.re-card-child').clientWidth;
    const currentIndex = Math.round(container.scrollLeft / cardWidth);

    const baseUrl = window.location.origin; // Get the base URL

    dots.forEach((dot, index) => {
        if (index === currentIndex) {
            dot.src = baseUrl + '/assets/image/dot.svg';
        } else {
            dot.src = baseUrl + '/assets/image/dot2.svg'; 
        }
    });
}


// Initialize everything for each card container
containers.forEach((container, index) => {
    initializeDotFunctionality(container, dotContainers[index]);
});

//
