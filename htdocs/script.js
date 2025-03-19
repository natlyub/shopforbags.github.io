document.addEventListener('DOMContentLoaded', () => {
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const productCards = document.querySelector('.product-cards');
    
    let scrollAmount = 0;

    prevButton.addEventListener('click', () => {
        if (scrollAmount > 0) {
            scrollAmount -= 230 + 20; 
            productCards.style.transform = `translateX(-${scrollAmount}px)`;
        }
    });

    nextButton.addEventListener('click', () => {
        if (scrollAmount < productCards.scrollWidth - productCards.clientWidth) {
            scrollAmount += 230 + 20; 
            productCards.style.transform = `translateX(-${scrollAmount}px)`;
        }
    });
});
