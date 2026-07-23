<?php
// Default page metadata variables
$pageTitle = $pageTitle ?? 'Hunarho Learning Solutions - Transforming Education Through Innovation';
$pageDescription = $pageDescription ?? 'Empowering schools, colleges, universities, and coaching institutes with next-generation Learning Management Systems (LMS), STEM & Robotics labs, AVGC training, Mumbai University Courses, and smart educational SaaS products.';
$pageKeywords = $pageKeywords ?? 'EdTech, Learning Management System, LMS, STEM Lab, Robotics, AVGC, TPO Management, Question Paper Generator, Hunarho, Mumbai University Courses, ECCE';
$activePage = $activePage ?? '';
$extraCss = $extraCss ?? [];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>

    <!-- Meta Descriptions for SEO -->
    <meta name="description" content="<?= htmlspecialchars($pageDescription) ?>">
    <meta name="keywords" content="<?= htmlspecialchars($pageKeywords) ?>">
    <meta name="author" content="Hunarho Learning Solutions">

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Font Awesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Custom Style Sheet -->
    <link rel="stylesheet" href="styles.css?v=<?php echo time(); ?>">

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <?php foreach ($extraCss as $cssFile): ?>
    <link rel="stylesheet" href="<?= htmlspecialchars($cssFile) ?>">
    <?php endforeach; ?>
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarMain" data-bs-offset="100">

<?php require __DIR__ . '/nav.php'; ?>
