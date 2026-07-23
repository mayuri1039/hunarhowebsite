<?php
$pageTitle = 'ECCE Teacher Training & Certification Program | Hunarho & MEPSC';
$pageDescription = "Transform your preschool or school with Hunarho's ECCE Program. NEP 2020 aligned Early Childhood Care and Education with teacher training and MEPSC certification.";
$activePage = 'ecce';
$demoInterest = 'ECCE';
$extraCss = ['ecce.css?v=1.10'];

$extraInlineJs = <<<'JS'
document.addEventListener('DOMContentLoaded', function() {
    const ecceForm = document.getElementById('ecceExpertForm');
    if (ecceForm) {
        ecceForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Check standard HTML5 validity
            if (!ecceForm.checkValidity()) {
                e.stopPropagation();
                ecceForm.classList.add('was-validated');
                return;
            }

            const submitBtn = document.getElementById('btnEcceSubmit');
            const originalHTML = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Sending...';

            const formData = new FormData(ecceForm);

            fetch('process_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    submitBtn.style.background = '#10B981';
                    submitBtn.innerHTML = '<i class="fa-solid fa-circle-check me-2"></i> Sent Successfully!';
                    
                    const alertContainer = document.getElementById('ecceAlertArea');
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
                        ecceForm.reset();
                        ecceForm.classList.remove('was-validated');
                        submitBtn.disabled = false;
                        submitBtn.style.background = '';
                        submitBtn.innerHTML = originalHTML;
                    }, 4000);
                } else {
                    const alertContainer = document.getElementById('ecceAlertArea');
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
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = originalHTML;
                }
            })
            .catch(error => {
                const alertContainer = document.getElementById('ecceAlertArea');
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
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalHTML;
            });
        });
    }
});
JS;

