<?php
$selectedInterest = $demoInterest ?? '';
?>
    <!-- FOOTER -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row g-4">
                <!-- Branding column -->
                <div class="col-lg-4 col-md-6">
                    <div class="d-flex align-items-center gap-2 mb-3">
                        <img src="assets/images/external/hunarho-logo.webp"
                            alt="Hunarho Logo" style="height: 50px; width: auto; max-height: 50px;">
                    </div>
                    <p class="small text-light-muted mb-4" style="line-height: 1.6;">Empowering schools, colleges,
                        coaching structures, and universities globally with integrated LMS portals, interactive robotics
                        platforms, certified MU degrees, and next-gen academic automation.</p>
                    <div class="footer-socials">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Solutions Quicklinks -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Solutions</h5>
                    <ul class="footer-links">
                        <li><a href="student-lms.php">LMS Portal</a></li>
                        <li><a href="index.php#card-tpo">TPO Management</a></li>
                        <li><a href="index.php#card-paper">Question Paper Generator</a></li>
                        <li><a href="index.php#card-stem">STEM Lab</a></li>
                        <li><a href="index.php#card-avgc">AVGC Lab</a></li>
                        
                    </ul>
                </div>

                <!-- SaaS Quicklinks -->
                <div class="col-lg-2 col-md-6 col-6">
                    <h5>Programs</h5>
                    <ul class="footer-links">
                        <li><a href="ecce.php">ECCE Program</a></li>
                        <li><a href="university-of-mumbai.php">Mumbai University Courses</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div class="col-lg-4 col-md-6">
                    <h5>Reach Us</h5>
                    <div class="d-flex flex-column gap-3 small text-light-muted">
                        <div class="d-flex gap-3 align-items-center">
                            <span class="fs-5 text-accent-gold"><i class="fa-solid fa-envelope"></i></span>
                            <div>
                                <h6 class="mb-0 text-white fw-bold" style="font-size: 13px;">Email Queries</h6>
                                <a href="mailto:support@hunarho.com"
                                    class="text-decoration-none text-light-muted">support@hunarho.com</a>
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <span class="fs-5 text-accent-gold"><i class="fa-solid fa-phone"></i></span>
                            <div>
                                <h6 class="mb-0 text-white fw-bold" style="font-size: 13px;">Phone Helpline</h6>
                                <a href="tel:+917304002635" class="text-decoration-none text-light-muted">+91 7304002635</a>
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <span class="fs-5 text-accent-gold"><i class="fa-solid fa-location-dot"></i></span>
                            <div>
                                <h6 class="mb-0 text-white fw-bold" style="font-size: 13px;">Office Address</h6>
                                <span style="line-height: 1.4; display: inline-block;">Plot No. 15, Sector - 17,
                                    Kamothe, Raigad, Navi Mumbai, Maharashtra 410209</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom text-center">
                <p class="mb-0">&copy; 2026 Hunarho Learning Solutions Private Limited. All rights reserved.</p>
            </div>
        </div>
    </footer>



    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop" aria-label="Back to top">
        <i class="fa-solid fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Main Application Script -->
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="main.js?v=2.28"></script>

    <script>
        // Back to Top functionality
        const btt = document.getElementById('backToTop');
        if (btt) {
            window.addEventListener('scroll', () => {
                btt.classList.toggle('visible', window.scrollY > 400);
            });
            btt.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
        }
    </script>

<?php if (!empty($extraInlineJs)): ?>
    <script>
        <?= $extraInlineJs ?>
    </script>
<?php endif; ?>

</body>

</html>
