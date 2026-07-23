<?php
$pageTitle = 'AI-Powered Student LMS | Hunarho Learning Solutions';
$pageDescription = "A complete learning management system for schools and colleges — video lessons, quizzes, attendance, certificates, and AI-powered placement tools, all in one dashboard.";
$activePage = 'student-lms';
$demoInterest = 'LMS';
$extraCss = ['student-lms.css?v=4.0'];
require __DIR__ . '/includes/header.php';
?>

<!-- ══════════════ HERO/HEADER SECTION (CENTERED DESIGN) ══════════════ -->
<header class="lms-hero position-relative overflow-hidden">
   
    
   
    
    <div class="container position-relative z-3 text-center">
        <!-- Top Subheading/Badge -->
        <span class="lms-badge-top mb-3" data-aos="fade-down" data-aos-delay="100">
            The Best For Online Education
        </span>
        
        <!-- Main Centered Heading -->
        <h1 class="lms-hero-title mb-4 text-white" data-aos="fade-up" data-aos-delay="200">
            AI-Powered Learning Management System for the Future of Education
        </h1>
        
        <!-- Subheading Description -->
        <p class="lms-hero-subtitle mb-4 text-center mx-auto" data-aos="fade-up" data-aos-delay="300">
            A complete learning management system for schools and colleges — video lessons, quizzes, attendance, certificates, and AI-powered placement tools, all in one dashboard.
        </p>
      
        
        <!-- Centered Block CTA Button -->
        <div class="lms-cta-container mb-0" data-aos="fade-up" data-aos-delay="400">
            <a href="contact.php" class="btn btn-lms-gold px-5 py-3" id="lms-hero-btn-demo">
                Book a Demo
            </a>
        </div>
    </div>
</header>

<!-- Showcase Container outside header, pulling up with negative margin -->
<section class="lms-showcase-section position-relative bg-white">
    <div class="container text-center">
        <div class="lms-showcase-container" data-aos="fade-up" data-aos-delay="500">
            <img src="assets/images/img2.webp" alt="Student LMS Dashboard Showcase" class="img-fluid lms-showcase-img">
        </div>
    </div>
</section>

<!-- Marquee Section -->
<section class="lms-marquee-section">
    <div class="lms-marquee-container">
        <!-- Content repeated twice for seamless scrolling -->
        <div class="lms-marquee-content">
            <span class="marquee-item solid">100% CLOUD-BASED</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item outline">MULTI-INSTITUTE READY</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item solid">AI-POWERED TOOLS</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item outline">MOBILE RESPONSIVE</span>
            <span class="marquee-star">✦</span>
            
            <span class="marquee-item solid">100% CLOUD-BASED</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item outline">MULTI-INSTITUTE READY</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item solid">AI-POWERED TOOLS</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item outline">MOBILE RESPONSIVE</span>
            <span class="marquee-star">✦</span>
        </div>
        <div class="lms-marquee-content">
            <span class="marquee-item solid">100% CLOUD-BASED</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item outline">MULTI-INSTITUTE READY</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item solid">AI-POWERED TOOLS</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item outline">MOBILE RESPONSIVE</span>
            <span class="marquee-star">✦</span>
            
            <span class="marquee-item solid">100% CLOUD-BASED</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item outline">MULTI-INSTITUTE READY</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item solid">AI-POWERED TOOLS</span>
            <span class="marquee-star">✦</span>
            <span class="marquee-item outline">MOBILE RESPONSIVE</span>
            <span class="marquee-star">✦</span>
        </div>
    </div>
</section>

