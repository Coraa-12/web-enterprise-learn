<?php

declare(strict_types=1);

// This line will eventually load all our Composer packages
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
}

echo "<h1>It Works!</h1>";
echo "<p>PHP Version: " . PHP_VERSION . "</p>";
