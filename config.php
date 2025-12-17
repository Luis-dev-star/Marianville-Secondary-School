<?php
// ============================================
// DATABASE CONFIGURATION
// ============================================

// OPTION 1: SUPABASE (Cloud Database)
// Get your credentials from: https://app.supabase.com/project/YOUR-PROJECT/settings/api

// Load .env if exists (this keeps secrets out of source control)
if (file_exists(__DIR__ . '/env.php')) {
	require_once __DIR__ . '/env.php';
	load_dotenv(__DIR__ . '/.env');
}

// Use environment variables when available; fall back to defaults
define('USE_SUPABASE', getenv('USE_SUPABASE') !== false ? (getenv('USE_SUPABASE') === 'true') : true);
define('SUPABASE_URL', getenv('SUPABASE_URL') ?: 'https://htbxnypwbgiwkwmqezmr.supabase.co');
define('SUPABASE_KEY', getenv('SUPABASE_KEY') ?: null); // keep key out of repo; set via .env or env variable
define('SUPABASE_TABLE', getenv('SUPABASE_TABLE') ?: 'app_users');

// ============================================
// OPTION 2: LOCAL MYSQL
// ============================================

define('MYSQL_SERVER', 'localhost');
define('MYSQL_USER', 'root');
define('MYSQL_PASSWORD', '');
define('MYSQL_DATABASE', 'php_tutorials');

?>
