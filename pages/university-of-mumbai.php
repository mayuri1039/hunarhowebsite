<?php
$activePage = 'mumbai-university';
$demoInterest = 'MumbaiUniversityCourses';
$extraCss = ['/css/university-of-mumbai.css?v=1.10'];
$extraInlineJs = <<<'JS'
const heroForm = document.getElementById('muHeroForm');
if (heroForm) {
    heroForm.addEventListener('submit', function (e) {
        e.preventDefault();
        if (!heroForm.checkValidity()) {
            e.stopPropagation();
            heroForm.classList.add('was-validated');
            return;
        }

        const btn = document.getElementById('btnMuHeroSubmit');
        const originalHTML = btn.innerHTML;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Sending...';
        btn.disabled = true;

        const formData = new FormData(heroForm);

        fetch('/process_contact', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                btn.style.background = '#2eb87e';
                btn.innerHTML = '<i class="fa-solid fa-check me-2"></i> Sent Successfully!';
                
                const alertContainer = document.getElementById('muAlertArea');
                if (alertContainer) {
                    alertContainer.innerHTML = `
                        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-3 mb-4" role="alert" style="border-radius: 14px;">
                            <i class="fa-solid fa-circle-check fs-4 text-success"></i>
                            <div>
                                <strong>Thank you!</strong><br>
                                Our expert will contact you shortly.
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                }

                setTimeout(() => {
                    heroForm.reset();
                    heroForm.classList.remove('was-validated');
                    btn.innerHTML = originalHTML;
                    btn.disabled = false;
                    btn.style.background = '';
                }, 4000);
            } else {
                const alertContainer = document.getElementById('muAlertArea');
                if (alertContainer) {
                    alertContainer.innerHTML = `
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-3 mb-4" role="alert" style="border-radius: 14px;">
                            <i class="fa-solid fa-circle-xmark fs-4 text-danger"></i>
                            <div>
                                <strong>Error!</strong><br>
                                ${data.message || 'There was a problem sending your message.'}
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
                }
                btn.innerHTML = originalHTML;
                btn.disabled = false;
            }
        })
        .catch(error => {
            const alertContainer = document.getElementById('muAlertArea');
            if (alertContainer) {
                alertContainer.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-3 mb-4" role="alert" style="border-radius: 14px;">
                        <i class="fa-solid fa-circle-xmark fs-4 text-danger"></i>
                        <div>
                            <strong>Error!</strong><br>
                            An unexpected error occurred. Please try again.
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
            }
            btn.innerHTML = originalHTML;
            btn.disabled = false;
        });
    });
}
JS;
require __DIR__ . '/../includes/header.php';
?>
<!-- ══════════════ HERO SECTION ══════════════ -->
    <header class="mu-hero position-relative">
        <!-- Dark atmospheric overlay -->
        <div class="mu-hero-overlay"></div>
        <div class="mu-hero-glow"></div>
        <div class="mu-hero-glow-2"></div>

        <div class="container mu-hero-content">
            <div class="row align-items-center g-4">
                <!-- Left Side: Logo & Main Content -->
                <div class="col-lg-7 text-white" data-aos="fade-right">
                    <!-- University Logo -->
                    <div class="mu-logo-wrapper">
                        <img loading="lazy" src="/assets/images/University-logo.webp" alt="University of Mumbai Logo"
                            class="mu-logo-img">
                    </div>

                    <!-- Badge -->
                    <div>
                        <span class="mu-hero-badge">
                            <i class="fa-solid fa-graduation-cap"></i> ENROLL - LEARN - EARN
                        </span>
                    </div>

                    <!-- Heading -->
                    <h1 class="mu-hero-heading">
                        Unlock Talent, Ignite Creativity— <span class="mu-gold-text">Courses Exclusive to Partner
                            Institutions!</span>
                    </h1>

                    <!-- Feature Pills -->
                    <div class="mu-feature-list">
                        <div class="mu-feature-pill">
                            <div class="mu-feature-pill-icon"><i class="fa-solid fa-laptop-house"></i></div>
                            <div class="mu-feature-pill-text">
                                Classroom &amp; Online Mode
                                <span>Flexible learning models</span>
                            </div>
                        </div>
                        <div class="mu-feature-pill">
                            <div class="mu-feature-pill-icon"><i class="fa-solid fa-award"></i></div>
                            <div class="mu-feature-pill-text">
                                Official Credentials
                                <span>Recognized by University</span>
                            </div>
                        </div>
                        <div class="mu-feature-pill">
                            <div class="mu-feature-pill-icon"><i class="fa-solid fa-briefcase"></i></div>
                            <div class="mu-feature-pill-text">
                                Career Focused
                                <span>Industry-aligned skills</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Side: Form Card -->
                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
                    <div class="mu-form-card">
                        <h3 class="mu-form-title">Talk to an Expert!</h3>
                        <p class="mu-form-subtitle">Let us help you guide towards your career path</p>

                        <div id="muAlertArea"></div>
                        <form id="muHeroForm">
                            <div class="mu-form-group">
                                <label class="mu-form-label" for="heroFullName">Full Name</label>
                                <input type="text" id="heroFullName" name="fullName" class="form-control mu-form-input"
                                    placeholder="Enter your full name" required>
                            </div>

                            <div class="mu-form-group">
                                <label class="mu-form-label" for="heroEmail">Email Address</label>
                                <input type="email" id="heroEmail" name="email" class="form-control mu-form-input"
                                    placeholder="Enter your email address" required>
                            </div>

                            <div class="mu-form-group">
                                <label class="mu-form-label" for="heroMobile">Mobile Number</label>
                                <input type="tel" id="heroMobile" name="phone" class="form-control mu-form-input"
                                    placeholder="Enter your mobile number" required>
                            </div>

                            <input type="hidden" name="reason" value="Mumbai University Course Enquiry">
                            <input type="hidden" name="message" value="Requested expert guidance via Mumbai University page form.">

                            <button type="submit" class="mu-form-btn" id="btnMuHeroSubmit">
                                Submit Request <i class="fa-solid fa-arrow-right ms-2"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ══════════════ LEARN SKILLS & EARN CREDITS SECTION (COMPACT) ══════════════ -->
    <section class="mu-credits-section py-4">
        <div class="container position-relative z-2">
            <!-- Section Header -->
            <div class="text-center mb-4" data-aos="fade-up">
                <span class="mu-section-pill mb-2">
                    <i class="fa-solid fa-star"></i> ACADEMIC EXCELLENCE &amp; REWARDS
                </span>
                <h2 class="mu-section-title mb-2" style="font-size: 2rem;">Learn Skills &amp; Earn Credits</h2>
                <p class="mu-section-subtitle mx-auto mb-0" style="max-width: 620px; font-size: 0.95rem;">
                    Achieve more with every skill you master, turning your learning journey into academic growth.
                </p>
            </div>

            <!-- Compact Pentagonal Cards Horizontal Grid -->
            <div class="row justify-content-center g-3">
                <!-- Pentagon 1: Gold (Earn 2 Credits) -->
                <div class="col-xl col-lg-4 col-md-6 col-sm-6 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="50">
                    <div class="mu-penta-wrapper penta-gold">
                        <div class="mu-penta-inner">
                            <div class="mu-penta-badge">01</div>
                            <div class="mu-penta-icon">
                                <i class="fa-solid fa-coins"></i>
                            </div>
                            <h3 class="mu-penta-title">Earn 2 Credits</h3>
                            <p class="mu-penta-desc">
                                Receive 2 official academic credits for every 30-hour course.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pentagon 2: Indigo (Receive a Certificate) -->
                <div class="col-xl col-lg-4 col-md-6 col-sm-6 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                    <div class="mu-penta-wrapper penta-indigo">
                        <div class="mu-penta-inner">
                            <div class="mu-penta-badge">02</div>
                            <div class="mu-penta-icon">
                                <i class="fa-solid fa-certificate"></i>
                            </div>
                            <h3 class="mu-penta-title">Certified Skills</h3>
                            <p class="mu-penta-desc">
                                Get recognized completion certificates to showcase your skills.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pentagon 3: Emerald (Blended Learning) -->
                <div class="col-xl col-lg-4 col-md-6 col-sm-6 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="150">
                    <div class="mu-penta-wrapper penta-emerald">
                        <div class="mu-penta-inner">
                            <div class="mu-penta-badge">03</div>
                            <div class="mu-penta-icon">
                                <i class="fa-solid fa-laptop-code"></i>
                            </div>
                            <h3 class="mu-penta-title">Blended Mode</h3>
                            <p class="mu-penta-desc">
                                Flexible mix of interactive self-paced modules and live classes.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pentagon 4: Sky (Real-World Skills) -->
                <div class="col-xl col-lg-4 col-md-6 col-sm-6 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="200">
                    <div class="mu-penta-wrapper penta-sky">
                        <div class="mu-penta-inner">
                            <div class="mu-penta-badge">04</div>
                            <div class="mu-penta-icon">
                                <i class="fa-solid fa-briefcase"></i>
                            </div>
                            <h3 class="mu-penta-title">Job Readiness</h3>
                            <p class="mu-penta-desc">
                                Gain practical knowledge mentored directly by industry experts.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Pentagon 5: Rose (University Affiliation) -->
                <div class="col-xl col-lg-4 col-md-6 col-sm-6 d-flex justify-content-center" data-aos="zoom-in" data-aos-delay="250">
                    <div class="mu-penta-wrapper penta-rose">
                        <div class="mu-penta-inner">
                            <div class="mu-penta-badge">05</div>
                            <div class="mu-penta-icon">
                                <i class="fa-solid fa-building-columns"></i>
                            </div>
                            <h3 class="mu-penta-title">MU Affiliation</h3>
                            <p class="mu-penta-desc">
                                Courses officially backed by the University of Mumbai.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ REDESIGNED SKILL BASED COURSES SECTION ══════════════ -->
    <section class="mu-courses-section py-5" id="skill-based-courses">
        <div class="mu-courses-glow glow-top-left"></div>
        <div class="mu-courses-glow glow-bottom-right"></div>

        <div class="container position-relative z-2">
            <!-- Section Header -->
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="mu-section-pill mb-2">
                    <i class="fa-solid fa-graduation-cap"></i> INDUSTRY READY CURRICULUM
                </span>
                <h2 class="mu-section-title mb-2">University of Mumbai <span class="mu-gold-text">Skill Based Courses</span></h2>
                <p class="mu-section-subtitle mx-auto mb-0" style="max-width: 760px;">
                    Bridge the gap between academic theory and real-world career application with official University of Mumbai accredited courses. Every program awards <strong>2 Academic Credits</strong> under NEP 2020 guidelines.
                </p>
            </div>

            <!-- Interactive Filter Bar & Search -->
            <div class="mu-courses-controls" data-aos="fade-up" data-aos-delay="100">
                <div class="mu-filter-tabs" id="muCourseFilters">
                    <button type="button" class="mu-filter-btn active" data-filter="all">
                        <i class="fa-solid fa-layer-group"></i> All Courses <span class="mu-filter-count">6</span>
                    </button>
                    <button type="button" class="mu-filter-btn" data-filter="finance">
                        <i class="fa-solid fa-building-columns"></i> Finance &amp; Banking <span class="mu-filter-count">3</span>
                    </button>
                    <button type="button" class="mu-filter-btn" data-filter="data">
                        <i class="fa-solid fa-chart-pie"></i> Data Science &amp; AI <span class="mu-filter-count">2</span>
                    </button>
                    <button type="button" class="mu-filter-btn" data-filter="tech">
                        <i class="fa-solid fa-code"></i> Programming &amp; Tech <span class="mu-filter-count">1</span>
                    </button>
                </div>

                <div class="mu-course-search-box">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" id="muCourseSearchInput" placeholder="Search course, skills or job role..." aria-label="Search courses">
                </div>
            </div>

            <!-- Premium Modern Course Cards Grid (3 Columns on Desktop) -->
            <div class="row g-4" id="muCoursesGrid">
                <!-- Course 1: Certified Retail Banker -->
                <div class="col-lg-4 col-md-6 col-12 mu-premium-card-col" 
                     data-category="finance" 
                     data-title="Certified Retail Banker" 
                     data-skills="retail banking kyc aml casa operations regulatory compliance relationship manager banking"
                     data-aos="fade-up" data-aos-delay="50">
                    <div class="mu-premium-course-card">
                        <!-- Top Image Showcase -->
                        <div class="mu-pcc-image">
                            <span class="mu-pcc-badge-mu"><i class="fa-solid fa-building-columns text-warning"></i> MU Certified</span>
                            <span class="mu-pcc-badge-credits"><i class="fa-solid fa-award"></i> 2 Credits</span>
                            <span class="mu-pcc-category"><i class="fa-solid fa-building-columns me-1"></i> Finance &amp; Banking</span>
                            <img src="/assets/images/course-retail-banker.webp" alt="Certified Retail Banker Course" loading="lazy">
                            <div class="mu-pcc-overlay"></div>
                        </div>

                        <!-- Card Content Area -->
                        <div class="mu-pcc-body">
                            <h3 class="mu-pcc-title">Certified Retail Banker</h3>
                            
                            <!-- Quick Specs Bar -->
                            <div class="mu-pcc-specs">
                                <span class="mu-pcc-spec-item"><i class="fa-regular fa-clock text-warning"></i> 30 Hours</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-laptop-house text-success"></i> Blended Mode</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-layer-group text-info"></i> Intermediate</span>
                            </div>

                            <!-- Key Competencies -->
                            <div class="mu-pcc-skills-label">Skills You Will Master</div>
                            <div class="mu-pcc-skills">
                                <span class="mu-pcc-skill-tag">Retail Banking</span>
                                <span class="mu-pcc-skill-tag">KYC &amp; AML</span>
                                <span class="mu-pcc-skill-tag">CASA Operations</span>
                                <span class="mu-pcc-skill-tag">Digital Banking</span>
                            </div>

                            <!-- Career Outcome -->
                            <div class="mu-pcc-career-box">
                                <i class="fa-solid fa-briefcase text-primary fs-6"></i>
                                <span>Target Role: <strong>Relationship Manager / Personal Banker</strong></span>
                            </div>

                            <!-- Inline Actions -->
                            <div class="mu-pcc-actions-inline">
                                <button type="button" class="btn-syllabus flex-grow-1 justify-content-center" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#muCourseSyllabusModal"
                                        data-rich-id="retail_banker"
                                        data-course-title="Certified Retail Banker (NEP & NSQF Aligned)"
                                        data-course-category="Finance &amp; Banking"
                                        data-course-img="assets/images/course-retail-banker.webp"
                                        data-course-role="Relationship Manager / Personal Banker"
                                        data-course-desc="The Certified Retail Banker course equips individuals with the essential skills and knowledge needed for success in retail banking, covering loans, credit management, and banking operations."
                                        data-syllabus='["Module 1: Retail Banking"]'>
                                    <i class="fa-regular fa-file-lines"></i> Syllabus
                                </button>
                                <a href="contact" class="btn-enroll-card flex-grow-1 justify-content-center">
                                    Enroll <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course 2: NISM Mutual Fund Advisor -->
                <div class="col-lg-4 col-md-6 col-12 mu-premium-card-col" 
                     data-category="finance" 
                     data-title="NISM Mutual Fund Advisor" 
                     data-skills="mutual funds nism sebi nav valuation asset allocation portfolio management advisor markets"
                     data-aos="fade-up" data-aos-delay="100">
                    <div class="mu-premium-course-card">
                        <!-- Top Image Showcase -->
                        <div class="mu-pcc-image">
                            <span class="mu-pcc-badge-mu"><i class="fa-solid fa-building-columns text-warning"></i> MU Certified</span>
                            <span class="mu-pcc-badge-credits"><i class="fa-solid fa-award"></i> 2 Credits</span>
                            <span class="mu-pcc-category"><i class="fa-solid fa-chart-line me-1"></i> Capital Markets</span>
                            <img src="/assets/images/course-nism-mutual-fund.webp" alt="NISM Mutual Fund Advisor Course" loading="lazy">
                            <div class="mu-pcc-overlay"></div>
                        </div>

                        <!-- Card Content Area -->
                        <div class="mu-pcc-body">
                            <h3 class="mu-pcc-title">NISM Mutual Fund Advisor</h3>
                            
                            <!-- Quick Specs Bar -->
                            <div class="mu-pcc-specs">
                                <span class="mu-pcc-spec-item"><i class="fa-regular fa-clock text-warning"></i> 30 Hours</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-laptop-house text-success"></i> Blended Mode</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-certificate text-info"></i> Professional</span>
                            </div>

                            <!-- Key Competencies -->
                            <div class="mu-pcc-skills-label">Skills You Will Master</div>
                            <div class="mu-pcc-skills">
                                <span class="mu-pcc-skill-tag">SEBI / NISM V-A</span>
                                <span class="mu-pcc-skill-tag">NAV &amp; Valuation</span>
                                <span class="mu-pcc-skill-tag">Portfolio Advisory</span>
                                <span class="mu-pcc-skill-tag">Risk Analysis</span>
                            </div>

                            <!-- Career Outcome -->
                            <div class="mu-pcc-career-box">
                                <i class="fa-solid fa-briefcase text-primary fs-6"></i>
                                <span>Target Role: <strong>Mutual Fund Distributor / Financial Advisor</strong></span>
                            </div>

                            <!-- Inline Actions -->
                            <div class="mu-pcc-actions-inline">
                                <button type="button" class="btn-syllabus flex-grow-1 justify-content-center" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#muCourseSyllabusModal"
                                        data-rich-id="nism_mf"
                                        data-course-title="NISM Series V-A: Mutual Fund Distributors Certification"
                                        data-course-category="Capital Markets"
                                        data-course-img="assets/images/course-nism-mutual-fund.webp"
                                        data-course-role="Mutual Fund Distributor / Financial Advisor"
                                        data-course-desc="Becoming a mutual fund distributor involves developing financial expertise, understanding market dynamics, and following ethical practices. This course is designed to help learners prepare for the NISM Series V-A certification and guide investors effectively."
                                        data-syllabus='["Module 1: Concept & Role of Mutual Funds in Indian Capital Markets","Module 2: Fund Structures, Asset Classes & NAV Calculation Mechanics","Module 3: SEBI Regulations, Investor Protection & Taxation Guidelines","Module 4: Portfolio Construction, Asset Allocation & Financial Planning"]'>
                                    <i class="fa-regular fa-file-lines"></i> Syllabus
                                </button>
                                <a href="contact" class="btn-enroll-card flex-grow-1 justify-content-center">
                                    Enroll <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course 3: Certified Wealth Manager -->
                <div class="col-lg-4 col-md-6 col-12 mu-premium-card-col" 
                     data-category="finance" 
                     data-title="Certified Wealth Manager" 
                     data-skills="wealth management estate planning hni advisory asset allocation portfolio taxation private banking"
                     data-aos="fade-up" data-aos-delay="150">
                    <div class="mu-premium-course-card">
                        <!-- Top Image Showcase -->
                        <div class="mu-pcc-image">
                            <span class="mu-pcc-badge-mu"><i class="fa-solid fa-building-columns text-warning"></i> MU Certified</span>
                            <span class="mu-pcc-badge-credits"><i class="fa-solid fa-award"></i> 2 Credits</span>
                            <span class="mu-pcc-category"><i class="fa-solid fa-coins me-1"></i> Wealth Management</span>
                            <img src="/assets/images/course-wealth-manager.webp" alt="Certified Wealth Manager Course" loading="lazy">
                            <div class="mu-pcc-overlay"></div>
                        </div>

                        <!-- Card Content Area -->
                        <div class="mu-pcc-body">
                            <h3 class="mu-pcc-title">Certified Wealth Manager</h3>
                            
                            <!-- Quick Specs Bar -->
                            <div class="mu-pcc-specs">
                                <span class="mu-pcc-spec-item"><i class="fa-regular fa-clock text-warning"></i> 30 Hours</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-laptop-house text-success"></i> Blended Mode</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-star text-info"></i> Advanced</span>
                            </div>

                            <!-- Key Competencies -->
                            <div class="mu-pcc-skills-label">Skills You Will Master</div>
                            <div class="mu-pcc-skills">
                                <span class="mu-pcc-skill-tag">Wealth Strategy</span>
                                <span class="mu-pcc-skill-tag">Asset Allocation</span>
                                <span class="mu-pcc-skill-tag">Estate Planning</span>
                                <span class="mu-pcc-skill-tag">Tax Optimization</span>
                            </div>

                            <!-- Career Outcome -->
                            <div class="mu-pcc-career-box">
                                <i class="fa-solid fa-briefcase text-primary fs-6"></i>
                                <span>Target Role: <strong>Wealth Manager / Private Banker</strong></span>
                            </div>

                            <!-- Inline Actions -->
                            <div class="mu-pcc-actions-inline">
                                <button type="button" class="btn-syllabus flex-grow-1 justify-content-center" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#muCourseSyllabusModal"
                                        data-rich-id="wealth_mgr"
                                        data-course-title="Be a Certified Wealth Manager (NEP & NSQF Aligned)"
                                        data-course-category="Wealth Management"
                                        data-course-img="assets/images/course-wealth-manager.webp"
                                        data-course-role="Wealth Manager / Private Banking Advisor"
                                        data-course-desc="'Become a Certified Wealth Manager' is a flagship course designed for undergraduates and graduates who aspire to build a career in wealth management, banking, and investment management companies."
                                        data-syllabus='["Module 1: Investment Avenues in India","Module 2: Private Finance Fundamentals","Module 3: Portfolio Management"]'>
                                    <i class="fa-regular fa-file-lines"></i> Syllabus
                                </button>
                                <a href="contact" class="btn-enroll-card flex-grow-1 justify-content-center">
                                    Enroll <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course 4: Data Science Using Python -->
                <div class="col-lg-4 col-md-6 col-12 mu-premium-card-col" 
                     data-category="data" 
                     data-title="Data Science Using Python" 
                     data-skills="data science python pandas numpy exploratory data analysis seaborn matplotlib statistical modeling analytics"
                     data-aos="fade-up" data-aos-delay="200">
                    <div class="mu-premium-course-card">
                        <!-- Top Image Showcase -->
                        <div class="mu-pcc-image">
                            <span class="mu-pcc-badge-mu"><i class="fa-solid fa-building-columns text-warning"></i> MU Certified</span>
                            <span class="mu-pcc-badge-credits"><i class="fa-solid fa-award"></i> 2 Credits</span>
                            <span class="mu-pcc-category"><i class="fa-solid fa-chart-pie me-1"></i> Data Science &amp; AI</span>
                            <img src="/assets/images/course-data-science-python.webp" alt="Data Science Using Python Course" loading="lazy">
                            <div class="mu-pcc-overlay"></div>
                        </div>

                        <!-- Card Content Area -->
                        <div class="mu-pcc-body">
                            <h3 class="mu-pcc-title">Data Science Using Python</h3>
                            
                            <!-- Quick Specs Bar -->
                            <div class="mu-pcc-specs">
                                <span class="mu-pcc-spec-item"><i class="fa-regular fa-clock text-warning"></i> 30 Hours</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-laptop-house text-success"></i> Blended Mode</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-code text-info"></i> Projects</span>
                            </div>

                            <!-- Key Competencies -->
                            <div class="mu-pcc-skills-label">Skills You Will Master</div>
                            <div class="mu-pcc-skills">
                                <span class="mu-pcc-skill-tag">Python &amp; Pandas</span>
                                <span class="mu-pcc-skill-tag">NumPy</span>
                                <span class="mu-pcc-skill-tag">EDA &amp; Cleaning</span>
                                <span class="mu-pcc-skill-tag">Data Visualization</span>
                            </div>

                            <!-- Career Outcome -->
                            <div class="mu-pcc-career-box">
                                <i class="fa-solid fa-briefcase text-primary fs-6"></i>
                                <span>Target Role: <strong>Data Analyst / Junior Data Scientist</strong></span>
                            </div>

                            <!-- Inline Actions -->
                            <div class="mu-pcc-actions-inline">
                                <button type="button" class="btn-syllabus flex-grow-1 justify-content-center" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#muCourseSyllabusModal"
                                        data-rich-id="data_science_python"
                                        data-course-title="Data Science using Python (NEP & NSQF Aligned)"
                                        data-course-category="Data Science &amp; AI"
                                        data-course-img="assets/images/course-data-science-python.webp"
                                        data-course-role="Data Analyst / Applied Data Scientist"
                                        data-course-desc="The Data Science using Python course equips learners with the fundamentals of Python programming and the skills needed to extract insights from data using powerful Python libraries."
                                        data-syllabus='["Module 1: Core Python Programming","Module 2: Python Data Science Libraries","Module 3: Data Analytics Using Python"]'>
                                    <i class="fa-regular fa-file-lines"></i> Syllabus
                                </button>
                                <a href="contact" class="btn-enroll-card flex-grow-1 justify-content-center">
                                    Enroll <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course 5: Core Python Programming -->
                <div class="col-lg-4 col-md-6 col-12 mu-premium-card-col" 
                     data-category="tech" 
                     data-title="Core Python Programming" 
                     data-skills="python programming core python oop concepts syntax algorithms backend development software"
                     data-aos="fade-up" data-aos-delay="250">
                    <div class="mu-premium-course-card">
                        <!-- Top Image Showcase -->
                        <div class="mu-pcc-image">
                            <span class="mu-pcc-badge-mu"><i class="fa-solid fa-building-columns text-warning"></i> MU Certified</span>
                            <span class="mu-pcc-badge-credits"><i class="fa-solid fa-award"></i> 2 Credits</span>
                            <span class="mu-pcc-category"><i class="fa-solid fa-code me-1"></i> Programming</span>
                            <img src="/assets/images/course-core-python.webp" alt="Core Python Programming Course" loading="lazy">
                            <div class="mu-pcc-overlay"></div>
                        </div>

                        <!-- Card Content Area -->
                        <div class="mu-pcc-body">
                            <h3 class="mu-pcc-title">Core Python Programming</h3>
                            
                            <!-- Quick Specs Bar -->
                            <div class="mu-pcc-specs">
                                <span class="mu-pcc-spec-item"><i class="fa-regular fa-clock text-warning"></i> 30 Hours</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-laptop-house text-success"></i> Blended Mode</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-terminal text-info"></i> Foundation</span>
                            </div>

                            <!-- Key Competencies -->
                            <div class="mu-pcc-skills-label">Skills You Will Master</div>
                            <div class="mu-pcc-skills">
                                <span class="mu-pcc-skill-tag">Core Syntax</span>
                                <span class="mu-pcc-skill-tag">OOP Concepts</span>
                                <span class="mu-pcc-skill-tag">Data Structures</span>
                                <span class="mu-pcc-skill-tag">File Handling</span>
                            </div>

                            <!-- Career Outcome -->
                            <div class="mu-pcc-career-box">
                                <i class="fa-solid fa-briefcase text-primary fs-6"></i>
                                <span>Target Role: <strong>Python Developer / Software Associate</strong></span>
                            </div>

                            <!-- Inline Actions -->
                            <div class="mu-pcc-actions-inline">
                                <button type="button" class="btn-syllabus flex-grow-1 justify-content-center" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#muCourseSyllabusModal"
                                        data-rich-id="core_python"
                                        data-course-title="Core Python Programming (NEP & NSQF Aligned)"
                                        data-course-category="Programming"
                                        data-course-img="assets/images/course-core-python.webp"
                                        data-course-role="Python Developer / Software Associate"
                                        data-course-desc="The Core Python Programming course is designed to provide a strong foundation in Python programming, Object-Oriented Programming (OOP), and essential Data Structures."
                                        data-syllabus='["Module 1: Python","Module 2: Object-Oriented Programming (OOP)","Module 3: Data Structures"]'>
                                    <i class="fa-regular fa-file-lines"></i> Syllabus
                                </button>
                                <a href="contact" class="btn-enroll-card flex-grow-1 justify-content-center">
                                    Enroll <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Course 6: Intro to Data Science -->
                <div class="col-lg-4 col-md-6 col-12 mu-premium-card-col" 
                     data-category="data" 
                     data-title="Intro to Data Science" 
                     data-skills="intro data science business intelligence analytics data storytelling statistics visual dashboards"
                     data-aos="fade-up" data-aos-delay="300">
                    <div class="mu-premium-course-card">
                        <!-- Top Image Showcase -->
                        <div class="mu-pcc-image">
                            <span class="mu-pcc-badge-mu"><i class="fa-solid fa-building-columns text-warning"></i> MU Certified</span>
                            <span class="mu-pcc-badge-credits"><i class="fa-solid fa-award"></i> 2 Credits</span>
                            <span class="mu-pcc-category"><i class="fa-solid fa-chart-line me-1"></i> Data Science &amp; AI</span>
                            <img src="/assets/images/course-intro-data-science.webp" alt="Intro to Data Science Course" loading="lazy">
                            <div class="mu-pcc-overlay"></div>
                        </div>

                        <!-- Card Content Area -->
                        <div class="mu-pcc-body">
                            <h3 class="mu-pcc-title">Intro to Data Science</h3>
                            
                            <!-- Quick Specs Bar -->
                            <div class="mu-pcc-specs">
                                <span class="mu-pcc-spec-item"><i class="fa-regular fa-clock text-warning"></i> 30 Hours</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-laptop-house text-success"></i> Blended Mode</span>
                                <span class="mu-pcc-spec-item"><i class="fa-solid fa-compass text-info"></i> Starter Track</span>
                            </div>

                            <!-- Key Competencies -->
                            <div class="mu-pcc-skills-label">Skills You Will Master</div>
                            <div class="mu-pcc-skills">
                                <span class="mu-pcc-skill-tag">Data Literacy</span>
                                <span class="mu-pcc-skill-tag">BI Fundamentals</span>
                                <span class="mu-pcc-skill-tag">Data Storytelling</span>
                                <span class="mu-pcc-skill-tag">Analytics Basics</span>
                            </div>

                            <!-- Career Outcome -->
                            <div class="mu-pcc-career-box">
                                <i class="fa-solid fa-briefcase text-primary fs-6"></i>
                                <span>Target Role: <strong>Business Analyst / Data Associate</strong></span>
                            </div>

                            <!-- Inline Actions -->
                            <div class="mu-pcc-actions-inline">
                                <button type="button" class="btn-syllabus flex-grow-1 justify-content-center" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#muCourseSyllabusModal"
                                        data-rich-id="intro_data_science"
                                        data-course-title="Introduction to Data Science (NEP & NSQF Aligned)"
                                        data-course-category="Data Science &amp; AI"
                                        data-course-img="assets/images/course-intro-data-science.webp"
                                        data-course-role="Data Analyst / Business Analyst Trainee"
                                        data-course-desc="Learn the fundamentals of data extraction, manipulation, analysis, and visualization using Microsoft Excel and SQL."
                                        data-syllabus='["Module 1: Data with SQL","Module 2: Introduction to Excel","Module 3: Data Analysis with Excel"]'>
                                    <i class="fa-regular fa-file-lines"></i> Syllabus
                                </button>
                                <a href="contact" class="btn-enroll-card flex-grow-1 justify-content-center">
                                    Enroll <i class="fa-solid fa-arrow-right-long"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Empty Search State -->
            <div id="muNoCoursesMsg" class="text-center py-5 d-none">
                <div class="py-4">
                    <i class="fa-solid fa-magnifying-glass fs-1 text-muted mb-3"></i>
                    <h4 class="fw-bold text-dark">No matching courses found</h4>
                    <p class="text-muted mb-3">Try adjusting your search keywords or filter selection.</p>
                    <button type="button" class="btn btn-outline-primary rounded-pill px-4" id="btnResetCourseFilters">
                        Reset Filters
                    </button>
                </div>
            </div>

            <!-- Institutional Campus Collaboration Banner -->
            <div class="mu-campus-collab-banner" data-aos="fade-up">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="collab-badge">
                            <i class="fa-solid fa-building-columns"></i> INSTITUTIONAL PARTNERSHIP
                        </span>
                        <h3 class="fw-bold text-white mb-2" style="font-size: 1.7rem;">
                            Want to Offer MU-Accredited Courses on Your Campus?
                        </h3>
                        <p class="mb-0 text-white-50" style="font-size: 1.02rem; line-height: 1.6;">
                            Partner with Hunarho to deliver these 30-Hour Credit-Linked skill courses directly at your college or institution under NEP 2020 guidelines with live faculty guidance.
                        </p>
                    </div>
                    <div class="col-lg-4 text-lg-end text-center">
                        <a href="contact" class="btn btn-warning fw-bold px-4 py-3 rounded-pill shadow">
                            Request Campus Collaboration <i class="fa-solid fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ COURSE SYLLABUS MODAL ══════════════ -->
    <div class="modal fade mu-modal-custom" id="muCourseSyllabusModal" tabindex="-1" aria-labelledby="muCourseSyllabusModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <div>
                        <span class="badge bg-warning text-dark fw-bold px-3 py-1 mb-2 rounded-pill" id="modalCourseCategoryBadge">MU Certified</span>
                        <h4 class="modal-title mb-0" id="muCourseSyllabusModalLabel">Course Syllabus</h4>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-4 align-items-center mb-4 pb-3 border-bottom">
                        <div class="col-md-4">
                            <img loading="lazy" src="" alt="Course Cover" id="modalCourseImage" class="img-fluid rounded-4 shadow-sm w-100" style="height: 140px; object-fit: cover;">
                        </div>
                        <div class="col-md-8">
                            <h5 class="fw-bold text-dark mb-2" id="modalCourseTitle">Course Title</h5>
                            <p class="text-muted small mb-3" id="modalCourseDescription">Course description goes here.</p>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-regular fa-clock text-warning me-1"></i> 30 Hours</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-award text-success me-1"></i> 2 MU Academic Credits</span>
                                <span class="badge bg-light text-dark border px-3 py-2" id="modalCourseRole"><i class="fa-solid fa-briefcase text-primary me-1"></i> Career Ready</span>
                            </div>
                        </div>
                    </div>

                    <h6 class="fw-bold text-dark mb-3">
                        <i class="fa-solid fa-list-check text-primary me-2"></i> Course Curriculum &amp; Modules (NEP 2020 Aligned)
                    </h6>

                    <div class="accordion mb-4" id="modalSyllabusAccordion">
                        <!-- Populated dynamically by JavaScript -->
                    </div>

                    <div class="bg-light rounded-4 p-3 d-flex flex-wrap align-items-center justify-content-between gap-3">
                        <div>
                            <h6 class="fw-bold text-dark mb-1">Ready to earn your University of Mumbai credits?</h6>
                            <p class="small text-muted mb-0">Enroll today or request a callback from our academic counselor.</p>
                        </div>
                        <div>
                            <a href="contact" class="btn btn-primary fw-bold px-4 py-2 rounded-pill">
                                Enroll Now <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Interactive Filtering & Modal Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const filterBtns = document.querySelectorAll('#muCourseFilters .mu-filter-btn');
        const courseCols = document.querySelectorAll('#muCoursesGrid .mu-premium-card-col');
        const searchInput = document.getElementById('muCourseSearchInput');
        const noCoursesMsg = document.getElementById('muNoCoursesMsg');
        const btnReset = document.getElementById('btnResetCourseFilters');

        let activeFilter = 'all';
        let searchQuery = '';

        function filterCourses() {
            let visibleCount = 0;
            const query = searchQuery.toLowerCase().trim();

            courseCols.forEach(col => {
                const category = col.getAttribute('data-category');
                const title = col.getAttribute('data-title') || '';
                const skills = col.getAttribute('data-skills') || '';
                const fullText = (title + ' ' + skills).toLowerCase();

                const matchesCategory = (activeFilter === 'all' || category === activeFilter);
                const matchesSearch = (query === '' || fullText.includes(query));

                if (matchesCategory && matchesSearch) {
                    col.style.display = '';
                    setTimeout(() => { col.style.opacity = '1'; }, 10);
                    visibleCount++;
                } else {
                    col.style.display = 'none';
                    col.style.opacity = '0';
                }
            });

            if (visibleCount === 0) {
                noCoursesMsg.classList.remove('d-none');
            } else {
                noCoursesMsg.classList.add('d-none');
            }
        }

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                activeFilter = this.getAttribute('data-filter');
                filterCourses();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', function () {
                searchQuery = this.value;
                filterCourses();
            });
        }

        if (btnReset) {
            btnReset.addEventListener('click', function () {
                activeFilter = 'all';
                searchQuery = '';
                if (searchInput) searchInput.value = '';
                filterBtns.forEach(b => {
                    b.classList.toggle('active', b.getAttribute('data-filter') === 'all');
                });
                filterCourses();
            });
        }

        // Dynamic Modal Population
        const syllabusButtons = document.querySelectorAll('.btn-syllabus');
        syllabusButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const title = this.getAttribute('data-course-title') || 'Course Syllabus';
                const category = this.getAttribute('data-course-category') || 'MU Certified';
                const img = this.getAttribute('data-course-img') || '';
                const role = this.getAttribute('data-course-role') || '';
                const desc = this.getAttribute('data-course-desc') || '';
                const syllabusRaw = this.getAttribute('data-syllabus') || '[]';
                const richId = this.getAttribute('data-rich-id') || '';

                document.getElementById('modalCourseTitle').textContent = title;
                document.getElementById('modalCourseCategoryBadge').textContent = category;
                document.getElementById('modalCourseDescription').textContent = desc;
                document.getElementById('modalCourseImage').src = img;
                document.getElementById('modalCourseRole').innerHTML = '<i class="fa-solid fa-briefcase text-primary me-1"></i> Role: ' + role;

                const accordionContainer = document.getElementById('modalSyllabusAccordion');
                accordionContainer.innerHTML = '';

                if (richId === 'nism_mf') {
                    accordionContainer.innerHTML = `
                        <div class="mu-rich-course-details">
                            <!-- Top Highlights Strip -->
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-regular fa-clock text-warning me-1"></i> Duration: 30 Hours</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-user-tie text-primary me-1"></i> Curated By: Krishnan Gopalakrishnan (CFA, CFP)</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-laptop-house text-success me-1"></i> Blended Learning (Self-Paced + Live Sessions)</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-infinity text-info me-1"></i> Lifetime Access</span>
                            </div>

                            <!-- Navigation Tabs -->
                            <ul class="nav nav-pills mb-4 gap-2" id="nismRichTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active rounded-pill fw-bold px-4 small" id="nism-tab-overview-btn" data-bs-toggle="pill" data-bs-target="#nism-tab-overview" type="button" role="tab">
                                        <i class="fa-solid fa-circle-info me-1"></i> Overview & Highlights
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="nism-tab-path-btn" data-bs-toggle="pill" data-bs-target="#nism-tab-path" type="button" role="tab">
                                        <i class="fa-solid fa-book-open me-1"></i> Learning Path (Modules)
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="nism-tab-careers-btn" data-bs-toggle="pill" data-bs-target="#nism-tab-careers" type="button" role="tab">
                                        <i class="fa-solid fa-briefcase me-1"></i> Career & Job Roles
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="nism-tab-faqs-btn" data-bs-toggle="pill" data-bs-target="#nism-tab-faqs" type="button" role="tab">
                                        <i class="fa-solid fa-circle-question me-1"></i> FAQs & Eligibility
                                    </button>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content" id="nismRichTabContent">
                                <!-- TAB 1: OVERVIEW & HIGHLIGHTS -->
                                <div class="tab-pane fade show active" id="nism-tab-overview" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-bullseye text-primary me-2"></i>Course Overview</h6>
                                        <p class="text-muted small" style="line-height: 1.65;">
                                            Becoming a mutual fund distributor involves developing financial expertise, understanding market dynamics, and following ethical practices. This course is designed to help learners prepare for the NISM Series V-A certification and guide investors effectively. The course aims to prepare learners for the certification exam and a career in mutual fund distribution.
                                        </p>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-star text-warning me-2"></i>Program Highlights</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Learn in-demand skills from industry experts</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Live doubt-solving sessions</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Student mentorship & guidance</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Quizzes and practical assignments</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Exclusive job portal access</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Industry-based case studies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Dedicated student support</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-warning-subtle border border-warning">
                                                    <i class="fa-solid fa-award text-warning me-2"></i>
                                                    <span class="small fw-bold text-dark">Placement opportunities up to ₹35,000/month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-lightbulb text-info me-2"></i>What You'll Learn</h6>
                                        <ul class="text-muted small mb-0 ps-3">
                                            <li class="mb-1">In-depth understanding of mutual funds and distribution practices</li>
                                            <li class="mb-1">Comprehensive NISM Series V-A certification exam preparation</li>
                                            <li class="mb-1">Skills to evaluate and recommend suitable mutual funds to investors</li>
                                            <li class="mb-1">Enhanced career prospects in wealth management and financial services</li>
                                        </ul>
                                    </div>
                                </div>

                                <!-- TAB 2: LEARNING PATH (MODULES) -->
                                <div class="tab-pane fade" id="nism-tab-path" role="tabpanel">
                                    <div class="mb-3">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-layer-group text-primary me-2"></i>Comprehensive Learning Path</h6>

                                        <div class="accordion" id="nismModulesAccordion">
                                            <!-- Module 1 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#nismMod1" aria-expanded="true">
                                                        <span class="badge bg-primary me-2">Module 1</span> Fundamentals of Mutual Funds
                                                    </button>
                                                </h2>
                                                <div id="nismMod1" class="accordion-collapse collapse show" data-bs-parent="#nismModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <ul class="list-unstyled mb-0 small text-dark d-flex flex-column gap-2">
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Investment Landscape:</strong> Macroeconomic factors and investor needs</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Concept & Role of Mutual Fund:</strong> Mechanics, benefits, and fund flows</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Legal Structure of Mutual Funds in India:</strong> Sponsor, Trust, AMC, Custodian & RTA</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Legal & Regulatory Framework:</strong> SEBI guidelines, AMFI code of ethics</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Scheme Related Information:</strong> SID, SAI, KIM, and mandatory disclosures</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Fund Distribution & Channel Management Practices:</strong> Commission structures & ARNs</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Net Asset Value (NAV), Total Expense Ratio (TER) & Unit Pricing:</strong> Calculation & impact</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Module 2 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#nismMod2">
                                                        <span class="badge bg-primary me-2">Module 2</span> Distribution & Investor Services
                                                    </button>
                                                </h2>
                                                <div id="nismMod2" class="accordion-collapse collapse" data-bs-parent="#nismModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <ul class="list-unstyled mb-0 small text-dark d-flex flex-column gap-2">
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Taxation:</strong> Capital gains tax, dividend taxation, and investor tax planning</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Different Types of Mutual Fund Services:</strong> KYC, transactions, SIP/STP/SWP</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Risk, Return & Performance of Funds:</strong> Sharpe ratio, alpha, beta & benchmark metrics</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Evaluation of Mutual Fund Schemes:</strong> Qualitative and quantitative screening</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Mutual Fund Scheme Selection:</strong> Aligning investor risk profiles with asset allocation</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-3 bg-primary-subtle rounded-3 border border-primary mt-3">
                                            <h6 class="fw-bold text-primary mb-1 small"><i class="fa-solid fa-graduation-cap me-1"></i>Key Learning Outcomes</h6>
                                            <p class="small text-dark mb-0">
                                                Participants will master: Understanding of Mutual Funds, Regulatory Framework, Types of Mutual Funds, Fund Management, Risk and Return, NAV Calculation, Distribution and Sales Practices, Investor Services, Legal and Regulatory Requirements, and Financial Planning.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 3: CAREER & JOB ROLES -->
                                <div class="tab-pane fade" id="nism-tab-careers" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-road text-success me-2"></i>Career Path After NISM V-A Exam</h6>
                                        <div class="p-3 rounded-3 bg-light border mb-3">
                                            <p class="small text-dark mb-2">After passing the NISM V-A Mutual Fund Distributors Certification Examination, learners can:</p>
                                            <ul class="small text-muted mb-0 ps-3">
                                                <li><strong>Share their certification</strong> and gain visibility across financial institutions</li>
                                                <li><strong>Demonstrate skills</strong> as a mutual fund advisor or financial consultant</li>
                                                <li><strong>Improve employability</strong> and attract top recruiters in banking and wealth management</li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-user-check text-primary me-2"></i>12 Potential Job Opportunities</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Mutual Fund Sales Executive / Advisor</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Financial Advisor / Planner</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Relationship Manager – Mutual Fund</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Investment Analyst</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Fund Manager Assistant</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Client Services Representative</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Operations Executive – Mutual Fund</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Compliance Officer – Mutual Fund</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Sales Manager – Mutual Fund</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Investment Consultant</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Wealth Manager</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Financial Educator / Trainer</div></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 4: FAQS & ELIGIBILITY -->
                                <div class="tab-pane fade" id="nism-tab-faqs" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-user-graduate text-info me-2"></i>Eligibility Criteria</h6>
                                        <div class="p-3 bg-light rounded-3 border small text-muted">
                                            <p class="mb-1 text-dark"><strong>There are no strict educational prerequisites.</strong> Individuals with backgrounds in:</p>
                                            <div class="d-flex flex-wrap gap-2 my-2">
                                                <span class="badge bg-secondary-subtle text-dark border">Finance</span>
                                                <span class="badge bg-secondary-subtle text-dark border">Commerce</span>
                                                <span class="badge bg-secondary-subtle text-dark border">Economics</span>
                                                <span class="badge bg-secondary-subtle text-dark border">Related Fields</span>
                                            </div>
                                            <p class="mb-0">are encouraged to enroll and build a professional career in mutual fund distribution.</p>
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-circle-question text-primary me-2"></i>Frequently Asked Questions (FAQs)</h6>
                                        <div class="accordion" id="nismFaqsAccordion">
                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                                        What is the use of NISM V-A certification?
                                                    </button>
                                                </h2>
                                                <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#nismFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        The certification is required for individuals working in sales roles at mutual fund distribution companies.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                                        What are the passing criteria?
                                                    </button>
                                                </h2>
                                                <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#nismFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Candidates must score at least 50% marks. The page also notes that negative marking applies.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                                        How many attempts are allowed?
                                                    </button>
                                                </h2>
                                                <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#nismFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        There is no attempt limit, but the exam fee must be paid for each attempt.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq4">
                                                        Is graduation necessary?
                                                    </button>
                                                </h2>
                                                <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#nismFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        No. There are no educational prerequisites for taking the NISM Series V-A exam.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#faq5">
                                                        What can you do after passing?
                                                    </button>
                                                </h2>
                                                <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#nismFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        You can either pursue jobs that require the certification or become a mutual fund distributor.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    return;
                }

                if (richId === 'wealth_mgr') {
                    accordionContainer.innerHTML = `
                        <div class="mu-rich-course-details">
                            <!-- Top Highlights Strip -->
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-regular fa-clock text-warning me-1"></i> Duration: 30 Hours</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-building-columns text-primary me-1"></i> Credits: University of Mumbai Credits</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-laptop-house text-success me-1"></i> Blended Learning</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-infinity text-info me-1"></i> Lifetime Access</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-tag text-danger me-1"></i> Fee: ₹5,000</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-user-tie text-primary me-1"></i> Instructor: Krishnan Gopalakrishnan (CFA, CFP)</span>
                            </div>

                            <!-- Navigation Tabs -->
                            <ul class="nav nav-pills mb-4 gap-2" id="wealthRichTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active rounded-pill fw-bold px-4 small" id="wm-tab-overview-btn" data-bs-toggle="pill" data-bs-target="#wm-tab-overview" type="button" role="tab">
                                        <i class="fa-solid fa-circle-info me-1"></i> Overview & Highlights
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="wm-tab-path-btn" data-bs-toggle="pill" data-bs-target="#wm-tab-path" type="button" role="tab">
                                        <i class="fa-solid fa-book-open me-1"></i> Learning Path (3 Modules)
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="wm-tab-careers-btn" data-bs-toggle="pill" data-bs-target="#wm-tab-careers" type="button" role="tab">
                                        <i class="fa-solid fa-briefcase me-1"></i> Career & Salaries
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="wm-tab-faqs-btn" data-bs-toggle="pill" data-bs-target="#wm-tab-faqs" type="button" role="tab">
                                        <i class="fa-solid fa-circle-question me-1"></i> Instructor & FAQs
                                    </button>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content" id="wealthRichTabContent">
                                <!-- TAB 1: OVERVIEW & HIGHLIGHTS -->
                                <div class="tab-pane fade show active" id="wm-tab-overview" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-bullseye text-primary me-2"></i>An NEP & NSQF Aligned Curriculum</h6>
                                        <p class="text-muted small mb-2" style="line-height: 1.65;">
                                            "Become a Certified Wealth Manager" is a flagship course designed for undergraduates and graduates who aspire to build a career in wealth management, banking, and investment management companies.
                                        </p>
                                        <p class="text-muted small mb-2"><strong>The course covers key topics such as:</strong></p>
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            <span class="badge bg-primary-subtle text-dark border">Financial Planning</span>
                                            <span class="badge bg-primary-subtle text-dark border">Wealth Management</span>
                                            <span class="badge bg-primary-subtle text-dark border">Asset Management</span>
                                            <span class="badge bg-primary-subtle text-dark border">Portfolio Management</span>
                                            <span class="badge bg-primary-subtle text-dark border">Investment Strategies</span>
                                            <span class="badge bg-primary-subtle text-dark border">Risk Management</span>
                                        </div>
                                        <p class="text-muted small mb-0">Students learn from Certified Financial Planners and industry experts to prepare for roles in the BFSI sector.</p>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-star text-warning me-2"></i>Program Highlights</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Learn in-demand skills from industry experts</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Live doubt-solving sessions</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Student mentorship & guidance</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Quizzes and practical assignments</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Exclusive job portal access</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Industry-based case studies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Dedicated student support</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-warning-subtle border border-warning">
                                                    <i class="fa-solid fa-award text-warning me-2"></i>
                                                    <span class="small fw-bold text-dark">Placement opportunities starting around ₹35,000/month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-user-graduate text-info me-2"></i>Eligibility Criteria</h6>
                                        <div class="p-3 bg-light rounded-3 border small text-muted">
                                            <p class="mb-1 text-dark"><strong>This program is suitable for:</strong></p>
                                            <ul class="mb-0 ps-3">
                                                <li>Undergraduate students & Graduates</li>
                                                <li>Postgraduates</li>
                                                <li>Individuals seeking careers in Wealth Management</li>
                                                <li>Working professionals with 0–3 years of finance experience</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 2: LEARNING PATH (3 MODULES) -->
                                <div class="tab-pane fade" id="wm-tab-path" role="tabpanel">
                                    <div class="mb-3">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-layer-group text-primary me-2"></i>Comprehensive Learning Path</h6>

                                        <div class="accordion mb-4" id="wealthModulesAccordion">
                                            <!-- Module 1 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#wmMod1" aria-expanded="true">
                                                        <span class="badge bg-primary me-2">Module 1</span> Investment Avenues in India
                                                    </button>
                                                </h2>
                                                <div id="wmMod1" class="accordion-collapse collapse show" data-bs-parent="#wealthModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Investment vs Savings</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Traditional vs Modern Investments</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Small Saving Schemes</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Chit Funds & Real Estate</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Insurance and Risk Mitigation</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Financial Markets and Instruments</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Indian Capital Market and Regulators</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Equities and Corporate Actions</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Fixed Income Instruments</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Derivatives & Alternative Investments</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Mutual Funds (SIPs, ETFs)</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Basics of Fundamental Analysis</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Module 2 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#wmMod2">
                                                        <span class="badge bg-primary me-2">Module 2</span> Private Finance Fundamentals
                                                    </button>
                                                </h2>
                                                <div id="wmMod2" class="accordion-collapse collapse" data-bs-parent="#wealthModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <ul class="list-unstyled mb-0 small text-dark d-flex flex-column gap-2">
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Overview of Wealth Management:</strong> Core client advisory framework</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Time Value of Money:</strong> Discounting, compounding & financial mathematics</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Economics:</strong> Macro and micro drivers affecting wealth</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Managing Taxes:</strong> Efficient tax structures and compliance</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Module 3 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#wmMod3">
                                                        <span class="badge bg-primary me-2">Module 3</span> Portfolio Management
                                                    </button>
                                                </h2>
                                                <div id="wmMod3" class="accordion-collapse collapse" data-bs-parent="#wealthModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <ul class="list-unstyled mb-0 small text-dark d-flex flex-column gap-2">
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Portfolio Construction and Management:</strong> Multi-asset portfolio design</li>
                                                            <li><i class="fa-solid fa-check text-success me-2"></i><strong>Portfolio Monitoring and Rebalancing:</strong> Systematic asset rebalancing strategies</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-list-check text-primary me-2"></i>What You'll Learn & Core Applications</h6>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Investment Avenues in India</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Difference between saving & investing</li>
                                                        <li>Traditional vs modern options</li>
                                                        <li>Government schemes & alternatives</li>
                                                        <li>Real estate, chit funds & insurance</li>
                                                        <li>Equities, bonds, derivatives & ETFs</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Financial Planning</h6>
                                                    <p class="small text-muted mb-1">Develop customized plans using:</p>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Risk assessment & Asset allocation</li>
                                                        <li>Time value of money</li>
                                                        <li>Tax planning</li>
                                                        <li>Wealth management principles</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Portfolio Management</h6>
                                                    <p class="small text-muted mb-1">Learn how to:</p>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Build portfolios & track performance</li>
                                                        <li>Control risk & maximize returns</li>
                                                        <li>Apply professional asset management strategies</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 3: CAREER & SALARIES -->
                                <div class="tab-pane fade" id="wm-tab-careers" role="tabpanel">
                                    <!-- Salary Highlight -->
                                    <div class="p-3 rounded-3 bg-warning-subtle border border-warning mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-coins text-warning me-2"></i>What Salary Can a Certified Wealth Manager Expect?</h6>
                                        <div class="row g-2 text-center">
                                            <div class="col-sm-4">
                                                <div class="p-2 bg-white rounded-2 border">
                                                    <div class="small text-muted">Fresh Graduates</div>
                                                    <div class="fw-bold text-dark">₹4 – 8 LPA</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="p-2 bg-white rounded-2 border">
                                                    <div class="small text-muted">Overall Range</div>
                                                    <div class="fw-bold text-dark">₹3.5 – 12 LPA</div>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="p-2 bg-white rounded-2 border">
                                                    <div class="small text-muted">Average Salary</div>
                                                    <div class="fw-bold text-primary">~₹7.2 LPA</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-user-check text-primary me-2"></i>12 Career Opportunities</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Wealth Manager</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Financial Advisor</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Private Banker</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Investment Advisor</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Portfolio Manager</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Relationship Manager</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Financial Planner</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Wealth Management Analyst</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Client Service Associate</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Estate Planning Specialist</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Risk Manager</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Insurance Advisor</div></div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded-3 border h-100">
                                                <h6 class="fw-bold small text-dark mb-2"><i class="fa-solid fa-key text-primary me-2"></i>Key Wealth Management Skills</h6>
                                                <ul class="small text-muted mb-0 ps-3">
                                                    <li>Financial expertise & strategic planning</li>
                                                    <li>Risk management & asset protection</li>
                                                    <li>Personalized client service & HNI advisory</li>
                                                    <li>Advanced portfolio management</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-3 bg-primary-subtle rounded-3 border border-primary h-100">
                                                <h6 class="fw-bold small text-primary mb-2"><i class="fa-solid fa-certificate me-2"></i>Certification Benefits</h6>
                                                <p class="small text-dark mb-0">
                                                    Upon completion, learners receive an industry-recognized Wealth Management Certification that can be showcased to recruiters and employers to improve career prospects in the finance industry.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 4: INSTRUCTOR & FAQS -->
                                <div class="tab-pane fade" id="wm-tab-faqs" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-chalkboard-user text-primary me-2"></i>Instructor Profile</h6>
                                        <div class="p-3 bg-light rounded-3 border">
                                            <h6 class="fw-bold text-dark mb-1">Krishnan Gopalakrishnan <span class="badge bg-primary ms-1">CFA, CFP</span></h6>
                                            <p class="small text-muted mb-0">
                                                Krishnan Gopalakrishnan is a finance professional with more than ten years of experience in finance and academics. He serves as an Adjunct Faculty member at Dr. D. Y. Patil B-School, Pune, and works as a freelance finance trainer, including CFA Level 1 instruction.
                                            </p>
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-circle-question text-primary me-2"></i>FAQ Highlights</h6>
                                        <div class="accordion" id="wealthFaqsAccordion">
                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#wmFaq1">
                                                        What is this course about?
                                                    </button>
                                                </h2>
                                                <div id="wmFaq1" class="accordion-collapse collapse" data-bs-parent="#wealthFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        The course covers financial planning, investment strategies, asset management, private finance, and portfolio management, preparing learners for wealth management careers.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#wmFaq2">
                                                        What salary can a Certified Wealth Manager expect?
                                                    </button>
                                                </h2>
                                                <div id="wmFaq2" class="accordion-collapse collapse" data-bs-parent="#wealthFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Fresh graduates typically earn approximately ₹4–8 LPA, with an overall range of ₹3.5–12 LPA and an average around ₹7.2 LPA.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#wmFaq3">
                                                        Is wealth management a good career?
                                                    </button>
                                                </h2>
                                                <div id="wmFaq3" class="accordion-collapse collapse" data-bs-parent="#wealthFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Yes! It is a rewarding career helping clients grow and manage wealth through investment and portfolio strategies.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#wmFaq4">
                                                        How can I become a wealth manager?
                                                    </button>
                                                </h2>
                                                <div id="wmFaq4" class="accordion-collapse collapse" data-bs-parent="#wealthFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Typically through a bachelor's degree, relevant internships or entry-level experience, and professional certifications such as a wealth management certification.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    return;
                }

                if (richId === 'retail_banker') {
                    accordionContainer.innerHTML = `
                        <div class="mu-rich-course-details">
                            <!-- Top Highlights Strip -->
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-regular fa-clock text-warning me-1"></i> Duration: 30 Hours</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-building-columns text-primary me-1"></i> Credits: University of Mumbai Credits</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-laptop-house text-success me-1"></i> Blended Learning</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-infinity text-info me-1"></i> Lifetime Access</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-user-tie text-primary me-1"></i> Instructor: Ritesh Kumar Verma (PhD, MBA)</span>
                            </div>

                            <!-- Navigation Tabs -->
                            <ul class="nav nav-pills mb-4 gap-2" id="retailRichTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active rounded-pill fw-bold px-4 small" id="rb-tab-overview-btn" data-bs-toggle="pill" data-bs-target="#rb-tab-overview" type="button" role="tab">
                                        <i class="fa-solid fa-circle-info me-1"></i> Overview & Highlights
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="rb-tab-path-btn" data-bs-toggle="pill" data-bs-target="#rb-tab-path" type="button" role="tab">
                                        <i class="fa-solid fa-book-open me-1"></i> Learning Path & Outcomes
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="rb-tab-careers-btn" data-bs-toggle="pill" data-bs-target="#rb-tab-careers" type="button" role="tab">
                                        <i class="fa-solid fa-briefcase me-1"></i> Career Opportunities
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="rb-tab-faqs-btn" data-bs-toggle="pill" data-bs-target="#rb-tab-faqs" type="button" role="tab">
                                        <i class="fa-solid fa-circle-question me-1"></i> Instructor & FAQs
                                    </button>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content" id="retailRichTabContent">
                                <!-- TAB 1: OVERVIEW & HIGHLIGHTS -->
                                <div class="tab-pane fade show active" id="rb-tab-overview" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-bullseye text-primary me-2"></i>An NEP & NSQF Aligned Curriculum</h6>
                                        <p class="text-muted small mb-2" style="line-height: 1.65;">
                                            The Certified Retail Banker course equips individuals with the essential skills and knowledge needed for success in retail banking. The program covers loans, credit management, banking operations, and financial decision-making. Through expert-led sessions, real-world case studies, and practical learning experiences, participants are prepared for careers in banks and financial institutions.
                                        </p>
                                        <p class="text-muted small mb-2"><strong>Core Focus Areas:</strong></p>
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            <span class="badge bg-primary-subtle text-dark border">Loans & Credit Management</span>
                                            <span class="badge bg-primary-subtle text-dark border">Banking Operations</span>
                                            <span class="badge bg-primary-subtle text-dark border">Financial Decision-Making</span>
                                            <span class="badge bg-primary-subtle text-dark border">KYC & Regulatory Compliance</span>
                                            <span class="badge bg-primary-subtle text-dark border">Customer Relationship Management</span>
                                            <span class="badge bg-primary-subtle text-dark border">Retail Banking Products</span>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-star text-warning me-2"></i>Program Highlights</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Learn in-demand skills from industry experts</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Live doubt-solving sessions</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Student mentorship</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Quizzes and practical assignments</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Exclusive job portal access</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Industry-based case studies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Dedicated student support</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-warning-subtle border border-warning">
                                                    <i class="fa-solid fa-award text-warning me-2"></i>
                                                    <span class="small fw-bold text-dark">Placement opportunities starting around ₹35,000 per month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-user-graduate text-info me-2"></i>Eligibility Criteria</h6>
                                        <div class="p-3 bg-light rounded-3 border small text-muted">
                                            <p class="mb-1 text-dark"><strong>This program is suitable for:</strong></p>
                                            <ul class="mb-0 ps-3">
                                                <li>Undergraduate students & Graduates</li>
                                                <li>Postgraduates</li>
                                                <li>Individuals seeking a career in banking and financial services</li>
                                                <li>Working professionals with 0–3 years of experience in finance roles</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 2: LEARNING PATH & OUTCOMES -->
                                <div class="tab-pane fade" id="rb-tab-path" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-layer-group text-primary me-2"></i>Comprehensive Learning Path</h6>

                                        <div class="accordion mb-4" id="retailModulesAccordion">
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#rbMod1" aria-expanded="true">
                                                        <span class="badge bg-primary me-2">Module 1</span> Retail Banking Complete Syllabus
                                                    </button>
                                                </h2>
                                                <div id="rbMod1" class="accordion-collapse collapse show" data-bs-parent="#retailModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Introduction to Loans</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Types of Loans</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Securitization Process</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Renting vs Buying Analysis</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Ways to Avoid Loan Default</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Credit Score Management</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Retail Loans Portfolio</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Revision and Assessment</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-list-check text-primary me-2"></i>What You'll Learn</h6>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2"><i class="fa-solid fa-file-invoice-dollar text-primary me-2"></i>Loan Fundamentals</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Understanding loans and borrowing</li>
                                                        <li>Secured vs unsecured loans</li>
                                                        <li>Role of guarantors</li>
                                                        <li>Loan repayment strategies</li>
                                                        <li>Managing credit responsibly</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2"><i class="fa-solid fa-building-columns text-primary me-2"></i>Banking System</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Structure of the Indian retail banking sector</li>
                                                        <li>Banking products and services</li>
                                                        <li>KYC (Know Your Customer) compliance</li>
                                                        <li>Customer relationship management</li>
                                                        <li>Retail banking operations</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-trophy text-warning me-2"></i>Program Learning Outcomes</h6>
                                        <div class="p-3 bg-light rounded-3 border">
                                            <div class="row g-2 small text-dark">
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Understanding of Retail Banking</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Customer Service Skills</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Financial Products and Services Knowledge</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Sales and Relationship Building Skills</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Regulatory Compliance Awareness</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Technology and Digital Banking Knowledge</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Risk Management Skills</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Financial Analysis Skills</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Ethical Banking Practices</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Teamwork and Collaboration Skills</div>
                                                <div class="col-md-12"><i class="fa-solid fa-check-double text-primary me-2"></i>Problem-Solving Capabilities</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 3: CAREER OPPORTUNITIES -->
                                <div class="tab-pane fade" id="rb-tab-careers" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-user-check text-primary me-2"></i>12 Career Opportunities in Retail Banking</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Teller / Customer Service Representative</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Personal Banker</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Banking Associate</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Financial Services Representative</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Assistant Branch Manager</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Loan Officer Assistant</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Relationship Banker</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Universal Banker</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Banking Specialist</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Entry-Level Financial Advisor</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Digital Banking Specialist</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Branch Operations Coordinator</div></div>
                                        </div>
                                    </div>

                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="p-3 bg-light rounded-3 border h-100">
                                                <h6 class="fw-bold small text-dark mb-2"><i class="fa-solid fa-key text-primary me-2"></i>Key Skills Developed</h6>
                                                <ul class="small text-muted mb-0 ps-3">
                                                    <li>Customer relationship management & Banking operations</li>
                                                    <li>Loan and credit assessment</li>
                                                    <li>Financial product knowledge & Risk management</li>
                                                    <li>Regulatory compliance & Sales communication</li>
                                                    <li>Digital banking proficiency</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="p-3 bg-primary-subtle rounded-3 border border-primary h-100">
                                                <h6 class="fw-bold small text-primary mb-2"><i class="fa-solid fa-certificate me-2"></i>Certification Benefits</h6>
                                                <p class="small text-dark mb-1">Participants receive an industry-recognized Retail Banking Certification that can be used to:</p>
                                                <ul class="small text-dark mb-0 ps-3">
                                                    <li>Demonstrate banking knowledge and skills</li>
                                                    <li>Enhance employability & Improve visibility with recruiters</li>
                                                    <li>Build a career in retail banking and financial services</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 4: INSTRUCTOR & FAQS -->
                                <div class="tab-pane fade" id="rb-tab-faqs" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-chalkboard-user text-primary me-2"></i>Instructor Profile</h6>
                                        <div class="p-3 bg-light rounded-3 border">
                                            <h6 class="fw-bold text-dark mb-1">Ritesh Kumar Verma <span class="badge bg-primary ms-1">PhD, MBA</span></h6>
                                            <p class="small text-muted mb-2">
                                                Ritesh Kumar Verma is an Associate Professor at Pune Institute of Business Management. His expertise includes: <strong>Financial Modeling, Risk Management, Commercial Banking, Banking Operations, Credit Analysis, and Retail Banking</strong>.
                                            </p>
                                            <p class="small text-muted mb-0">
                                                He has previously taught at RK University and Narsee Monjee Institute of Management Studies (NMIMS) and brings both academic and industry experience to the program.
                                            </p>
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-circle-question text-primary me-2"></i>FAQ Highlights</h6>
                                        <div class="accordion" id="retailFaqsAccordion">
                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#rbFaq1">
                                                        What is retail banking?
                                                    </button>
                                                </h2>
                                                <div id="rbFaq1" class="accordion-collapse collapse" data-bs-parent="#retailFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Retail banking refers to banking services provided to individual consumers, including savings accounts, current accounts, loans, credit cards, and payment services.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#rbFaq2">
                                                        What are the key features of retail banking?
                                                    </button>
                                                </h2>
                                                <div id="rbFaq2" class="accordion-collapse collapse" data-bs-parent="#retailFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Key features include Personal banking accounts, Consumer loans, Credit cards, ATM and online banking services, and Physical branch network support.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#rbFaq3">
                                                        How is retail banking different from corporate banking?
                                                    </button>
                                                </h2>
                                                <div id="rbFaq3" class="accordion-collapse collapse" data-bs-parent="#retailFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Retail banking focuses on individual customers, while corporate banking serves businesses and large organizations with products such as commercial loans, treasury services, and trade finance.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#rbFaq4">
                                                        What does a retail banker do?
                                                    </button>
                                                </h2>
                                                <div id="rbFaq4" class="accordion-collapse collapse" data-bs-parent="#retailFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        A retail banker helps customers manage financial needs by opening accounts, processing loans, providing guidance on banking products, and maintaining customer relationships.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#rbFaq5">
                                                        Why is retail banking important?
                                                    </button>
                                                </h2>
                                                <div id="rbFaq5" class="accordion-collapse collapse" data-bs-parent="#retailFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Retail banking promotes financial inclusion by making essential banking services accessible to individuals across different income levels.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    return;
                }

                if (richId === 'core_python') {
                    accordionContainer.innerHTML = `
                        <div class="mu-rich-course-details">
                            <!-- Top Highlights Strip -->
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-regular fa-clock text-warning me-1"></i> Duration: 30 Hours</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-building-columns text-primary me-1"></i> Credits: University of Mumbai Credits</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-laptop-house text-success me-1"></i> Blended Learning</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-infinity text-info me-1"></i> Lifetime Access</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-tag text-danger me-1"></i> Fee: ₹5,000</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-chalkboard-user text-primary me-1"></i> Instructors: Rakhee Das &amp; Rocky Jagtiani</span>
                            </div>

                            <!-- Navigation Tabs -->
                            <ul class="nav nav-pills mb-4 gap-2" id="pythonRichTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active rounded-pill fw-bold px-4 small" id="cp-tab-overview-btn" data-bs-toggle="pill" data-bs-target="#cp-tab-overview" type="button" role="tab">
                                        <i class="fa-solid fa-circle-info me-1"></i> Overview & Highlights
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="cp-tab-path-btn" data-bs-toggle="pill" data-bs-target="#cp-tab-path" type="button" role="tab">
                                        <i class="fa-solid fa-book-open me-1"></i> Learning Path (3 Modules)
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="cp-tab-careers-btn" data-bs-toggle="pill" data-bs-target="#cp-tab-careers" type="button" role="tab">
                                        <i class="fa-solid fa-briefcase me-1"></i> Outcomes & Careers
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="cp-tab-faqs-btn" data-bs-toggle="pill" data-bs-target="#cp-tab-faqs" type="button" role="tab">
                                        <i class="fa-solid fa-circle-question me-1"></i> Instructors & FAQs
                                    </button>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content" id="pythonRichTabContent">
                                <!-- TAB 1: OVERVIEW & HIGHLIGHTS -->
                                <div class="tab-pane fade show active" id="cp-tab-overview" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-bullseye text-primary me-2"></i>An NEP & NSQF Aligned Curriculum</h6>
                                        <p class="text-muted small mb-2" style="line-height: 1.65;">
                                            The Core Python Programming course is designed to provide a strong foundation in Python programming, Object-Oriented Programming (OOP), and essential Data Structures. Whether you are a beginner or an experienced learner, the program equips you with practical programming skills required for Python development careers.
                                        </p>
                                        <p class="text-muted small mb-2"><strong>Core Pillars:</strong></p>
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            <span class="badge bg-primary-subtle text-dark border">Python Fundamentals</span>
                                            <span class="badge bg-primary-subtle text-dark border">Object-Oriented Programming (OOP)</span>
                                            <span class="badge bg-primary-subtle text-dark border">Data Structures & Algorithms</span>
                                            <span class="badge bg-primary-subtle text-dark border">File Handling & Persistence</span>
                                            <span class="badge bg-primary-subtle text-dark border">Exception Handling</span>
                                            <span class="badge bg-primary-subtle text-dark border">Project Assessments</span>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-star text-warning me-2"></i>Program Highlights</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Learn in-demand skills from industry experts</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Live doubt-solving sessions</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Student mentorship & guidance</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Quizzes and coding assignments</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Exclusive job portal access</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Industry-based case studies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Dedicated student support</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Project assessments & capstone case studies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-warning-subtle border border-warning">
                                                    <i class="fa-solid fa-award text-warning me-2"></i>
                                                    <span class="small fw-bold text-dark">Placement opportunities with packages starting around ₹35,000 per month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-user-graduate text-info me-2"></i>Eligibility Criteria</h6>
                                        <div class="p-3 bg-light rounded-3 border small text-muted">
                                            <p class="mb-1 text-dark"><strong>This program is suitable for:</strong></p>
                                            <ul class="mb-0 ps-3">
                                                <li>Undergraduate students & Graduates</li>
                                                <li>Postgraduates</li>
                                                <li>Individuals seeking careers in software development</li>
                                                <li>Learners interested in Data Science and Python programming</li>
                                                <li>Beginners and working professionals alike</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 2: LEARNING PATH & MODULES -->
                                <div class="tab-pane fade" id="cp-tab-path" role="tabpanel">
                                    <div class="mb-3">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-layer-group text-primary me-2"></i>Comprehensive Learning Path</h6>

                                        <div class="accordion mb-4" id="pythonModulesAccordion">
                                            <!-- Module 1 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#cpMod1" aria-expanded="true">
                                                        <span class="badge bg-primary me-2">Module 1</span> Python Fundamentals
                                                    </button>
                                                </h2>
                                                <div id="cpMod1" class="accordion-collapse collapse show" data-bs-parent="#pythonModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Overview of Python</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Types and Operators</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Built-in Functions</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Functions, Modules, and Packages</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Reading and Writing Files</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Assertions and Exception Handling</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Module 2 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#cpMod2">
                                                        <span class="badge bg-primary me-2">Module 2</span> Object-Oriented Programming (OOP)
                                                    </button>
                                                </h2>
                                                <div id="cpMod2" class="accordion-collapse collapse" data-bs-parent="#pythonModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Introduction to OOP</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Python Objects and Classes</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Inheritance Framework</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Operator Overloading</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Iterators &amp; Generators</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Closures &amp; Decorators</div>
                                                            <div class="col-md-12"><i class="fa-solid fa-check text-success me-2"></i>@property Decorator and Advanced OOP</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Module 3 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#cpMod3">
                                                        <span class="badge bg-primary me-2">Module 3</span> Data Structures &amp; Algorithms
                                                    </button>
                                                </h2>
                                                <div id="cpMod3" class="accordion-collapse collapse" data-bs-parent="#pythonModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Need for Data Structures &amp; Collections</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Searching, Sorting, &amp; Complexity Analysis</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Arrays and Linked Structures</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Interfaces, Implementations &amp; Polymorphism</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Stacks and Applications</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Linked Lists and Applications</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Trees and Applications</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Graphs and Applications</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-list-check text-primary me-2"></i>What You'll Learn & Core Competencies</h6>
                                        <div class="row g-3">
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Python Fundamentals</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Python syntax & programming basics</li>
                                                        <li>Data types, operators & built-ins</li>
                                                        <li>Control flow statements</li>
                                                        <li>Functions, modules & packages</li>
                                                        <li>File handling & error management</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Object-Oriented Programming</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Objects, classes & encapsulation</li>
                                                        <li>Inheritance & code reuse</li>
                                                        <li>Operator overloading</li>
                                                        <li>Iterators, generators & closures</li>
                                                        <li>Property decorators & advanced OOP</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Data Structures</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Lists, dicts, tuples & sets</li>
                                                        <li>Searching, sorting & complexity</li>
                                                        <li>Arrays & linked structures</li>
                                                        <li>Stacks, queues, trees & graphs</li>
                                                        <li>Real-world algorithmic applications</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 3: OUTCOMES & CAREERS -->
                                <div class="tab-pane fade" id="cp-tab-careers" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-trophy text-warning me-2"></i>Program Learning Outcomes</h6>
                                        <div class="p-3 bg-light rounded-3 border">
                                            <div class="row g-2 small text-dark">
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Write structured Python programs</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Use functions, modules, and packages effectively</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Work with file input/output operations</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Implement robust error handling</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Design object-oriented applications</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Apply OOP principles in software development</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Analyze and use common data structures</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Solve programming problems efficiently</div>
                                                <div class="col-md-12"><i class="fa-solid fa-check-double text-primary me-2"></i>Develop practical Python-based projects</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-user-check text-primary me-2"></i>8 Career Opportunities</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Python Developer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Software Developer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>OOP Programmer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>SQL Developer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Junior Backend Developer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Automation Engineer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Data Analyst (Entry-Level)</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Data Science Associate</div></div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-3 bg-primary-subtle rounded-3 border border-primary">
                                            <h6 class="fw-bold small text-primary mb-2"><i class="fa-solid fa-certificate me-2"></i>Certification Benefits</h6>
                                            <p class="small text-dark mb-1">Participants receive an industry-recognized Core Python Programming Certification that can be used to:</p>
                                            <ul class="small text-dark mb-0 ps-3">
                                                <li>Demonstrate Python proficiency</li>
                                                <li>Showcase programming skills to recruiters</li>
                                                <li>Improve employability</li>
                                                <li>Support applications for software development and analytics roles</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 4: INSTRUCTORS & FAQS -->
                                <div class="tab-pane fade" id="cp-tab-faqs" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-chalkboard-user text-primary me-2"></i>Meet Your Instructors</h6>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold text-dark mb-1">Dr. Rakhee Das</h6>
                                                    <p class="small text-muted mb-2">Faculty at NMIMS with over 15 years of experience in engineering education and EdTech.</p>
                                                    <p class="small text-dark mb-1"><strong>Areas of Expertise:</strong></p>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Curriculum Design & Technical Writing</li>
                                                        <li>Machine Learning & Deep Learning</li>
                                                        <li>Python Programming</li>
                                                        <li>Research Publications (Scopus, Springer, IEEE)</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold text-dark mb-1">Rocky Jagtiani</h6>
                                                    <p class="small text-muted mb-2">Corporate Trainer with over 18 years of experience and more than 18,000 professionals trained.</p>
                                                    <p class="small text-dark mb-1"><strong>Areas of Expertise:</strong></p>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Core Programming & Python</li>
                                                        <li>Data Science & Machine Learning</li>
                                                        <li>Artificial Intelligence</li>
                                                        <li>Databases and Analytics</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-circle-question text-primary me-2"></i>FAQ Highlights</h6>
                                        <div class="accordion" id="pythonFaqsAccordion">
                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaq1">
                                                        What level of experience is required?
                                                    </button>
                                                </h2>
                                                <div id="cpFaq1" class="accordion-collapse collapse" data-bs-parent="#pythonFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        The course is designed for all experience levels, including complete beginners and experienced learners looking to strengthen their Python fundamentals.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaq2">
                                                        What topics are covered?
                                                    </button>
                                                </h2>
                                                <div id="cpFaq2" class="accordion-collapse collapse" data-bs-parent="#pythonFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        The curriculum covers Python Fundamentals, Object-Oriented Programming, Data Structures, File Handling, Exception Handling, and Searching and Sorting Algorithms.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaq3">
                                                        Will I be able to build projects?
                                                    </button>
                                                </h2>
                                                <div id="cpFaq3" class="accordion-collapse collapse" data-bs-parent="#pythonFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Yes. The program includes practical exercises, assignments, case studies, and project-based learning to help learners apply concepts in real-world scenarios.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaq4">
                                                        How will this course help my career?
                                                    </button>
                                                </h2>
                                                <div id="cpFaq4" class="accordion-collapse collapse" data-bs-parent="#pythonFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Python is widely used in software development, automation, data analytics, machine learning, and artificial intelligence. The course builds the foundational skills needed for entry-level Python development and related technology roles.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#cpFaq5">
                                                        Does the course include real-world applications?
                                                    </button>
                                                </h2>
                                                <div id="cpFaq5" class="accordion-collapse collapse" data-bs-parent="#pythonFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Yes. Industry-based case studies, projects, and practical examples are incorporated throughout the curriculum to demonstrate real-world uses of Python programming.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    return;
                }

                if (richId === 'data_science_python') {
                    accordionContainer.innerHTML = `
                        <div class="mu-rich-course-details">
                            <!-- Top Highlights Strip -->
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-regular fa-clock text-warning me-1"></i> Duration: 30 Hours</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-building-columns text-primary me-1"></i> Credits: University of Mumbai Credits</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-laptop-house text-success me-1"></i> Blended Learning</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-infinity text-info me-1"></i> Lifetime Access</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-tag text-danger me-1"></i> Fee: ₹5,000</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-chalkboard-user text-primary me-1"></i> Instructors: Rakhee Das &amp; Rocky Jagtiani</span>
                            </div>

                            <!-- Navigation Tabs -->
                            <ul class="nav nav-pills mb-4 gap-2" id="dsPythonRichTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active rounded-pill fw-bold px-4 small" id="dsp-tab-overview-btn" data-bs-toggle="pill" data-bs-target="#dsp-tab-overview" type="button" role="tab">
                                        <i class="fa-solid fa-circle-info me-1"></i> Overview & Highlights
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="dsp-tab-path-btn" data-bs-toggle="pill" data-bs-target="#dsp-tab-path" type="button" role="tab">
                                        <i class="fa-solid fa-book-open me-1"></i> Learning Path (3 Modules)
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="dsp-tab-careers-btn" data-bs-toggle="pill" data-bs-target="#dsp-tab-careers" type="button" role="tab">
                                        <i class="fa-solid fa-briefcase me-1"></i> Outcomes & Careers
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="dsp-tab-faqs-btn" data-bs-toggle="pill" data-bs-target="#dsp-tab-faqs" type="button" role="tab">
                                        <i class="fa-solid fa-circle-question me-1"></i> Instructors & FAQs
                                    </button>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content" id="dsPythonRichTabContent">
                                <!-- TAB 1: OVERVIEW & HIGHLIGHTS -->
                                <div class="tab-pane fade show active" id="dsp-tab-overview" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-bullseye text-primary me-2"></i>An NEP & NSQF Aligned Curriculum</h6>
                                        <p class="text-muted small mb-2" style="line-height: 1.65;">
                                            The Data Science using Python course equips learners with the fundamentals of Python programming and the skills needed to extract insights from data using powerful Python libraries. The program is designed for beginners as well as professionals looking to strengthen their data analysis capabilities and build a foundation in data science.
                                        </p>
                                        <p class="text-muted small mb-2"><strong>Core Pillars:</strong></p>
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            <span class="badge bg-primary-subtle text-dark border">Python Fundamentals</span>
                                            <span class="badge bg-primary-subtle text-dark border">NumPy &amp; Numerical Computing</span>
                                            <span class="badge bg-primary-subtle text-dark border">Pandas Data Analysis</span>
                                            <span class="badge bg-primary-subtle text-dark border">Matplotlib Visualization</span>
                                            <span class="badge bg-primary-subtle text-dark border">Exploratory Data Analysis (EDA)</span>
                                            <span class="badge bg-primary-subtle text-dark border">Machine Learning Foundations</span>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-star text-warning me-2"></i>Program Highlights</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Learn in-demand skills from industry experts</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Live doubt-solving sessions</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Student mentorship & guidance</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Quizzes and practical assignments</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Exclusive job portal access</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Industry-based case studies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Dedicated student support</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Project assessments & capstone case studies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-warning-subtle border border-warning">
                                                    <i class="fa-solid fa-award text-warning me-2"></i>
                                                    <span class="small fw-bold text-dark">Placement opportunities with packages starting around ₹35,000 per month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-user-graduate text-info me-2"></i>Eligibility Criteria</h6>
                                        <div class="p-3 bg-light rounded-3 border small text-muted">
                                            <p class="mb-1 text-dark"><strong>This program is suitable for:</strong></p>
                                            <ul class="mb-0 ps-3">
                                                <li>Undergraduate students & Graduates</li>
                                                <li>Individuals aspiring to build careers in Data Analytics or Data Science</li>
                                                <li>Beginners with no prior Python experience</li>
                                                <li>Working professionals seeking data analysis skills</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 2: LEARNING PATH & LIBRARIES -->
                                <div class="tab-pane fade" id="dsp-tab-path" role="tabpanel">
                                    <div class="mb-3">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-layer-group text-primary me-2"></i>Comprehensive Learning Path</h6>

                                        <div class="accordion mb-4" id="dspModulesAccordion">
                                            <!-- Module 1 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#dspMod1" aria-expanded="true">
                                                        <span class="badge bg-primary me-2">Module 1</span> Core Python Programming
                                                    </button>
                                                </h2>
                                                <div id="dspMod1" class="accordion-collapse collapse show" data-bs-parent="#dspModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Overview of Python</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Types and Operators</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Built-in Functions</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Functions, Modules, and Packages</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Reading and Writing Files</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Assertions and Exception Handling</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Module 2 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#dspMod2">
                                                        <span class="badge bg-primary me-2">Module 2</span> Python Data Science Libraries
                                                    </button>
                                                </h2>
                                                <div id="dspMod2" class="accordion-collapse collapse" data-bs-parent="#dspModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Introduction to Data Science</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>NumPy & Array Operations</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Visualization using Matplotlib</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Analysis using Pandas</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Module 3 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#dspMod3">
                                                        <span class="badge bg-primary me-2">Module 3</span> Data Analytics Using Python
                                                    </button>
                                                </h2>
                                                <div id="dspMod3" class="accordion-collapse collapse" data-bs-parent="#dspModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Exploratory Data Analysis (EDA)</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Manipulation Techniques</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Visualization Practices</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Practical Data Science Applications</div>
                                                            <div class="col-md-12"><i class="fa-solid fa-check text-success me-2"></i>Project Work and Assessments</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-list-check text-primary me-2"></i>What You'll Learn & Core Competencies</h6>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Python Fundamentals</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Python syntax, loops & control flow</li>
                                                        <li>Data types, operators & built-in functions</li>
                                                        <li>Functions, modules & packages</li>
                                                        <li>File handling & exception management</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">NumPy & Numerical Computing</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Working with multidimensional arrays</li>
                                                        <li>Mathematical & linear algebra operations</li>
                                                        <li>Fast vectorized data manipulation</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Pandas Data Analysis</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Series and DataFrames manipulation</li>
                                                        <li>Data cleaning, imputation & preparation</li>
                                                        <li>Data transformation, groupby & exploration</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Matplotlib & ML Foundations</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Creating charts, graphs & visualizations</li>
                                                        <li>Presenting insights effectively</li>
                                                        <li>Building & evaluating basic ML models</li>
                                                        <li>Understanding data-driven decision making</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 3: OUTCOMES & CAREERS -->
                                <div class="tab-pane fade" id="dsp-tab-careers" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-trophy text-warning me-2"></i>Program Learning Outcomes</h6>
                                        <div class="p-3 bg-light rounded-3 border">
                                            <div class="row g-2 small text-dark">
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Hands-on experience with Python programming</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Exploratory Data Analysis (EDA) skills</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Experience with NumPy and Pandas</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Data visualization skills</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Machine Learning fundamentals</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Data transformation & manipulation techniques</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Exposure to SQL & Excel-based analytics</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Dashboarding and reporting awareness</div>
                                                <div class="col-md-12"><i class="fa-solid fa-check-double text-primary me-2"></i>Practical project experience & portfolio building</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-user-check text-primary me-2"></i>8 Career Opportunities</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Applied Data Scientist</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Data Analyst</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Machine Learning Engineer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>SQL Developer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Power BI Developer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Data Science Associate</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Business Intelligence Analyst</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Junior Data Analyst</div></div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-3 bg-primary-subtle rounded-3 border border-primary">
                                            <h6 class="fw-bold small text-primary mb-2"><i class="fa-solid fa-certificate me-2"></i>Certification Benefits</h6>
                                            <p class="small text-dark mb-1">Upon completion, learners receive an industry-recognized Data Science using Python Certification that can be used to:</p>
                                            <ul class="small text-dark mb-0 ps-3">
                                                <li>Demonstrate proficiency in Python and data analysis</li>
                                                <li>Showcase practical data science skills</li>
                                                <li>Improve employability</li>
                                                <li>Strengthen applications for analytics and data science roles</li>
                                                <li>Increase visibility with recruiters and employers</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 4: INSTRUCTORS & FAQS -->
                                <div class="tab-pane fade" id="dsp-tab-faqs" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-chalkboard-user text-primary me-2"></i>Meet Your Instructors</h6>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold text-dark mb-1">Dr. Rakhee Das</h6>
                                                    <p class="small text-muted mb-2">Faculty at NMIMS with more than 15 years of experience in engineering education.</p>
                                                    <p class="small text-dark mb-1"><strong>Areas of Expertise:</strong></p>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Python Programming & Machine Learning</li>
                                                        <li>Deep Learning & Academic Research</li>
                                                        <li>Curriculum Design & Technical Writing</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold text-dark mb-1">Rocky Jagtiani</h6>
                                                    <p class="small text-muted mb-2">Corporate Trainer with over 18 years of experience and more than 18,000 professionals trained.</p>
                                                    <p class="small text-dark mb-1"><strong>Areas of Expertise:</strong></p>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Python Programming & Data Science</li>
                                                        <li>Machine Learning & Artificial Intelligence</li>
                                                        <li>Databases and Analytics</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-circle-question text-primary me-2"></i>FAQ Highlights</h6>
                                        <div class="accordion" id="dspFaqsAccordion">
                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#dspFaq1">
                                                        How is Python useful for Data Science?
                                                    </button>
                                                </h2>
                                                <div id="dspFaq1" class="accordion-collapse collapse" data-bs-parent="#dspFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Python is one of the most widely used languages in data science due to its simplicity and powerful libraries such as NumPy, Pandas, and Matplotlib, which make data processing, analysis, and visualization efficient.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#dspFaq2">
                                                        Is prior Python knowledge required?
                                                    </button>
                                                </h2>
                                                <div id="dspFaq2" class="accordion-collapse collapse" data-bs-parent="#dspFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        No. The course is designed for beginners. Basic programming or statistics knowledge may be helpful but is not required.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#dspFaq3">
                                                        Will I receive a certificate?
                                                    </button>
                                                </h2>
                                                <div id="dspFaq3" class="accordion-collapse collapse" data-bs-parent="#dspFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Yes. Participants receive a certification upon successful completion of the course.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#dspFaq4">
                                                        What practical skills will I gain?
                                                    </button>
                                                </h2>
                                                <div id="dspFaq4" class="accordion-collapse collapse" data-bs-parent="#dspFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        You will learn to analyze and clean datasets, create visualizations, use Python libraries for analytics, apply machine learning concepts, and solve real-world data problems through projects and case studies.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#dspFaq5">
                                                        Are projects included?
                                                    </button>
                                                </h2>
                                                <div id="dspFaq5" class="accordion-collapse collapse" data-bs-parent="#dspFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Yes. The course includes assignments, case studies, assessments, and projects to help learners apply concepts in practical scenarios.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    return;
                }

                if (richId === 'intro_data_science') {
                    accordionContainer.innerHTML = `
                        <div class="mu-rich-course-details">
                            <!-- Top Highlights Strip -->
                            <div class="d-flex flex-wrap gap-2 mb-4">
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-regular fa-clock text-warning me-1"></i> Duration: 30 Hours</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-building-columns text-primary me-1"></i> Credits: University of Mumbai Credits</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-laptop-house text-success me-1"></i> Blended Learning</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-infinity text-info me-1"></i> Lifetime Access</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-tag text-danger me-1"></i> Fee: ₹5,000</span>
                                <span class="badge bg-light text-dark border px-3 py-2"><i class="fa-solid fa-chalkboard-user text-primary me-1"></i> Instructors: Rocky Jagtiani &amp; Ambarish Tarte</span>
                            </div>

                            <!-- Navigation Tabs -->
                            <ul class="nav nav-pills mb-4 gap-2" id="idsRichTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active rounded-pill fw-bold px-4 small" id="ids-tab-overview-btn" data-bs-toggle="pill" data-bs-target="#ids-tab-overview" type="button" role="tab">
                                        <i class="fa-solid fa-circle-info me-1"></i> Overview & Highlights
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="ids-tab-path-btn" data-bs-toggle="pill" data-bs-target="#ids-tab-path" type="button" role="tab">
                                        <i class="fa-solid fa-book-open me-1"></i> Learning Path (3 Modules)
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="ids-tab-careers-btn" data-bs-toggle="pill" data-bs-target="#ids-tab-careers" type="button" role="tab">
                                        <i class="fa-solid fa-briefcase me-1"></i> Outcomes & Careers
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link rounded-pill fw-bold px-4 small" id="ids-tab-faqs-btn" data-bs-toggle="pill" data-bs-target="#ids-tab-faqs" type="button" role="tab">
                                        <i class="fa-solid fa-circle-question me-1"></i> Instructors & FAQs
                                    </button>
                                </li>
                            </ul>

                            <!-- Tab Content -->
                            <div class="tab-content" id="idsRichTabContent">
                                <!-- TAB 1: OVERVIEW & HIGHLIGHTS -->
                                <div class="tab-pane fade show active" id="ids-tab-overview" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-bullseye text-primary me-2"></i>An NEP & NSQF Aligned Curriculum</h6>
                                        <p class="text-muted small mb-2" style="line-height: 1.65;">
                                            Learn the fundamentals of data extraction, manipulation, analysis, and visualization using Microsoft Excel and SQL. This course is designed for beginners and aspiring data professionals who want to build practical data skills and make data-driven decisions.
                                        </p>
                                        <p class="text-muted small mb-2"><strong>Core Pillars:</strong></p>
                                        <div class="d-flex flex-wrap gap-2 mb-3">
                                            <span class="badge bg-primary-subtle text-dark border">SQL &amp; Databases</span>
                                            <span class="badge bg-primary-subtle text-dark border">Microsoft Excel</span>
                                            <span class="badge bg-primary-subtle text-dark border">Advanced Excel &amp; Pivot Tables</span>
                                            <span class="badge bg-primary-subtle text-dark border">Data Visualization &amp; Charts</span>
                                            <span class="badge bg-primary-subtle text-dark border">Data Analysis &amp; Macros</span>
                                            <span class="badge bg-primary-subtle text-dark border">Practical Business Analytics</span>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-star text-warning me-2"></i>Program Highlights</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Learn in-demand skills from industry experts</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Live doubt-solving sessions</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Student mentorship & guidance</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Quizzes and practical assignments</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Exclusive job portal access</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Industry-based case studies</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-light border">
                                                    <i class="fa-solid fa-circle-check text-success me-2"></i>
                                                    <span class="small fw-semibold text-dark">Dedicated student support</span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex align-items-center p-2 rounded-3 bg-warning-subtle border border-warning">
                                                    <i class="fa-solid fa-award text-warning me-2"></i>
                                                    <span class="small fw-bold text-dark">Placement opportunities with packages starting around ₹35,000 per month</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-user-graduate text-info me-2"></i>Eligibility Criteria</h6>
                                        <div class="p-3 bg-light rounded-3 border small text-muted">
                                            <p class="mb-1 text-dark"><strong>This program is suitable for:</strong></p>
                                            <ul class="mb-0 ps-3">
                                                <li>Undergraduate students, Graduates & Postgraduates</li>
                                                <li>Individuals aspiring to build a career in Data Science or Data Analytics</li>
                                                <li>Beginners with little or no technical background</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 2: LEARNING PATH & MODULES -->
                                <div class="tab-pane fade" id="ids-tab-path" role="tabpanel">
                                    <div class="mb-3">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-layer-group text-primary me-2"></i>Comprehensive Learning Path</h6>

                                        <div class="accordion mb-4" id="idsModulesAccordion">
                                            <!-- Module 1 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#idsMod1" aria-expanded="true">
                                                        <span class="badge bg-primary me-2">Module 1</span> Data with SQL
                                                    </button>
                                                </h2>
                                                <div id="idsMod1" class="accordion-collapse collapse show" data-bs-parent="#idsModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Introduction to SQL</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Definition Language (DDL)</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Manipulation Language (DML)</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Query Language (DQL)</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Working with SQL & Database Management</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Advanced SQL Search & Filtering</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>SQL Joins (Inner, Left, Right, Full)</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Subqueries for Complex Analysis</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Module 2 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#idsMod2">
                                                        <span class="badge bg-primary me-2">Module 2</span> Introduction to Excel
                                                    </button>
                                                </h2>
                                                <div id="idsMod2" class="accordion-collapse collapse" data-bs-parent="#idsModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Excel Fundamentals & Navigation</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Manipulation & Formatting</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Arithmetic & Mathematical Functions</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Logical Functions (IF, AND, OR)</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Reference Functions (VLOOKUP, XLOOKUP, INDEX/MATCH)</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Pivot Tables & Data Summarization</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Module 3 -->
                                            <div class="accordion-item border rounded-3 mb-3 overflow-hidden">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#idsMod3">
                                                        <span class="badge bg-primary me-2">Module 3</span> Data Analysis with Excel
                                                    </button>
                                                </h2>
                                                <div id="idsMod3" class="accordion-collapse collapse" data-bs-parent="#idsModulesAccordion">
                                                    <div class="accordion-body bg-light">
                                                        <div class="row g-2 small text-dark">
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Visualization through Charts & Graphs</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Data Analysis Techniques & Trendlines</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Collaboration Features & Secure Data Sharing</div>
                                                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Task Automation with Excel Macros</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-list-check text-primary me-2"></i>What You'll Learn & Core Competencies</h6>
                                        <div class="row g-3 mb-4">
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">SQL Fundamentals</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Understanding data and databases</li>
                                                        <li>Creating & managing DB structures</li>
                                                        <li>Querying, filtering, insertion & updates</li>
                                                        <li>Database normalization & Joins</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Excel Fundamentals</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Excel interface, sorting & filtering</li>
                                                        <li>Formula creation & advanced lookups</li>
                                                        <li>Mathematical, logical & reference functions</li>
                                                        <li>Pivot Tables & chart visualizations</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold small text-dark mb-2">Data Analysis Skills</h6>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Identifying trends & sparklines</li>
                                                        <li>Scenario Manager & Goal Seek</li>
                                                        <li>Automating repetitive tasks with macros</li>
                                                        <li>Real-world business case analytics</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="p-3 bg-primary-subtle rounded-3 border border-primary">
                                            <h6 class="fw-bold small text-primary mb-1"><i class="fa-solid fa-briefcase me-2"></i>Practical Application & Case Study</h6>
                                            <p class="small text-dark mb-1">The course includes a real-world case study focused on:</p>
                                            <div class="row g-2 small text-dark mb-0">
                                                <div class="col-md-6"><i class="fa-solid fa-circle-check text-primary me-2"></i>Data analysis & attendance tracking</div>
                                                <div class="col-md-6"><i class="fa-solid fa-circle-check text-primary me-2"></i>Business problem solving & project work</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 3: OUTCOMES & CAREERS -->
                                <div class="tab-pane fade" id="ids-tab-careers" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-2"><i class="fa-solid fa-trophy text-warning me-2"></i>Program Learning Outcomes</h6>
                                        <div class="p-3 bg-light rounded-3 border">
                                            <div class="row g-2 small text-dark">
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>SQL and database concepts</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Excel and Advanced Excel mastery</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Data analysis techniques</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Exploratory Data Analysis (EDA)</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Dashboard creation using Power BI</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Data transformation & loading using Pandas</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Machine Learning fundamentals</div>
                                                <div class="col-md-6"><i class="fa-solid fa-check-double text-primary me-2"></i>Supervised & Unsupervised Learning concepts</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-user-check text-primary me-2"></i>8 Entry-Level Career Opportunities</h6>
                                        <div class="row g-2">
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Data Analyst</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Business Analyst Trainee</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>SQL Developer</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Reporting Analyst</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>MIS Executive</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Power BI Developer (Junior)</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Data Science Associate</div></div>
                                            <div class="col-md-6"><div class="p-2 border rounded-2 bg-light small fw-semibold text-dark"><i class="fa-solid fa-check-circle text-primary me-2"></i>Analytics Associate</div></div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-3 bg-primary-subtle rounded-3 border border-primary">
                                            <h6 class="fw-bold small text-primary mb-2"><i class="fa-solid fa-certificate me-2"></i>Certification Benefits</h6>
                                            <p class="small text-dark mb-1">Upon successful completion, participants receive an industry-recognized Introduction to Data Science Certification that can be used to:</p>
                                            <ul class="small text-dark mb-0 ps-3">
                                                <li>Demonstrate Excel and SQL proficiency</li>
                                                <li>Showcase practical data analysis skills</li>
                                                <li>Strengthen resumes and job applications</li>
                                                <li>Improve visibility with recruiters seeking entry-level analytics talent</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- TAB 4: INSTRUCTORS & FAQS -->
                                <div class="tab-pane fade" id="ids-tab-faqs" role="tabpanel">
                                    <div class="mb-4">
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-chalkboard-user text-primary me-2"></i>Meet Your Instructors</h6>
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold text-dark mb-1">Rocky Jagtiani</h6>
                                                    <p class="small text-muted mb-2">Corporate Trainer with more than 18 years of experience and over 18,000 professionals trained.</p>
                                                    <p class="small text-dark mb-1"><strong>Areas of Expertise:</strong></p>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Core Programming & Python</li>
                                                        <li>Data Science, ML & Artificial Intelligence</li>
                                                        <li>Databases and Analytics</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="p-3 bg-light rounded-3 border h-100">
                                                    <h6 class="fw-bold text-dark mb-1">Ambarish Tarte</h6>
                                                    <p class="small text-muted mb-2">Microsoft Business Partner with over 15 years of experience helping organizations improve productivity.</p>
                                                    <p class="small text-dark mb-1"><strong>Areas of Expertise:</strong></p>
                                                    <ul class="small text-muted mb-0 ps-3">
                                                        <li>Microsoft Excel & Advanced Excel</li>
                                                        <li>Data Manipulation & Visualization</li>
                                                        <li>Practical Hands-on Corporate Training</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <h6 class="fw-bold text-dark mb-3"><i class="fa-solid fa-circle-question text-primary me-2"></i>FAQ Highlights</h6>
                                        <div class="accordion" id="idsFaqsAccordion">
                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#idsFaq1">
                                                        What is Introduction to Data Science?
                                                    </button>
                                                </h2>
                                                <div id="idsFaq1" class="accordion-collapse collapse" data-bs-parent="#idsFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        A foundational course that teaches data analysis, manipulation, and visualization skills using Excel and SQL.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#idsFaq2">
                                                        What tools are covered?
                                                    </button>
                                                </h2>
                                                <div id="idsFaq2" class="accordion-collapse collapse" data-bs-parent="#idsFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        The course primarily focuses on Microsoft Excel, Advanced Excel, and SQL Databases, with exposure to broader data analytics concepts.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#idsFaq3">
                                                        Do I need prior programming knowledge?
                                                    </button>
                                                </h2>
                                                <div id="idsFaq3" class="accordion-collapse collapse" data-bs-parent="#idsFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        No. The course is designed for beginners and requires only basic computer skills.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#idsFaq4">
                                                        Can I apply these skills in real jobs?
                                                    </button>
                                                </h2>
                                                <div id="idsFaq4" class="accordion-collapse collapse" data-bs-parent="#idsFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        Yes. The Excel, SQL, reporting, and data analysis skills taught in the course are commonly used across business, finance, operations, HR, and analytics roles.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="accordion-item border rounded-3 mb-2">
                                                <h2 class="accordion-header">
                                                    <button class="accordion-button collapsed fw-bold small text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#idsFaq5">
                                                        Do I need a powerful computer?
                                                    </button>
                                                </h2>
                                                <div id="idsFaq5" class="accordion-collapse collapse" data-bs-parent="#idsFaqsAccordion">
                                                    <div class="accordion-body small text-muted">
                                                        No. Standard hardware is sufficient to run Excel and SQL applications required for the course.
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    return;
                }

                try {
                    const syllabusList = JSON.parse(syllabusRaw);
                    syllabusList.forEach((item, index) => {
                        const parts = item.split(': ');
                        const modHeading = parts[0] || ('Module ' + (index + 1));
                        const modBody = parts.slice(1).join(': ') || item;

                        const accId = 'syllabusAcc_' + index;
                        const itemHtml = `
                            <div class="accordion-item border rounded-3 mb-2 overflow-hidden">
                                <h2 class="accordion-header">
                                    <button class="accordion-button ${index === 0 ? '' : 'collapsed'}" type="button" data-bs-toggle="collapse" data-bs-target="#${accId}">
                                        <i class="fa-solid fa-circle-check text-success me-2"></i> ${modHeading}: ${modBody}
                                    </button>
                                </h2>
                                <div id="${accId}" class="accordion-collapse collapse ${index === 0 ? 'show' : ''}" data-bs-parent="#modalSyllabusAccordion">
                                    <div class="accordion-body text-muted small">
                                        Comprehensive coverage of ${modBody} with hands-on practice, case studies, assessment checkpoints, and University of Mumbai academic credit validation.
                                    </div>
                                </div>
                            </div>
                        `;
                        accordionContainer.insertAdjacentHTML('beforeend', itemHtml);
                    });
                } catch (e) {
                    accordionContainer.innerHTML = '<p class="text-muted small">Syllabus details available upon inquiry.</p>';
                }
            });
        });
    });
    </script>

    <!-- ══════════════ CAP INFOGRAPHIC SECTION (COMPACT HORIZONTAL PROCESS) ══════════════ -->
    <section class="mu-cap-section">
        <div class="mu-cap-bg-glow glow-1"></div>
        <div class="mu-cap-bg-glow glow-2"></div>

        <div class="container position-relative z-1">
            <div class="row justify-content-center text-center mb-4">
                <div class="col-lg-8" data-aos="fade-up">
                    <h2 class="mu-cap-title mb-1">
                        Bridge the skill <span class="mu-gap-word">GAP</span> with <span class="mu-cap-word">CAP!</span>
                    </h2>
                    <p class="mu-cap-subtitle mb-0">
                        Our structured 3-step learning methodology for career-ready mastery.
                    </p>
                </div>
            </div>

            <!-- Compact Infographic Process Strip -->
            <div class="row g-3 align-items-stretch">
                <!-- Step 1: C -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="mu-cap-compact-card theme-c">
                        <div class="mu-cap-letter-badge">
                            <span>C</span>
                        </div>
                        <div class="mu-cap-content">
                            <span class="mu-cap-step-tag">STEP 01 • ENGAGING LEARNING</span>
                            <h3 class="mu-cap-title-sm">
                                <i class="fa-solid fa-circle-play me-1 text-warning"></i> Conceptual Videos
                            </h3>
                            <p class="mu-cap-desc-sm">
                                Understand core concepts through engaging visual modules, anywhere anytime
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Step 2: A -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="mu-cap-compact-card theme-a">
                        <div class="mu-cap-letter-badge">
                            <span>A</span>
                        </div>
                        <div class="mu-cap-content">
                            <span class="mu-cap-step-tag">STEP 02 • PRACTICE</span>
                            <h3 class="mu-cap-title-sm">
                                <i class="fa-solid fa-laptop-code me-1 text-success"></i> Applications & Assessments
                            </h3>
                            <p class="mu-cap-desc-sm">
                                Get the hands-on experience for the concept you have learnt
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Step 3: P -->
                <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="mu-cap-compact-card theme-p">
                        <div class="mu-cap-letter-badge">
                            <span>P</span>
                        </div>
                        <div class="mu-cap-content">
                            <span class="mu-cap-step-tag">STEP 03 • CAPSTONE MASTERY</span>
                            <h3 class="mu-cap-title-sm">
                                <i class="fa-solid fa-diagram-project me-1 text-info"></i> Projects
                            </h3>
                            <p class="mu-cap-desc-sm">
                                Our team of experts will work with you to help you build professional-grade capstone
                                projects in live classes.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ BENEFITS WITH HUNARHO ══════════════ -->
    <section class="mu-benefits-infographic">
        <div class="container position-relative z-1">
            <!-- Section Header -->
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="mu-info-badge mb-2">
                    <i class="fa-solid fa-sparkles"></i> ALL-IN-ONE ECOSYSTEM
                </span>
                <h2 class="mu-info-main-title">
                    Benefits with <br class="d-md-none">
                    <span class="mu-brand-grad">
                        <i class="fa-solid fa-graduation-cap mu-title-cap"></i>Hunarho
                    </span>
                </h2>
            </div>

            <!-- Infographic Image Container -->
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-10 text-center" data-aos="fade-up" data-aos-delay="100">
                    <img loading="lazy" src="/assets/images/info1.webp" alt="Benefits with Hunarho Infographic"
                        class="img-fluid mu-info-img mx-auto d-block">
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ CREATIVE CALL TO ACTION (CTA) SECTION ══════════════ -->
    <section class="mu-cta-section py-5">
        <div class="container position-relative z-1">
            <div class="mu-cta-banner" data-aos="zoom-in" data-aos-duration="800">
                <!-- Background Glowing Orbs -->
                <div class="mu-cta-orb orb-1"></div>
                <div class="mu-cta-orb orb-2"></div>
                <div class="mu-cta-orb orb-3"></div>

                <div class="row align-items-center g-4 position-relative z-2">
                    <!-- Left Side: Tagline & Content -->
                    <div class="col-lg-7 text-center text-lg-start">
                        <div class="mu-cta-badge mb-3">
                            <i class="fa-solid fa-crown text-warning me-1"></i> EMPOWERING INDIA'S FUTURE
                        </div>

                        <!-- Main Hindi Tagline -->
                        <h2 class="mu-cta-tagline mb-3">
                            “Hunar <span class="hindi-word">है toh</span> कदर <span class="hindi-word">है !</span>”
                        </h2>

                        <!-- Subtitle -->
                        <p class="mu-cta-desc mb-4">
                            Bridge the gap between academic degrees and real-world career success. Join thousands of ambitious Indian students building job-ready skills, certified degrees, and a secure professional future with Hunarho.
                        </p>

                        <!-- Action Buttons -->
                        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start gap-3">
                            <a href="contact" class="mu-cta-btn-primary">
                                Enroll Now & Transform Your Career <i class="fa-solid fa-arrow-right-long ms-2"></i>
                            </a>
                            <a href="#counseling" class="mu-cta-btn-outline">
                                <i class="fa-solid fa-headset me-2"></i> Free Career Counseling
                            </a>
                        </div>

                        <!-- Trust Highlights below CTA -->
                        <div class="mu-cta-trust mt-4 pt-3 d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start gap-4">
                            <div class="mu-trust-item">
                                <i class="fa-solid fa-check-circle text-warning"></i>
                                <span>Govt. & University Recognized</span>
                            </div>
                            <div class="mu-trust-item">
                                <i class="fa-solid fa-check-circle text-warning"></i>
                                <span>AI-Driven Placement Assist</span>
                            </div>
                            <div class="mu-trust-item">
                                <i class="fa-solid fa-check-circle text-warning"></i>
                                <span>100% Practical Skills</span>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side: Indian Students Showcase Collage -->
                    <div class="col-lg-5">
                        <div class="mu-cta-visual position-relative">
                            <!-- Main Student Photo Frame -->
                            <div class="mu-cta-img-frame">
                                <img loading="lazy" src="/assets/images/external/college-students.webp" alt="Indian College Students" class="img-fluid mu-cta-main-img">
                            </div>

                            <!-- Floating Glass Badge 1: Top Right -->
                            <div class="mu-cta-float-badge float-badge-top">
                                <div class="badge-icon bg-warning text-dark">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                </div>
                                <div class="badge-text">
                                    <strong>1,00,000+</strong>
                                    <span>Students Empowered</span>
                                </div>
                            </div>

                            <!-- Floating Glass Badge 2: Bottom Left -->
                            <div class="mu-cta-float-badge float-badge-bottom">
                                <div class="badge-icon bg-success text-white">
                                    <i class="fa-solid fa-award"></i>
                                </div>
                                <div class="badge-text">
                                    <strong>Top Package</strong>
                                    <span>Career Readiness</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ HUNAR-FUL REVIEWS MARQUEE SECTION ══════════════ -->
    <section class="mu-reviews-section">
        <div class="container position-relative z-2 mb-5 text-center" data-aos="fade-up">
            <span class="mu-review-badge mb-3">
                <i class="fa-solid fa-star text-warning"></i> VERIFIED LEARNER SUCCESS
            </span>
            <h2 class="mu-review-main-title mb-2">
                <span class="grad-text">Hunar-ful</span> reviews from our learners!
            </h2>
            <p class="text-light-muted mx-auto mb-0" style="max-width: 620px; font-size: 0.95rem;">
                See how our University of Mumbai accredited programs and practical learning ecosystem have transformed careers across top corporations.
            </p>
        </div>

        <!-- Continuous Infinite Marquee Wrap -->
        <div class="mu-marquee-wrap">
            <div class="mu-marquee-track">
                <!-- Review 1 -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “Hunarho.com has helped our employees learn new skills and develop their careers. The courses are well organized and the instructors are knowledgeable.”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-1">HW</div>
                        <div class="mu-reviewer-info">
                            <h4>Hemant Walhe <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Quantic Web Technologies Private Limited</p>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “Knowledgeable and Approachable trainers of hunarho.com have enhanced the skills of our employees and in turn our organization. Courses at hunarho are comprehensive and well structured thereby helping learners to shape up their career path.”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-2">KD</div>
                        <div class="mu-reviewer-info">
                            <h4>Kunal Dhuvad <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Spacebucks Advisory Private Limited</p>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “I am thrilled with the exceptional online course from Hunarho! The content is engaging, well-structured, and delivered with clarity. The interactive approach and expert guidance make learning enjoyable and effective. Highly recommended!”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-3">SS</div>
                        <div class="mu-reviewer-info">
                            <h4>Sunny Shahi <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Fresher</p>
                        </div>
                    </div>
                </div>

                <!-- Review 4 -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “Hunarho's Full Stack online course exceeded my expectations! The comprehensive curriculum, engaging instructors, and hands-on projects provided an exceptional learning experience. I highly recommend it to anyone aspiring to master Full Stack development.”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-4">SD</div>
                        <div class="mu-reviewer-info">
                            <h4>Sonali Deshmukh <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Tech Mahindra</p>
                        </div>
                    </div>
                </div>

                <!-- Review 5 -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “My expectations were surpassed by the Hunarho online Wealth Manager course! It gave me a thorough understanding of wealth management techniques and resources. Anyone looking to gain financial experience should not miss it.”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-5">PG</div>
                        <div class="mu-reviewer-info">
                            <h4>Pawan Gaikar <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Kotak Mahindra Bank</p>
                        </div>
                    </div>
                </div>

                <!-- Review 6 -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “Hunarho's outstanding online course on how to become a retail banker has my sincere gratitude. The programme gave me essential skills and insights through its extensive courses and expert coaching. Strongly advised!”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-6">SU</div>
                        <div class="mu-reviewer-info">
                            <h4>Sapna Uprari <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>HDFC Bank</p>
                        </div>
                    </div>
                </div>

                <!-- DUPLICATE SET FOR SEAMLESS INFINITE MARQUEE LOOP -->
                <!-- Review 1 (Copy) -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “Hunarho.com has helped our employees learn new skills and develop their careers. The courses are well organized and the instructors are knowledgeable.”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-1">HW</div>
                        <div class="mu-reviewer-info">
                            <h4>Hemant Walhe <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Quantic Web Technologies Private Limited</p>
                        </div>
                    </div>
                </div>

                <!-- Review 2 (Copy) -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “Knowledgeable and Approachable trainers of hunarho.com have enhanced the skills of our employees and in turn our organization. Courses at hunarho are comprehensive and well structured thereby helping learners to shape up their career path.”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-2">KD</div>
                        <div class="mu-reviewer-info">
                            <h4>Kunal Dhuvad <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Spacebucks Advisory Private Limited</p>
                        </div>
                    </div>
                </div>

                <!-- Review 3 (Copy) -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “I am thrilled with the exceptional online course from Hunarho! The content is engaging, well-structured, and delivered with clarity. The interactive approach and expert guidance make learning enjoyable and effective. Highly recommended!”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-3">SS</div>
                        <div class="mu-reviewer-info">
                            <h4>Sunny Shahi <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Fresher</p>
                        </div>
                    </div>
                </div>

                <!-- Review 4 (Copy) -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “Hunarho's Full Stack online course exceeded my expectations! The comprehensive curriculum, engaging instructors, and hands-on projects provided an exceptional learning experience. I highly recommend it to anyone aspiring to master Full Stack development.”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-4">SD</div>
                        <div class="mu-reviewer-info">
                            <h4>Sonali Deshmukh <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Tech Mahindra</p>
                        </div>
                    </div>
                </div>

                <!-- Review 5 (Copy) -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “My expectations were surpassed by the Hunarho online Wealth Manager course! It gave me a thorough understanding of wealth management techniques and resources. Anyone looking to gain financial experience should not miss it.”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-5">PG</div>
                        <div class="mu-reviewer-info">
                            <h4>Pawan Gaikar <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>Kotak Mahindra Bank</p>
                        </div>
                    </div>
                </div>

                <!-- Review 6 (Copy) -->
                <div class="mu-review-card">
                    <div>
                        <div class="mu-review-stars">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                        </div>
                        <p class="mu-review-text">
                            “Hunarho's outstanding online course on how to become a retail banker has my sincere gratitude. The programme gave me essential skills and insights through its extensive courses and expert coaching. Strongly advised!”
                        </p>
                    </div>
                    <div class="mu-reviewer-foot">
                        <div class="mu-reviewer-avatar av-grad-6">SU</div>
                        <div class="mu-reviewer-info">
                            <h4>Sapna Uprari <i class="fa-solid fa-circle-check text-info"></i></h4>
                            <p>HDFC Bank</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require __DIR__ . '/../includes/footer.php';
