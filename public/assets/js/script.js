/**
 * Modern Sidebar Navigation System (Optimized)
 * --------------------------------------------
 * Features:
 * - Responsive sidebar with collapse/expand functionality
 * - Persistent state using localStorage
 * - Active menu item highlighting
 * - Mobile-friendly behavior
 * - Smooth animations and transitions
 * - Ripple effect for navigation items
 * - Optimized resize handling
 */

document.addEventListener('DOMContentLoaded', function () {
    initSidebar();
});

/**
 * Initialize the sidebar functionality
 */
function initSidebar() {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarBackdrop = document.getElementById('sidebarBackdrop');
    const sidebarToggler = document.querySelector('.sidebar-toggler');
    const body = document.body;

    // Check if all elements exist
    if (!sidebar || !sidebarToggle || !sidebarBackdrop || !sidebarToggler) {
        console.error('Sidebar elements not found');
        return;
    }

    // Check for Bootstrap dependency
    if (typeof bootstrap === 'undefined') {
        console.warn('Bootstrap JS not found — collapse features will be disabled.');
    }

    // Load initial collapsed state
    const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
    if (isCollapsed) {
        sidebar.classList.add('collapsed');
    }
    adjustMainContent(sidebar, body);

    // Setup event listeners
    setupEventListeners(sidebar, sidebarToggle, sidebarBackdrop, sidebarToggler, body);

    // Highlight active menu
    setActiveMenuItem(sidebar);

    // Initial responsive setup
    handleResponsiveAdjustments(sidebar, body);
}

/**
 * Adjust main content padding based on sidebar state
 */
function adjustMainContent(sidebar, body) {
    if (sidebar.classList.contains('collapsed')) {
        body.style.paddingRight = 'var(--sidebar-collapsed-width)';
    } else {
        body.style.paddingRight = 'var(--sidebar-width)';
    }
}

/**
 * Set up all event listeners
 */
function setupEventListeners(sidebar, sidebarToggle, sidebarBackdrop, sidebarToggler, body) {
    sidebarToggler.addEventListener('click', function () {
        toggleSidebar(sidebar, body);
    });

    sidebarToggle.addEventListener('click', function () {
        toggleMobileSidebar(sidebar, sidebarBackdrop);
    });

    sidebarBackdrop.addEventListener('click', function () {
        toggleMobileSidebar(sidebar, sidebarBackdrop);
    });

    // Optimized resize handler (debounced)
    let resizeTimer;
    window.addEventListener('resize', function () {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            handleResponsiveAdjustments(sidebar, body);
        }, 150);
    });

    addRippleEffect();
}

/**
 * Toggle desktop sidebar
 */
function toggleSidebar(sidebar, body) {
    sidebar.classList.toggle('collapsed');
    localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
    adjustMainContent(sidebar, body);
}

/**
 * Toggle mobile sidebar
 */
function toggleMobileSidebar(sidebar, sidebarBackdrop) {
    sidebar.classList.toggle('show');
    sidebarBackdrop.classList.toggle('show');
    document.body.classList.toggle('overflow-hidden');
}

/**
 * Highlight active menu item
 */
function setActiveMenuItem(sidebar) {
    const currentPath = window.location.pathname;
    const navLinks = sidebar.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && currentPath.includes(href)) {
            link.classList.add('active');

            // Expand parent menu if submenu item
            const parentCollapse = link.closest('.collapse');
            if (parentCollapse) {
                const collapseTrigger = document.querySelector(`[href="#${parentCollapse.id}"]`);
                if (collapseTrigger) {
                    collapseTrigger.classList.add('active');
                    collapseTrigger.setAttribute('aria-expanded', 'true');
                    parentCollapse.classList.add('show');
                }
            }
        }

        link.addEventListener('click', function (e) {
            if (this.hasAttribute('data-bs-toggle')) return;

            navLinks.forEach(l => l.classList.remove('active'));
            this.classList.add('active');
            localStorage.setItem('activeLink', this.getAttribute('href'));

            if (window.innerWidth < 992) {
                toggleMobileSidebar(sidebar, document.getElementById('sidebarBackdrop'));
            }
        });
    });

    initCollapseBehavior();
}

/**
 * Collapse menu logic
 */
function initCollapseBehavior() {
    if (typeof bootstrap === 'undefined') return;

    const collapseTriggers = document.querySelectorAll('[data-bs-toggle="collapse"]');

    collapseTriggers.forEach(trigger => {
        trigger.addEventListener('click', function () {
            const targetId = this.getAttribute('href');
            const isShowing = this.classList.contains('collapsed');

            if (isShowing) {
                document.querySelectorAll('.sidebar .collapse.show').forEach(openCollapse => {
                    if (openCollapse.id !== targetId.substring(1)) {
                        const bsCollapse = bootstrap.Collapse.getInstance(openCollapse);
                        if (bsCollapse) bsCollapse.hide();
                    }
                });
            }
        });
    });
}

/**
 * Handle responsive layout
 */
function handleResponsiveAdjustments(sidebar, body) {
    if (window.innerWidth < 992) {
        sidebar.classList.remove('collapsed');
        body.style.paddingRight = '0';
    } else {
        adjustMainContent(sidebar, body);
    }
}

function addRippleEffect() {
    const navItems = document.querySelectorAll('.nav-link');

    navItems.forEach(item => {
        item.style.position = 'relative'; // ensure relative positioning

        item.addEventListener('click', function (e) {
            // Remove old ripple
            const existingRipples = this.querySelectorAll('.ripple');
            existingRipples.forEach(r => r.remove());

            // Create ripple
            const ripple = document.createElement('span');
            ripple.classList.add('ripple');
            this.appendChild(ripple);

            // Calculate size and position
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            ripple.style.width = ripple.style.height = `${size}px`;
            ripple.style.left = `${e.clientX - rect.left - size / 2}px`;
            ripple.style.top = `${e.clientY - rect.top - size / 2}px`;

            // Remove after animation
            ripple.addEventListener('animationend', () => ripple.remove());
        });
    });
}

// Call it
addRippleEffect();

