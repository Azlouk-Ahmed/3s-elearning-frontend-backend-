document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.querySelector(".filter .search input");
    const courseBoxes = document.querySelectorAll(".boxes--container .box");
    const courseCountSpan = document.getElementById("courseCount");
    const totalCountSpan = document.getElementById("totalCount");
    const check1 = document.querySelector("#beginner");
    const check2 = document.querySelector("#intermediate");
    const check3 = document.querySelector("#advanced");

    function updateCourseCount() {
        const visibleCourses = document.querySelectorAll(".boxes--container .box[style='display: flex;']");
        courseCountSpan.textContent = visibleCourses.length;
    }

    function updateTotalCount() {
        totalCountSpan.textContent = courseBoxes.length;
    }

    function filterBoxes() {
        const checkedLevels = [];
        if (check1.checked) checkedLevels.push("beginner");
        if (check2.checked) checkedLevels.push("intermediate");
        if (check3.checked) checkedLevels.push("advanced");

        if (checkedLevels.length === 0) {
            // If none are selected, show all
            courseBoxes.forEach(function(box) {
                box.style.display = "flex";
            });
        } else {
            courseBoxes.forEach(function(box) {
                const level = box.querySelector(".level");
                const boxLevels = level.classList.value.split(" "); // Get all class names as an array
                if (checkedLevels.some(level => boxLevels.includes(level))) {
                    box.style.display = "flex";
                } else {
                    box.style.display = "none";
                }
            });
        }
        updateCourseCount(); // Update the course count after filtering
    }

    function searchCourses() {
        const searchText = searchInput.value.trim().toLowerCase();
        courseBoxes.forEach(function(box) {
            const title = box.querySelector(".title2").textContent.trim().toLowerCase();
            if (title.includes(searchText)) {
                box.style.display = "flex";
            } else {
                box.style.display = "none";
            }
        });
        updateCourseCount(); // Update the course count after filtering
    }

    check1.addEventListener("change", filterBoxes);
    check2.addEventListener("change", filterBoxes);
    check3.addEventListener("change", filterBoxes);
    searchInput.addEventListener("input", searchCourses);

    // Initial setup
    updateTotalCount();
    updateCourseCount();
});
