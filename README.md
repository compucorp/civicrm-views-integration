# Views integration Script
### This is a script that can be used to generate the views intergrations that are required for civicrm that are usually placed into the drupal settings file.

## Usage
You must run this script with drush.  By default - it does not actually write anything to file - only echos to the terminal.  To write to a file,  redirect the output or copy paste the output to your required location.

### Example
Running script and outputing to a php file

`drush --root=/var/www/mysite.ccuptest.co.uk/httpdocs/ php-script /opt/civicrm-views-integration/script.php > /var/www/mysite.ccuptest.co.uk/httpdocs/sites/default/settings.views.php`

Running script and echoing to terminal

`drush --root=/var/www/mysite.ccuptest.co.uk/httpdocs/ php-script /opt/civicrm-views-integration/script.php`