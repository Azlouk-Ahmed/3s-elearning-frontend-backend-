document.addEventListener('DOMContentLoaded', function () {
    // Get all category bubbles
    const bubbles = document.querySelectorAll('.categories .bubble');
    // Get all course boxes
    const boxes = document.querySelectorAll('.boxes--container .box');

    // Add click event listener to each category bubble
    bubbles.forEach(bubble => {
      bubble.addEventListener('click', function () {
        // Remove 'active' class from all bubbles
        bubbles.forEach(b => b.classList.remove('active'));
        // Add 'active' class to the clicked bubble
        this.classList.add('active');

        // Get the text content of the clicked bubble in lowercase
        const selectedCategory = this.textContent.trim().toLowerCase();

        // Filter and display boxes based on selected category
        let found = false;
        boxes.forEach(box => {
          const category = box.querySelector('#categorie').textContent.trim().toLowerCase();
          if (selectedCategory === 'all categories' || category === selectedCategory) {
            box.style.display = 'flex';
            found = true;
          } else {
            box.style.display = 'none';
          }
        });
        var allATagsArray = Array.from(document.getElementsByTagName('a'));
        console.log("kjsdgnskd");
        allATagsArray.forEach(function(element) {
            element.style.display = 'block'
            var computedStyle = window.getComputedStyle(element);
            var width = parseFloat(computedStyle.width);
            if (width === 0) {
                element.style.display = 'none'
            }
        });

        // Show 'No courses available' message if no courses found
        const noElements = document.getElementById('noElements');
        if (!found) {
          noElements.style.display = 'flex';
        } else {
          noElements.style.display = 'none';
        }
      });
    });
    
  });