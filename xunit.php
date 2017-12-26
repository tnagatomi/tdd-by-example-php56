<?php

class TestCase
{
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function setUp()
    {

    }

    public function tearDown()
    {

    }

    public function run()
    {
        $this->setUp();
        call_user_func([$this, $this->name]);
        $this->tearDown();
    }
}

class WasRun extends TestCase
{
    public $log;

    public function setUp()
    {
        $this->log = 'setUp ';
    }

    public function testMethod()
    {
        $this->log = $this->log . 'test Method ';
    }

    public function tearDown()
    {
        $this->log = $this->log . 'tearDown ';
    }
}

class TestCaseTest extends TestCase
{
    public $test;

    public function testTemplateMethod()
    {
        $test = new WasRun('testMethod');
        $test->run();
        assert('setUp test Method tearDown ' === $test->log);
    }
}

(new TestCaseTest('testTemplateMethod'))->run();