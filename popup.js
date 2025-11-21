// Ensure popup is hidden when the page loads
window.onload = function () {
    document.getElementById("popup").style.display = "none";
};


function openPopup() {
    // Get the popup element and show it by changing its display to 'block'
    document.getElementById("popup").style.display = "block";
}

// Function to close the popup
function closePopup() {
    // Get the popup element and hide it by changing its display to 'none'
    document.getElementById("popup").style.display = "none";
}  