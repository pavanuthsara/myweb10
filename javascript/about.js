// JavaScript to handle 'Read More' button functionality using DOM manipulation

document.getElementById("readMoreBtn").addEventListener("click", function() {
    // Get the additional information paragraph
    const moreInfo = document.getElementById("more-info");

    // Toggle the visibility of the additional content
    if (moreInfo.classList.contains("hidden")) {
        moreInfo.classList.remove("hidden");
        this.textContent = "Read Less"; // Change button text
    } else {
        moreInfo.classList.add("hidden");
        this.textContent = "Read More"; // Revert button text
    }
});
