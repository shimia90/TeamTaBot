<?php
/**
 * README
 * This configuration file is intended to run your commands with crontab.
 * Uncommented parameters must be filled
 */

// Load composer
require __DIR__ . '/vendor/autoload.php';

// Add you bot's API key and name
$API_KEY = 'your_bot_api_key';
$BOT_NAME = 'username_bot';

// Define a path for your custom commands
//$commands_path = __DIR__ . '/Commands/';

// Enter your MySQL database credentials
//$mysql_credentials = [
//    'host'     => 'localhost',
//    'user'     => 'dbuser',
//    'password' => 'dbpass',
//    'database' => 'dbname',
//];

// Your command(s) to run, pass it just like in a message (arguments supported)
$commands = ['/whoami', '/echo I\'m a bot!'];

try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($API_KEY, $BOT_NAME);

    // Error, Debug and Raw Update logging
    //Longman\TelegramBot\TelegramLog::initialize($your_external_monolog_instance);
    //Longman\TelegramBot\TelegramLog::initErrorLog($path . '/' . $BOT_NAME . '_error.log');
    //Longman\TelegramBot\TelegramLog::initDebugLog($path . '/' . $BOT_NAME . '_debug.log');
    //Longman\TelegramBot\TelegramLog::initUpdateLog($path . '/' . $BOT_NAME . '_update.log');

    // Enable MySQL
    //$telegram->enableMySql($mysql_credentials);

    // Enable MySQL with table prefix
    //$telegram->enableMySql($mysql_credentials, $BOT_NAME . '_');

    // Uncomment this line to load example commands
    //$telegram->addCommandsPath(BASE_PATH . '/../examples/Commands');

    // Add commands path containing your commands
    //$telegram->addCommandsPath($commands_path);

    // Enable admin user(s)
    //$telegram->enableAdmin(your_telegram_id);
    //$telegram->enableAdmins([your_telegram_id, other_telegram_id]);

    // Add the channel you want to manage
    //$telegram->setCommandConfig('sendtochannel', ['your_channel' => '@type_here_your_channel']);

    // Here you can set some command specific parameters,
    // for example, google geocode/timezone api key for /date command:
    //$telegram->setCommandConfig('date', ['google_api_key' => 'your_google_api_key_here']);

    // Set custom Upload and Download path
    //$telegram->setDownloadPath('../Download');
    //$telegram->setUploadPath('../Upload');

    // Requests Limiter (tries to prevent reaching Telegram API limits)
    // First argument are options
    $telegram->enableLimiter();
    //$telegram->enableLimiter(['interval' => 0.5);

    // Run user selected commands
    $telegram->runCommands($commands);
} catch (Longman\TelegramBot\Exception\TelegramException $e) {
    // Silence is golden!
    //echo $e;
    // Log telegram errors
    Longman\TelegramBot\TelegramLog::error($e);
} catch (Longman\TelegramBot\Exception\TelegramLogException $e) {
    // Silence is golden!
    // Uncomment this to catch log initilization errors
    //echo $e;
}
