<?php

namespace Tequilarapido\SimpleWidget\Test;

class TestHelper
{
    /** @var \Illuminate\Foundation\Application */
    protected $app;

    /**
     * TestHelper constructor.
     *
     * @param $app
     */
    public function __construct($app)
    {
        $this->app = $app;
    }

    public function viewPaths()
    {
        return [$this->tempPath().'/views'];
    }

    public function fixturesPath($path)
    {
        return __DIR__.'/fixtures'.(empty($path) ? '' : '/'.$path);
    }

    public function tempPath()
    {
        return __DIR__.'/temp';
    }

    public function stripWhiteSpacesFromHtml($html)
    {
        return preg_replace('~>\s+<~', '><', str_replace("\n", '', $html));
    }

    /**
     * Call protected/private method of a class.
     *
     * @param object $object Instantiated object that we will run method on.
     * @param string $methodName Method name to call
     * @param array $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod($object, $methodName, array $parameters = [])
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}
