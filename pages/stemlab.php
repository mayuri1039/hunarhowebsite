<?php
$activePage = 'stemlab';
$extraCss = ['/css/stemlab.css?v=2.4'];
require __DIR__ . '/../includes/header.php';
?>

<div class="stem-page">
    <!-- 1. Hero Section -->
    <section class="stem-hero position-relative">
        <div class="stem-dot-pattern"></div>
        <div class="container py-4 position-relative z-index-1">
            <div class="row align-items-center">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="stem-hero-badge bg-light-cyan text-cyan">
                        The future is STEM!
                    </div>
                    
                    <h1 class="stem-hero-title text-primary">
                        <span class="text-gradient">STEM</span> LAB
                    </h1>
                    <h2 class="stem-hero-subtitle text-dark fw-bold mb-4">Explore. Build. Innovate. Learn.</h2>
                    
                    <p class="stem-hero-desc text-muted mb-4 pe-lg-5">
                        Unlock the potential of your students with our state-of-the-art STEM Labs. Designed to foster creativity, critical thinking, and problem-solving skills, our labs provide hands-on learning experiences for the future innovators.
                    </p>
                    
                    <div class="stem-tags d-flex flex-wrap gap-2 mb-4">
                        <span class="stem-tag tag-blue"><i class="fa-solid fa-code me-2"></i>Coding</span>
                        <span class="stem-tag tag-green"><i class="fa-solid fa-robot me-2"></i>Robotics</span>
                        <span class="stem-tag tag-orange"><i class="fa-solid fa-vr-cardboard me-2"></i>AR/VR</span>
                        <span class="stem-tag tag-purple"><i class="fa-solid fa-wifi me-2"></i>IoT</span>
                    </div>
                </div>
                
                <div class="col-lg-6 position-relative mt-5 mt-lg-0" data-aos="fade-left">
                    <div class="hero-img-container">
                        <div class="hero-img-backdrop"></div>
                        <img src="/assets/images/external/avgc-4.webp" alt="STEM Lab Students" class="hero-main-img shadow-lg rounded-4">
                        
                        <div class="floating-card-top shadow-sm">
                            <div class="floating-icon bg-blue text-white"><i class="fa-solid fa-flask"></i></div>
                            <div class="fw-bold ms-3">Practical Experience</div>
                        </div>
                        
                        <div class="floating-card-bottom shadow">
                            <div class="floating-icon bg-pink text-white"><i class="fa-solid fa-users"></i></div>
                            <div class="ms-3">
                                <strong class="fs-5">10,000+</strong><br>
                                <span class="text-muted small">Students Impacted</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2. The Challenge Section -->
    <section class="stem-challenge dark-blue-bg py-5">
        <div class="container py-4 text-center">
            <h2 class="text-white mb-3 fw-bold">The <span class="text-gradient-purple">Challenge</span></h2>
            <p class="text-light-gray mx-auto mb-5" style="max-width: 800px;">
                The world is changing rapidly, and education must keep pace. We face a significant gap between the skills taught in traditional classrooms and those required by the modern workforce. Our STEM labs bridge this gap.
            </p>
            
            <div class="row g-3 justify-content-center">
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <div class="stat-card-new">
                        <div class="stat-icon-circle bg-blue"><i class="fa-solid fa-chart-pie"></i></div>
                        <h3 class="text-cyan fw-bold mt-3 mb-2">45%</h3>
                        <p class="text-light-gray small m-0">Of jobs in the future will require AI and tech literacy (WEF)</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="stat-card-new">
                        <div class="stat-icon-circle bg-pink"><i class="fa-solid fa-users"></i></div>
                        <h3 class="text-pink fw-bold mt-3 mb-2">67.7M</h3>
                        <p class="text-light-gray small m-0">New jobs likely to be created by 2030 across sectors</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <div class="stat-card-new">
                        <div class="stat-icon-circle bg-green"><i class="fa-solid fa-power-off"></i></div>
                        <h3 class="text-green fw-bold mt-3 mb-2">1 in 50</h3>
                        <p class="text-light-gray small m-0">Schools in India have dedicated tech spaces for experiential learning</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="400">
                    <div class="stat-card-new">
                        <div class="stat-icon-circle bg-purple"><i class="fa-solid fa-chart-pie"></i></div>
                        <h3 class="text-purple fw-bold mt-3 mb-2">15%</h3>
                        <p class="text-light-gray small m-0">Less likely to be unemployed with early exposure to coding</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="500">
                    <div class="stat-card-new">
                        <div class="stat-icon-circle bg-blue-alt"><i class="fa-solid fa-arrow-trend-up"></i></div>
                        <h3 class="text-cyan fw-bold mt-3 mb-2">28.5%</h3>
                        <p class="text-light-gray small m-0">Growth expected for top emerging tech jobs in the next 5 years</p>
                    </div>
                </div>
                <div class="col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="600">
                    <div class="stat-card-new">
                        <div class="stat-icon-circle bg-orange"><i class="fa-solid fa-coins"></i></div>
                        <h3 class="text-warning fw-bold mt-3 mb-2">$8.2T</h3>
                        <p class="text-light-gray small m-0">Projected global GDP gap by 2030 due to tech talent shortage</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 3. What is STEAM? -->
    <section class="stem-whatis py-5 position-relative">
        <div class="stem-dot-pattern top-left-pattern"></div>
        <div class="container py-4 position-relative z-index-1">
            <div class="row align-items-center">
                <div class="col-lg-6 pe-lg-5" data-aos="fade-right">
                    <h2 class="fw-bold mb-4">What is <span class="text-gradient-teal">STEAM?</span></h2>
                    
                    <p class="text-muted mb-3 small">
                        STEAM is an educational approach to learning that uses Science, Technology, Engineering, the Arts and Mathematics as access points for guiding student <strong>dialogue, and critical thinking.</strong>
                    </p>
                    <p class="text-muted mb-4 small">
                        The end results are students who take thoughtful risks, engage in experiential learning, persist in problem-solving, embrace collaboration, and work through the creative process. These are the innovators, educators, leaders, and learners of the 21st century!
                    </p>
                    
                    <div class="steam-circle-icons mt-4 d-flex justify-content-between">
                        <div class="steam-circle text-center">
                            <div class="circle-s bg-blue-light text-blue shadow-sm mb-2">S</div>
                            <span class="small fw-bold text-blue">Science</span>
                        </div>
                        <div class="steam-circle text-center">
                            <div class="circle-t bg-purple-light text-purple shadow-sm mb-2">T</div>
                            <span class="small fw-bold text-purple">Technology</span>
                        </div>
                        <div class="steam-circle text-center">
                            <div class="circle-e bg-orange-light text-orange shadow-sm mb-2">E</div>
                            <span class="small fw-bold text-orange">Engineering</span>
                        </div>
                        <div class="steam-circle text-center">
                            <div class="circle-a bg-pink-light text-pink shadow-sm mb-2">A</div>
                            <span class="small fw-bold text-pink">Arts</span>
                        </div>
                        <div class="steam-circle text-center">
                            <div class="circle-m bg-green-light text-green shadow-sm mb-2">M</div>
                            <span class="small fw-bold text-green">Mathematics</span>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 mt-5 mt-lg-0" data-aos="fade-left">
                    <div class="steam-img-collage position-relative">
                        <div class="green-blob"></div>
                        <img loading="lazy" src="/assets/images/external/avgc-3.webp" alt="Students collaborating" class="img-fluid rounded-4 shadow-lg position-relative z-index-1 w-100">
                        <img loading="lazy" src="/assets/images/external/avgc-2.webp" alt="Student coding" class="img-fluid rounded-4 shadow position-absolute z-index-2 small-overlay-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Why STEAM is Critical Today -->
    <section class="stem-critical bg-light py-5">
        <div class="container py-4 text-center">
            <h2 class="fw-bold mb-3">Why STEAM is <span class="text-gradient-purple">Critical</span> Today</h2>
            <p class="text-muted mx-auto mb-5 small" style="max-width: 600px;">
                Preparing students for a rapidly evolving digital landscape and fostering the innovators of tomorrow.
            </p>
            
            <div class="row justify-content-center g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="critical-card">
                        <div class="card-icon bg-blue-light text-primary"><i class="fa-solid fa-briefcase"></i></div>
                        <div class="text-center mt-3">
                            <h5 class="fw-bold text-dark">Future Jobs</h5>
                            <p class="text-muted small mb-0">Equips students with the technical skills required for the jobs of tomorrow.</p>
                        </div>
                        <div class="card-dot dot-blue"></div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="critical-card">
                        <div class="card-icon bg-green-light text-success"><i class="fa-solid fa-chart-line"></i></div>
                        <div class="text-center mt-3">
                            <h5 class="fw-bold text-dark">Huge Potential</h5>
                            <p class="text-muted small mb-0">Unlocks the creative potential of youth, allowing them to build and innovate.</p>
                        </div>
                        <div class="card-dot dot-green"></div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="critical-card">
                        <div class="card-icon bg-purple-light text-purple"><i class="fa-solid fa-link"></i></div>
                        <div class="text-center mt-3">
                            <h5 class="fw-bold text-dark">Close the Gap</h5>
                            <p class="text-muted small mb-0">Addresses the skill gap between traditional education and industry demands.</p>
                        </div>
                        <div class="card-dot dot-purple"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Our Offerings -->
    <section class="stem-offerings py-5">
        <div class="container py-4 text-center">
            <h2 class="fw-bold mb-3">Our <span class="text-dark">Offerings</span></h2>
            <p class="text-muted mx-auto mb-5 small" style="max-width: 700px;">
                Comprehensive lab setups to transform your educational institution into a hub of innovation and practical learning.
            </p>
            
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="offering-card-new h-100 bg-white rounded-4 shadow-sm text-start position-relative">
                        <div class="offering-img-top position-relative">
                            <img loading="lazy" src="/assets/images/external/skilllab.webp" alt="Tinkering Lab" class="w-100 rounded-top-4">
                            <div class="offering-floating-icon shadow bg-white text-purple"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                        </div>
                        <div class="p-4 pt-5 mt-2">
                            <h5 class="fw-bold text-dark mb-2">Composite Skill Lab</h5>
                            <p class="text-muted small mb-0">Multi-domain learning space for Electronics, Healthcare, Agriculture, Food Production, IT, and AI. Fully compliant with CBSE Circular Skill-75/2024.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="offering-card-new h-100 bg-white rounded-4 shadow-sm text-start position-relative">
                        <div class="offering-img-top position-relative">
                            <img loading="lazy" src="/assets/images/external/Hydrophonics.webp" alt="Hydroponics Setup" class="w-100 rounded-top-4">
                            <div class="offering-floating-icon shadow bg-white text-success"><i class="fa-solid fa-leaf"></i></div>
                        </div>
                        <div class="p-4 pt-5 mt-2">
                            <h5 class="fw-bold text-dark mb-2">Hydroponics Setup</h5>
                            <p class="text-muted small mb-0">Soil-less farming lab systems including DWC, NFT, Vertical Towers, and Green Walls. Teaches sustainability, biology, and agricultural technology.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="offering-card-new h-100 bg-white rounded-4 shadow-sm text-start position-relative">
                        <div class="offering-img-top position-relative">
                            <img loading="lazy" src="/assets/images/external/stemkits.webp" alt="AR/VR Setup" class="w-100 rounded-top-4">
                            <div class="offering-floating-icon shadow bg-white text-pink"><i class="fa-solid fa-vr-cardboard"></i></div>
                        </div>
                        <div class="p-4 pt-5 mt-2">
                            <h5 class="fw-bold text-dark mb-2">STEAM Kits</h5>
                            <p class="text-muted small mb-0">Grade-specific kits covering robotics, coding, AI/ML, IoT, electronics, and creative engineering. Ranging from beginner to advanced levels.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6. Why Hunarho? -->
    <section class="stem-why-hunarho py-5 dark-blue-bg position-relative overflow-hidden">
        <!-- Decorative Glows -->
        <div class="position-absolute rounded-circle" style="width: 400px; height: 400px; background: rgba(6, 182, 212, 0.15); filter: blur(80px); top: -100px; right: -100px; z-index: 0;"></div>
        <div class="position-absolute rounded-circle" style="width: 300px; height: 300px; background: rgba(236, 72, 153, 0.1); filter: blur(80px); bottom: -50px; left: -50px; z-index: 0;"></div>
        
        <div class="container py-5 position-relative z-index-1">
            <div class="row align-items-center">
                <!-- Left Content: Sticky/Text -->
                <div class="col-lg-4 mb-5 mb-lg-0 pe-lg-4" data-aos="fade-right">
                    <div class="badge-pill bg-dark-pill text-cyan mb-3 border border-secondary"><i class="fa-solid fa-star me-2 text-warning"></i>The Hunarho Edge</div>
                    <h2 class="fw-bold mb-4 text-white display-5">Why Choose <br><span class="text-gradient-cyan">Hunarho?</span></h2>
                    <p class="text-light-gray mb-4" style="line-height: 1.8;">
                        We don't just provide equipment; we deliver a complete ecosystem. Our comprehensive approach ensures that your institution is fully equipped to foster the next generation of innovators.
                    </p>
                </div>
                
                <!-- Right Content: Grid of Cards -->
                <div class="col-lg-8">
                    <div class="row g-4">
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                            <div class="premium-glass-card h-100 p-4 rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="premium-icon-box bg-blue-light text-blue shadow-sm"><i class="fa-solid fa-medal"></i></div>
                                    <h6 class="fw-bold mb-0 ms-3 text-white">Best-in-class Content (B2B)</h6>
                                </div>
                                <p class="text-light-gray small m-0">Industry-aligned curriculum created by expert professionals and STEM educators.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                            <div class="premium-glass-card h-100 p-4 rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="premium-icon-box bg-green-light text-green shadow-sm"><i class="fa-solid fa-graduation-cap"></i></div>
                                    <h6 class="fw-bold mb-0 ms-3 text-white">Pedagogically Sound</h6>
                                </div>
                                <p class="text-light-gray small m-0">Focuses on experiential learning, critical thinking, and real-world applications.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="300">
                            <div class="premium-glass-card h-100 p-4 rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="premium-icon-box bg-purple-light text-purple shadow-sm"><i class="fa-solid fa-book-open"></i></div>
                                    <h6 class="fw-bold mb-0 ms-3 text-white">Curriculum Aligned</h6>
                                </div>
                                <p class="text-light-gray small m-0">Seamlessly integrates with NEP 2020 and standard/international curriculum.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
                            <div class="premium-glass-card h-100 p-4 rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="premium-icon-box bg-orange-light text-orange shadow-sm"><i class="fa-solid fa-lightbulb"></i></div>
                                    <h6 class="fw-bold mb-0 ms-3 text-white">21st Century Skills</h6>
                                </div>
                                <p class="text-light-gray small m-0">Develop collaboration, communication, creativity, and problem-solving.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                            <div class="premium-glass-card h-100 p-4 rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="premium-icon-box bg-pink-light text-pink shadow-sm"><i class="fa-solid fa-chalkboard-user"></i></div>
                                    <h6 class="fw-bold mb-0 ms-3 text-white">Continuous Mentoring</h6>
                                </div>
                                <p class="text-light-gray small m-0">Ongoing support and guidance for educators to ensure successful implementation.</p>
                            </div>
                        </div>
                        
                        <div class="col-md-6" data-aos="fade-up" data-aos-delay="600">
                            <div class="premium-glass-card h-100 p-4 rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="premium-icon-box bg-teal-light text-teal shadow-sm"><i class="fa-solid fa-microchip"></i></div>
                                    <h6 class="fw-bold mb-0 ms-3 text-white">Tech Integration</h6>
                                </div>
                                <p class="text-light-gray small m-0">State-of-the-art hardware and software tools that are easy to use and maintain.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7. The Hunarho Solution -->
    <section class="stem-solution py-5 bg-light">
        <div class="container py-4 text-center">
            <h2 class="fw-bold mb-5">The <span class="text-gradient-cyan">Hunarho</span> Solution</h2>
            
            <div class="horizontal-timeline-wrapper d-flex justify-content-between align-items-start position-relative">
                <div class="timeline-line"></div>
                
                <div class="timeline-step" data-aos="fade-up" data-aos-delay="100">
                    <div class="step-icon-circle bg-blue text-white shadow mx-auto mb-3"><i class="fa-solid fa-store"></i></div>
                    <h6 class="text-blue fw-bold">Setting Up The Space</h6>
                    <p class="text-muted small">Transforming standard classrooms into vibrant, engaging, and fully functional innovation labs.</p>
                </div>
                
                <div class="timeline-step" data-aos="fade-up" data-aos-delay="200">
                    <div class="step-icon-circle bg-pink text-white shadow mx-auto mb-3"><i class="fa-solid fa-microchip"></i></div>
                    <h6 class="text-pink fw-bold">Hardware Configuration</h6>
                    <p class="text-muted small">Installation of 3D printers, robotics kits, IoT devices, and AR/VR headsets tailored to your needs.</p>
                </div>
                
                <div class="timeline-step" data-aos="fade-up" data-aos-delay="300">
                    <div class="step-icon-circle bg-green text-white shadow mx-auto mb-3"><i class="fa-solid fa-cubes"></i></div>
                    <h6 class="text-green fw-bold">STEM Kits & Resources</h6>
                    <p class="text-muted small">Providing comprehensive, grade-appropriate kits and materials for hands-on learning.</p>
                </div>
                
                <div class="timeline-step" data-aos="fade-up" data-aos-delay="400">
                    <div class="step-icon-circle bg-purple text-white shadow mx-auto mb-3"><i class="fa-solid fa-user-tie"></i></div>
                    <h6 class="text-purple fw-bold">Teacher Training</h6>
                    <p class="text-muted small">Empowering educators with the knowledge and confidence to deliver effective STEM education.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 8. Our 5E Methodology -->
    <section class="stem-5e py-5">
        <div class="container py-4">
            <div class="five-e-card dark-blue-bg rounded-4 shadow p-5 position-relative overflow-hidden text-center text-white">
                <div class="stem-dot-pattern opacity-25"></div>
                <div class="position-relative z-index-1">
                    <h2 class="fw-bold mb-3">Our <span class="text-cyan">5E</span> Methodology</h2>
                    <p class="text-light-gray mx-auto mb-5 small" style="max-width: 600px;">
                        An instructional model based on the constructivist approach to learning, which says that learners build or construct new ideas on top of their old ideas.
                    </p>
                    
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-4 col-lg-2-5" data-aos="fade-up" data-aos-delay="100">
                            <div class="method-icon-top text-cyan mb-3"><i class="fa-solid fa-comments fs-2"></i></div>
                            <h6 class="fw-bold">Engage</h6>
                            <p class="text-light-gray small">Pique curiosity and connect to prior knowledge.</p>
                        </div>
                        <div class="col-md-4 col-lg-2-5" data-aos="fade-up" data-aos-delay="200">
                            <div class="method-icon-top text-cyan mb-3"><i class="fa-solid fa-search fs-2"></i></div>
                            <h6 class="fw-bold">Explore</h6>
                            <p class="text-light-gray small">Provide hands-on experiences to investigate concepts.</p>
                        </div>
                        <div class="col-md-4 col-lg-2-5" data-aos="fade-up" data-aos-delay="300">
                            <div class="method-icon-top text-warning mb-3"><i class="fa-solid fa-lightbulb fs-2"></i></div>
                            <h6 class="fw-bold">Explain</h6>
                            <p class="text-light-gray small">Formalize understanding and introduce vocabulary.</p>
                        </div>
                        <div class="col-md-4 col-lg-2-5" data-aos="fade-up" data-aos-delay="400">
                            <div class="method-icon-top text-green mb-3"><i class="fa-solid fa-puzzle-piece fs-2"></i></div>
                            <h6 class="fw-bold">Elaborate</h6>
                            <p class="text-light-gray small">Apply knowledge to new situations and solve problems.</p>
                        </div>
                        <div class="col-md-4 col-lg-2-5" data-aos="fade-up" data-aos-delay="500">
                            <div class="method-icon-top text-purple mb-3"><i class="fa-solid fa-clipboard-check fs-2"></i></div>
                            <h6 class="fw-bold">Evaluate</h6>
                            <p class="text-light-gray small">Assess understanding and learning outcomes.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. CTA -->
    <section class="stem-cta pb-5">
        <div class="container pb-4">
            <div class="cta-banner-new rounded-4 text-white text-center p-5 position-relative overflow-hidden shadow-lg" data-aos="zoom-in">
                <!-- Decorative Elements -->
                <i class="fa-solid fa-rocket cta-decor cta-rocket text-white opacity-50 display-1 position-absolute bottom-0 start-0 ms-4 mb-4"></i>
                <i class="fa-solid fa-robot cta-decor cta-robot text-white opacity-50 display-1 position-absolute bottom-0 end-0 me-4 mb-4"></i>
                
                <div class="position-relative z-index-1 py-3">
                    <h2 class="mb-3 fw-bold">Ready to Build Your Future with STEM Labs?</h2>
                    <p class="mb-4 text-light mx-auto small" style="max-width: 600px;">
                        Join over 500+ schools empowering the next generation of innovators, makers, and problem solvers. Let's create an education together.
                    </p>
                    <a href="contact" class="btn btn-light text-primary btn-sm rounded-pill fw-bold px-4 py-2 mt-2">Contact Us <i class="fa-solid fa-arrow-right ms-2"></i></a>
                </div>
            </div>
        </div>
    </section>

</div>

<?php require __DIR__ . '/../includes/footer.php'; ?>
