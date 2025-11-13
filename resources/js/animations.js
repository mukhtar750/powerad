// Futuristic Animations and Interactions
document.addEventListener('DOMContentLoaded', function() {
    
    // Professional Logo Loading
    function initLogoAnimations() {
        const logoImages = document.querySelectorAll('.logo-image');
        
        logoImages.forEach((logo, index) => {
            // Add loading skeleton while image loads
            const skeleton = document.createElement('div');
            skeleton.className = 'logo-skeleton absolute inset-0';
            logo.parentElement.appendChild(skeleton);
            
            // Remove skeleton when image loads
            logo.addEventListener('load', () => {
                setTimeout(() => {
                    skeleton.remove();
                    logo.style.animationDelay = `${index * 0.1}s`;
                }, 200);
            });
            
            // Fallback if image is already cached
            if (logo.complete) {
                skeleton.remove();
            }
        });
    }
    
    // Enhanced Logo Hover Effects
    function initLogoInteractions() {
        const logoContainers = document.querySelectorAll('.logo-container');
        
        logoContainers.forEach(container => {
            container.addEventListener('mouseenter', () => {
                const logo = container.querySelector('.logo-image');
                if (logo) {
                    logo.style.transform = 'scale(1.05) rotate(1deg)';
                }
            });
            
            container.addEventListener('mouseleave', () => {
                const logo = container.querySelector('.logo-image');
                if (logo) {
                    logo.style.transform = 'scale(1) rotate(0deg)';
                }
            });
        });
    }
    
    // Initialize logo features
    initLogoAnimations();
    initLogoInteractions();
    
    // Counter Animation for Stats
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'));
            const increment = target / 100;
            let current = 0;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    counter.textContent = target + '+';
                    clearInterval(timer);
                } else {
                    counter.textContent = Math.floor(current) + '+';
                }
            }, 20);
        });
    }
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.animation = 'fadeInUp 0.8s ease-out forwards';
                
                // Trigger counter animation when stats section is visible
                if (entry.target.querySelector('.counter')) {
                    setTimeout(animateCounters, 300);
                }
            }
        });
    }, observerOptions);
    
    // Observe all sections for scroll animations
    // const sections = document.querySelectorAll('section');
    // sections.forEach(section => {
    //     observer.observe(section);
    // });
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Dynamic cursor effect (for modern browsers)
    if (window.innerWidth > 768) {
        const cursor = document.createElement('div');
        cursor.className = 'cyber-cursor';
        cursor.style.cssText = `
            position: fixed;
            width: 20px;
            height: 20px;
            background: rgba(245, 104, 52, 0.5);
            border-radius: 50%;
            pointer-events: none;
            z-index: 9999;
            mix-blend-mode: difference;
            transition: transform 0.1s ease;
        `;
        document.body.appendChild(cursor);
        
        document.addEventListener('mousemove', (e) => {
            cursor.style.left = e.clientX - 10 + 'px';
            cursor.style.top = e.clientY - 10 + 'px';
        });
        
        // Scale cursor on hover over interactive elements
        const interactiveElements = document.querySelectorAll('a, button, .btn');
        interactiveElements.forEach(element => {
            element.addEventListener('mouseenter', () => {
                cursor.style.transform = 'scale(2)';
            });
            element.addEventListener('mouseleave', () => {
                cursor.style.transform = 'scale(1)';
            });
        });
    }
    
    // Parallax effect for background elements
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        const parallaxElements = document.querySelectorAll('.cyber-grid, .cyber-grid-large');
        
        parallaxElements.forEach(element => {
            const speed = 0.5;
            element.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });
    
    // Add loading state to buttons
    document.querySelectorAll('.btn').forEach(button => {
        button.addEventListener('click', function(e) {
            // Only prevent default for demo purposes
            if (this.getAttribute('href') === '#') {
                e.preventDefault();
                
                // Add loading state
                const originalText = this.innerHTML;
                this.innerHTML = `
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-current inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Loading...
                `;
                this.disabled = true;
                
                // Reset after 2 seconds
                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.disabled = false;
                }, 2000);
            }
        });
    });
    
    // Mobile menu toggle (if mobile menu exists)
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // Add glitch effect on hover for certain elements
    const glitchElements = document.querySelectorAll('.glitch-text');
    glitchElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            element.style.animation = 'glitch 0.3s infinite';
        });
        element.addEventListener('mouseleave', () => {
            element.style.animation = 'glitch 2s infinite';
        });
    });
    
    console.log('🚀 POWERAD INTERNATIONAL - Futuristic UI Loaded');
});