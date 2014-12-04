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