<?php
return [
     // Application Version
    'APP_VERSION' => '0.3',

    // Application Log Level
    // Psr\Log\LogLevel : emergency, alert, critical, error, warning, notice, info, debug
    'APP_LOG_LEVEL' => 'debug',

    // JWT Secret (do not publish)
    'APP_SECRET' => '4095843ur9fj039z3249',

    // Basepath for this Application (replace manually with /path/to/your/public/dir if required)
    'BASE_PATH' => dirname($_SERVER['SCRIPT_NAME']),

    // DB Settings (do not publish)
    'DB_HOST' => '127.0.0.1',
    'DB_PORT' => '8889',
    'DB_NAME' => 'weemify',
    'DB_USER' => 'weemify_app',
    'DB_PWD' => '123456'
];


 
