<?php
// Determine active page if not explicitly set
$activePage = $activePage ?? '';
?>
<!-- NAVIGATION BAR -->
<nav class="navbar navbar-expand-lg navbar-dark sticky-top navbar-custom" id="navbarMain">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center gap-2" href="index.php#home" id="brand-logo">
            <img src="assets/images/external/hunarho-logo.webp" alt="Hunarho Logo">
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="navbar-hamburger">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage === 'home') ? 'active' : '' ?>" href="index.php" id="nav-home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage === 'about') ? 'active' : '' ?>" href="about.php" id="nav-about">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($activePage === 'solutions' || $activePage === 'saas' || $activePage === 'student-lms') ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" id="nav-solutions">
                        Solutions
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?= ($activePage === 'student-lms') ? 'active' : '' ?>" href="student-lms.php" id="nav-lms-platform">LMS Platform</a></li>
                        <li><a class="dropdown-item" href="stemlab.php">STEM Lab</a></li>
                        <li><a class="dropdown-item" href="avgc.php">AVGC Lab</a></li>
                        <li><a class="dropdown-item" href="TPMS.php">TPO Management System</a></li>
                        <li><a class="dropdown-item" href="question-paper-generator.php">Question Paper Generator</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle <?= ($activePage === 'ecce' || $activePage === 'mumbai-university') ? 'active' : '' ?>" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false" id="nav-programs">
                        Programs
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item <?= ($activePage === 'ecce') ? 'active' : '' ?>" href="ecce.php" id="nav-ecce">ECCE Program</a></li>
                        <li><a class="dropdown-item <?= ($activePage === 'mumbai-university') ? 'active' : '' ?>" href="university-of-mumbai.php" id="nav-mumbai-university">Mumbai University Courses</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= ($activePage === 'contact') ? 'active' : '' ?>" href="contact.php" id="nav-contact">Contact Us</a>
                </li>
                <li class="nav-item ms-lg-3 mt-3 mt-lg-0">
                    <a href="contact.php" class="btn btn-gold w-100" id="btn-navbar-demo">
                        Book a Demo
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
