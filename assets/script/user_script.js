function copyPhoneNumber() {
    // Select the phone number text
    var phoneNumber = document.getElementById("phoneNumber");
    var range = document.createRange();
    range.selectNode(phoneNumber);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);

    // Copy the selected text to the clipboard
    document.execCommand("copy");

    // Clean up the selection
    window.getSelection().removeAllRanges();

    // Alert the user that the number has been copied
    alert("Phone number copied to clipboard: " + phoneNumber.textContent);
}

window.onscroll = function() {scrollFunction()};
function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("scrollToTopBtn").classList.add('show');
    } else {
        document.getElementById("scrollToTopBtn").classList.remove('show');
    }
}

function scrollToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function toggleFeedbackForm() {
    var ratings = document.getElementById('ratings');
    var feedback_button = document.getElementById('feedback_button');
    if (ratings.style.right === '-270px') {
        ratings.style.right = '0'; // Show the form by bringing it into view
        feedback_button.style.right = '240px';
    } else {
        ratings.style.right = '-270px'; // Hide the form by moving it outside the viewport
        feedback_button.style.right = '-30px';
    }
}

document.getElementById('feedback_button').addEventListener('click', toggleFeedbackForm());


const stars = document.querySelectorAll(".stars i");
const hiddenStarRatingInput = document.getElementById("starRating");

stars.forEach((star, index) => {
    star.addEventListener("click", () => {
        stars.forEach((star, i) => {
            if (index >= i) {
                star.classList.add("active");
            } else {
                star.classList.remove("active");
            }
        });
        hiddenStarRatingInput.value = index + 1; // Update hidden input value with star rating
    });
});