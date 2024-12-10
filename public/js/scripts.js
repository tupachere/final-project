window.addEventListener('DOMContentLoaded', event => {
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    const layoutSidenav = document.body.querySelector('#layoutSidenav');
    const layoutSidenavNav = document.body.querySelector('#layoutSidenav_nav');
    const layoutSidenavContent = document.body.querySelector('#layoutSidenav_content');

    // Function to check if it's a mobile device
    function isMobileDevice() {
        return window.innerWidth < 992 || 
               /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }

    // Initial sidebar state function
    function initializeSidebarState() {
        // Always hide sidebar on mobile or small screens
        if (isMobileDevice()) {
            document.body.classList.add('sb-sidenav-toggled');
        } else {
            // Optional: You can still hide by default on desktop
            document.body.classList.add('sb-sidenav-toggled');
        }
    }

    if (sidebarToggle && layoutSidenav) {
        // Sidebar toggle functionality
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            event.stopPropagation();
            
            // Toggle sidebar
            document.body.classList.toggle('sb-sidenav-toggled');
            
            // Save state to localStorage
            localStorage.setItem('sidebar-toggle', 
                document.body.classList.contains('sb-sidenav-toggled')
            );
        });

        // Responsive sidebar handling
        function handleResponsiveSidebar() {
            if (isMobileDevice()) {
                // Always hide on mobile
                document.body.classList.add('sb-sidenav-toggled');
            } else {
                // Check saved state or default behavior
                const savedState = localStorage.getItem('sidebar-toggle');
                document.body.classList.toggle(
                    'sb-sidenav-toggled', 
                    savedState === 'true'
                );
            }
        }

        // Initialize sidebar state
        initializeSidebarState();

        // Handle responsive changes
        window.addEventListener('resize', handleResponsiveSidebar);

        // Click outside handling
        document.addEventListener('click', (event) => {
            if (isMobileDevice() && 
                !layoutSidenavNav.contains(event.target) && 
                !sidebarToggle.contains(event.target)) {
                document.body.classList.add('sb-sidenav-toggled');
            }
        });

        // Prevent sidebar links from closing on mobile
        const sidebarLinks = layoutSidenavNav.querySelectorAll('.nav-link');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', (event) => {
                if (isMobileDevice()) {
                    event.stopPropagation();
                }
            });
        });
    }

    // Optional: Form ID Prepending
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(event) {
            const idInput = this.querySelector('#id');
            if (idInput) {
                idInput.value = 'RAW-' + idInput.value.replace(/^RAW-/, '');
            }
        });
    });
});


    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };