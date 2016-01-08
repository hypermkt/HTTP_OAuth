<?php

error_reporting(E_ALL & ~E_DEPRECATED);

require_once('PEAR/PackageFileManager2.php');

PEAR::setErrorHandling(PEAR_ERROR_DIE);

$packagexml = new PEAR_PackageFileManager2;

$packagexml->setOptions(array(
    'baseinstalldir'    => '/',
    'simpleoutput'      => true,
    'packagedirectory'  => './',
    'filelistgenerator' => 'file',
    'exceptions'        => array(
        'LICENSE'       => 'doc',
        'README'        => 'doc',
    ),
    'ignore'            => array(
        'runTests.php',
        'generatePackage.php',
        'phpunit-bootstrap.php',
        'phpunit.xml',
        'composer.json',
        'coverage*',
        '*.tgz',
    ),
    'dir_roles' => array(
        'tests'     => 'test',
        'examples'  => 'doc'
    ),
));

$packagexml->setPackage('HTTP_OAuth');
$packagexml->setSummary('PEAR implementation of the OAuth 1.0a specification');
$packagexml->setDescription('Allows the use of the consumer and provider angles of the OAuth 1.0a specification');

$packagexml->setChannel('pear.php.net');
$packagexml->setAPIVersion('0.3.0');
$packagexml->setReleaseVersion('0.3.2');

$packagexml->setReleaseStability('alpha');

$packagexml->setAPIStability('alpha');

$packagexml->setNotes('New features and bugs fixed:
 * Fixed PEAR #20426. Authorization header values parsed incorrectly
 * Added composer support.
');
$packagexml->setPackageType('php');
$packagexml->addRelease();

//$packagexml->detectDependencies();

$packagexml->addMaintainer('lead',
                           'jeffhodsdon',
                           'Jeff Hodsdon',
                           'jeffhodsdon@gmail.com');
$packagexml->addMaintainer('lead',
                           'shupp',
                           'Bill Shupp',
                           'shupp@php.net');
$packagexml->addMaintainer('developer',
                           'gauthierm',
                           'Michael Gauthier',
                           'mike@silverorange.com');

$packagexml->setLicense('New BSD License',
                        'http://www.opensource.org/licenses/bsd-license.php');

$packagexml->setPhpDep('5.1.2');
$packagexml->setPearinstallerDep('1.4.0');
$packagexml->addPackageDepWithChannel('required', 'PEAR', 'pear.php.net', '1.4.0');
$packagexml->addPackageDepWithChannel('required', 'HTTP_Request2', 'pear.php.net', '0.5.1');
$packagexml->addPackageDepWithChannel('optional', 'Log', 'pear.php.net');
$packagexml->addPackageDepWithChannel('optional', 'Cache_Lite', 'pear.php.net');
$packagexml->addExtensionDep('required', 'date');
$packagexml->addExtensionDep('required', 'SPL');
$packagexml->addExtensionDep('required', 'hash');
$packagexml->addExtensionDep('optional', 'pecl_http', '1.6.0');


$packagexml->generateContents();
$packagexml->writePackageFile();

?>
