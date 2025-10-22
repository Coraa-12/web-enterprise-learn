<?php

declare(strict_types=1);

// This line will eventually load all our Composer packages
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    require __DIR__ . '/../vendor/autoload.php';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome! Your Development Environment Works!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            text-align: center;
            max-width: 600px;
        }
        h1 {
            color: #667eea;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        .success {
            font-size: 4em;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            color: #666;
            margin-bottom: 15px;
            line-height: 1.6;
        }
        .version {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            font-family: 'Courier New', monospace;
        }
        .btn {
            display: inline-block;
            padding: 15px 30px;
            background: #667eea;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            margin: 10px;
            transition: all 0.3s;
        }
        .btn:hover {
            background: #764ba2;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }
        .info {
            background: #e7f3ff;
            padding: 20px;
            border-radius: 8px;
            margin-top: 20px;
            text-align: left;
        }
        .info h3 {
            color: #004085;
            margin-bottom: 10px;
        }
        .info ul {
            list-style: none;
            padding-left: 0;
        }
        .info li {
            padding: 5px 0;
            color: #004085;
        }
        .info li:before {
            content: "✓ ";
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="success">🎉</div>
        <h1>It Works!</h1>
        <p>Congratulations! Your development environment is running perfectly.</p>

        <div class="version">
            <strong>PHP Version:</strong> <?php echo PHP_VERSION; ?>
        </div>

        <a href="/status.php" class="btn">📊 View System Status</a>
        <a href="http://localhost:8081" class="btn" target="_blank">🗄️ Open phpMyAdmin</a>

        <div class="info">
            <h3>🚀 Next Steps:</h3>
            <ul>
                <li>Your files are in the project folder</li>
                <li>Edit index.php to change this page</li>
                <li>Use phpMyAdmin to manage your database</li>
                <li>Create new PHP files in the <code>public/</code> folder</li>
                <li>Run <strong>stop.bat</strong> when you're done</li>
            </ul>
        </div>
    </div>
</body>
</html>
