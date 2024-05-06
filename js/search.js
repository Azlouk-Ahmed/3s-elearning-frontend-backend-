document.addEventListener("DOMContentLoaded", function() {
    // Select the form
    const form = document.getElementById("searchForm");

    // Add event listener to form submission
    form.addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the default form submission

        // Get selected checkboxes
        const checkboxes = form.querySelectorAll("input[type=checkbox]:checked");

        // Initialize an empty array to store selected filters
        const filters = [];

        // Iterate over selected checkboxes and add their values to the filters array
        checkboxes.forEach(function(checkbox) {
            filters.push(checkbox.value);
        });

        // Generate the URL with selected filters
        const urlParams = new URLSearchParams();
        filters.forEach(function(filter) {
            urlParams.append("filters[]", filter);
        });

        // Redirect to courses.php with the generated URL
        window.location.href = "courses.php?" + urlParams.toString();
    });
});
