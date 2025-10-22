<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Status - Like XAMPP Control Panel</title>
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
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            overflow: hidden;
        }

        .header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }

        .header p {
            opacity: 0.9;
            font-size: 1.1em;
        }

        .content {
            padding: 30px;
        }

        .service {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-left: 4px solid #ddd;
        }

        .service.running {
            border-left-color: #28a745;
            background: #d4edda;
        }

        .service.stopped {
            border-left-color: #dc3545;
            background: #f8d7da;
        }

        .service-info {
            flex-grow: 1;
        }

        .service-name {
            font-size: 1.3em;
            font-weight: bold;
            margin-bottom: 5px;
            color: #333;
        }

        .service-desc {
            color: #666;
            font-size: 0.95em;
        }

        .service-status {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .status-indicator {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .status-indicator.green {
            background: #28a745;
            box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
        }

        .status-indicator.red {
            background: #dc3545;
            box-shadow: 0 0 10px rgba(220, 53, 69, 0.5);
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .status-text {
            font-weight: bold;
            font-size: 1.1em;
        }

        .status-text.running {
            color: #28a745;
        }

        .status-text.stopped {
            color: #dc3545;
        }

        .quick-links {
            margin-top: 30px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .quick-links h3 {
            margin-bottom: 15px;
            color: #333;
        }

        .link-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
        }

        .quick-link {
            display: block;
            padding: 15px;
            background: white;
            border: 2px solid #667eea;
            border-radius: 5px;
            text-decoration: none;
            color: #667eea;
            font-weight: bold;
            text-align: center;
            transition: all 0.3s;
        }

        .quick-link:hover {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .info-box {
            margin-top: 20px;
            padding: 15px;
            background: #fff3cd;
            border-left: 4px solid #ffc107;
            border-radius: 5px;
        }

        .info-box h4 {
            color: #856404;
            margin-bottom: 10px;
        }

        .info-box p {
            color: #856404;
            line-height: 1.6;
        }

        .version-info {
            margin-top: 20px;
            padding: 15px;
            background: #e7f3ff;
            border-radius: 5px;
            font-size: 0.9em;
            color: #004085;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🚀 Development Environment Status</h1>
            <p>Just like XAMPP Control Panel, but better!</p>
        </div>

        <div class="content">
            <?php
            // Function to check if a service is running
            function isServiceRunning($serviceName) {
                $output = shell_exec('docker compose ps --format json 2>&1');
                if (empty($output)) {
                    return false;
                }

                $containers = json_decode('[' . str_replace("}\n{", "},{", trim($output)) . ']', true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    return false;
                }

                foreach ($containers as $container) {
                    if (isset($container['Service']) && $container['Service'] === $serviceName) {
                        return isset($container['State']) && $container['State'] === 'running';
                    }
                }
                return false;
            }

            // Check each service
            $services = [
                'nginx' => [
                    'name' => 'Web Server (Nginx)',
                    'desc' => 'Serves your website files',
                    'running' => isServiceRunning('nginx')
                ],
                'php' => [
                    'name' => 'PHP Engine',
                    'desc' => 'Runs your PHP code',
                    'running' => isServiceRunning('php')
                ],
                'mysql' => [
                    'name' => 'MySQL Database',
                    'desc' => 'Stores your data',
                    'running' => isServiceRunning('mysql')
                ],
                'phpmyadmin' => [
                    'name' => 'phpMyAdmin',
                    'desc' => 'Database management interface',
                    'running' => isServiceRunning('phpmyadmin')
                ]
            ];

            $allRunning = true;
            foreach ($services as $service) {
                if (!$service['running']) {
                    $allRunning = false;
                    break;
                }
            }

            // Display services
            foreach ($services as $key => $service) {
                $statusClass = $service['running'] ? 'running' : 'stopped';
                $statusText = $service['running'] ? 'RUNNING' : 'STOPPED';
                $indicatorClass = $service['running'] ? 'green' : 'red';

                echo '<div class="service ' . $statusClass . '">';
                echo '<div class="service-info">';
                echo '<div class="service-name">' . htmlspecialchars($service['name']) . '</div>';
                echo '<div class="service-desc">' . htmlspecialchars($service['desc']) . '</div>';
                echo '</div>';
                echo '<div class="service-status">';
                echo '<div class="status-indicator ' . $indicatorClass . '"></div>';
                echo '<span class="status-text ' . $statusClass . '">' . $statusText . '</span>';
                echo '</div>';
                echo '</div>';
            }

            if (!$allRunning) {
                echo '<div class="info-box">';
                echo '<h4>⚠️ Some Services Are Not Running</h4>';
                echo '<p>If you just started the environment, wait 30 seconds and refresh this page. If services are still stopped, try running <strong>restart.bat</strong> or check <strong>TROUBLESHOOTING.md</strong>.</p>';
                echo '</div>';
            }
            ?>

            <div class="quick-links">
                <h3>🔗 Quick Access</h3>
                <div class="link-grid">
                    <a href="/" class="quick-link">🏠 Your Website</a>
                    <a href="http://localhost:8081" class="quick-link" target="_blank">🗄️ phpMyAdmin</a>
                    <a href="/status.php" class="quick-link">🔄 Refresh Status</a>
                </div>
            </div>

            <div class="version-info">
                <strong>PHP Version:</strong> <?php echo PHP_VERSION; ?><br>
                <strong>Server Time:</strong> <?php echo date('Y-m-d H:i:s'); ?><br>
                <strong>Your IP:</strong> <?php echo $_SERVER['REMOTE_ADDR'] ?? 'Unknown'; ?>
            </div>

            <div class="info-box" style="background: #d1ecf1; border-left-color: #17a2b8;">
                <h4>💡 Pro Tips</h4>
                <p>
                    • Use <strong>open-database.bat</strong> to quickly open phpMyAdmin<br>
                    • Your database credentials: Username: <code>root</code>, Password: <code>secret</code><br>
                    • All your files in the project folder are automatically synced<br>
                    • Run <strong>stop.bat</strong> when you're done to free up resources
                </p>
            </div>
        </div>
    </div>
</body>
</html>
