// JavaScript interactivity for IT371 Blue Angels Recruitment Project

document.addEventListener("DOMContentLoaded", function () {
  const toggleButtons = document.querySelectorAll(".toggle-btn");

  toggleButtons.forEach(function (button) {
    button.addEventListener("click", function () {
      const infoBox = this.nextElementSibling;

      if (infoBox.style.display === "block") {
        infoBox.style.display = "none";
        this.textContent = "Show More Information";
      } else {
        infoBox.style.display = "block";
        this.textContent = "Hide Information";
      }
    });
  });
});
