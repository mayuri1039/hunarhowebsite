/**
 * Hunarho Learning Solutions - Interactive Engine
 */

document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Navbar Transitions
    const navbar = document.querySelector('.navbar-custom');
    const handleScroll = () => {
        if (window.scrollY > 50) {
            navbar.classList.add('navbar-scrolled');
        } else {
            navbar.classList.remove('navbar-scrolled');
        }
    };
    window.addEventListener('scroll', handleScroll);
    handleScroll(); // Initial call

    // 2. Active Link Highlighter on Scroll
    const sections = document.querySelectorAll('section, header');
    const navLinks = document.querySelectorAll('.navbar-custom .nav-link:not(.btn)');
    
    window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.scrollY >= (sectionTop - 150)) {
                current = section.getAttribute('id') || '';
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').includes(current) && current !== '') {
                link.classList.add('active');
            }
        });
    });

    // 3. AOS Animations Initialization
    // Dynamically map existing classes to AOS data attributes
    document.querySelectorAll('.animate-reveal').forEach((el, index) => {
        if (el.classList.contains('reveal-left')) {
            el.setAttribute('data-aos', 'fade-right');
        } else if (el.classList.contains('reveal-right')) {
            el.setAttribute('data-aos', 'fade-left');
        } else if (el.classList.contains('solution-card-container')) {
            el.setAttribute('data-aos', 'fade-up');
            el.setAttribute('data-aos-delay', (index % 3) * 100);
        } else {
            el.setAttribute('data-aos', 'fade-up');
        }
        // Remove manual classes to avoid conflicts
        el.classList.remove('animate-reveal', 'reveal-left', 'reveal-right');
    });

    // Add AOS to other important sections
    document.querySelectorAll('.why-choose-card').forEach((el, index) => {
        el.setAttribute('data-aos', 'fade-up');
        el.setAttribute('data-aos-delay', (index % 3) * 100);
    });

    document.querySelectorAll('.impact-stat-card').forEach((el, index) => {
        el.setAttribute('data-aos', 'zoom-in');
        el.setAttribute('data-aos-delay', (index % 4) * 100);
    });

    // (Visual grid cards are now explicitly handled in HTML for precise staggering)

    // Initialize AOS
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100,
            easing: 'ease-out-cubic'
        });
    }
    // 4. Statistics Counters Animation
    const statsSection = document.getElementById('impact-numbers');
    const counters = document.querySelectorAll('.stat-number');
    let countersAnimated = false;

    const animateCounters = () => {
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-target'), 10);
            const duration = 2000; // 2 seconds
            const stepTime = 30; // Milliseconds per tick
            const steps = duration / stepTime;
            const increment = target / steps;
            let current = 0;

            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    clearInterval(timer);
                    // Add symbols back after formatting
                    if (target === 50) {
                        counter.textContent = '50+';
                    } else if (target === 10000) {
                        counter.textContent = '10K+';
                    } else if (target === 500) {
                        counter.textContent = '500+';
                    } else if (target === 95) {
                        counter.textContent = '95%';
                    } else {
                        counter.textContent = Math.round(target);
                    }
                } else {
                    if (target === 10000) {
                        counter.textContent = Math.round(current / 1000) + 'K+';
                    } else if (target === 95) {
                        counter.textContent = Math.round(current) + '%';
                    } else {
                        counter.textContent = Math.round(current) + '+';
                    }
                }
            }, stepTime);
        });
    };

    if (statsSection) {
        const statsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !countersAnimated) {
                    countersAnimated = true;
                    animateCounters();
                    statsObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.3 });

        statsObserver.observe(statsSection);
    }

    // 5. Form Submissions & Success Triggers
    const bookDemoForm = document.getElementById('bookDemoForm');
    
    // Create modern alert helper
    const showFormSuccess = (formElement, successTitle, successText) => {
        const originalContent = formElement.innerHTML;
        formElement.innerHTML = `
            <div class="text-center py-5 animate-reveal revealed">
                <div class="mb-4">
                    <span class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle" style="width: 80px; height: 80px; font-size: 40px; box-shadow: 0 0 25px rgba(40, 167, 69, 0.4)">
                        <i class="fa-solid fa-check"></i>
                    </span>
                </div>
                <h3 class="h4 text-success fw-bold mb-2">${successTitle}</h3>
                <p class="text-muted mb-4">${successText}</p>
                <button type="button" class="btn btn-purple btn-reset-form px-4">Done</button>
            </div>
        `;

        // Add handler to reset the form content on click
        const resetBtn = formElement.querySelector('.btn-reset-form');
        resetBtn.addEventListener('click', () => {
            formElement.innerHTML = originalContent;
            // Reattach validators
            attachFormHandler(formElement);
        });
    };

    const attachFormHandler = (form) => {
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            if (!form.checkValidity()) {
                e.stopPropagation();
                form.classList.add('was-validated');
                return;
            }

            const formData = new FormData(form);
            const name = formData.get('name') || 'there';

            showFormSuccess(
                form, 
                'Demo Session Scheduled!', 
                `Thank you, ${name}. Our learning specialist will contact you shortly to confirm your next-generation learning platform walkthrough.`
            );
        });
    };

    if (bookDemoForm) attachFormHandler(bookDemoForm);

    // 6. Smooth Scroll transitions for standard links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            const targetElement = document.querySelector(href);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });

                // Close bootstrap navbar collapse on mobile after click
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) bsCollapse.hide();
                }
            }
        });
    });

    // 7. Swiper Carousel Initialization
    if (typeof Swiper !== 'undefined') {
        new Swiper('.solutions-swiper', {
            slidesPerView: 1,
            spaceBetween: 20,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                // when window width is >= 768px
                768: {
                    slidesPerView: 2,
                    spaceBetween: 30
                },
                // when window width is >= 992px
                992: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
                // when window width is >= 1200px
                1200: {
                    slidesPerView: 5,
                    spaceBetween: 30
                }
            }
        });
    }
});
