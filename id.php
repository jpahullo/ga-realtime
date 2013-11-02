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

if (!defined('GOOGLE_ANALYTICS')) die;

/* From your Google Analytics dashboard, generate a client access key
 * of type web browser, and paste the values appear for your client below.
 * The URL you have to set there is the URL of your script index.php
 */
define('CLIENT_ID', true);
define('CLIENT_SECRET', true);
define('REDIRECT_URL', true);
/* You can extract your developer key from the URL when visiting your
 * Google Analytics panel. The URL will finish in a form like this:
 * "https://www.google.com/analytics/web/{some stuff here}/a{numbersA}w{numbersW}p{numbersP}/".
 * Your developer key is the part {numbersP}. Copy those numbers below.
 */
define('DEVELOPER_KEY', true);
/* You have to get the view ID from your Google Analytics dashboard.
 */
define('VIEW_ID', true);
