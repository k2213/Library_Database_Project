// Quotes rotation functionality
const quotes = [
    "“The greatest glory in living lies not in never falling, but in rising every time we fall.” – Nelson Mandela",
    "“In the middle of every difficulty lies opportunity.” – Albert Einstein",
    "“To be yourself in a world that is constantly trying to make you something else is the greatest accomplishment.” – Ralph Waldo Emerson",
    "“The only limit to our realization of tomorrow will be our doubts of today.” – Franklin D. Roosevelt",
    "“Knowledge is the lost property of the believer; wherever they find it, they have a right to it.” – Hadith ",
    "“For the Lord gives wisdom; from His mouth come knowledge and understanding.” – Proverbs 2:6",
    "“Train up a child in the way he should go, and when he is old he will not depart from it.” – Proverbs 22:6",
    "“The seeking of knowledge is obligatory...” – Hadith",
    "“One who knows others is intelligent; one who knows himself is enlightened.” – Lao Tzu, Tao Te Ching",
    "“By learning you will teach; by teaching you will learn.” – Latin Proverb",
];

let currentQuoteIndex = 0;
const quoteElement = document.querySelector('.quotes-section .quote');

function displayQuote() {
    quoteElement.textContent = quotes[currentQuoteIndex];
    currentQuoteIndex = (currentQuoteIndex + 1) % quotes.length;
}

setInterval(displayQuote, 8000); // Change quote every 8 seconds
displayQuote(); // Display the first quote immediately

// Slideshow functionality
let slideIndex = 0;
const slides = document.querySelectorAll('.slideshow-container img');

function showSlides() {
    // Hide all slides
    slides.forEach(slide => {
        slide.style.display = "none";
    });
    
    // Increment slide index
    slideIndex++;
    if (slideIndex > slides.length) {
        slideIndex = 1; // Reset to first slide
    }

    // Show the current slide
    slides[slideIndex - 1].style.display = "block";

    // Set a timer to show the next slide after 3 seconds
    setTimeout(showSlides, 3000);
}

// Start the slideshow
showSlides();
