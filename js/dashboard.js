// ===============================
// AI Resume Analyzer Dashboard JS
// ===============================

document.addEventListener("DOMContentLoaded", function () {

    console.log("Dashboard Loaded Successfully!");

    // -----------------------------
    // Welcome Animation
    // -----------------------------
    const cards = document.querySelectorAll(".card");

    cards.forEach((card, index) => {
        card.style.opacity = "0";
        card.style.transform = "translateY(40px)";

        setTimeout(() => {
            card.style.transition = "0.6s ease";
            card.style.opacity = "1";
            card.style.transform = "translateY(0)";
        }, index * 200);
    });

    // -----------------------------
    // Display Current Date
    // -----------------------------
    const dateElement = document.getElementById("currentDate");

    if (dateElement) {

        const today = new Date();

        const options = {
            weekday: "long",
            day: "numeric",
            month: "long",
            year: "numeric"
        };

        dateElement.innerHTML = today.toLocaleDateString("en-IN", options);
    }

    // -----------------------------
    // File Upload Preview
    // -----------------------------
    const fileInput = document.querySelector("input[type='file']");
    const fileName = document.getElementById("fileName");

    if (fileInput && fileName) {

        fileInput.addEventListener("change", function () {

            if (this.files.length > 0) {

                fileName.innerHTML =
                    "✅ " + this.files[0].name;

            } else {

                fileName.innerHTML =
                    "No file selected";

            }

        });

    }

    // -----------------------------
    // Button Loading Effect
    // -----------------------------
    const form = document.querySelector("form");

    if (form) {

        form.addEventListener("submit", function () {

            const button = document.querySelector("button");

            button.innerHTML =
                '<i class="fa-solid fa-spinner fa-spin"></i> Analyzing...';

            button.disabled = true;

        });

    }

    // -----------------------------
    // Hover Effect for Cards
    // -----------------------------
    cards.forEach(card => {

        card.addEventListener("mouseenter", function () {

            card.style.transform =
                "translateY(-10px) scale(1.03)";

        });

        card.addEventListener("mouseleave", function () {

            card.style.transform =
                "translateY(0) scale(1)";

        });

    });

});