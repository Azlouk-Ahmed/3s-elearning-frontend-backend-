document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.querySelector(".filter .search input");
    const courseBoxes = document.querySelectorAll(".boxes--container .box");
    const courseCountSpan = document.getElementById("courseCount");
    const totalCountSpan = document.getElementById("totalCount");
    const check1 = document.querySelector("#beginner");
    const check2 = document.querySelector("#intermediate");
    const check3 = document.querySelector("#advanced");
    const hours5 = document.getElementById("hours5");
    const hours10 = document.getElementById("hours10");
    const hours20 = document.getElementById("hours20");
    const paidCheckbox = document.getElementById("paid");
    const freeCheckbox = document.getElementById("free");

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

        const checkedDurations = [];
        if (hours5.checked) checkedDurations.push(5);
        if (hours10.checked) checkedDurations.push(10);
        if (hours20.checked) checkedDurations.push(20);

        const checkedPrices = [];
        if (paidCheckbox.checked) checkedPrices.push("free");
        if (freeCheckbox.checked) checkedPrices.push("paid");
        console.log(checkedPrices);
        courseBoxes.forEach(function(box) {
            const level = box.querySelector(".level");
            const boxLevels = level.classList.value.split(" ");
            const duration = parseInt(box.querySelector(".duration").textContent); // Assuming duration is in text format
            const price = parseFloat(box.querySelector(".pricemo").textContent.trim()); // Assuming price is in text format

            const showLevel = checkedLevels.length === 0 || checkedLevels.some(level => boxLevels.includes(level));
            const showDuration = checkedDurations.length === 0 || checkedDurations.some(checkedDuration => duration >= checkedDuration);
            const showPrice = checkedPrices.length === 0 || (checkedPrices.includes("paid") && price > 0) || (checkedPrices.includes("free") && price === 0);

            if (showLevel && showDuration && showPrice) {
                box.style.display = "flex";
            } else {
                box.style.display = "none";
            }
        });

        updateCourseCount(); 
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
        updateCourseCount(); 
    }

    check1.addEventListener("change", filterBoxes);
    check2.addEventListener("change", filterBoxes);
    check3.addEventListener("change", filterBoxes);
    hours5.addEventListener("change", filterBoxes);
    hours10.addEventListener("change", filterBoxes);
    hours20.addEventListener("change", filterBoxes);
    paidCheckbox.addEventListener("change", filterBoxes);
    freeCheckbox.addEventListener("change", filterBoxes);
    searchInput.addEventListener("input", searchCourses);

    updateTotalCount();
    updateCourseCount();
});