<!-- Platform Features Section -->
<section class="lms-features-section bg-white" id="features">
    <div class="container pt-5 pb-4">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <!-- Premium Pill Badge -->
                <div class="d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill mb-4 lms-features-badge-container">
                    <span class="d-flex align-items-center justify-content-center rounded-circle shadow-sm lms-features-badge-icon">
                        <i class="fa-solid fa-layer-group"></i>
                    </span>
                    <span class="text-uppercase fw-bold lms-features-badge-text">Platform Features</span>
                </div>
                
                <!-- Dynamic Heading -->
                <h2 class="fw-bolder mb-2 lms-features-heading">
                    Discover our powerful 
                    <span class="lms-features-heading-highlight">
                        LMS Features.
                    </span>
                </h2>
                
                <!-- Subtitle -->
                <p class="fw-medium mx-auto mb-0 lms-features-subtitle">
                    Every part of the student journey — sign-in, learning, performance and placement — lives inside one unified, intelligent platform.
                </p>
            </div>
        </div>
    </div>

    <!-- Swiper Full Width -->
    <div class="swiper lms-vertical-features-swiper w-100">
        <div class="swiper-wrapper">            <!-- Slide 01 -->
            <div class="swiper-slide bg-white d-flex align-items-center py-5">
                <div class="container">
                    <div class="row align-items-center feature-row w-100 m-0">
                        <div class="col-lg-5 mt-4 mt-lg-0 feature-text-col position-relative">
                            <span class="feature-number">— Feature 01</span>
                            <h3 class="feature-title mt-2 mb-4 fw-bold">AI-Powered Learning & Placement</h3>
                            
                            <div class="feature-list" style="max-height: 55vh; overflow-y: auto; padding-right: 15px;">
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-comments"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">AI Debate System</h5>
                                        <p class="small text-muted mb-0">Practice communication and critical thinking with topic-based debates and real-time AI feedback on confidence, clarity and argument quality.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-user-tie"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">AI Interview Practice</h5>
                                        <p class="small text-muted mb-0">Mock interview simulations for technical and HR rounds, with voice/text support, scoring and interview history.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-brain"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Aptitude & Placement Preparation</h5>
                                        <p class="small text-muted mb-0">Quantitative aptitude, logical reasoning, verbal ability, topic-wise and company-specific question banks, plus timed mock tests.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-file-signature"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">AI Resume Builder</h5>
                                        <p class="small text-muted mb-0">Professional, ATS-friendly resumes in minutes with AI suggestions for skills, projects and achievements, exportable as PDF.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-briefcase"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Simplified Job Portal</h5>
                                        <p class="small text-muted mb-0">Resume repository, job/internship listings, direct applications, status tracking, and campus recruitment support.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-0">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-route"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Placement & Career Management</h5>
                                        <p class="small text-muted mb-0">Placement eligibility tracking, company-wise statistics, skill gap analysis, and campus drive scheduling.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <div class="feature-img-wrapper right-align">
                                <div class="feature-img-backdrop"></div>
                                <img src="assets/images/studentlms/feature1/10.webp" alt="AI & Placement" class="img-fluid position-relative z-index-2 rounded-4 shadow" onerror="this.src='assets/images/studentlms/img1.webp'">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 02 -->
            <div class="swiper-slide d-flex align-items-center py-5" style="background-color: #f8f6ff;">
                <div class="container">
                    <div class="row align-items-center feature-row w-100 m-0">
                        <div class="col-lg-5 mt-4 mt-lg-0 feature-text-col position-relative">
                            <span class="feature-number">— Feature 02</span>
                            <h3 class="feature-title mt-2 mb-4 fw-bold">Secure Authentication & Smart Dashboard</h3>
                            
                            <div class="feature-list" style="max-height: 55vh; overflow-y: auto; padding-right: 15px;">
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-lock"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Secure Authentication</h5>
                                        <p class="small text-muted mb-0">Secure sign-in with role-based access and separate login portals for Admin, School, College, Teacher, and Students.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-chart-pie"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">School, College & Teacher Dashboard</h5>
                                        <p class="small text-muted mb-0">Real-time analytics, student activity overview, attendance and learning time insights, course completion stats, and performance trends.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-user-graduate"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Student Management</h5>
                                        <p class="small text-muted mb-0">Student profile management, bulk import via Excel/CSV, batch and class allocation, enrollment and license tracking.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-book-open"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Course Management</h5>
                                        <p class="small text-muted mb-0">Create and organize programs, chapters and topics; assign to students or batches; track progress and completion.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-0">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-building-columns"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Multi-Institute Support</h5>
                                        <p class="small text-muted mb-0">Separate dashboards per institute, role-based permissions, and centralized management across schools, colleges and training organizations.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <div class="feature-img-wrapper right-align">
                                <div class="feature-img-backdrop"></div>
                                <div class="device-frame position-relative z-index-2 shadow-lg">
                                    <div class="device-header">
                                        <span class="dot red"></span>
                                        <span class="dot yellow"></span>
                                        <span class="dot green"></span>
                                    </div>
                                    <div class="device-screen">
                                        <div class="swiper feature2-nested-swiper w-100">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature2/1.webp" class="img-fluid w-100" alt="Dashboard 1" ></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature2/2.webp" class="img-fluid w-100" alt="Dashboard 2" ></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature2/3.webp" class="img-fluid w-100" alt="Dashboard 3" ></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature2/4.webp" class="img-fluid w-100" alt="Dashboard 4" ></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature2/5.webp" class="img-fluid w-100" alt="Dashboard 5" ></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature2/7.webp" class="img-fluid w-100" alt="Dashboard 6" ></div>
                                            </div>
                                            <div class="swiper-pagination nested-pagination pb-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 03 -->
            <div class="swiper-slide bg-white d-flex align-items-center py-5">
                <div class="container">
                    <div class="row align-items-center feature-row w-100 m-0">
                        <div class="col-lg-5 mt-4 mt-lg-0 feature-text-col position-relative">
                            <span class="feature-number">— Feature 03</span>
                            <h3 class="feature-title mt-2 mb-4 fw-bold">Learning Experience</h3>
                            
                            <div class="feature-list" style="max-height: 55vh; overflow-y: auto; padding-right: 15px;">
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-regular fa-circle-play"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Interactive Video Learning</h5>
                                        <p class="small text-muted mb-0">Smooth in-platform video lessons with automatic completion tracking based on watch time, plus downloadable notes, PDFs and assignments.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-rotate"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Self-Paced and Live Learning</h5>
                                        <p class="small text-muted mb-0">Learn anytime, anywhere — resume where you left off, with flexible schedules and a mobile-friendly experience.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-list-check"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Interactive Quiz Experience</h5>
                                        <p class="small text-muted mb-0">Sequential navigation, real-time progress tracking, instant evaluation, and multiple question types (MCQ, True/False, Fill in the Blanks, Descriptive).</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-0">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-clock-rotate-left"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Attendance & Learning Time Tracking</h5>
                                        <p class="small text-muted mb-0">Automatic daily attendance on first login, active learning time monitoring, and daily/weekly/monthly usage analytics.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <div class="feature-img-wrapper right-align">
                                <div class="feature-img-backdrop"></div>
                                <div class="device-frame position-relative z-index-2 shadow-lg">
                                    <div class="device-header">
                                        <span class="dot red"></span>
                                        <span class="dot yellow"></span>
                                        <span class="dot green"></span>
                                    </div>
                                    <div class="device-screen">
                                        <div class="swiper feature3-nested-swiper w-100">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature3/2.webp" class="img-fluid w-100" alt="Learning 1"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature3/3.webp" class="img-fluid w-100" alt="Learning 2"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature3/4.webp" class="img-fluid w-100" alt="Learning 3"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature3/6.webp" class="img-fluid w-100" alt="Learning 4"></div>
                                            </div>
                                            <div class="swiper-pagination nested-pagination pb-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 04 -->
            <div class="swiper-slide d-flex align-items-center py-5" style="background-color: #f8f6ff;">
                <div class="container">
                    <div class="row align-items-center feature-row w-100 m-0">
                        <div class="col-lg-5 mt-4 mt-lg-0 feature-text-col position-relative">
                            <span class="feature-number">— Feature 04</span>
                            <h3 class="feature-title mt-2 mb-4 fw-bold">Performance & Program Management</h3>
                            
                            <div class="feature-list" style="max-height: 55vh; overflow-y: auto; padding-right: 15px;">
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-chart-line"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Performance Tracking</h5>
                                        <p class="small text-muted mb-0">Dynamic real-time ranking, video and quiz completion monitoring, score percentage analysis, and performance comparison graphs.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-diagram-project"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Program Management</h5>
                                        <p class="small text-muted mb-0">Assign programs to students and batches with license usage tracking, bulk student import, and complete program overviews.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-file-lines"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Student Progress Reports</h5>
                                        <p class="small text-muted mb-0">Course-wise, video, quiz, attendance and learning time reports — exportable in Excel and PDF formats.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-0">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-award"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Certificates & Achievements</h5>
                                        <p class="small text-muted mb-0">Auto-generated certificates upon course completion, marksheet generation.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <div class="feature-img-wrapper right-align">
                                <div class="feature-img-backdrop"></div>
                                <div class="device-frame position-relative z-index-2 shadow-lg">
                                    <div class="device-header">
                                        <span class="dot red"></span>
                                        <span class="dot yellow"></span>
                                        <span class="dot green"></span>
                                    </div>
                                    <div class="device-screen">
                                        <div class="swiper feature4-nested-swiper w-100">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature4/f1.webp" class="img-fluid w-100" alt="Performance 1"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature4/f2.webp" class="img-fluid w-100" alt="Performance 2"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature4/f3.webp" class="img-fluid w-100" alt="Performance 3"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature4/f4.webp" class="img-fluid w-100" alt="Performance 4"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature4/f5.webp" class="img-fluid w-100" alt="Performance 5"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature4/f6.webp" class="img-fluid w-100" alt="Performance 6"></div>
                                            </div>
                                            <div class="swiper-pagination nested-pagination pb-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 05 -->
            <div class="swiper-slide bg-white d-flex align-items-center py-5">
                <div class="container">
                    <div class="row align-items-center feature-row w-100 m-0">
                        <div class="col-lg-5 mt-4 mt-lg-0 feature-text-col position-relative">
                            <span class="feature-number">— Feature 05</span>
                            <h3 class="feature-title mt-2 mb-4 fw-bold">Assignments, Batches & Communication</h3>
                            
                            <div class="feature-list" style="max-height: 55vh; overflow-y: auto; padding-right: 15px;">
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-regular fa-clipboard"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Assignment & Assessment Management</h5>
                                        <p class="small text-muted mb-0">File-upload submissions, manual evaluation, rubric-based grading, and feedback & remarks management.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-bell"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Notifications & Announcements</h5>
                                        <p class="small text-muted mb-0">Single and bulk notifications, important announcements, assignment reminders, and email notifications.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-users-rectangle"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Batch & Class Management</h5>
                                        <p class="small text-muted mb-0">Create and manage batches and sections, assign teachers, and manage academic sessions and classes.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-3">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-calendar-days"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Batch Schedule Generator</h5>
                                        <p class="small text-muted mb-0">Generate and manage class schedules, view upcoming classes, and upload/play session recordings.</p>
                                    </div>
                                </div>
                                <div class="feature-item d-flex align-items-start mb-0">
                                    <div class="fi-icon me-3"><i class="fa-solid fa-mobile-screen"></i></div>
                                    <div class="fi-text">
                                        <h5 class="fw-bold fs-6 mb-1">Mobile Responsive Learning</h5>
                                        <p class="small text-muted mb-0">Access the LMS from desktop, tablet, and mobile browsers — continue learning anytime, anywhere.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 offset-lg-1">
                            <div class="feature-img-wrapper right-align">
                                <div class="feature-img-backdrop"></div>
                                <div class="device-frame position-relative z-index-2 shadow-lg">
                                    <div class="device-header">
                                        <span class="dot red"></span>
                                        <span class="dot yellow"></span>
                                        <span class="dot green"></span>
                                    </div>
                                    <div class="device-screen">
                                        <div class="swiper feature5-nested-swiper w-100">
                                            <div class="swiper-wrapper">
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature5/f1.webp" class="img-fluid w-100" alt="Batches 1"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature5/f2.webp" class="img-fluid w-100" alt="Batches 2"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature5/f3.webp" class="img-fluid w-100" alt="Batches 3"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature5/f4.webp" class="img-fluid w-100" alt="Batches 4"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature5/f5.webp" class="img-fluid w-100" alt="Batches 5"></div>
                                                <div class="swiper-slide"><img src="assets/images/studentlms/feature5/f6.webp" class="img-fluid w-100" alt="Batches 6"></div>
                                            </div>
                                            <div class="swiper-pagination nested-pagination pb-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- How It Works Section -->
