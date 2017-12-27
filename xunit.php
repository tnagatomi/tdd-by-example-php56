<?php

class TestResult
{
    public $runCount;
    public $errorCount;

    public function __construct()
    {
        $this->runCount = 0;
        $this->errorCount = 0;
    }

    public function testStarted()
    {
        $this->runCount++;
    }

    public function testFailed()
    {
        $this->errorCount++;
    }

    public function summary()
    {
        return sprintf('%d run, %d failed', $this->runCount, $this->errorCount);
    }
}

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

    /**
     * @param TestResult $result
     */
    public function run(TestResult $result)
    {
        $result->testStarted();
        $this->setUp();
        try {
            call_user_func([$this, $this->name]);
        } catch (Exception $e) {
            $result->testFailed();
        }
        $this->tearDown();
    }
}

class TestSuit
{
    public $tests;

    public function __construct()
    {
        $this->tests = [];
    }

    public function add($test)
    {
        $this->tests[] = $test;
    }

    public function run($result)
    {
        foreach ($this->tests as $test) {
            $test->run($result);
        }
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

    public function testBrokenMethod()
    {
        throw new Exception();
    }

    public function tearDown()
    {
        $this->log = $this->log . 'tearDown ';
    }
}

class TestCaseTest extends TestCase
{
    public $test;
    public $result;

    public function setUp()
    {
        $this->result = new TestResult();
    }

    public function testTemplateMethod()
    {
        $test = new WasRun('testMethod');
        $test->run($this->result);
        assert('setUp test Method tearDown ' === $test->log);
    }

    public function testResult()
    {
        $test = new WasRun('testMethod');
        $test->run($this->result);
        assert('1 run, 0 failed' === $this->result->summary());
    }

    public function testFailedResult()
    {
        $test = new WasRun('testBrokenMethod');
        $test->run($this->result);
        assert('1 run, 1 failed' === $this->result->summary());
    }

    public function testFailedResultFormatting()
    {
        $this->result->testStarted();
        $this->result->testFailed();
        assert('1 run, 1 failed' === $this->result->summary());
    }

    public function testSuit()
    {
        $suit = new TestSuit();
        $suit->add(new WasRun('testMethod'));
        $suit->add(new WasRun('testBrokenMethod'));
        $suit->run($this->result);
        assert('2 run, 1 failed' === $this->result->summary());
    }
}

$suit = new TestSuit();
$suit->add(new TestCaseTest('testTemplateMethod'));
$suit->add(new TestCaseTest('testResult'));
$suit->add(new TestCaseTest('testFailedResult'));
$suit->add(new TestCaseTest('testFailedResultFormatting'));
$suit->add(new TestCaseTest('testSuit'));
$result = new TestResult();
$suit->run($result);
echo $result->summary();