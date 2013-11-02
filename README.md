Google Analytics Real Time API snippet
===========

Google Analytics snippet to get real time data access.

This little example is extracted from that provided by Google, but
given that I had some troubles on it (like having the correct values
for the OAuth authentication, developer key), and wanted to get
just the exact number of current visitors on the web site I am
tracking, I wanted to share it.


How to get it working?
---

First of all, you have to request a Real Time API access, now in beta.
When you receive the notification email, you can then use this snippet
to get -if you do not modify it- the current number of visiting users
to your web site.

This snippet expects some data to be updated in the
```php
id.php
```
file by you. In particular:

```php
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
```
You have to replace any **true** value by the corresponding value stated
in the preceeding comment. Once you have all the values typed there, you can
then visit the index.php page from web browser and see it working.


Limits and penalties
---

You MUST remember that, as Google Real Time API states, you can only do
a request every 30 seconds. Otherwise, Google can ban your Real Time data
access.


License
---

My snipped code is distributed under GPL v3, and the Google code under
Apache license and all that code remains unmodified, under the lib/ directory.


Copyright
---

2013 onwards Jordi Pujol-Ahulló <jpahullo@gmail.com>