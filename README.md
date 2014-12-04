# PHPUnit in Drupal 7
================

This module uses [PHPUnit](http://getcomposer.com/) in order create unit tests.

## Installation.

Copy file composer.example.json to your Drupal root director an rename it to compose.json.
Copy file phpunit.example.xml to your Drupal root director an rename it to phpunit.xml.

Set the path where your module is installed. You need to point the "src" folder inside the module.

	"psr-4": {
	    "custom_log\\" : "sites/all/modules/custom/mymodule/src"
	}

You can define all namespaces that you need.

	"psr-4": {
	    "module_one\\" : "sites/all/modules/custom/module_one/src",
	    "module_two\\" : "sites/all/modules/custom/module_two/src",
	    "module_three\\" : "profiles/malotor/modules/module_three/src",
	}

You can define new test suites. I´va created two for this example in order to place my test in the "scr/Tests" folder from my modules or in the profiles folder

<?xml version="1.0" encoding="UTF-8"?>
<phpunit backupGlobals="false"
         backupStaticAttributes="false"
         bootstrap="vendor/autoload.php"
         colors="true"
         convertErrorsToExceptions="true"
         convertNoticesToExceptions="true"
         convertWarningsToExceptions="true"
         processIsolation="false"
         stopOnFailure="false"
         syntaxCheck="false">
    <testsuites>
        <testsuite name="Custom Modules Test Suite">
            <directory suffix=".php">./sites/all/modules/*/src/Tests</directory>
            <directory suffix=".php">./sites/all/modules/custom/*/src/Tests</directory>
        </testsuite>
        <testsuite name="Profile Custom Modules Test Suite">
            <directory suffix=".php">./profiles/*/modules/*/src/Tests</directory>
            <directory suffix=".php">./profiles/*/modules/custom/*/src/Tests</directory>
        </testsuite>
    </testsuites>
</phpunit>


Execute composer

	$ composer install

Add autoloader to your modules

	<?php

		/**
		 * @file phpunit_tests.module
		 *
		 */

		require DRUPAL_ROOT . '/vendor/autoload.php';

Add your tests to src/Tests folder


  <?php

    use custom_log\MyClass;

    /**
     * @group MyModule
     */
    class MyPackageTest extends PHPUnit_Framework_TestCase {
      public function testAlwaysReturnTrue()
      {
        $myClassIntance = new MyClass();
        $this->assertTrue($myClassIntance->myMethod());
      }
    }

Now, you can execute your test withs

$ vendor/bin/phpunit

If you want to execute only the tests from a module use:

$ vendor/bin/phpunit --group MyModule