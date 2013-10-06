
PHP 1.5.4 fix ob_start:
http://blog.adin.pro/2013-02-28/warning-ob_start-function-not-found-or-invalid-function-name-symfony/
ob_start(sfConfig::get('sf_compressed') ? 'ob_gzhandler' : null);