<?php
// Simple .env loader: reads KEY=VALUE lines and sets environment variables
function load_dotenv(string $path) {
    if (!file_exists($path)) {
        return;
    }

    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        // skip comments
        if (strpos(trim($line), '#') === 0) continue;
        if (!strpos($line, '=')) continue;
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        // Remove optional surrounding quotes
        if ((substr($value,0,1) === '"' && substr($value,-1) === '"') || (substr($value,0,1) === "'" && substr($value,-1) === "'")) {
            $value = substr($value,1,-1);
        }
        putenv(sprintf('%s=%s', $name, $value));
        
        // populate superglobals
        if (!isset($_ENV)) $_ENV = [];
        $_ENV[$name] = $value;
        if (!isset($_SERVER)) $_SERVER = [];
        $_SERVER[$name] = $value;
    }
}

?>