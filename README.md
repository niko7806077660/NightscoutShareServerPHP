# NightscoutShareServerPHP - EXPERIMENTAL
Simple Nightscout Share Server for PHP inspired by @dabear and his https://github.com/dabear/NightscoutShareServer project.

It allows you to pull blood glucose level from your nightscout server into the Loop app.

Installation:
1. 
  a) Hit [![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://github.com/reelman/NightscoutShareServerPHP) and fill domain for your nightscout server.
  b) OR copy files on your server with PHP support and edit set $_ENV['NIGHTSCOUT_SERVER_NAME'] in ShareWebServices/Services/Publisher/ReadPublisherLatestGlucoseValues/index.php 
2. Got you https://yourdomain.com/ShareWebServices/Services/Publisher/ReadPublisherLatestGlucoseValues to see if you have 3 latest BG data.
3. Open Loop and set NS Share server as https://yourdomain.com

After that, your Loop should use Nghtscout data as CGMS source.

So far it was tested on Nightscout with Blucon, MiaoMiao and Tomato source.
