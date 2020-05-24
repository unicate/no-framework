<?php
return [
     // Application Version
    'APP_VERSION' => '0.1',

    // Application Log Level
    // Psr\Log\LogLevel : emergency, alert, critical, error, warning, notice, info, debug
    'APP_LOG_LEVEL' => 'debug',

    // JWT Secret (do not publish)
    'APP_SECRET' => 'some-very-secret-key',

    // Basepath for this Application (replace manually with /path/to/your/public/dir if required)
    'BASE_PATH' => dirname($_SERVER['SCRIPT_NAME']),

    // DB Settings (do not publish)
    'DB_HOST' => '127.0.0.1',
    'DB_PORT' => '8889',
    'DB_NAME' => 'db-name',
    'DB_USER' => 'db-user',
    'DB_PWD' => 'db-password'
];


 
