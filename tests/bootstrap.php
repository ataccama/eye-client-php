<?php
    require __DIR__ . '/../vendor/autoload.php';

    Tester\Environment::setup();
    date_default_timezone_set('Europe/Prague');

    // type into terminal to start: vendor/bin/tester tests/

    const HOST = "https://eye.ataccama.com";
    const BEARER = "MihtfkPj5s8lrDmZgu8AulZjKaRkkm2I";
    const IP_ADDRESS = "localhost";

    const TEMP_DIR = __DIR__ . "/../tmp";
    const TEMP_SESSION = TEMP_DIR . "/session";

    if (!file_exists(TEMP_DIR)) {
        mkdir(TEMP_DIR);
    }

    if (!file_exists(TEMP_SESSION)) {
        $client = new Ataccama\Eye\Client\Client(HOST, BEARER);
        $sessionDefinition = new \Ataccama\Eye\Client\Env\Sessions\SessionDefinition(IP_ADDRESS);
        $session = $client->createSession($sessionDefinition);
        define("SESSION_ID", $session->id);
        file_put_contents(TEMP_SESSION, $session->id);
    } else {
        define("SESSION_ID", file_get_contents(TEMP_SESSION));
    }