<section class="how-it-works-section bg-white pt-2 pb-2" id="how-it-works">
    <div class="container py-4">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bolder mb-2 lms-features-heading">How It Works</h2>
            <p class="fw-medium mx-auto mb-0 lms-features-subtitle">From learning to career success in 7 simple steps</p>
        </div>

        <!-- 7-Step Timeline -->
        <div class="position-relative timeline-container mb-5 pb-4" data-aos="fade-up" data-aos-delay="100">
            <div class="timeline-line"></div>
            <div class="row text-center timeline-row flex-nowrap overflow-auto hide-scrollbar">
                
                <!-- Step 1 -->
                <div class="col timeline-step px-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="timeline-icon-box mx-auto mb-3 shadow-sm bg-white">
                        <i class="fa-solid fa-user-plus text-primary fs-3" style="color: #6c5ce7 !important;"></i>
                    </div>
                    <div class="timeline-number fw-bold mb-1" style="color: #6c5ce7;">01</div>
                    <h6 class="fw-bold timeline-title">Login & Access<br>Dashboard</h6>
                </div>

                <!-- Step 2 -->
                <div class="col timeline-step px-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="timeline-icon-box mx-auto mb-3 shadow-sm bg-white">
                        <i class="fa-solid fa-circle-play text-primary fs-3" style="color: #6c5ce7 !important;"></i>
                    </div>
                    <div class="timeline-number fw-bold mb-1" style="color: #6c5ce7;">02</div>
                    <h6 class="fw-bold timeline-title">Learn Through Videos,<br>Notes & Live Sessions</h6>
                </div>

                <!-- Step 3 -->
                <div class="col timeline-step px-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="timeline-icon-box mx-auto mb-3 shadow-sm bg-white">
                        <i class="fa-solid fa-clipboard-list text-warning fs-3"></i>
                    </div>
                    <div class="timeline-number text-warning fw-bold mb-1">03</div>
                    <h6 class="fw-bold timeline-title">Complete Quizzes<br>& Assignments</h6>
                </div>

                <!-- Step 4 -->
                <div class="col timeline-step px-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="timeline-icon-box mx-auto mb-3 shadow-sm bg-white">
                        <i class="fa-solid fa-chart-line text-primary fs-3" style="color: #6c5ce7 !important;"></i>
                    </div>
                    <div class="timeline-number fw-bold mb-1" style="color: #6c5ce7;">04</div>
                    <h6 class="fw-bold timeline-title">Track Attendance<br>& Performance</h6>
                </div>

                <!-- Step 5 -->
                <div class="col timeline-step px-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="timeline-icon-box mx-auto mb-3 shadow-sm bg-white">
                        <i class="fa-solid fa-book-open text-warning fs-3"></i>
                    </div>
                    <div class="timeline-number text-warning fw-bold mb-1">05</div>
                    <h6 class="fw-bold timeline-title">Complete Program<br>Requirements</h6>
                </div>

                <!-- Step 6 -->
                <div class="col timeline-step px-2" data-aos="fade-up" data-aos-delay="600">
                    <div class="timeline-icon-box mx-auto mb-3 shadow-sm bg-white">
                        <i class="fa-solid fa-trophy text-warning fs-3"></i>
                    </div>
                    <div class="timeline-number text-warning fw-bold mb-1">06</div>
                    <h6 class="fw-bold timeline-title">Earn Certificates<br>& Achievements</h6>
                </div>

                <!-- Step 7 -->
                <div class="col timeline-step px-2" data-aos="fade-up" data-aos-delay="700">
                    <div class="timeline-icon-box mx-auto mb-3 shadow-sm bg-white">
                        <i class="fa-solid fa-briefcase text-primary fs-3" style="color: #6c5ce7 !important;"></i>
                    </div>
                    <div class="timeline-number fw-bold mb-1" style="color: #6c5ce7;">07</div>
                    <h6 class="fw-bold timeline-title">Get Placement &<br>Career Opportunities</h6>
                </div>
            </div>
        </div>

        <!-- Purple Statistics Banner -->
        <div class="stats-banner text-white rounded-4 py-4 px-3 mt-5 position-relative overflow-hidden shadow-lg" data-aos="fade-up" data-aos-delay="200" style="background: linear-gradient(135deg, #7451f8, #9370fc);">
            <div class="position-absolute w-100 h-100 top-0 start-0" style="opacity: 0.1; background-image: radial-gradient(circle at center, #ffffff 1px, transparent 1px); background-size: 20px 20px;"></div>
            
            <div class="row text-center position-relative z-index-1">
                <div class="col-6 col-md mb-4 mb-md-0" data-aos="zoom-in" data-aos-delay="100">
                    <i class="fa-solid fa-building-columns fs-3 mb-2 opacity-75"></i>
                    <h2 class="fw-bold mb-1">500+</h2>
                    <p class="mb-0 fs-6 opacity-75">Institutions</p>
                </div>
                <div class="col-6 col-md mb-4 mb-md-0" data-aos="zoom-in" data-aos-delay="200">
                    <i class="fa-solid fa-users fs-3 mb-2 opacity-75"></i>
                    <h2 class="fw-bold mb-1">1M+</h2>
                    <p class="mb-0 fs-6 opacity-75">Active Learners</p>
                </div>
                <div class="col-6 col-md mb-4 mb-md-0" data-aos="zoom-in" data-aos-delay="300">
                    <i class="fa-solid fa-book-open-reader fs-3 mb-2 opacity-75"></i>
                    <h2 class="fw-bold mb-1">50K+</h2>
                    <p class="mb-0 fs-6 opacity-75">Courses Created</p>
                </div>
                <div class="col-6 col-md" data-aos="zoom-in" data-aos-delay="400">
                    <i class="fa-solid fa-face-smile fs-3 mb-2 opacity-75"></i>
                    <h2 class="fw-bold mb-1">98%</h2>
                    <p class="mb-0 fs-6 opacity-75">Satisfaction Rate</p>
                </div>
                <div class="col-6 col-md" data-aos="zoom-in" data-aos-delay="500">
                    <i class="fa-solid fa-headset fs-3 mb-2 opacity-75"></i>
                    <h2 class="fw-bold mb-1">24/7</h2>
                    <p class="mb-0 fs-6 opacity-75">Support</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us Section -->
