
// Get all FAQ questions
const faqQuestions = document.querySelectorAll(".faq-question");

// Add click event listeners to all FAQ questions
faqQuestions.forEach(question => {
    question.addEventListener("click", function() {
        // Toggle the answer's visibility by targeting the next sibling element (the answer)
        const answerId = this.id.replace('question', 'answer');
        const answer = document.getElementById(answerId);
        
        // Toggle the hidden class
        if (answer.classList.contains("hidden")) {
            answer.classList.remove("hidden");
        } else {
            answer.classList.add("hidden");
        }
    });
});
