<?php
$activePage = 'contact';
$demoInterest = 'General Enquiry';
$extraCss = ['/css/contact.css?v=1.3'];

$extraInlineJs = <<<'JS'
// Math Captcha & Form Validation Handler
document.addEventListener('DOMContentLoaded', function() {
    let captchaTotal = 0;

    function generateCaptcha() {
        const numA = Math.floor(Math.random() * 8) + 2;
        const numB = Math.floor(Math.random() * 8) + 1;
        captchaTotal = numA + numB;
        
        const questionEl = document.getElementById('captchaQuestionText');
        if (questionEl) {
            questionEl.innerText = numA + ' + ' + numB + ' = ?';
        }
        const inputEl = document.getElementById('contactCaptcha');
        if (inputEl) {
            inputEl.value = '';
            inputEl.classList.remove('is-invalid');
        }
    }

    // Initialize captcha
    generateCaptcha();

    // Refresh captcha button
    const refreshBtn = document.getElementById('btnRefreshCaptcha');
    if (refreshBtn) {
        refreshBtn.addEventListener('click', function(e) {
            e.preventDefault();
            generateCaptcha();
        });
    }

    // Handle form submission
    const contactForm = document.getElementById('contactExpertForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();

            // Check standard HTML5 validity
            if (!contactForm.checkValidity()) {
                e.stopPropagation();
                contactForm.classList.add('was-validated');
                return;
            }

            // Verify math captcha
            const userCaptcha = parseInt(document.getElementById('contactCaptcha').value, 10);
            if (userCaptcha !== captchaTotal) {
                const captchaInput = document.getElementById('contactCaptcha');
                captchaInput.classList.add('is-invalid');
                captchaInput.focus();
                return;
            }

            // Submit loading state
            const submitBtn = document.getElementById('btnContactSubmit');
            const originalHTML = submitBtn.innerHTML;
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Sending your message...';

            // Gather form data
            const formData = new FormData(contactForm);

            fetch('/process_contact', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    submitBtn.style.background = '#10B981';
                    submitBtn.innerHTML = '<i class="fa-solid fa-circle-check me-2"></i> Message Sent Successfully!';
                    
                    const alertContainer = document.getElementById('contactAlertArea');
                    if (alertContainer) {
                        alertContainer.innerHTML = `
                            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-3 mt-3" role="alert" style="border-radius: 14px;">
                                <i class="fa-solid fa-circle-check fs-4 text-success"></i>
                                <div>
                                    <strong>Thank you for reaching out!</strong><br>
                                    Our academic expert has received your request and will get in touch with you within 24 hours.
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `;
                    }

                    setTimeout(() => {
                        contactForm.reset();
                        contactForm.classList.remove('was-validated');
                        generateCaptcha();
                        submitBtn.disabled = false;
                        submitBtn.style.background = '';
                        submitBtn.innerHTML = originalHTML;
                    }, 4000);
                } else {
                    // Handle error
                    const alertContainer = document.getElementById('contactAlertArea');
                    if (alertContainer) {
                        alertContainer.innerHTML = `
                            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-3 mt-3" role="alert" style="border-radius: 14px;">
                                <i class="fa-solid fa-circle-xmark fs-4 text-danger"></i>
                                <div>
                                    <strong>Error!</strong><br>
                                    ${data.message || 'There was a problem sending your message. Please try again.'}
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
                const alertContainer = document.getElementById('contactAlertArea');
                if (alertContainer) {
                    alertContainer.innerHTML = `
                        <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm d-flex align-items-center gap-3 mt-3" role="alert" style="border-radius: 14px;">
                            <i class="fa-solid fa-circle-xmark fs-4 text-danger"></i>
                            <div>
                                <strong>Error!</strong><br>
                                An unexpected error occurred. Please try again later.
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

require __DIR__ . '/../includes/header.php';
?>

<!-- ══════════════ HERO BANNER ══════════════ -->
<header class="contact-hero">
    <div class="contact-hero-overlay"></div>
    <div class="contact-hero-glow-1"></div>
    <div class="contact-hero-glow-2"></div>

    <div class="container position-relative z-2">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="contact-hero-badge">
                    <i class="fa-solid fa-headset"></i> Connect With Hunarho
                </div>
                <h1 class="contact-hero-title">
                    Let’s build a career together. <br>
                    <span class="gold-accent">Get in touch with us</span>
                </h1>
                <p class="contact-hero-subtitle mx-auto">
                    Climb the ladder of skill-enabled success by tapping into and learning from the best minds in your area of interest. Fill up the form to get in touch with us!
                </p>

                <div class="contact-hero-stats justify-content-center">
                    <div class="contact-stat-pill">
                        <i class="fa-solid fa-clock"></i>
                        <span>Quick 24-Hour Response</span>
                    </div>
                    <div class="contact-stat-pill">
                        <i class="fa-solid fa-user-graduate"></i>
                        <span>Dedicated Career Guidance</span>
                    </div>
                    <div class="contact-stat-pill">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>100% Confidential Consultation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ══════════════ MAIN CONTACT CHANNELS & FORM SECTION ══════════════ -->
<section class="contact-main-section">
    <div class="container">
        <div class="row g-4 align-items-start pt-4">
            <!-- Left Column: Contact Us Through -->
            <div class="col-lg-5" data-aos="fade-right">
                <div class="mb-4">
                    <span class="badge rounded-pill bg-light text-primary px-3 py-2 fw-bold mb-2 border">
                        DIRECT CONTACT
                    </span>
                    <h2 class="fw-bold text-dark fs-3">Contact us through</h2>
                    <p class="text-muted">Choose your preferred channel to reach our team immediately.</p>
                </div>

                <!-- Email Card -->
                <div class="contact-channel-card">
                    <div class="d-flex align-items-start gap-3">
                        <div class="channel-icon-wrapper">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div class="channel-content">
                            <h4>Email</h4>
                            <p class="mb-1">Send an email to</p>
                            <a href="mailto:support@hunarho.com">support@hunarho.com</a>
                        </div>
                    </div>
                </div>

                <!-- Phone Contact Card -->
                <div class="contact-channel-card">
                    <div class="d-flex align-items-start gap-3">
                        <div class="channel-icon-wrapper">
                            <i class="fa-solid fa-phone-volume"></i>
                        </div>
                        <div class="channel-content">
                            <h4>Contact</h4>
                            <p class="mb-1">Call us at</p>
                            <a href="tel:+917304002635">+91 7304002635</a>
                        </div>
                    </div>
                </div>

                <!-- Office Address Card -->
                <div class="contact-channel-card">
                    <div class="d-flex align-items-start gap-3">
                        <div class="channel-icon-wrapper">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div class="channel-content">
                            <h4>Address</h4>
                            <p class="mb-0">
                                Plot No. 15, Sector - 17, Kamothe, Raigad, Navi Mumbai, Maharashtra 410209
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Support Availability Card -->
                <div class="contact-hours-card mt-3">
                    <h5><i class="fa-solid fa-calendar-check"></i> Support Availability</h5>
                    <ul class="contact-hours-list">
                        <li>
                            <span>Monday - Friday</span>
                            <span>9:00 AM - 6:30 PM</span>
                        </li>
                        <li>
                            <span>Saturday</span>
                            <span>10:00 AM - 4:00 PM</span>
                        </li>
                        <li>
                            <span>Sunday</span>
                            <span>Closed</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Right Column: Talk to an Expert Form -->
            <div class="col-lg-7" data-aos="fade-left" data-aos-delay="150">
                <div class="contact-form-card">
                    <span class="form-header-badge">
                        <i class="fa-solid fa-circle-question me-1"></i> FREE CONSULTATION
                    </span>
                    <h3 class="contact-form-title">Talk to an Expert!</h3>
                    <p class="contact-form-subtitle">Let us help you guide towards your career path</p>

                    <div id="contactAlertArea"></div>

                    <form id="contactExpertForm" class="needs-validation" novalidate>
                        <!-- Full Name -->
                        <div class="mb-4">
                            <label class="contact-form-label" for="contactFullName">
                                <span>Your full name <span class="text-danger">*</span></span>
                                <i class="fa-regular fa-user text-muted"></i>
                            </label>
                            <input type="text" class="form-control contact-form-input" id="contactFullName" name="fullName"
                                placeholder="Enter your full name" required>
                            <div class="invalid-feedback">Please enter your full name.</div>
                        </div>

                        <!-- Phone Number & Email ID Row -->
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="contact-form-label" for="contactPhone">
                                    <span>Phone number <span class="text-danger">*</span></span>
                                    <i class="fa-solid fa-phone text-muted"></i>
                                </label>
                                <input type="tel" class="form-control contact-form-input" id="contactPhone" name="phone"
                                    placeholder="+91 XXXXX XXXXX" required>
                                <div class="invalid-feedback">Please provide your mobile number.</div>
                            </div>

                            <div class="col-md-6">
                                <label class="contact-form-label" for="contactEmail">
                                    <span>Email ID <span class="text-danger">*</span></span>
                                    <i class="fa-regular fa-envelope text-muted"></i>
                                </label>
                                <input type="email" class="form-control contact-form-input" id="contactEmail" name="email"
                                    placeholder="name@example.com" required>
                                <div class="invalid-feedback">Please provide a valid email address.</div>
                            </div>
                        </div>

                        <!-- Reason to connect -->
                        <div class="mb-4">
                            <label class="contact-form-label" for="contactReason">
                                <span>Reason to connect <span class="text-danger">*</span></span>
                                <i class="fa-solid fa-list-check text-muted"></i>
                            </label>
                            <select class="form-select contact-form-select" id="contactReason" name="reason" required>
                                <option value="" selected disabled>Select your reason to connect...</option>
                                
                                <optgroup label="Our Solutions">
                                    <option value="LMS Platform">LMS Platform</option>
                                    <option value="STEM Lab">STEM Lab</option>
                                    <option value="AVGC Lab">AVGC Lab</option>
                                    <option value="TPO Management System">TPO Management System</option>
                                    <option value="Question Paper Generator">Question Paper Generator</option>
                                </optgroup>
                                
                                <optgroup label="Programs & Courses">
                                    <option value="ECCE course">ECCE course</option>
                                    <option value="Free Certification Course">Mumbai University Courses</option>
                                    <option value="Job Oriented Course">Job Oriented Course</option>
                                </optgroup>
                                
                                <optgroup label="Other Queries">
                                    <option value="General Enquiry">General Enquiry</option>
                                    <option value="Hire with us">Hire with us</option>
                                    <option value="Other">Other</option>
                                </optgroup>
                            </select>
                            <div class="invalid-feedback">Please select a reason to connect.</div>
                        </div>

                        <!-- How can we help you? -->
                        <div class="mb-4">
                            <label class="contact-form-label" for="contactMessage">
                                <span>How can we help you? <span class="text-danger">*</span></span>
                                <i class="fa-regular fa-comment-dots text-muted"></i>
                            </label>
                            <textarea class="form-control contact-form-textarea" id="contactMessage" name="message" rows="4"
                                placeholder="Tell us about your educational background, career goals, or any specific questions you have..."
                                required></textarea>
                            <div class="invalid-feedback">Please describe how we can help you.</div>
                        </div>

                        <!-- Captcha -->
                        <div class="mb-4">
                            <label class="contact-form-label">
                                <span>Captcha verification <span class="text-danger">*</span></span>
                                <span class="badge bg-light text-dark border">Security Check</span>
                            </label>
                            <div class="captcha-box">
                                <div class="captcha-question-wrap">
                                    <div class="captcha-question">
                                        <i class="fa-solid fa-shield-halved text-warning"></i>
                                        <span>Solve: <span id="captchaQuestionText" class="ms-1">3 + 5 = ?</span></span>
                                    </div>
                                    <button type="button" class="captcha-refresh-btn" id="btnRefreshCaptcha" title="Refresh Captcha">
                                        <i class="fa-solid fa-rotate-right"></i>
                                    </button>
                                </div>
                                <input type="number" class="form-control contact-form-input" id="contactCaptcha"
                                    placeholder="Enter the result (e.g. 8)" required>
                                <div class="invalid-feedback">Incorrect captcha answer. Please try again.</div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn-contact-submit" id="btnContactSubmit">
                            <span>Submit Request</span>
                            <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════ LOCATION MAP SECTION ══════════════ -->
<section class="contact-map-section" id="location-map">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge rounded-pill px-3 py-2 fw-bold mb-2 shadow-sm"
                style="background: var(--contact-gold); color: var(--contact-purple-dark); font-size: 13px;">
                <i class="fa-solid fa-map-location-dot me-1"></i> OUR CAMPUS
            </span>
            <h2 class="fw-bold text-dark fs-2">Visit Our Navi Mumbai Office</h2>
            <p class="text-muted mx-auto" style="max-width: 620px;">
                Located centrally in Kamothe, Navi Mumbai. We welcome educational leaders, students, and institutional partners for in-person consultations.
            </p>
        </div>

        <div class="row justify-content-center" data-aos="zoom-in">
            <div class="col-lg-12">
                <div class="map-card-wrapper">
                    <div class="map-iframe-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3771.874404780447!2d73.08860711538356!3d19.016462958471647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7e9dbbfdc6843%3A0xe10ff614f8a8bb87!2sKamothe%2C%20Panvel%2C%20Navi%20Mumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1700000000000!5m2!1sen!2sin"
                            allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Hunarho Office Location Map"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ══════════════ FREQUENTLY ASKED QUESTIONS (FAQ) SECTION ══════════════ -->
<section class="contact-faq-section">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge rounded-pill bg-light text-primary px-3 py-2 fw-bold mb-2 border">
                QUICK ANSWERS
            </span>
            <h2 class="fw-bold text-dark fs-2">Frequently Asked Questions</h2>
            <p class="text-muted mx-auto" style="max-width: 620px;">
                Got questions before reaching out? Here are answers to some common inquiries regarding our programs, counseling, and partnerships.
            </p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9" data-aos="fade-up" data-aos-delay="100">
                <div class="accordion faq-accordion-custom" id="contactFaqAccordion">
                    <!-- FAQ Item 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fa-solid fa-circle-question me-3 text-warning"></i>
                                How soon can I expect a response after filling out the contact form?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#contactFaqAccordion">
                            <div class="accordion-body">
                                Our academic counselors review all incoming inquiries continuously during business hours. You can expect a personalized call or email response within 24 hours (excluding Sundays).
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                <i class="fa-solid fa-circle-question me-3 text-warning"></i>
                                Can I schedule an in-person counseling session at the Navi Mumbai campus?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#contactFaqAccordion">
                            <div class="accordion-body">
                                Yes! We welcome students and institutional partners to our office at Plot No. 15, Sector - 17, Kamothe, Raigad, Navi Mumbai. Simply select "General Enquiry" or your desired course on the form and mention that you would like an in-person visit.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                <i class="fa-solid fa-circle-question me-3 text-warning"></i>
                                Who should I contact for institutional tie-ups or hiring our students?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                            data-bs-parent="#contactFaqAccordion">
                            <div class="accordion-body">
                                If you represent a school, university, or corporate recruiter looking to hire Hunarho-certified graduates or partner for STEM/AVGC labs, select "Hire with us" in the "Reason to connect" dropdown or write directly to support@hunarho.com.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/../includes/footer.php'; ?>