<section class="why-choose-us-section position-relative pt-2 pb-2" id="why-choose-us">
    <!-- Background Bubbles -->
    <div class="position-absolute top-0 start-0 w-100 h-100 overflow-hidden z-index-0 pointer-events-none">
        <div class="bg-bubble bubble-1"></div>
        <div class="bg-bubble bubble-2"></div>
        <div class="bg-bubble bubble-3"></div>
    </div>

    <div class="container position-relative z-index-1 py-5">
        <div class="row align-items-center">
            <!-- Left Header -->
            <div class="col-lg-2 mb-4 mb-lg-0 text-center text-lg-start" data-aos="fade-right">
                <h2 class="fw-bolder mb-2" style="color: #111827; font-size: 2.2rem; letter-spacing: -1px;">Why Choose Us?</h2>
                <div class="mx-auto mx-lg-0" style="width: 40px; height: 4px; background: linear-gradient(90deg, #6c5ce7, #ffbd2e); border-radius: 2px;"></div>
            </div>

            <!-- Center Feature Cards Container -->
            <div class="col-lg-10 mb-4 mb-lg-0" data-aos="fade-up">
                <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                    <div class="row text-center flex-nowrap overflow-auto hide-scrollbar align-items-start">
                        
                        <!-- Feature 1 -->
                        <div class="col choose-feature-col px-3" data-aos="fade-up" data-aos-delay="100">
                            <div class="choose-icon-wrapper mb-3 mx-auto">
                                <i class="fa-solid fa-puzzle-piece fs-4" style="color: #a29bfe;"></i>
                            </div>
                            <h6 class="fw-bold mb-2 text-dark" style="font-size: 14px;">Unified Platform</h6>
                            <p class="text-muted mb-0" style="font-size: 12px; line-height: 1.5;">All-in-one solution for learning, assessments, attendance & placements</p>
                        </div>

                        <!-- Feature 2 -->
                        <div class="col choose-feature-col px-3" data-aos="fade-up" data-aos-delay="200">
                            <div class="choose-icon-wrapper mb-3 mx-auto">
                                <i class="fa-solid fa-microchip fs-4" style="color: #a29bfe;"></i>
                            </div>
                            <h6 class="fw-bold mb-2 text-dark" style="font-size: 14px;">AI-Powered Innovation</h6>
                            <p class="text-muted mb-0" style="font-size: 12px; line-height: 1.5;">Advanced AI tools for better learning & career preparation</p>
                        </div>

                        <!-- Feature 3 -->
                        <div class="col choose-feature-col px-3" data-aos="fade-up" data-aos-delay="300">
                            <div class="choose-icon-wrapper mb-3 mx-auto">
                                <i class="fa-solid fa-chart-column fs-4" style="color: #a29bfe;"></i>
                            </div>
                            <h6 class="fw-bold mb-2 text-dark" style="font-size: 14px;">Real-Time Analytics</h6>
                            <p class="text-muted mb-0" style="font-size: 12px; line-height: 1.5;">Actionable insights for data-driven decisions</p>
                        </div>

                        <!-- Feature 4 -->
                        <div class="col choose-feature-col px-3" data-aos="fade-up" data-aos-delay="400">
                            <div class="choose-icon-wrapper mb-3 mx-auto">
                                <i class="fa-solid fa-shield-halved fs-4" style="color: #a29bfe;"></i>
                            </div>
                            <h6 class="fw-bold mb-2 text-dark" style="font-size: 14px;">Scalable & Secure</h6>
                            <p class="text-muted mb-0" style="font-size: 12px; line-height: 1.5;">Enterprise-grade security with scalable architecture</p>
                        </div>

                        <!-- Feature 5 -->
                        <div class="col choose-feature-col px-3" data-aos="fade-up" data-aos-delay="500">
                            <div class="choose-icon-wrapper mb-3 mx-auto">
                                <i class="fa-solid fa-mobile-screen fs-4" style="color: #a29bfe;"></i>
                            </div>
                            <h6 class="fw-bold mb-2 text-dark" style="font-size: 14px;">Mobile-First Experience</h6>
                            <p class="text-muted mb-0" style="font-size: 12px; line-height: 1.5;">Seamless learning across all devices</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="testimonials-section pt-2 pb-2" id="testimonials">
    <div class="container py-5">
        <!-- Section Header -->
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="fw-bolder" style="color: #111827; font-size: 2.2rem; letter-spacing: -1px;">Loved by Educators & Learners</h2>
        </div>

        <!-- Testimonials Slider Container -->
        <div class="position-relative px-md-4" data-aos="fade-up" data-aos-delay="100">
            <!-- Swiper -->
            <div class="swiper testimonials-swiper pb-4">
                <div class="swiper-wrapper">
                    <!-- Testimonial 1 -->
                    <div class="swiper-slide h-auto">
                        <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm h-100 d-flex flex-column">
                            <div class="stars mb-3">
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                            </div>
                            <p class="text-muted mb-4 flex-grow-1" style="font-size: 14px; line-height: 1.6;">"The dashboard gives us complete visibility into student performance and helps us make data-driven decisions."</p>
                            <div class="d-flex align-items-center mt-auto">
                                <img src="assets/images/external/user-w44.webp" alt="Priya Sharma" class="rounded-circle me-3" width="45" height="45">
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 13px;">Priya Sharma</h6>
                                    <p class="text-muted mb-0" style="font-size: 11px;">Academic Director<br>Greenwood International School</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 2 -->
                    <div class="swiper-slide h-auto">
                        <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm h-100 d-flex flex-column">
                            <div class="stars mb-3">
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star-half-stroke text-warning"></i>
                            </div>
                            <p class="text-muted mb-4 flex-grow-1" style="font-size: 14px; line-height: 1.6;">"The AI tools and placement features have significantly improved our students' confidence and job readiness."</p>
                            <div class="d-flex align-items-center mt-auto">
                                <img src="assets/images/external/user-m32.webp" alt="Rahul Deshmukh" class="rounded-circle me-3" width="45" height="45">
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 13px;">Rahul Deshmukh</h6>
                                    <p class="text-muted mb-0" style="font-size: 11px;">Placement Officer<br>FutureTech College</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 3 -->
                    <div class="swiper-slide h-auto">
                        <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm h-100 d-flex flex-column">
                            <div class="stars mb-3">
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                            </div>
                            <p class="text-muted mb-4 flex-grow-1" style="font-size: 14px; line-height: 1.6;">"Interactive learning, real-time tracking and easy communication make this LMS our everyday teaching partner."</p>
                            <div class="d-flex align-items-center mt-auto">
                                <img src="assets/images/external/user-w24.webp" alt="Neha Verma" class="rounded-circle me-3" width="45" height="45">
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 13px;">Neha Verma</h6>
                                    <p class="text-muted mb-0" style="font-size: 11px;">Senior Faculty<br>Brilliant Academy</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 4 -->
                    <div class="swiper-slide h-auto">
                        <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm h-100 d-flex flex-column">
                            <div class="stars mb-3">
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star-half-stroke text-warning"></i>
                            </div>
                            <p class="text-muted mb-4 flex-grow-1" style="font-size: 14px; line-height: 1.6;">"From attendance to certificates and placements — everything is well organized and easy to manage."</p>
                            <div class="d-flex align-items-center mt-auto">
                                <img src="assets/images/external/user-m46.webp" alt="Amit Kapoor" class="rounded-circle me-3" width="45" height="45">
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 13px;">Amit Kapoor</h6>
                                    <p class="text-muted mb-0" style="font-size: 11px;">Training Head<br>NextGen Institute</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Testimonial 5 -->
                    <div class="swiper-slide h-auto">
                        <div class="testimonial-card bg-white rounded-4 p-4 shadow-sm h-100 d-flex flex-column">
                            <div class="stars mb-3">
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                                <i class="fa-solid fa-star text-warning"></i>
                            </div>
                            <p class="text-muted mb-4 flex-grow-1" style="font-size: 14px; line-height: 1.6;">"The best platform we've used for comprehensive student lifecycle management. It completely changed how we work."</p>
                            <div class="d-flex align-items-center mt-auto">
                                <img src="assets/images/external/user-m51.webp" alt="Rakesh Singh" class="rounded-circle me-3" width="45" height="45">
                                <div>
                                    <h6 class="fw-bold mb-0 text-dark" style="font-size: 13px;">Rakesh Singh</h6>
                                    <p class="text-muted mb-0" style="font-size: 11px;">Director<br>Apex Learning</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Custom Navigation Arrows -->
            <div class="testimonial-button-prev shadow-sm"><i class="fa-solid fa-chevron-left"></i></div>
            <div class="testimonial-button-next shadow-sm"><i class="fa-solid fa-chevron-right"></i></div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="lms-cta-section pt-4 pb-5" >
    <div class="container pb-5 mt-4">
        <div class="cta-banner rounded-4 position-relative p-4 p-md-5" data-aos="zoom-in" style="background: linear-gradient(135deg, #1c103f 0%, #2a1b54 100%); box-shadow: 0 20px 40px rgba(28, 16, 63, 0.15);">
            
            <div class="position-absolute top-0 start-0 w-100 h-100 z-index-0 pointer-events-none" style="opacity: 0.05; overflow: hidden; border-radius: inherit; background-image: radial-gradient(circle at center, #ffffff 2px, transparent 2px); background-size: 30px 30px;"></div>
            
            <div class="row align-items-center position-relative z-index-1">
                <!-- Left Rocket Image -->
                <div class="col-lg-3 d-none d-lg-block position-relative">
                    <img src="assets/images/rocket.webp" alt="Rocket" class="img-fluid position-absolute" style="width: 250px; max-width: none; top: -180px; left: -20px; filter: drop-shadow(0 20px 30px rgba(0,0,0,0.4)); animation: float-rocket 3s ease-in-out infinite; z-index: 2;">
                </div>

                <!-- Center Text -->
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0 px-lg-4" data-aos="fade-right" data-aos-delay="100">
                    <h2 class="fw-bold text-white mb-3" style="font-size: 2.1rem; line-height: 1.3;">
                        Ready to Modernize Your<br>
                        <span style="color: #ffbd2e;">Learning</span> & <span style="color: #a29bfe;">Placement</span> Experiences?
                    </h2>
                    <p class="mb-0" style="color: #b5adc9; font-size: 1.05rem; max-width: 500px; margin: 0 auto; margin-lg: 0;">
                        Join hundreds of institutions transforming education with an intelligent, AI-powered LMS platform.
                    </p>
                </div>

                <!-- Right Button -->
                <div class="col-lg-3 text-center text-lg-end" data-aos="fade-left" data-aos-delay="200">
                    <a href="contact.php" class="btn fw-bold px-4 py-3" style="background-color: #ffbd2e; color: #1c103f; border-radius: 8px; transition: all 0.3s ease; box-shadow: 0 10px 20px rgba(255, 189, 46, 0.2);">
                        Book a Live Demo <i class="fa-solid fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Swiper Initialization -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof Swiper !== 'undefined') {
            const lmsFeaturesSwiper = new Swiper('.lms-vertical-features-swiper', {
                direction: 'vertical',
                slidesPerView: 1,
                pagination: {
                    el: '.lms-vertical-features-swiper .swiper-pagination',
                    clickable: true,
                },
                speed: 800,
            });

            // Testimonials Swiper
            const testimonialsSwiper = new Swiper('.testimonials-swiper', {
                slidesPerView: 1,
                spaceBetween: 20,
                navigation: {
                    nextEl: '.testimonial-button-next',
                    prevEl: '.testimonial-button-prev',
                },
                breakpoints: {
                    640: { slidesPerView: 2, spaceBetween: 20 },
                    992: { slidesPerView: 3, spaceBetween: 24 },
                    1200: { slidesPerView: 4, spaceBetween: 24 }
                }
            });

            // Feature 02 Nested Image Slider
            const feature2Swiper = new Swiper('.feature2-nested-swiper', {
                direction: 'horizontal',
                nested: true,
                effect: 'fade',
                fadeEffect: { crossFade: true }, // Prevents parent vertical swiper from sliding when swiping horizontally
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.feature2-nested-swiper .nested-pagination',
                    clickable: true,
                },
            });

            // Feature 03 Nested Image Slider
            const feature3Swiper = new Swiper('.feature3-nested-swiper', {
                direction: 'horizontal',
                nested: true,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.feature3-nested-swiper .nested-pagination',
                    clickable: true,
                },
            });

            // Feature 04 Nested Image Slider
            const feature4Swiper = new Swiper('.feature4-nested-swiper', {
                direction: 'horizontal',
                nested: true,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.feature4-nested-swiper .nested-pagination',
                    clickable: true,
                },
            });

            // Feature 05 Nested Image Slider
            const feature5Swiper = new Swiper('.feature5-nested-swiper', {
                direction: 'horizontal',
                nested: true,
                effect: 'fade',
                fadeEffect: { crossFade: true },
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.feature5-nested-swiper .nested-pagination',
                    clickable: true,
                },
            });
        }
    });
</script>
<?php require __DIR__ . '/includes/footer.php'; ?>
