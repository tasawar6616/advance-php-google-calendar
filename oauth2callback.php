<?php 

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();


$client = new Google_Client();
$client->setClientId($_ENV['GOOGLE_CLIENT_ID']);
$client->setClientSecret($_ENV['GOOGLE_CLIENT_SECRET']);
$client->setRedirectUri($_ENV['GOOGLE_REDIRECT_URI']);
$client->addScope(Google_Service_Calendar::CALENDAR);

$redirectUri =  $_ENV['GOOGLE_REDIRECT_URI'];// Make sure this is defined

if (isset($_GET['code'])) {
    $accessToken = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $accessToken;
    header('Location: ' . filter_var($redirectUri, FILTER_SANITIZE_URL));
    exit();
}

// Check if the access token is available
if (!isset($_SESSION['access_token'])) {
    header('Location: ' . $client->createAuthUrl());
    exit();
}

// Set the access token in the client
$client->setAccessToken($_SESSION['access_token']);

// Check if the access token is expired
if ($client->isAccessTokenExpired()) {
    unset($_SESSION['access_token']);
    header('Location: ' . $client->createAuthUrl());
    exit();
}

$service = new Google_Service_Calendar($client);
$calendarId = 'primary';
$event = new Google_Service_Calendar_Event([
    'summary' => 'Sample Event',
    'start' => [
        'dateTime' => '2025-05-13T09:00:00-07:00',
        'timeZone' => 'America/Los_Angeles',
    ],
    'end' => [
        'dateTime' => '2025-05-13T10:00:00-07:00',
        'timeZone' => 'America/Los_Angeles',
    ],
]);

$event = $service->events->insert($calendarId, $event);
echo 'Event created: ' . $event->htmlLink;