require __DIR__ . '/includes/header.php';
?>
<!-- ══════════════ HERO SECTION ══════════════ -->
    <header class="ecce-course-hero position-relative">
        <!-- <div class="bg-overlay"></div> -->
        <div class="container position-relative z-1">
            <div class="row align-items-center g-5">
                <!-- Left Side: Content -->
                <div class="col-lg-7 text-white mt-0" data-aos="fade-right">
                    <div class="d-flex align-items-center gap-3 mb-4">
                        <img src="assets/images/ecced_cert.webp" alt="MEPSC Certification" class="mepsc-logo">
                    </div>

                    <span class="badge text-dark mb-4 px-3 py-2 rounded-pill fw-bold ecce-hero-badge">Govt Approved
                        Certificate by MEPSC - Skill India</span>
                    <h1 class="display-5 fw-medium mb-4 text-white lh-sm" style="font-size: 30px;">ECCE Course - Early
                        Childhood Care and Education</h1>

                    <p class="mb-3 ecce-hero-text">
                        India is on the threshold of an education overhaul that aims to empower learners and educators
                        alike. The National Education Policy (NEP), 2020 has a clear vision for early childhood
                        education that includes an urgent focus on Foundational Literacy and Numeracy. Additionally, the
                        goal is to offer experiential, child-led learning that allows exploration, innovation, and
                        discovery for lifelong learning.
                    </p>
                    <p class="mb-5 ecce-hero-text">
                        Hunarho’s course in Early Childhood Care and Education (ECCE Course), comes with a government
                        certification backed by MEPSC (Sector Skills Council) and prepares aspiring early childhood
                        educators with crucial skills required to facilitate learning and development in young children.
                        It offers a blend of theory with experiential learning to guide the trainees for preschool and
                        foundational years. Through intensive content, hands-on assignments, doubt-solving sessions,
                        internships, and workshops by expert guests, the course nurtures exceptional early childhood
                        facilitators ready for real-world classroom settings.
                    </p>

                    <div class="d-flex flex-wrap gap-4 mb-3 align-items-center">
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box-small ecce-icon-box">
                                <i class="fa-solid fa-laptop-house"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-white fw-bold">Mode</h6>
                                <span class="ecce-icon-label">Online + Live</span>
                            </div>
                        </div>
                        <div class="d-flex align-items-center gap-3">
                            <div class="icon-box-small ecce-icon-box">
                                <i class="fa-regular fa-clock"></i>
                            </div>
                            <div>
                                <h6 class="mb-0 text-white fw-bold">Duration</h6>
                                <span class="ecce-icon-label">6 Months</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-1">
                </div>

                <!-- Right Side: Form -->
                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="200">
                    <div class="card border-0 shadow-lg ecce-form-card">
                        <div class="card-body p-4">
                            <h3 class="fw-bold mb-2 text-dark">Talk to an Expert</h3>
                            <p class="text-muted mb-4 pb-2 ecce-form-subtitle">Let us help guide you towards your
                                career path</p>

                            <div id="ecceAlertArea"></div>
                            <form id="ecceExpertForm">
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark small mb-1">Full Name</label>
                                    <input type="text" name="fullName" class="form-control form-control-lg bg-light ecce-form-input"
                                        placeholder="Enter your full name" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark small mb-1">Email Address</label>
                                    <input type="email" name="email" class="form-control form-control-lg bg-light ecce-form-input"
                                        placeholder="Enter your email address" required>
                                </div>
                                <div class="mb-4">
                                    <label class="form-label fw-semibold text-dark small mb-1">Mobile Number</label>
                                    <input type="tel" name="phone" class="form-control form-control-lg bg-light ecce-form-input"
                                        placeholder="Enter your mobile number" required>
                                </div>
                                <input type="hidden" name="reason" value="ECCE Course Enquiry">
                                <input type="hidden" name="message" value="Requested expert guidance via ECCE page form.">
                                <button type="submit" id="btnEcceSubmit"
                                    class="btn btn-gold w-100 py-3 fw-bold shadow-sm mt-2 ecce-form-btn">Submit
                                    Request</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- ══════════════ BENEFITS SECTION ══════════════ -->
    <section id="benefits">
        <div class="container">
            <div class="text-center mb-4" data-aos="fade-up">
                <span class="badge text-dark mb-2 px-3 py-1 rounded-pill fw-bold shadow-sm"
                    style="background: var(--accent-gold); font-size: 13px;">Why Choose This Program</span>
                <h2 class="fs-3 fw-bold mb-2" style="color: var(--primary-purple);">Unlock Your Potential with ECCE</h2>
                <p class="text-muted mx-auto mb-0" style="max-width: 650px; font-size: 0.98rem;">Equip yourself with the
                    necessary skills, recognized certification, and practical experience to excel in early childhood education.</p>
            </div>

            <!-- Compact Side-by-Side Content -->
            <div class="row g-4 align-items-center">
                <!-- Left: Compact Video Showcase -->
                <div class="col-lg-5" data-aos="fade-right" data-aos-delay="100">
                    <div class="ecce-video-showcase p-3">
                        <div class="position-relative">
                            <video class="w-100 object-fit-cover d-block" autoplay muted loop playsinline controls>
                                <source src="https://hunarho.com/wp-content/uploads/2025/07/Unit-Zero-Updated.mp4"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <span class="position-absolute top-0 start-0 m-2 ecce-showcase-badge d-inline-flex align-items-center gap-1">
                                <i class="fa-solid fa-circle-play text-warning"></i> Course Preview
                            </span>
                        </div>

                        <!-- Mini Highlights Strip -->
                        <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                            <div class="d-flex align-items-center gap-2">
                                <div class="mini-icon-box"><i class="fa-solid fa-certificate"></i></div>
                                <div>
                                    <span class="d-block fw-bold text-dark lh-1" style="font-size: 13px;">MEPSC</span>
                                    <span class="text-muted" style="font-size: 11px;">Govt. Certified</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="mini-icon-box"><i class="fa-regular fa-clock"></i></div>
                                <div>
                                    <span class="d-block fw-bold text-dark lh-1" style="font-size: 13px;">6 Months</span>
                                    <span class="text-muted" style="font-size: 11px;">Duration</span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <div class="mini-icon-box"><i class="fa-solid fa-chalkboard-user"></i></div>
                                <div>
                                    <span class="d-block fw-bold text-dark lh-1" style="font-size: 13px;">100% Live</span>
                                    <span class="text-muted" style="font-size: 11px;">+ Internships</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Compact Benefits Grid (2 Columns x 3 Rows) -->
                <div class="col-lg-7" data-aos="fade-left" data-aos-delay="200">
                    <div class="row g-3">
                        <!-- Benefit 1 -->
                        <div class="col-sm-6">
                            <div class="benefit-card-compact">
                                <div class="benefit-icon-compact">
                                    <i class="fa-solid fa-laptop-code"></i>
                                </div>
                                <div>
                                    <h6 class="benefit-title-compact">Comprehensive Learning</h6>
                                    <p class="benefit-desc-compact">Build your skills with an easy-to-follow, flexible ECCE course that fits your routine.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Benefit 2 -->
                        <div class="col-sm-6">
                            <div class="benefit-card-compact">
                                <div class="benefit-icon-compact">
                                    <i class="fa-solid fa-certificate"></i>
                                </div>
                                <div>
                                    <h6 class="benefit-title-compact">Recognized Certification</h6>
                                    <p class="benefit-desc-compact">Get a MEPSC recognized certificate that adds immense value to your profile.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Benefit 3 -->
                        <div class="col-sm-6">
                            <div class="benefit-card-compact">
                                <div class="benefit-icon-compact">
                                    <i class="fa-solid fa-chalkboard-user"></i>
                                </div>
                                <div>
                                    <h6 class="benefit-title-compact">Learn from Specialists</h6>
                                    <p class="benefit-desc-compact">Expert-led sessions by seasoned professionals in early childhood care & education.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Benefit 4 -->
                        <div class="col-sm-6">
                            <div class="benefit-card-compact">
                                <div class="benefit-icon-compact">
                                    <i class="fa-solid fa-briefcase"></i>
                                </div>
                                <div>
                                    <h6 class="benefit-title-compact">Entrepreneurial Skills</h6>
                                    <p class="benefit-desc-compact">Gain the confidence to work as an educator or even open your own learning space.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Benefit 5 -->
                        <div class="col-sm-6">
                            <div class="benefit-card-compact">
                                <div class="benefit-icon-compact">
                                    <i class="fa-solid fa-handshake"></i>
                                </div>
                                <div>
                                    <h6 class="benefit-title-compact">Placement Support</h6>
                                    <p class="benefit-desc-compact">We help you connect with top schools and guide you toward job opportunities.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Benefit 6 -->
                        <div class="col-sm-6">
                            <div class="benefit-card-compact">
                                <div class="benefit-icon-compact">
                                    <i class="fa-solid fa-users"></i>
                                </div>
                                <div>
                                    <h6 class="benefit-title-compact">Internship Opportunities</h6>
                                    <p class="benefit-desc-compact">Get hands-on learning through guided internships in well-known preschools.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ══════════════ PROGRAM HIGHLIGHTS ══════════════ -->
    <section class="py-3 bg-white" id="highlights">
        <div class="container py-3">
            <div class="text-center mb-1" data-aos="fade-up">
                <span class="badge text-dark mb-3 px-3 py-2 rounded-pill fw-bold shadow-sm"
                    style="background: var(--accent-gold); font-size: 14px;">Course Journey</span>
                <h2 class="fs-2 fw-bold" style="color: var(--primary-purple);">Program Highlights</h2>
                <p class="text-muted mt-3 mx-auto" style="max-width: 600px; font-size: 1.1rem;">Discover what makes our
                    ECCE course the perfect stepping stone for your career.</p>
            </div>
            <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-12 text-center">
                    <img src="assets/images/programht.webp" alt="Program Highlights" class="img-fluid rounded-4"
                        style="max-width: 100%; height: auto;">
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ KEY BENEFITS SECTION ══════════════ -->
    <section class="py-5 key-benefits-section" id="key-benefits">
        <div class="container py-4">
            <!-- Header Title Box -->
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge text-dark mb-3 px-3 py-2 rounded-pill fw-bold shadow-sm" style="background: var(--accent-gold); font-size: 14px;">Advantages</span>
                <h2 class="fs-2 fw-bold" style="color: var(--primary-purple);">Key Benefits</h2>
                <p class="text-muted mt-2 mx-auto" style="max-width: 600px; font-size: 1.1rem;">Discover how our structured ECCE pathway empowers you with skills, recognition, and career growth.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <!-- 8-Card Winding Journey Grid -->
            <!-- Row 1: Left to Right (1 -> 2 -> 3 -> 4) -->
            <div class="row g-5 justify-content-center mb-0">
                <!-- Card 1 -->
                <div class="col-lg-3 col-md-6 kb-col" data-aos="fade-up" data-aos-delay="100">
                    <div class="kb-card">
                        <div class="kb-icon-wrap">
                            <i class="fa-solid fa-book-open"></i>
                        </div>
                        <h5 class="kb-title">Modern Curriculum</h5>
                        <p class="kb-desc">Contemporary curriculum with emphasis on best practices.</p>
                    </div>
                    <div class="kb-arrow-right d-none d-lg-block"><i class="fa-solid fa-arrow-right"></i></div>
                </div>

                <!-- Card 2 -->
                <div class="col-lg-3 col-md-6 kb-col" data-aos="fade-up" data-aos-delay="200">
                    <div class="kb-card">
                        <div class="kb-icon-wrap">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <h5 class="kb-title">NSQF Level 3</h5>
                        <p class="kb-desc">Designed in line with NSQF Level 3 for standardized skill development.</p>
                    </div>
                    <div class="kb-arrow-right d-none d-lg-block"><i class="fa-solid fa-arrow-right"></i></div>
                </div>

                <!-- Card 3 -->
                <div class="col-lg-3 col-md-6 kb-col" data-aos="fade-up" data-aos-delay="300">
                    <div class="kb-card">
                        <div class="kb-icon-wrap">
                            <i class="fa-solid fa-cubes"></i>
                        </div>
                        <h5 class="kb-title">Foundational Skills</h5>
                        <p class="kb-desc">Foundational Numeracy and Literacy with Phonics training.</p>
                    </div>
                    <div class="kb-arrow-right d-none d-lg-block"><i class="fa-solid fa-arrow-right"></i></div>
                </div>

                <!-- Card 4 -->
                <div class="col-lg-3 col-md-6 kb-col" data-aos="fade-up" data-aos-delay="400">
                    <div class="kb-card">
                        <div class="kb-icon-wrap">
                            <i class="fa-solid fa-laptop-code"></i>
                        </div>
                        <h5 class="kb-title">Digital Literacy</h5>
                        <p class="kb-desc">Digital literacy and modern application skills.</p>
                    </div>
                </div>
            </div>

            <!-- Row Connector: From right end of Row 1 (Card 4) down and left to start of Row 2 (Card 5) -->
            <!-- <div class="kb-connector-row d-none d-lg-block">
                <div class="kb-connector-line"></div>
                <div class="kb-connector-arrow-start"><i class="fa-solid fa-arrow-right"></i></div>
                <div class="kb-connector-arrow-down"><i class="fa-solid fa-arrow-right"></i></div>
            </div> -->

            <!-- Row 2: Left to Right (5 -> 6 -> 7 -> 8) -->
            <div class="row g-5 justify-content-center mt-0 ">
                <!-- Card 5 -->
                <div class="col-lg-3 col-md-6 kb-col" data-aos="fade-up" data-aos-delay="500">
                    <div class="kb-card">
                        <div class="kb-icon-wrap">
                            <i class="fa-solid fa-handshake"></i>
                        </div>
                        <h5 class="kb-title">Experiential Learning</h5>
                        <p class="kb-desc">Internship opportunities for experiential learning.</p>
                    </div>
                    <div class="kb-arrow-right d-none d-lg-block"><i class="fa-solid fa-arrow-right"></i></div>
                </div>

                <!-- Card 6 -->
                <div class="col-lg-3 col-md-6 kb-col" data-aos="fade-up" data-aos-delay="600">
                    <div class="kb-card">
                        <div class="kb-icon-wrap">
                            <i class="fa-solid fa-microphone"></i>
                        </div>
                        <h5 class="kb-title">Interview Coaching</h5>
                        <p class="kb-desc">Professional interview coaching.</p>
                    </div>
                    <div class="kb-arrow-right d-none d-lg-block"><i class="fa-solid fa-arrow-right"></i></div>
                </div>

                <!-- Card 7 -->
                <div class="col-lg-3 col-md-6 kb-col" data-aos="fade-up" data-aos-delay="700">
                    <div class="kb-card">
                        <div class="kb-icon-wrap">
                            <i class="fa-solid fa-rocket"></i>
                        </div>
                        <h5 class="kb-title">Career Development</h5>
                        <p class="kb-desc">Career and entrepreneurial skills development.</p>
                    </div>
                    <div class="kb-arrow-right d-none d-lg-block"><i class="fa-solid fa-arrow-right"></i></div>
                </div>

                <!-- Card 8 -->
                <div class="col-lg-3 col-md-6 kb-col" data-aos="fade-up" data-aos-delay="800">
                    <div class="kb-card">
                        <div class="kb-icon-wrap">
                            <i class="fa-solid fa-bullseye"></i>
                        </div>
                        <h5 class="kb-title">Placement Support</h5>
                        <p class="kb-desc">Placement support and personalized guidance.</p>
                    </div>
                </div>
            </div>

                </div>
            </div>

            
        </div>
    </section>

    <!-- ══════════════ LEARNING PATH SECTION ══════════════ -->
    <section class="py-5 bg-white" id="learning-path">
        <div class="container py-3">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge text-dark mb-3 px-3 py-2 rounded-pill fw-bold shadow-sm"
                    style="background: var(--accent-gold); font-size: 14px;">Curriculum</span>
                <h2 class="fs-2 fw-bold" style="color: var(--primary-purple);">The Learning Path to the Program</h2>
                <p class="text-muted mt-3 mx-auto" style="max-width: 700px; font-size: 1.1rem;">A comprehensive
                    curriculum designed to build your expertise in early childhood care and education step by step.</p>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Unit 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100 border-0 shadow-sm learning-card">
                        <div class="card-body p-4">
                            <div class="learning-unit-badge mb-3">Unit 1</div>
                            <h4 class="card-title fw-bold mb-3"
                                style="color: var(--primary-purple); font-size: 1.1rem;">Child Growth and Development
                            </h4>
                            <ul class="text-muted mb-0 custom-list">
                                <li>Introduction to Early Childhood Education (ECCE).</li>
                                <li>Popular Pedagogical Theories in Child Development.</li>
                                <li>Developmental domains in children (0 to 8 years): physical, cognitive,
                                    socio-emotional, language and communication.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Unit 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100 border-0 shadow-sm learning-card">
                        <div class="card-body p-4">
                            <div class="learning-unit-badge mb-3">Unit 2</div>
                            <h4 class="card-title fw-bold mb-3"
                                style="color: var(--primary-purple); font-size: 1.1rem;">Fostering Health and Learning
                            </h4>
                            <ul class="text-muted mb-0 custom-list">
                                <li>Health, hygiene, nutrition, and safety practices.</li>
                                <li>The role of parenting and home environments in early childhood.</li>
                                <li>Designing learning environments.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Unit 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100 border-0 shadow-sm learning-card">
                        <div class="card-body p-4">
                            <div class="learning-unit-badge mb-3">Unit 3</div>
                            <h4 class="card-title fw-bold mb-3"
                                style="color: var(--primary-purple); font-size: 1.1rem;">Curriculum Planning and
                                Strategies</h4>
                            <ul class="text-muted mb-0 custom-list">
                                <li>Transformative planning for preschool and foundational years.</li>
                                <li>Effective resource creation and management.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Unit 4 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
                    <div class="card h-100 border-0 shadow-sm learning-card">
                        <div class="card-body p-4">
                            <div class="learning-unit-badge mb-3">Unit 4</div>
                            <h4 class="card-title fw-bold mb-3"
                                style="color: var(--primary-purple); font-size: 1.1rem;">Management and Instruction</h4>
                            <ul class="text-muted mb-0 custom-list">
                                <li>Classroom management: time, behaviour, observation, and assessment.</li>
                                <li>Instructional strategies: best global practices, innovative teaching approaches,
                                    digital fluency.</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Unit 5 -->
                <div class="col-md-12 col-lg-8" data-aos="fade-up" data-aos-delay="500">
                    <div class="card h-100 border-0 shadow-sm learning-card">
                        <div class="card-body p-4">
                            <div class="learning-unit-badge mb-3">Unit 5</div>
                            <h4 class="card-title fw-bold mb-3"
                                style="color: var(--primary-purple); font-size: 1.1rem;">Professional Skill Enhancement
                                for Teachers</h4>
                            <p class="fw-bold mb-3 text-dark"><i
                                    class="fa-solid fa-briefcase text-accent-gold me-2"></i> Employability skills:</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <ul class="text-muted mb-0 custom-list">
                                        <li>Communication, ICT, effective expression and digital literacy.</li>
                                        <li>Self-management skills: stress management, self-care, nurturing empathy.
                                        </li>
                                        <li>Entrepreneurial skills: life issues in business leadership.</li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <ul class="text-muted mb-0 custom-list mt-2 mt-md-0">
                                        <li>Green Skills: Environmental stewardship in education.</li>
                                        <li>Specialized Skills: Process training and teaching strategies, resume
                                            writing, career readiness.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ ELIGIBILITY & OPPORTUNITIES SECTION ══════════════ -->
    <section class="py-3 bg-light" id="eligibility-opportunities">
        <div class="container py-2">
            <div class="row g-3 align-items-stretch">
                <!-- Left Card: Who Can Apply? (Bright White & Interactive Tiles) -->
                <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                    <div class="eligibility-wrapper-left">
                        <div class="mb-3">
                            <span class="eligibility-badge-light mb-1">ELIGIBILITY</span>
                            <h3 class="fs-4 fw-bold mb-0" style="color: var(--primary-purple);">Who Can Apply?</h3>
                        </div>

                        <div class="row g-2 flex-grow-1">
                            <div class="col-sm-6">
                                <div class="candidate-tile">
                                    <div class="candidate-tile-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                                    <span class="candidate-tile-text">Preschool Teacher</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="candidate-tile">
                                    <div class="candidate-tile-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                                    <span class="candidate-tile-text">Early Childhood Educator</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="candidate-tile">
                                    <div class="candidate-tile-icon"><i class="fa-solid fa-users-viewfinder"></i></div>
                                    <span class="candidate-tile-text">Classroom Facilitator</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="candidate-tile">
                                    <div class="candidate-tile-icon"><i class="fa-solid fa-child-reaching"></i></div>
                                    <span class="candidate-tile-text">Daycare Coordinator</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="candidate-tile">
                                    <div class="candidate-tile-icon"><i class="fa-solid fa-book-open-reader"></i></div>
                                    <span class="candidate-tile-text">Curriculum Planner</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="candidate-tile">
                                    <div class="candidate-tile-icon"><i class="fa-solid fa-heart-pulse"></i></div>
                                    <span class="candidate-tile-text">Childcare Specialist</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="candidate-tile">
                                    <div class="candidate-tile-icon"><i class="fa-solid fa-puzzle-piece"></i></div>
                                    <span class="candidate-tile-text">Activity Coordinator</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="candidate-tile">
                                    <div class="candidate-tile-icon"><i class="fa-solid fa-face-smile"></i></div>
                                    <span class="candidate-tile-text">Playgroup Teacher</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Card: Future-Ready Opportunities (Royal Deep Purple Showcase) -->
                <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                    <div class="eligibility-wrapper-right">
                        <div class="mb-3">
                            <span class="eligibility-badge-dark mb-1">ENTER THE WORLD OF ECCE TEACHING</span>
                            <h3 class="fs-4 fw-bold text-white mb-0">Future-Ready Opportunities</h3>
                        </div>

                        <div class="d-flex flex-column gap-1 flex-grow-1 justify-content-center">
                            <div class="opportunity-item">
                                <div class="opportunity-check-circle"><i class="fa-solid fa-check"></i></div>
                                <span class="opportunity-text">Aspiring preschool and early childhood teachers</span>
                            </div>
                            <div class="opportunity-item">
                                <div class="opportunity-check-circle"><i class="fa-solid fa-check"></i></div>
                                <span class="opportunity-text">Graduates from any discipline</span>
                            </div>
                            <div class="opportunity-item">
                                <div class="opportunity-check-circle"><i class="fa-solid fa-check"></i></div>
                                <span class="opportunity-text">Homemakers planning to restart their careers</span>
                            </div>
                            <div class="opportunity-item">
                                <div class="opportunity-check-circle"><i class="fa-solid fa-check"></i></div>
                                <span class="opportunity-text">Childcare and daycare professionals</span>
                            </div>
                            <div class="opportunity-item">
                                <div class="opportunity-check-circle"><i class="fa-solid fa-check"></i></div>
                                <span class="opportunity-text">Nursery and pre-primary educators</span>
                            </div>
                            <div class="opportunity-item">
                                <div class="opportunity-check-circle"><i class="fa-solid fa-check"></i></div>
                                <span class="opportunity-text">Individuals passionate about teaching young children</span>
                            </div>
                            <div class="opportunity-item">
                                <div class="opportunity-check-circle"><i class="fa-solid fa-check"></i></div>
                                <span class="opportunity-text">Career changers interested in education and training</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ CTA SECTION ══════════════ -->
    <section class="py-5 bg-light" id="ecce-cta">
        <div class="container py-3">
            <div class="row" data-aos="zoom-in">
                <div class="col-12">
                    <div class="ecce-cta-box text-center">
                        <h4 class="fw-bold text-white mb-2">Best-in-Class Learning Experience from Hunarho!</h4>
                        <p class="text-white opacity-75 mb-3 mx-auto" style="max-width: 700px; font-size: 1rem;">
                            Gain industry-relevant knowledge, practical teaching techniques, and expert guidance
                            designed to help you succeed in early childhood education.
                        </p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            <a href="assets/docs/ECCE_Syllabus.pdf" download
                                class="btn btn-gold px-4 py-2 fw-bold btn-sm" style="border-radius: 30px;">
                                <i class="fa-solid fa-download me-2"></i> Download Syllabus
                            </a>
                            <a href="#" class="btn btn-outline-white px-4 py-2 fw-bold btn-sm"
                                style="border-radius: 30px;">
                                Enroll Now <i class="fa-solid fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ CERTIFICATION ══════════════ -->
    <section class="py-5 cert-section" id="certification">
        <div class="container py-4">
            <!-- Header Title Box -->
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="cert-main-title mb-2 d-flex align-items-center justify-content-center gap-3 flex-wrap">
                    <span class="cert-header-badge"><i class="fa-solid fa-award"></i></span>
                    <span>Industry Recognized <span style="color: var(--accent-gold);">Certification</span></span>
                </h2>
            </div>

            <!-- Top Split: Description + Certificate Hero -->
            <div class="row align-items-center g-5 mb-5">
                <div class="col-lg-6" data-aos="fade-right">
                    <p class="cert-desc mb-3">
                        Upon successfully completing the enriching journey of the Certificate in Early Childhood Care &amp; Education (ECCE Course) program by Hunarho, participants with a <strong style="color: var(--primary-purple);">minimum of 75% attendance</strong> will be awarded a nationally recognized Certificate of Completion, certified by <strong style="color: var(--primary-purple);">MEPSC</strong> and aligned with <strong style="color: var(--primary-purple);">NSQF Level 4</strong> standards.
                    </p>
                    <p class="cert-desc mb-4">
                        For those whose attendance falls just short, a Certificate of Participation will still be issued as a recognition of your dedication and effort.
                    </p>

                    <!-- Callout Box -->
                    <div class="cert-callout-box d-flex align-items-center gap-3 p-3 rounded-4 mb-4" style="background: rgba(54, 52, 142, 0.05); border: 1px dashed rgba(54, 52, 142, 0.2);">
                        <div class="cert-callout-icon d-flex align-items-center justify-content-center flex-shrink-0 rounded-circle" style="width: 54px; height: 54px; background: var(--primary-purple); color: #fff; font-size: 1.4rem;">
                            <i class="fa-solid fa-graduation-cap"></i>
                        </div>
                        <p class="mb-0" style="font-size: 0.95rem; line-height: 1.6; color: #334155;">
                            We strongly encourage you to actively participate in the <strong style="color: var(--primary-purple);">live expert-led sessions, hands-on projects, and guided internships</strong>, as they are key to gaining <strong style="color: var(--primary-purple);">real-world insights</strong> and <strong style="color: var(--primary-purple);">building career-ready skills</strong>.
                        </p>
                    </div>

                    <p class="cert-desc mb-0">
                        Your commitment to learning will not only reflect in your certificate—but also in the future you help shape as an early childhood educator.
                    </p>
                </div>

                <!-- Right Hero Certificate -->
                <div class="col-lg-6 text-center" data-aos="fade-left">
                    <div class="cert-hero-frame">
                        <img src="assets/images/external/Certificate-ECCE-1.webp" alt="ECCE Certificate of Completion" class="img-fluid">
                    </div>
                </div>
            </div>

            <!-- Middle Block: Share your certificate and gain visibility -->
            <div class="cert-visibility-box mt-5 p-4 rounded-4" style="background: #fffefb; border: 1px solid rgba(234, 179, 8, 0.3); box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);" data-aos="fade-up">
                <div class="text-center mb-4">
                    <div class="cert-section-divider d-flex align-items-center justify-content-center gap-3">
                        <span class="cert-divider-line"></span>
                        <h4 class="fw-bold mb-0" style="color: var(--primary-purple); font-size: 1.35rem;">Share your certificate and gain visibility</h4>
                        <span class="cert-divider-line"></span>
                    </div>
                </div>
                <div class="row g-4 text-center justify-content-center">
                    <!-- Item 1 -->
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="visibility-item">
                            <div class="visibility-icon mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 64px; height: 64px; background: var(--primary-purple); color: var(--accent-gold); font-size: 1.5rem; box-shadow: 0 6px 16px rgba(54, 52, 142, 0.2);">
                                <i class="fa-solid fa-user-graduate"></i>
                            </div>
                            <h6 class="fw-bold mb-0" style="color: #1e293b; font-size: 0.95rem;">Demonstrate your<br>skills &amp; capabilities</h6>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="visibility-item">
                            <div class="visibility-icon mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 64px; height: 64px; background: var(--primary-purple); color: var(--accent-gold); font-size: 1.5rem; box-shadow: 0 6px 16px rgba(54, 52, 142, 0.2);">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <h6 class="fw-bold mb-0" style="color: #1e293b; font-size: 0.95rem;">Acquire a competitive<br>advantage</h6>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="visibility-item">
                            <div class="visibility-icon mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 64px; height: 64px; background: var(--primary-purple); color: var(--accent-gold); font-size: 1.5rem; box-shadow: 0 6px 16px rgba(54, 52, 142, 0.2);">
                                <i class="fa-solid fa-magnifying-glass-chart"></i>
                            </div>
                            <h6 class="fw-bold mb-0" style="color: #1e293b; font-size: 0.95rem;">Grab the attention<br>of recruiters</h6>
                        </div>
                    </div>
                    <!-- Item 4 -->
                    <div class="col-lg-3 col-md-6 col-6">
                        <div class="visibility-item">
                            <div class="visibility-icon mx-auto mb-3 d-flex align-items-center justify-content-center rounded-circle" style="width: 64px; height: 64px; background: var(--primary-purple); color: var(--accent-gold); font-size: 1.5rem; box-shadow: 0 6px 16px rgba(54, 52, 142, 0.2);">
                                <i class="fa-solid fa-flag-checkered"></i>
                            </div>
                            <h6 class="fw-bold mb-0" style="color: #1e293b; font-size: 0.95rem;">Take a leap towards<br>your first job</h6>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Block: On completion of course / They will get -->
            <div class="cert-completion-section mt-5 text-center" data-aos="fade-up">
                <div class="completion-header mb-4">
                    <div class="cert-section-divider d-flex align-items-center justify-content-center gap-3 mb-3 flex-wrap">
                        <span class="cert-divider-line"></span>
                        <h3 class="fw-bold mb-0 d-flex align-items-center gap-2" style="color: var(--primary-purple); font-size: 1.6rem;">
                            <i class="fa-solid fa-graduation-cap text-warning fs-4"></i>
                            <span>On completion of course</span>
                        </h3>
                        <span class="cert-divider-line"></span>
                    </div>
                    <div class="d-inline-block px-4 py-2 rounded-pill fw-bold text-white shadow-sm" style="background: var(--accent-gold); font-size: 1.1rem; letter-spacing: 0.5px;">
                        Learner will get
                    </div>
                </div>

                <div class="row g-4 justify-content-center mt-2">
                    <!-- Card 1 -->
                   
                    <!-- Card 2 -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="cert-preview-card bg-white rounded-4 shadow-sm border overflow-hidden d-flex flex-column h-100">
                            <div class="cert-preview-img-wrap p-3 flex-grow-1 d-flex align-items-center justify-content-center">
                                <img src="assets/images/Mepsc-marksheet.webp" alt="MEPSC Government Marksheet" class="img-fluid cert-preview-img rounded">
                            </div>
                            <div class="cert-preview-footer py-3 px-2 fw-bold text-white" style="background: var(--primary-purple); font-size: 0.95rem;">
                                MEPSC<br>Government Marksheet
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                     <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="cert-preview-card bg-white rounded-4 shadow-sm border overflow-hidden d-flex flex-column h-100">
                            <div class="cert-preview-img-wrap p-3 flex-grow-1 d-flex align-items-center justify-content-center">
                                <img src="assets/images/phonics-certificate.webp" alt="Hunarho Certificate" class="img-fluid cert-preview-img rounded">
                            </div>
                            <div class="cert-preview-footer py-3 px-2 fw-bold text-white" style="background: var(--primary-purple); font-size: 0.95rem;">
                                Hunarho Phonics <br>Certificate
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="cert-preview-card bg-white rounded-4 shadow-sm border overflow-hidden d-flex flex-column h-100">
                            <div class="cert-preview-img-wrap p-3 flex-grow-1 d-flex align-items-center justify-content-center">
                                <img src="assets/images/ecce-hunarho-certificate.webp" alt="Hunarho Certificate" class="img-fluid cert-preview-img rounded">
                            </div>
                            <div class="cert-preview-footer py-3 px-2 fw-bold text-white" style="background: var(--primary-purple); font-size: 0.95rem;">
                                Hunarho<br>Certificate
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="cert-preview-card bg-white rounded-4 shadow-sm border overflow-hidden d-flex flex-column h-100">
                            <div class="cert-preview-img-wrap p-3 flex-grow-1 d-flex align-items-center justify-content-center">
                                <img src="assets/images/hunarho-marksheet.webp" alt="Hunarho Marksheet" class="img-fluid cert-preview-img rounded">
                            </div>
                            <div class="cert-preview-footer py-3 px-2 fw-bold text-white" style="background: var(--primary-purple); font-size: 0.95rem;">
                                Hunarho<br>Marksheet
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- Bottom Motto Banner Pill -->
                <div class="mt-5 text-center">
                    <div class="cert-motto-pill d-inline-flex align-items-center gap-3 px-4 py-3 rounded-pill text-white shadow-sm" style="background: var(--primary-purple); font-size: 1.1rem; font-weight: 600;">
                        <i class="fa-solid fa-shield-check text-warning fs-5"></i>
                        <span>Your dedication today, a <strong style="color: #fbbf24;">brighter future</strong> tomorrow.</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ 100% FREE ACCESS AI COURSES SECTION ══════════════ -->
    <section class="py-3 bg-light" id="free-access-courses">
        <div class="container py-2">
            <!-- Header Section -->
            <div class="text-center mb-3" data-aos="fade-up">
                <div class="mb-2">
                    <span class="free-access-badge">
                        <i class="fa-solid fa-gift"></i> 100% FREE ACCESS
                    </span>
                </div>
                <h2 class="free-access-heading mb-2">
                    Get free access to <span class="ai-powered-text">AI Powered,</span><br>
                    21st Century Skill-based Courses
                </h2>
                <p class="free-access-subheading mb-3">
                    Future-ready skills for students, educators &amp; professionals. Learn for free and get certified by <strong style="color: #4f46e5;">Hunarho</strong>.
                </p>
            </div>

            <!-- Unified Master Split Card -->
            <div class="free-courses-master-card" data-aos="fade-up" data-aos-delay="100">
                <div class="row g-0 align-items-stretch">
                    <!-- Left Pane: Courses List -->
                    <div class="col-lg-6 free-courses-left-pane">
                        <span class="badge rounded-pill px-3 py-1 mb-2 align-self-start fw-bold" style="background: rgba(79, 70, 229, 0.1); color: #4f46e5; font-size: 11px;">
                            <i class="fa-solid fa-laptop-code me-1"></i> INCLUDED COURSES
                        </span>
                        <h3 class="fw-bold mb-1" style="font-size: 1.25rem; color: #1e1b4b;">Essential &amp; Future-Ready Skills</h3>
                        <p class="text-muted small mb-3" style="font-size: 0.82rem;">Master industry-standard tools alongside your ECCE training.</p>

                        <div class="d-flex flex-column gap-2">
                            <!-- Canva -->
                            <div class="free-mini-course-row">
                                <div class="free-mini-icon-box">
                                    <img src="assets/images/canva-logo.webp" alt="Canva" style="width: 24px; height: 24px; object-fit: contain;" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/0/08/Canva_icon_2021.svg'">
                                </div>
                                <div class="free-mini-content flex-grow-1">
                                    <h4>Canva for Educators</h4>
                                    <p>Design stunning classroom materials &amp; visual aids for free.</p>
                                </div>
                                <i class="fa-solid fa-circle-check text-success ms-auto" style="font-size: 1.1rem;"></i>
                            </div>

                            <!-- Microsoft Excel -->
                            <div class="free-mini-course-row">
                                <div class="free-mini-icon-box">
                                    <img src="assets/images/excel-logo.webp" alt="Excel" style="width: 24px; height: 24px; object-fit: contain;" onerror="this.src='https://upload.wikimedia.org/wikipedia/commons/3/34/Microsoft_Office_Excel_%282019%E2%80%93present%29.svg'">
                                </div>
                                <div class="free-mini-content flex-grow-1">
                                    <h4>Microsoft Excel Essentials</h4>
                                    <p>Learn student record management, grading &amp; data analysis.</p>
                                </div>
                                <i class="fa-solid fa-circle-check text-success ms-auto" style="font-size: 1.1rem;"></i>
                            </div>

                            <!-- Generative AI -->
                            <div class="free-mini-course-row">
                                <div class="free-mini-icon-box">
                                    <img src="assets/images/ai-head.webp" alt="AI for Educators" style="width: 26px; height: 26px; object-fit: contain;" onerror="this.src='assets/images/external/flaticon-8653246.webp'">
                                </div>
                                <div class="free-mini-content flex-grow-1">
                                    <h4>Generative AI for Educators</h4>
                                    <p>Use AI to innovate lesson planning &amp; inspire smart learning.</p>
                                </div>
                                <i class="fa-solid fa-circle-check text-success ms-auto" style="font-size: 1.1rem;"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Right Pane: Certificate & Benefits -->
                    <div class="col-lg-6 free-courses-right-pane">
                        <span class="badge rounded-pill px-3 py-1 mb-2 align-self-start fw-bold" style="background: rgba(255, 255, 255, 0.15); color: var(--accent-gold); font-size: 11px;">
                            <i class="fa-solid fa-certificate me-1"></i> RECOGNIZED CREDENTIAL
                        </span>
                        <h3 class="fw-bold mb-3 text-white" style="font-size: 1.25rem;">Course Completion Certificate</h3>

                        <!-- Certificate Image Frame -->
                         <div class="row">
                            <div class="col-lg-6">
                                <div class="free-cert-preview-frame">
                                    <img src="assets/images/hunarho-othercertificate.webp" alt="Course Completion Certificate" class="img-fluid free-cert-preview-img" onerror="this.src='assets/images/external/Certificate-ECCE-1.webp'">
                                </div>

                            </div>
                            <div class="col-lg-6">
                                 <!-- 4 Compact Grid Benefits -->
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="free-benefit-badge-item">
                                    <i class="fa-solid fa-award text-warning"></i>
                                    <span>Recognized Certificate</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="free-benefit-badge-item">
                                    <i class="fa-solid fa-rocket text-info"></i>
                                    <span>Boost Your Skills</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="free-benefit-badge-item">
                                    <i class="fa-solid fa-briefcase text-success"></i>
                                    <span>Enhance Your Career</span>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="free-benefit-badge-item">
                                    <i class="fa-solid fa-medal text-warning"></i>
                                    <span>Stand Out in Future</span>
                                </div>
                            </div>
                        </div>
                            </div>
                         </div>
                        

                       
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ HOW TO APPLY (REDESIGNED) ══════════════ -->
    <section class="py-5 apply-process-section" id="how-to-apply">
        <div class="container py-3">
            <div class="apply-process-container p-4 p-lg-5 rounded-4 bg-white shadow-sm border" data-aos="fade-up">
                <div class="row align-items-center g-4 g-lg-5">
                    <!-- Left Column: Title & CTA -->
                    <div class="col-lg-4 col-xl-3 border-lg-end pe-lg-4">
                        <div class="apply-left-block text-center text-lg-start">
                            <span class="badge text-dark mb-3 px-3 py-1 rounded-pill fw-bold" style="background: var(--accent-gold); font-size: 12px; letter-spacing: 1px;">PROCESS</span>
                            <h2 class="fs-2 fw-bold mb-3" style="color: var(--primary-purple);">How to Apply?</h2>
                            <p class="text-muted mb-4" style="font-size: 1.05rem; line-height: 1.6;">
                                Complete your application in 4 steps.
                            </p>
                            <a href="#enroll" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow-sm" style="background: var(--primary-purple); border: none;">
                                Start Now <i class="fa-solid fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Horizontal 4-Step Timeline -->
                    <div class="col-lg-8 col-xl-9 ps-lg-4">
                        <div class="process-timeline-wrapper position-relative">
                            <div class="row g-4 position-relative z-1 text-center text-md-start">
                                <!-- Step 1 -->
                                <div class="col-md-3 col-6">
                                    <div class="process-step-item position-relative">
                                        <div class="process-dot-wrap d-flex align-items-center mb-3">
                                            <div class="process-dot flex-shrink-0"></div>
                                            <div class="process-line flex-grow-1 d-none d-md-block"></div>
                                        </div>
                                        <div class="process-step-num fw-bold mb-1" style="color: var(--primary-purple); font-size: 1.25rem;">01</div>
                                        <h4 class="process-step-title fw-bold mb-1" style="color: #1e293b; font-size: 1.1rem;">Register</h4>
                                        <p class="process-step-desc text-muted mb-0" style="font-size: 0.9rem;">Create account</p>
                                    </div>
                                </div>

                                <!-- Step 2 -->
                                <div class="col-md-3 col-6">
                                    <div class="process-step-item position-relative">
                                        <div class="process-dot-wrap d-flex align-items-center mb-3">
                                            <div class="process-dot flex-shrink-0"></div>
                                            <div class="process-line flex-grow-1 d-none d-md-block"></div>
                                        </div>
                                        <div class="process-step-num fw-bold mb-1" style="color: var(--primary-purple); font-size: 1.25rem;">02</div>
                                        <h4 class="process-step-title fw-bold mb-1" style="color: #1e293b; font-size: 1.1rem;">Upload</h4>
                                        <p class="process-step-desc text-muted mb-0" style="font-size: 0.9rem;">Submit docs</p>
                                    </div>
                                </div>

                                <!-- Step 3 -->
                                <div class="col-md-3 col-6">
                                    <div class="process-step-item position-relative">
                                        <div class="process-dot-wrap d-flex align-items-center mb-3">
                                            <div class="process-dot flex-shrink-0"></div>
                                            <div class="process-line flex-grow-1 d-none d-md-block"></div>
                                        </div>
                                        <div class="process-step-num fw-bold mb-1" style="color: var(--primary-purple); font-size: 1.25rem;">03</div>
                                        <h4 class="process-step-title fw-bold mb-1" style="color: #1e293b; font-size: 1.1rem;">Screening</h4>
                                        <p class="process-step-desc text-muted mb-0" style="font-size: 0.9rem;">Review process</p>
                                    </div>
                                </div>

                                <!-- Step 4 -->
                                <div class="col-md-3 col-6">
                                    <div class="process-step-item position-relative">
                                        <div class="process-dot-wrap d-flex align-items-center mb-3">
                                            <div class="process-dot flex-shrink-0"></div>
                                            <!-- No line after step 4 -->
                                        </div>
                                        <div class="process-step-num fw-bold mb-1" style="color: var(--primary-purple); font-size: 1.25rem;">04</div>
                                        <h4 class="process-step-title fw-bold mb-1" style="color: #1e293b; font-size: 1.1rem;">Payment</h4>
                                        <p class="process-step-desc text-muted mb-0" style="font-size: 0.9rem;">Secure payment</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══════════════ TESTIMONIALS MARQUEE ══════════════ -->
    <section class="py-5 bg-white" id="testimonials">
        <div class="container-fluid px-0">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge text-dark mb-2 px-3 py-1 rounded-pill fw-bold shadow-sm" style="background: var(--accent-gold); font-size: 13px;">Success Stories</span>
                <h2 class="fs-2 fw-bold" style="color: var(--primary-purple);">What Our Students Say</h2>
            </div>
            
            <div class="marquee-container" data-aos="fade-up" data-aos-delay="100">
                <!-- Row 1: Right to Left -->
                <div class="marquee-track marquee-rtl">
                    <div class="marquee-content" id="marquee-content-rtl-1"></div>
                    <div class="marquee-content" id="marquee-content-rtl-2" aria-hidden="true"></div>
                </div>

                <!-- Row 2: Left to Right -->
                <div class="marquee-track marquee-ltr mt-4">
                    <div class="marquee-content" id="marquee-content-ltr-1"></div>
                    <div class="marquee-content" id="marquee-content-ltr-2" aria-hidden="true"></div>
                </div>
            </div>
        </div>
        <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('assets/data/ecce-testimonials.json')
                .then(response => response.json())
                .then(data => renderTestimonials(data))
                .catch(error => {
                    console.error("Error loading testimonials JSON:", error);
                });

            function renderTestimonials(testimonials) {
                if (!testimonials || !Array.isArray(testimonials) || testimonials.length === 0) return;

                const possibleRatings = [5, 4.5, 4];

                function getStarsHTML(rating) {
                    let stars = '';
                    let fullStars = Math.floor(rating);
                    let hasHalf = (rating % 1 !== 0);
                    for (let i = 0; i < fullStars; i++) {
                        stars += '<i class="fa-solid fa-star"></i>';
                    }
                    if (hasHalf) {
                        stars += '<i class="fa-solid fa-star-half-stroke"></i>';
                        fullStars++;
                    }
                    for (let i = fullStars; i < 5; i++) {
                        stars += '<i class="fa-regular fa-star"></i>';
                    }
                    return `<div class="stars">${stars}</div>`;
                }

                function createCardHTML(item) {
                    // Randomly assign 5, 4.5, or 4 rating on render
                    const randomRating = possibleRatings[Math.floor(Math.random() * possibleRatings.length)];
                    const starsHTML = getStarsHTML(randomRating);
                    const role = item.role || 'ECCE Learner';
                    return `
                        <div class="marquee-testimonial-card">
                            ${starsHTML}
                            <p>"${item.text}"</p>
                            <div class="testimonial-author">
                                <div>
                                    <h5 class="testimonial-name">${item.name}</h5>
                                    <p class="testimonial-role">${role}</p>
                                </div>
                            </div>
                        </div>
                    `;
                }

                // Sort by text length ascending (shortest to longest)
                const sortedByLength = [...testimonials].sort((a, b) => (a.text || '').length - (b.text || '').length);

                // Split into short length (Row 1 / First line) and long length (Row 2 / Second line)
                const mid = Math.ceil(sortedByLength.length / 2);
                let row1Items = sortedByLength.slice(0, mid);
                let row2Items = sortedByLength.slice(mid);

                // Shuffle within each row so card order feels dynamic rather than strictly staircased
                const shuffle = array => array.sort(() => Math.random() - 0.5);
                row1Items = shuffle(row1Items);
                row2Items = shuffle(row2Items);

                const row1HTML = row1Items.map(createCardHTML).join('');
                const row2HTML = row2Items.map(createCardHTML).join('');

                const rtl1 = document.getElementById('marquee-content-rtl-1');
                const rtl2 = document.getElementById('marquee-content-rtl-2');
                const ltr1 = document.getElementById('marquee-content-ltr-1');
                const ltr2 = document.getElementById('marquee-content-ltr-2');

                if (rtl1 && rtl2) {
                    rtl1.innerHTML = row1HTML;
                    rtl2.innerHTML = row1HTML;
                }
                if (ltr1 && ltr2) {
                    ltr1.innerHTML = row2HTML;
                    ltr2.innerHTML = row2HTML;
                }
            }
        });
        </script>
    </section>

    <!-- ══════════════ FAQ SECTION ══════════════ -->
    <section class="py-5 bg-white" id="faq">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge text-dark mb-3 px-3 py-2 rounded-pill fw-bold shadow-sm" style="background: var(--accent-gold); font-size: 14px;">Got Questions?</span>
                <h2 class="fs-2 fw-bold" style="color: var(--primary-purple);">Frequently Asked Questions</h2>
            </div>
            
            <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
                <div class="col-lg-8">
                    <div class="accordion custom-accordion" id="ecceFaqAccordion">
                        
                        <!-- FAQ 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Who is eligible to apply for the ECCE Course?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#ecceFaqAccordion">
                                <div class="accordion-body">
                                    Anyone who has completed their 12th grade (from any recognized board) and is <strong>18 years or older</strong> can apply. Whether you’re an aspiring preschool teacher, a woman restarting her career, or someone passionate about early childhood education, this course is designed for you.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Is this course recognized and certified?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#ecceFaqAccordion">
                                <div class="accordion-body">
                                    Yes, upon successful completion, you’ll receive a <strong>Certificate of Completion certified by MEPSC</strong> (Management &amp; Entrepreneurship and Professional Skills Council) and aligned with <strong>NSQF Level 3</strong>, making it a nationally valid and employable qualification.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    What is the duration and structure of the program?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#ecceFaqAccordion">
                                <div class="accordion-body">
                                    The ECCE program is a <strong>6-month online course</strong>, combining live expert-led sessions, self-paced video lessons, internship opportunities, real-world projects, and access to high-quality reading materials via a dedicated LMS.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    Does the course include any practical experience?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#ecceFaqAccordion">
                                <div class="accordion-body">
                                    Absolutely. The program includes <strong>100+ hours of guided internships</strong> in reputed preschools, providing hands-on classroom exposure that strengthens your teaching skills and boosts employability.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Will I get placement support after completing the course?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#ecceFaqAccordion">
                                <div class="accordion-body">
                                    Yes. The program offers <strong>personalized career guidance</strong>, interview coaching, and access to job opportunities through our partner schools, helping you confidently step into the early education sector.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ 6 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    How do I apply for the ECCE Course?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#ecceFaqAccordion">
                                <div class="accordion-body">
                                    You can apply by filling out the online application form, followed by uploading the required documents and photographs, and completing the screening and secure fee payment process.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
require __DIR__ . '/includes/footer.php';
