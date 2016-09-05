<?php

// Incluyendo archivos necesarios
if (version_compare(phpversion(), '5.3.3') >= 0 && file_exists(dirname(__FILE__).'/../vendor/autoload.php')) {
  require_once dirname(__FILE__).'/../vendor/autoload.php';
} else {
  require_once dirname(__FILE__).'/../lib/culqi.php';
}
