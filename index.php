<?php

/*
 * Snippet to get working Google Analytics Real Time API.
 * Copyright (C) 2013 onwards  Jordi Pujol-Ahulló <jpahullo@gmail.com>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

define('GOOGLE_ANALYTICS', true);
require_once 'lib/Google_Client.php';
require_once 'lib/contrib/Google_AnalyticsService.php';
require_once('id.php');

session_start();

/* Enable any error to be shown for development settings.
 * Comment out for production site.
 */
ini_set('display_errors', true);
ini_set('error_reporting', E_ALL | E_STRICT);

$client = new Google_Client();
$client->setApplicationName("Google Analytics");

// Visit https://code.google.com/apis/console?api=analytics to generate your
// client id, client secret, and to register your redirect uri.
$client->setClientId(CLIENT_ID);
$client->setClientSecret(CLIENT_SECRET);
$client->setRedirectUri(REDIRECT_URL);
$client->setDeveloperKey(DEVELOPER_KEY);

// Results will be transformed to objects.
$client->setUseObjects(true);

$service = new Google_AnalyticsService($client);

if (isset($_GET['logout'])) {
  unset($_SESSION['token']);
}

if (isset($_GET['code'])) {
  $client->authenticate();
  $_SESSION['token'] = $client->getAccessToken();
  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}

if (isset($_SESSION['token'])) {
  $client->setAccessToken($_SESSION['token']);
}


if ($client->getAccessToken()) {
    $_SESSION['token'] = $client->getAccessToken();

    function getDataObject(&$results) {
        $data = new stdClass();
        $total = 0;
        if ($results->getRows()>0) {
            foreach ($results->getRows() as $row) {
                $data->{$row[0]} = $row[1];
                $total += $row[1];
            }
        }
        $data->TOTAL = $total;
        return $data;
    }

    $optParams = array(
        'dimensions' => 'ga:visitorType');

    try {
        $results = $service->data_realtime->get(
            'ga:'.VIEW_ID,
            'ga:activeVisitors',
            $optParams);
        // Success.
        // Do whatever you need with the results.
        var_dump(getDataObject($results));
    } catch (apiServiceException $e) {
      // Handle API service exceptions.
      print_r('ERROR: '.$e->getMessage());
    }

} else {
  $authUrl = $client->createAuthUrl();
  header('Location: '.$authUrl);
}
