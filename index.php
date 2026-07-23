<?php
$pageTitle = 'Hunarho Learning Solutions - Transforming Education Through Innovation';
$activePage = 'home';
$extraInlineJs = <<<JS
document.addEventListener('DOMContentLoaded', function () {
    var aboutCarouselEl = document.getElementById('aboutCarousel');
    if (aboutCarouselEl) {
        var aboutCarousel = new bootstrap.Carousel(aboutCarouselEl, {
            interval: 3000,
            ride: 'carousel',
            wrap: true,
            pause: false
        });
        aboutCarousel.cycle();

        aboutCarouselEl.addEventListener('slide.bs.carousel', function (e) {
            var indicators = aboutCarouselEl.querySelectorAll('.about-carousel-indicators button');
            indicators.forEach(function (btn) { btn.classList.remove('active'); });
            if (indicators[e.to]) indicators[e.to].classList.add('active');
        });
    }
});
JS;
require __DIR__ . '/includes/header.php';
?>
<!-- HERO SECTION (TOP BANNER) -->
    <header class="hero-section" id="home">
        <!-- Floating background particles -->
        <div class="hero-shapes">
            <div class="shape-blob shape-1"></div>
            <div class="shape-blob shape-2"></div>
            <div class="shape-blob shape-3"></div>
        </div>
        <div class="container hero-content">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <span class="badge-outline-gold mb-3" data-aos="fade-down" data-aos-delay="50">Pioneering Next-Gen
                        Learning</span>
                    <h1 class="fw-extrabold text-white mb-3 hero-heading-title"
                        data-aos="fade-up" data-aos-delay="150">
                        Transforming Education Through <span class="text-solid-gold">Technology, Skills &
                            Innovation</span>
                    </h1>
                    <p class="lead text-white mb-5 hero-subtitle-text" data-aos="fade-up"
                        data-aos-delay="250">
                        Empowering Schools, Colleges, Universities and Training Institutes with Next-Generation Learning
                        Platforms, Skill Development Programs, STEM Labs, AVGC Labs, and Academic Management Solutions.
                    </p>
                    <div class="d-flex flex-column flex-sm-row gap-3 align-items-sm-center" data-aos="fade-up" data-aos-delay="350">
                        <a href="contact.php" class="btn btn-gold px-4 py-3" id="hero-btn-demo">
                            <i class="fa-solid fa-calendar-check me-2"></i> Book a Demo
                        </a>
                        <a href="#solutions-tabs" class="btn btn-outline-white px-4 py-3" id="hero-btn-explore">
                            Explore Solutions <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <!-- Banner Visual Grid showcasing the six key aspects -->
                <div class="col-lg-6 hero-visual-grid">
                    <div class="visual-grid-container">
                        <div class="visual-grid-card" data-aos="fade-left" data-aos-delay="100">
                            <div class="icon-box"><i class="fa-solid fa-robot"></i></div>
                            <div class="card-info">
                                <h4>STEM Robotics</h4>
                                <p>Hands-on IoT, design thinking, and coding labs.</p>
                            </div>
                        </div>
                        <div class="visual-grid-card grid-item-offset" data-aos="fade-left" data-aos-delay="200">
                            <div class="icon-box"><i class="fa-solid fa-gamepad"></i></div>
                            <div class="card-info">
                                <h4>AVGC Lab</h4>
                                <p>Animation, VFX, gaming, and comic design labs.</p>
                            </div>
                        </div>
                        <div class="visual-grid-card" data-aos="fade-left" data-aos-delay="300">
                            <div class="icon-box"><i class="fa-solid fa-compass-drafting"></i></div>
                            <div class="card-info">
                                <h4>Skill Development</h4>
                                <p>Future skills, 3D modelling, and creative programs.</p>
                            </div>
                        </div>
                        <div class="visual-grid-card grid-item-offset" data-aos="fade-left" data-aos-delay="400">
                            <div class="icon-box"><i class="fa-solid fa-chart-column"></i></div>
                            <div class="card-info">
                                <h4>LMS Dashboard</h4>
                                <p>Complete school, college, and training tracking portals.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Decorative Curve divider -->
        <div class="section-divider divider-bottom">
            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120"
                preserveAspectRatio="none">
                <path
                    d="M321.39,56.44c58-10.79,114.16-30.13,172-41.86,82.39-16.72,168.19-17.73,250.45-.39C823.78,31,906.67,72,985.66,92.83c70.05,18.48,146.53,26.09,214.34,3V120H0V0C26.9,8.75,57.05,18.3,88.43,26.85,154.06,44.76,227.61,68.12,321.39,56.44Z"
                    class="divider-bg-white"></path>
            </svg>
        </div>
    </header>

    <!-- ABOUT HUNARHO SECTION -->
    <section class="section-padding pb-5 pt-5" id="about">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 order-2 order-lg-1 animate-reveal reveal-left">
                    <div class="about-image-wrapper">
                        <!-- About Section Carousel -->
                        <div id="aboutCarousel" class="carousel slide carousel-fade about-carousel"
                            data-bs-ride="carousel" data-bs-interval="3000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="assets/images/4.webp" alt="Education Classroom" class="about-image-main">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/3.webp" alt="STEM Robotics Lab" class="about-image-main">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/1.webp" alt="Skill Development" class="about-image-main">
                                </div>
                                <div class="carousel-item">
                                    <img src="assets/images/WhatsApp-Image-2026-02-09.webp" alt="LMS Dashboard"
                                        class="about-image-main">
                                </div>
                            </div>
                            <!-- Carousel Controls -->
                            <button class="about-carousel-btn about-carousel-prev" type="button"
                                data-bs-target="#aboutCarousel" data-bs-slide="prev" id="about-carousel-prev">
                                <i class="fa-solid fa-chevron-left"></i>
                            </button>
                            <button class="about-carousel-btn about-carousel-next" type="button"
                                data-bs-target="#aboutCarousel" data-bs-slide="next" id="about-carousel-next">
                                <i class="fa-solid fa-chevron-right"></i>
                            </button>
                            <!-- Carousel Indicators -->
                            <div class="about-carousel-indicators">
                                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="0"
                                    class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="1"
                                    aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="2"
                                    aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#aboutCarousel" data-bs-slide-to="3"
                                    aria-label="Slide 4"></button>
                            </div>
                            <!-- Overlay card inside carousel — position:absolute relative to carousel (overflow:visible) -->
                            <div class="about-image-overlay-card">
                                <h4 class="h5 fw-bold mb-2">Pioneering Change</h4>
                                <p class="small text-light-muted mb-0">Driving high-impact academic automation and
                                    experiential modules nationwide.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 animate-reveal reveal-right">
                    <!-- <span class="badge-outline">About Hunarho</span> -->
                    <h2 class="section-title mb-4">Building Future-Ready Learners</h2>
                    <p class="text-dark mb-3 about-lead-text">
                        Hunarho Learning Solutions is an EdTech company focused on transforming education through
                        innovative learning experiences, technology platforms, skill development programs, and
                        industry-aligned curriculum.
                    </p>
                    <p class="text-muted mb-4 about-sub-text">
                        We help schools, colleges, universities, coaching institutes, and educators deliver engaging,
                        practical, and outcome-driven learning. Our modern systems help close the gap between
                        traditional syllabus structures and the evolving demands of industries.
                    </p>

                    <h4 class="h5 fw-bold mb-3">Our Core Focus Areas:</h4>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <div class="about-focus-badge">
                                <span class="focus-icon"><i class="fa-solid fa-laptop-code"></i></span>
                                <h5>Digital Learning</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-focus-badge">
                                <span class="focus-icon"><i class="fa-solid fa-chart-line"></i></span>
                                <h5>Skill Programs</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-focus-badge">
                                <span class="focus-icon"><i class="fa-solid fa-microchip"></i></span>
                                <h5>STEM & Robotics</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-focus-badge">
                                <span class="focus-icon"><i class="fa-solid fa-gamepad"></i></span>
                                <h5>AVGC Labs</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-focus-badge">
                                <span class="focus-icon"><i class="fa-solid fa-university"></i></span>
                                <h5>Mumbai University Courses</h5>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="about-focus-badge">
                                <span class="focus-icon"><i class="fa-solid fa-cogs"></i></span>
                                <h5>Academic Automation</h5>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <a href="about.php" class="btn btn-gold px-4 py-2">Read More About Us <i class="fa-solid fa-arrow-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SOLUTIONS & SAAS PRODUCTS (TAB-BASED SEAMLESS GRID) -->
    <section class="section-padding bg-ligt mt-5" id="solutions-tabs">
        <!-- Curved divider at the top -->
       

        <div class="container pt-0" style="background-color: #F4EFFB;
    border-radius: 23px;
    padding: 37px;">
            <!-- Section Header Split Layout matching the design -->
            <div class="row align-items-center g-5 mb-5 animate-reveal">
                <div class="col-lg-6 text-start">
                    <span class="badge-outline-pill mb-3">Empowering Education with Technology</span>
                    <h2 class="section-title-split mb-4">Smart <span class="text-solid-purple">Solutions</span> for
                        Modern Institutions</h2>
                    <p class="text-muted mb-4 solutions-header-text">
                        Discover our suite of academic software, student enhancement packages, and innovation labs
                        engineered for institutional success.
                    </p>
                    <div class="d-flex gap-3 flex-wrap align-items-center">
                        <a href="#card-lms" class="btn btn-purple-gradient px-4 py-2 btn-custom-size" id="explore-solutions-btn">Explore
                            Solutions <i class="fa-solid fa-arrow-right ms-2"></i></a>
                        <a href="contact.php" class="btn btn-outline-demo px-4 py-2 btn-custom-size" id="request-demo-btn">Request a Demo</a>
                    </div>
                </div>
                <div class="col-lg-6 text-center">
                    <img src="solutions_header_3d.webp" alt="Smart Solutions 3D Illustration"
                        class="img-fluid solutions-header-illustration solutions-header-img">
                </div>
            </div>


            <!-- Unified Solutions & SaaS Grid (No Tabs) -->
            <div class="swiper solutions-swiper mt-2 pb-5">
                <div class="swiper-wrapper">
                    <!-- Solution 1: LMS -->
                    <div class="swiper-slide solution-card-container" id="card-lms">
                        <div class="solution-card card-theme-purple">
                            <div class="card-floating-icon"><i class="fa-solid fa-book-open"></i></div>
                            <div class="solution-card-image">
                                <img src="assets/images/lms.webp" alt="Learning Management System">
                            </div>
                            <div class="solution-card-body">
                                <div class="solution-header">
                                    <div class="solution-header-top">
                                        <div class="solution-title-block">
                                            <h3>Student LMS</h3>
                                            <span class="sub-title">Comprehensive Learning Portal</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-arrow-btn"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- Solution 3: STEM Lab -->
                    <div class="swiper-slide solution-card-container" id="card-stem">
                        <div class="solution-card card-theme-green">
                            <div class="card-floating-icon"><i class="fa-solid fa-flask"></i></div>
                            <div class="solution-card-image">
                                <img src="assets/images/4.webp" alt="STEM Lab Setup">
                            </div>
                            <div class="solution-card-body">
                                <div class="solution-header">
                                    <div class="solution-header-top">
                                        <div class="solution-title-block">
                                            <h3>STEM Lab Setup</h3>
                                            <span class="sub-title">Hands-on Innovation Labs</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-arrow-btn"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- Solution 4: AVGC Lab -->
                    <div class="swiper-slide solution-card-container" id="card-avgc">
                        <div class="solution-card card-theme-orange">
                            <div class="card-floating-icon"><i class="fa-regular fa-lightbulb"></i></div>
                            <div class="solution-card-image">
                                <img src="assets/images/avgc.webp" alt="AVGC Lab">
                            </div>
                            <div class="solution-card-body">
                                <div class="solution-header">
                                    <div class="solution-header-top">
                                        <div class="solution-title-block">
                                            <h3>AVGC Lab</h3>
                                            <span class="sub-title">Media & Creative Incubator</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-arrow-btn"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- SaaS 1: TPO Management -->
                    <div class="swiper-slide solution-card-container" id="card-tpo">
                        <div class="solution-card card-theme-blue">
                            <div class="card-floating-icon"><i class="fa-solid fa-briefcase"></i></div>
                            <div class="solution-card-image">
                                <img src="assets/images/tpo_management.webp" alt="TPO Management System">
                            </div>
                            <div class="solution-card-body">
                                <div class="solution-header">
                                    <div class="solution-header-top">
                                        <div class="solution-title-block">
                                            <h3>TPO Management System</h3>
                                            <span class="sub-title">Placement & Training Platform</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-arrow-btn"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- SaaS 2: Question Paper Gen -->
                    <div class="swiper-slide solution-card-container" id="card-paper">
                        <div class="solution-card card-theme-purple">
                            <div class="card-floating-icon"><i class="fa-solid fa-file-lines"></i></div>
                            <div class="solution-card-image">
                                <img src="assets/images/exam_generator.webp" alt="Question Paper Generator">
                            </div>
                            <div class="solution-card-body">
                                <div class="solution-header">
                                    <div class="solution-header-top">
                                        <div class="solution-title-block">
                                            <h3>Question Paper Generator</h3>
                                            <span class="sub-title">AI-Powered Exam Builder</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-arrow-btn"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!-- Sales Support -->
                    <div class="swiper-slide solution-card-container" id="card-sales">
                        <div class="solution-card card-theme-orange">
                            <div class="card-floating-icon"><i class="fa-solid fa-headset"></i></div>
                            <div class="solution-card-image">
                                <img src="assets/images/contactus.webp" alt="Sales Support">
                            </div>
                            <div class="solution-card-body">
                                <div class="solution-header">
                                    <div class="solution-header-top">
                                        <div class="solution-title-block">
                                            <h3>Sales Support</h3>
                                            <span class="sub-title">Expert Assistance</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-arrow-btn"><i class="fa-solid fa-arrow-right"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="swiper-pagination"></div>
            </div>
            
            <!-- Trust Bar -->
            <div class="trust-bar-container mt-2 mb-4 animate-reveal">
                <div class="row g-0 align-items-center">
                    <!-- Item 1 -->
                    <div class="col-md-6 col-lg-3 trust-item">
                        <div class="trust-icon text-theme-blue">
                            <i class="fa-solid fa-shield-halved"></i>
                        </div>
                        <div class="trust-content">
                            <h4 class="trust-title">Trusted by Institutions</h4>
                            <p class="trust-desc">Reliable solutions used by educational leaders.</p>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="col-md-6 col-lg-3 trust-item">
                        <div class="trust-icon text-theme-purple">
                            <i class="fa-solid fa-rocket"></i>
                        </div>
                        <div class="trust-content">
                            <h4 class="trust-title">Innovation-Driven</h4>
                            <p class="trust-desc">Built with the latest tech for future-ready campuses.</p>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="col-md-6 col-lg-3 trust-item">
                        <div class="trust-icon text-theme-purple">
                            <i class="fa-solid fa-headset"></i>
                        </div>
                        <div class="trust-content">
                            <h4 class="trust-title">Dedicated Support</h4>
                            <p class="trust-desc">Expert support to ensure smooth implementation.</p>
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="col-md-6 col-lg-3 trust-item border-none">
                        <div class="trust-icon text-theme-blue">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <div class="trust-content">
                            <h4 class="trust-title">Measurable Impact</h4>
                            <p class="trust-desc">Empowering institutions to achieve more every day.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OUR COURSES SECTION -->
    <section class="pb-5 pt-5 " id="our-courses">
        <div class="container" style="background-color: #FAF3E8;
    border-radius: 23px;
    padding: 37px;">
            <div class="text-center mb-5 animate-reveal">
                <span class="badge-outline-gold mb-3"><i class="fa-solid fa-book-open me-1"></i> OUR COURSES</span>
                <h2 class="structured-title mt-3">Career-Focused Courses<span class="text-purple">Tailored to Industry Needs</span></h2>
                <p class="structured-subtitle mt-2">Industry-relevant programs designed with expert insights to help you build in-demand skills.</p>
            </div>

            <div class="row g-4 animate-reveal justify-content-center">

                <!-- CARD 1: ECCE -->
                <div class="col-lg-5">
                    <div class="course-split-card card-cream" style="background-image: url('assets/images/eccebg1.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        <!-- Decorative elements -->

                        <!-- Left: Content -->
                        <div class="csc-content">
                            <div class="d-flex align-items-center gap-2 mb-3">
                                <span class="csc-tag tag-peach"><i class="fa-solid fa-award"></i> MEPSC Certified</span>
                            </div>
                            <h3 class="csc-title">ECCE Course</h3>
                            <p class="csc-subtitle">Early Childhood Care and Education</p>

                            <div class="csc-meta">
                                <span><i class="fa-regular fa-calendar-days"></i> 6 Months</span>
                                <span><i class="fa-solid fa-desktop"></i> Online + Live</span>
                            </div>

                            <p class="csc-label">SKILLS YOU WILL MASTER</p>
                            <div class="csc-skills">
                                <span>Child Psychology</span>
                                <span>Curriculum Planning</span>
                                <span>Classroom Management</span>
                                <span>Foundational Literacy</span>
                            </div>

                            <a href="ecce.php" class="btn csc-btn mt-4">Explore ECCE Program &nbsp;<i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- CARD 2: Mumbai University -->
                <div class="col-lg-5">
                    <div class="course-split-card card-skyblue" style="background-image: url('assets/images/mucardbg.webp'); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        <!-- Decorative elements -->
                        <div class="csc-deco csc-deco-dots"></div>
                        <div class="csc-deco csc-deco-book"><i class="fa-solid fa-book-open"></i></div>

                        <!-- Left: Content -->
                        <div class="csc-content">
                            <div class="d-flex align-items-center gap-2 mb-3 flex-wrap">
                                <span class="csc-tag tag-blue-light"><i class="fa-solid fa-graduation-cap"></i> MU Certified</span>
                                <span class="csc-tag tag-dark-navy"><i class="fa-solid fa-star"></i> 2 Credits</span>
                            </div>
                            <h3 class="csc-title">Mumbai University</h3>
                            <p class="csc-subtitle">Skill-Based Courses</p>

                            <div class="csc-meta">
                                <span><i class="fa-solid fa-layer-group"></i> 6+ Courses</span>
                                <span><i class="fa-solid fa-desktop"></i> Blended Mode</span>
                            </div>

                            <p class="csc-label">DISCIPLINES INCLUDE</p>
                            <div class="csc-skills">
                                <span>Retail Banking</span>
                                <span>Data Science</span>
                                <span>Python</span>
                                <span>Wealth Management</span>
                                <span>NISM Mutual Fund Advisor</span>
                            </div>

                            <a href="university-of-mumbai.php" class="btn csc-btn mt-4">View All MU Courses &nbsp;<i class="fa-solid fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- WHY TO CHOOSE HUNARHO SECTION (DARK PURPLE GRADIENT) -->
    <section class="section-padding gradient-purple-bg pt-5 pb-5" id="why-to-choose-hunarho"
        class="section-padding-custom">
        <div class="container">
            <div class="section-title-wrapper text-center mb-4">
                <span class="text-uppercase tracking-wider fw-bold text-accent-gold"
                    class="section-badge-small">Why Choose
                    Us</span>
                <h2 class="section-title fw-bold text-white mb-0 section-title-md">Why Institutions Choose <span
                        class="text-accent-gold">Hunarho</span></h2>
            </div>
            <div class="row g-3">
                <!-- Card 1: Industry-Relevant Curriculum -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="why-choose-card">
                        <div class="why-choose-icon">
                            <i class="fa-solid fa-ruler-combined"></i>
                        </div>
                        <h4>Industry-Relevant Curriculum</h4>
                        <p>Future-ready programs designed in alignment with market demands and emerging industry needs.
                        </p>
                    </div>
                </div>

                <!-- Card 2: Technology-Driven Learning -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="why-choose-card">
                        <div class="why-choose-icon">
                            <i class="fa-solid fa-cloud"></i>
                        </div>
                        <h4>Technology-Driven Learning</h4>
                        <p>Modern cloud platforms and AI-powered digital solutions that scale with your institution.</p>
                    </div>
                </div>

                <!-- Card 3: Experiential Learning -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="why-choose-card">
                        <div class="why-choose-icon">
                            <i class="fa-solid fa-flask"></i>
                        </div>
                        <h4>Experiential Learning</h4>
                        <p>Hands-on labs and project-based learning that builds real skills, not just academic
                            knowledge.</p>
                    </div>
                </div>

                <!-- Card 4: Scalable SaaS Solutions -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="why-choose-card">
                        <div class="why-choose-icon">
                            <i class="fa-solid fa-cubes"></i>
                        </div>
                        <h4>Scalable SaaS Solutions</h4>
                        <p>Designed to serve institutions of all sizes – from small coaching centers to large
                            universities.</p>
                    </div>
                </div>

                <!-- Card 5: End-to-End Support -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="why-choose-card">
                        <div class="why-choose-icon">
                            <i class="fa-solid fa-handshake"></i>
                        </div>
                        <h4>End-to-End Support</h4>
                        <p>From implementation and onboarding to training and continuous support – we're with you every
                            step.</p>
                    </div>
                </div>

                <!-- Card 6: Proven Track Record -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="why-choose-card">
                        <div class="why-choose-icon">
                            <i class="fa-solid fa-trophy"></i>
                        </div>
                        <h4>Proven Track Record</h4>
                        <p>50+ partner institutions and 10,000+ learners impacted with measurable, outcome-driven
                            results.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- OUR IMPACT SECTION (LIGHT BACKGROUND) -->
    <section class="section-padding section-padding-sm" id="our-impact">
        <div class="container" id="impact-numbers">
            <div class="section-title-wrapper text-center mb-3">
                <span class="text-uppercase tracking-wider fw-bold text-primary-purple"
                    class="section-badge-small">Our
                    Impact</span>
                <h2 class="section-title fw-bold"
                    class="section-title-lg">Numbers That Speak For
                    Themselves</h2>
            </div>
            <div class="row g-3 justify-content-center">
                <!-- Stat 1: 50+ Partner Institutions -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="impact-stat-card text-center">
                        <div class="impact-stat-number stat-number" data-target="50">0</div>
                        <div class="impact-stat-label">Partner Institutions</div>
                    </div>
                </div>

                <!-- Stat 2: 10K+ Learners Impacted -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="impact-stat-card text-center">
                        <div class="impact-stat-number stat-number" data-target="10000">0</div>
                        <div class="impact-stat-label">Learners Impacted</div>
                    </div>
                </div>

                <!-- Stat 3: 500+ Courses Delivered -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="impact-stat-card text-center">
                        <div class="impact-stat-number stat-number" data-target="500">0</div>
                        <div class="impact-stat-label">Courses Delivered</div>
                    </div>
                </div>

                <!-- Stat 4: 95% Client Satisfaction -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="impact-stat-card text-center">
                        <div class="impact-stat-number stat-number" data-target="95">0</div>
                        <div class="impact-stat-label">Client Satisfaction</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- TESTIMONIALS SECTION -->
    <section class="section-padding testimonials-section pt-5 pb-5" id="testimonials">
        <div class="container">
            <div class="section-title-wrapper text-center animate-reveal">
                <span class="text-uppercase tracking-wider fw-bold text-primary-purple"
                    class="section-badge-small">Testimonials</span>
                <h2 class="section-title fw-bold"
                    class="section-title-xl">What Our Partners Are
                    Saying</h2>
            </div>

            <!-- Testimonial Marquee -->
            <div class="testimonial-marquee-wrapper mt-5">
                <div class="testimonial-marquee-content">
                    <div class="testimonial-card-v2">
                        <div class="testimonial-text-wrapper">
                            <span class="testimonial-quote-v2"><i class="fa-solid fa-quote-right"></i></span>
                            <p>
                                "Hunarho's STEM Lab has completely transformed how our students engage with technology.
                                The hands-on robotics and AI curriculum brought a new level of excitement and curiosity
                                to our classrooms. We've seen remarkable improvement in problem-solving skills across
                                grades 5 to 10."
                            </p>
                        </div>
                        <div class="testimonial-profile-v2">
                            <div class="testimonial-avatar-badge">RS</div>
                            <div class="testimonial-meta-v2">
                                <h5>Rajesh Sharma</h5>
                                <span>Principal, DPS International School</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card-v2">
                        <div class="testimonial-text-wrapper">
                            <span class="testimonial-quote-v2"><i class="fa-solid fa-quote-right"></i></span>
                            <p>
                                "The LMS and TPO platform from Hunarho have completely streamlined our academic and
                                placement processes. Managing student profiles, scheduling interviews, and tracking
                                placements is now effortless. Our placement rate has improved by 30% since we
                                implemented the system."
                            </p>
                        </div>
                        <div class="testimonial-profile-v2">
                            <div class="testimonial-avatar-badge">PM</div>
                            <div class="testimonial-meta-v2">
                                <h5>Prof. Priya Mehta</h5>
                                <span>Dean, Placement Cell - Mumbai College of Commerce</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card-v2">
                        <div class="testimonial-text-wrapper">
                            <span class="testimonial-quote-v2"><i class="fa-solid fa-quote-right"></i></span>
                            <p>
                                "Our students absolutely love the Gaming LMS. The mission-based approach to learning
                                digital skills like coding and robotics keeps them engaged for hours. It's not just fun
                                — the progress tracking shows real skill development happening week over week."
                            </p>
                        </div>
                        <div class="testimonial-profile-v2">
                            <div class="testimonial-avatar-badge">AK</div>
                            <div class="testimonial-meta-v2">
                                <h5>Anjali Kulkarni</h5>
                                <span>Technology Coordinator, Sunrise Public School</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card-v2">
                        <div class="testimonial-text-wrapper">
                            <span class="testimonial-quote-v2"><i class="fa-solid fa-quote-right"></i></span>
                            <p>
                                "The Question Paper Generator has saved our faculty enormous time. What used to take
                                hours of manual work now takes minutes. The Bloom's Taxonomy support ensures we maintain
                                quality and cognitive balance across all assessments. Truly a game-changer."
                            </p>
                        </div>
                        <div class="testimonial-profile-v2">
                            <div class="testimonial-avatar-badge">DN</div>
                            <div class="testimonial-meta-v2">
                                <h5>Dr. Dinesh Nair</h5>
                                <span>HOD, Examinations - Thane University</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Duplicated for Marquee Effect -->
                    <div class="testimonial-card-v2">
                        <div class="testimonial-text-wrapper">
                            <span class="testimonial-quote-v2"><i class="fa-solid fa-quote-right"></i></span>
                            <p>
                                "Hunarho's STEM Lab has completely transformed how our students engage with technology.
                                The hands-on robotics and AI curriculum brought a new level of excitement and curiosity
                                to our classrooms. We've seen remarkable improvement in problem-solving skills across
                                grades 5 to 10."
                            </p>
                        </div>
                        <div class="testimonial-profile-v2">
                            <div class="testimonial-avatar-badge">RS</div>
                            <div class="testimonial-meta-v2">
                                <h5>Rajesh Sharma</h5>
                                <span>Principal, DPS International School</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card-v2">
                        <div class="testimonial-text-wrapper">
                            <span class="testimonial-quote-v2"><i class="fa-solid fa-quote-right"></i></span>
                            <p>
                                "The LMS and TPO platform from Hunarho have completely streamlined our academic and
                                placement processes. Managing student profiles, scheduling interviews, and tracking
                                placements is now effortless. Our placement rate has improved by 30% since we
                                implemented the system."
                            </p>
                        </div>
                        <div class="testimonial-profile-v2">
                            <div class="testimonial-avatar-badge">PM</div>
                            <div class="testimonial-meta-v2">
                                <h5>Prof. Priya Mehta</h5>
                                <span>Dean, Placement Cell - Mumbai College of Commerce</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card-v2">
                        <div class="testimonial-text-wrapper">
                            <span class="testimonial-quote-v2"><i class="fa-solid fa-quote-right"></i></span>
                            <p>
                                "Our students absolutely love the Gaming LMS. The mission-based approach to learning
                                digital skills like coding and robotics keeps them engaged for hours. It's not just fun
                                — the progress tracking shows real skill development happening week over week."
                            </p>
                        </div>
                        <div class="testimonial-profile-v2">
                            <div class="testimonial-avatar-badge">AK</div>
                            <div class="testimonial-meta-v2">
                                <h5>Anjali Kulkarni</h5>
                                <span>Technology Coordinator, Sunrise Public School</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card-v2">
                        <div class="testimonial-text-wrapper">
                            <span class="testimonial-quote-v2"><i class="fa-solid fa-quote-right"></i></span>
                            <p>
                                "The Question Paper Generator has saved our faculty enormous time. What used to take
                                hours of manual work now takes minutes. The Bloom's Taxonomy support ensures we maintain
                                quality and cognitive balance across all assessments. Truly a game-changer."
                            </p>
                        </div>
                        <div class="testimonial-profile-v2">
                            <div class="testimonial-avatar-badge">DN</div>
                            <div class="testimonial-meta-v2">
                                <h5>Dr. Dinesh Nair</h5>
                                <span>HOD, Examinations - Thane University</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- CONTACT & CALL TO ACTION BANNER -->
    <section class="py-5 bg-light-purple" id="contact">
        <div class="container">
            <!-- Compact CTA Banner -->
            <div class="cta-banner-compact animate-reveal">
                <div class="row align-items-center text-center text-lg-start">
                    <div class="col-lg-7 mb-4 mb-lg-0">
                        <div class="cta-badge mb-3 d-inline-flex pulse-glow">
                            <i class="fa-solid fa-sparkles"></i> The Future of Education is Here
                        </div>
                        <h2 class="cta-title fw-extrabold text-white mb-2" style="font-size: 36px;">
                            Ready to <span class="text-gradient-theme">Transform</span> Learning?
                        </h2>
                        <p class="text-light mb-0" style="color: #e2e8f0 !important; font-size: 16px;">
                            Empower your institution with next-generation platforms, automated exam tools, and certified course modules.
                        </p>
                    </div>
                    <div class="col-lg-5 text-center text-lg-end">
                        <a href="contact.php" class="btn btn-cta-theme px-4 py-3 me-2 mb-2 mb-sm-0">
                            <i class="fa-regular fa-calendar-check me-2"></i> Schedule Demo
                        </a>
                        <a href="mailto:support@hunarho.com" class="btn btn-outline-white-muted px-4 py-3 mb-2 mb-sm-0">
                            <i class="fa-regular fa-envelope me-2"></i> Email Us
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require __DIR__ . '/includes/footer.php';
