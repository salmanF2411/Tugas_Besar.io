// document.addEventListener('DOMContentLoaded', function() {
//             // DOM elements
//             const kategoriBtn = document.getElementById('kategoriBtn');
//             const megaDropdown = document.getElementById('megaDropdown');
//             const categoryTriggers = document.querySelectorAll('.category-trigger');
//             const categoryMenu = document.querySelector('.category-menu');
            
//             // Function to show category content
//             function showCategory(category) {
//                 // Hide all category columns first
//                 document.querySelectorAll('.dropdown-column').forEach(col => {
//                     col.style.display = 'none';
//                 });
                
//                 // Show the selected category columns
//                 if (category === 'furniture') {
//                     // Show furniture columns
//                     document.querySelectorAll('.furniture-column').forEach(col => {
//                         col.style.display = 'block';
//                     });
//                 } else {
//                     // Show other category columns
//                     document.querySelectorAll('.' + category + '-column').forEach(col => {
//                         col.style.display = 'block';
//                     });
//                 }
//             }
            
//             // Toggle dropdown from kategori button
//             kategoriBtn.addEventListener('click', function(e) {
//                 e.preventDefault();
//                 e.stopPropagation();
                
//                 // Show furniture category by default
//                 showCategory('furniture');
                
//                 // Toggle dropdown
//                 megaDropdown.style.display = megaDropdown.style.display === 'block' ? 'none' : 'block';
                
//                 // Set active state
//                 categoryTriggers.forEach(trigger => {
//                     if (trigger.dataset.category === 'furniture') {
//                         trigger.classList.add('active');
//                     } else {
//                         trigger.classList.remove('active');
//                     }
//                 });
//             });
            
//             // Toggle dropdown from category menu items
//             categoryTriggers.forEach(trigger => {
//                 trigger.addEventListener('mouseenter', function(e) {
//                     const category = this.dataset.category;
//                     showCategory(category);
                    
//                     // Show dropdown
//                     megaDropdown.style.display = 'block';
                    
//                     // Set active state
//                     categoryTriggers.forEach(t => t.classList.remove('active'));
//                     this.classList.add('active');
//                 });
//             });
            
//             // Close dropdown when mouse leaves category menu
//             categoryMenu.addEventListener('mouseleave', function() {
//                 megaDropdown.style.display = 'none';
//                 categoryTriggers.forEach(t => t.classList.remove('active'));
//             });
            
//             // Keep dropdown open when hovering over it
//             megaDropdown.addEventListener('mouseenter', function() {
//                 this.style.display = 'block';
//             });
            
//             megaDropdown.addEventListener('mouseleave', function() {
//                 this.style.display = 'none';
//                 categoryTriggers.forEach(t => t.classList.remove('active'));
//             });
//         });

// next prev
 const backgrounds = [
        'img/chef.jpg',
        'img/food2.jpg',
        'img/food3.jpg'
    ];

    let current = 0;
    const leftSection = document.querySelector('.left-section');
    const nextBtn = document.getElementById('nextBtn');
    const prevBtn = document.getElementById('prevBtn');

    function updateBackground() {
        leftSection.style.backgroundImage = `url('${backgrounds[current]}')`;
    }

    nextBtn.addEventListener('click', () => {
        current = (current + 1) % backgrounds.length;
        updateBackground();
    });

    prevBtn.addEventListener('click', () => {
        current = (current - 1 + backgrounds.length) % backgrounds.length;
        updateBackground();
    });