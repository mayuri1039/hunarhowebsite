<?php
// router.php
$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// Serve index.php for the root path
if ($path === '/') {
    require __DIR__ . '/pages/index.php';
    return;
}

// If the requested path is a file that exists, serve it directly
if (file_exists(__DIR__ . $path) && is_file(__DIR__ . $path)) {
    return false;
}

// Otherwise, if appending .php makes a valid file in pages/, serve that instead
if (file_exists(__DIR__ . '/pages' . $path . '.php')) {
    require __DIR__ . '/pages' . $path . '.php';
} else {
    // Return 404 if neither exists
    http_response_code(404);
    echo "404 Not Found";
}
