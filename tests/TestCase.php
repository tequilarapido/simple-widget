<?php

namespace Tequilarapido\SimpleWidget\Test;

class TestCase extends \Orchestra\Testbench\TestCase
{
    /** @var TestHelper */
    protected $helper;

    public function setUp() : void
    {
        parent::setUp();

        $this->helper = new TestHelper($this->app);
    }

    protected function getEnvironmentSetUp($app)
    {
        // Load views from testing folder
        $app['config']->set('view.paths', (new TestHelper($app))->viewPaths());
    }

    public function tearDown() : void
    {
        parent::tearDown();

        $this->helper = null;
    }
}
