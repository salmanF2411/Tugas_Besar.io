// Toggle Sidebar
        const toggleBtn = document.getElementById('toggle-btn');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');
        
        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('show');
            mainContent.classList.toggle('main-content-expanded');
        });
        
        // Profile Dropdown
        const profileDropdown = document.getElementById('profile-dropdown');
        const dropdownMenu = document.getElementById('dropdown-menu');
        const dropdownArrow = profileDropdown.querySelector('.dropdown-arrow');
        
        profileDropdown.addEventListener('click', (e) => {
            e.stopPropagation();
            dropdownMenu.classList.toggle('show');
            dropdownArrow.style.transform = dropdownMenu.classList.contains('show') ? 'rotate(180deg)' : 'rotate(0)';
        });
        
        // Notification Dropdown
        const notificationIcon = document.getElementById('notification-icon');
        const notificationDropdown = document.getElementById('notification-dropdown');
        
        notificationIcon.addEventListener('click', (e) => {
            e.stopPropagation();
            notificationDropdown.classList.toggle('show');
        });
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', (e) => {
            if (!profileDropdown.contains(e.target)) {
                dropdownMenu.classList.remove('show');
                dropdownArrow.style.transform = 'rotate(0)';
            }
            
            if (!notificationIcon.contains(e.target)) {
                notificationDropdown.classList.remove('show');
            }
        });
        
        // Close welcome banner
        const closeBtn = document.querySelector('.welcome-banner .close-btn');
        const welcomeBanner = document.querySelector('.welcome-banner');
        
        if (closeBtn && welcomeBanner) {
            closeBtn.addEventListener('click', () => {
                welcomeBanner.style.display = 'none';
            });
        }