document.addEventListener('DOMContentLoaded', function() {
    // Category data
    const categories = {
        furniture: [
            "Meja Makan", "Sofa", "Kursi", "Lemari", "Tempat Tidur", 
            "Meja Kerja", "Meja Tamu", "Bangku", "Kabinet", "Rak TV"
        ],
        storage: [
            "Rak Buku", "Rak Sepatu", "Rak Dinding", "Lemari Penyimpanan", 
            "Box Penyimpanan", "Rak Kabinet", "Rak Sudut", "Rak Multifungsi"
        ],
        kitchen: [
            "Kompor", "Blender", "Microwave", "Rice Cooker", 
            "Peralatan Makan", "Peralatan Masak", "Tempat Penyimpanan", "Meja Dapur"
        ],
        electronics: [
            "TV", "Kulkas", "AC", "Mesin Cuci", 
            "Kipas Angin", "Speaker", "Kamera", "Smart Home"
        ],
        household: [
            "Vacuum Cleaner", "Setrika", "Kipas Angin", "Pembersih Udara", 
            "Water Dispenser", "Alat Kebersihan", "Alat Laundry", "Peralatan Listrik"
        ],
        improvement: [
            "Peralatan Bangunan", "Cat", "Peralatan Listrik", "Peralatan Plumbing", 
            "Peralatan Berkebun", "Peralatan Keamanan", "Peralatan Dekorasi", "Peralatan Renovasi"
        ],
        bath: [
            "Tempat Tidur", "Kasur", "Bantal", "Selimut", 
            "Peralatan Mandi", "Shower", "Wastafel", "Aksesoris Kamar Mandi"
        ],
        hobby: [
            "Alat Musik", "Alat Olahraga", "Board Game", "Alat Fotografi", 
            "Alat Seni", "Koleksi", "Alat Traveling", "Gadget"
        ]
    };

    // DOM elements
    const kategoriBtn = document.getElementById('kategoriBtn');
    const megaDropdown = document.getElementById('megaDropdown');
    const dropdownContainer = document.querySelector('.dropdown-container');
    const categoryTriggers = document.querySelectorAll('.category-trigger');
    const categoryMenu = document.querySelector('.category-menu');
    
    // Function to generate dropdown content
    function generateDropdownContent(category) {
        const categoryItems = categories[category];
        if (!categoryItems) return;
        
        // Clear previous content
        dropdownContainer.innerHTML = '';
        
        // Create 4 columns (like Ruparupa)
        const itemsPerColumn = Math.ceil(categoryItems.length / 4);
        
        for (let i = 0; i < 4; i++) {
            const column = document.createElement('div');
            column.className = 'dropdown-column';
            
            const ul = document.createElement('ul');
            const startIdx = i * itemsPerColumn;
            const endIdx = startIdx + itemsPerColumn;
            
            categoryItems.slice(startIdx, endIdx).forEach(item => {
                const li = document.createElement('li');
                const a = document.createElement('a');
                a.href = '#';
                a.textContent = item;
                li.appendChild(a);
                ul.appendChild(li);
            });
            
            column.appendChild(ul);
            dropdownContainer.appendChild(column);
        }
    }
    
    // Toggle dropdown from kategori button
    kategoriBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        
        // Show furniture category by default
        generateDropdownContent('furniture');
        
        // Toggle dropdown
        megaDropdown.style.display = megaDropdown.style.display === 'block' ? 'none' : 'block';
        
        // Set active state
        categoryTriggers.forEach(trigger => {
            if (trigger.dataset.category === 'furniture') {
                trigger.classList.add('active');
            } else {
                trigger.classList.remove('active');
            }
        });
    });
    
    // Toggle dropdown from category menu items
    categoryTriggers.forEach(trigger => {
        trigger.addEventListener('mouseenter', function(e) {
            const category = this.dataset.category;
            generateDropdownContent(category);
            
            // Show dropdown
            megaDropdown.style.display = 'block';
            
            // Set active state
            categoryTriggers.forEach(t => t.classList.remove('active'));
            this.classList.add('active');
        });
    });
    
    // Close dropdown when mouse leaves category menu
    categoryMenu.addEventListener('mouseleave', function() {
        megaDropdown.style.display = 'none';
        categoryTriggers.forEach(t => t.classList.remove('active'));
    });
    
    // Keep dropdown open when hovering over it
    megaDropdown.addEventListener('mouseenter', function() {
        this.style.display = 'block';
    });
    
    megaDropdown.addEventListener('mouseleave', function() {
        this.style.display = 'none';
        categoryTriggers.forEach(t => t.classList.remove('active'));
    });
    
    // Search functionality
    const searchBtn = document.querySelector('.search-btn');
    const searchInput = document.querySelector('.search-container input');
    
    if (searchBtn && searchInput) {
        searchBtn.addEventListener('click', function() {
            if (searchInput.value.trim() !== '') {
                alert('Mencari: ' + searchInput.value);
            }
        });
        
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && searchInput.value.trim() !== '') {
                alert('Mencari: ' + searchInput.value);
            }
        });
    }
});