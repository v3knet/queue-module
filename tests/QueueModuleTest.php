<?php

namespace v3knet\module\queue\test_cases;

use Bernard\Consumer;
use Bernard\Driver;
use Bernard\Producer;
use Bernard\QueueFactory\PersistentFactory;
use Bernard\Router;
use Bernard\Serializer;
use Silex\Application;
use v3knet\module\queue\QueueModule;
use v3knet\module\system\SystemModule;
use v3knet\module\test_cases\BaseTestCase;

class QueueModuleTest extends \PHPUnit_Framework_TestCase
{

    protected function getContainer()
    {
        $c = new Application();
        $c->register(new QueueModule(), ['app.root' => '/tmp']);

        return $c;
    }

    public function testServiceDefinitions()
    {
        $c = $this->getContainer();

        $this->assertTrue($c['bernard.driver'] instanceof Driver);
        $this->assertTrue($c['bernard.factory'] instanceof PersistentFactory);
        $this->assertTrue($c['bernard.serializer'] instanceof Serializer);
        $this->assertTrue($c['bernard.consumer'] instanceof Consumer);
        $this->assertTrue($c['bernard.producer'] instanceof Producer);
        $this->assertTrue($c['bernard.router'] instanceof Router);
    }

    /**
     * @TODO: Review @bernard.ComsumerCommand
     */
    public function testConsumeCommand()
    {
        // $this->assertTrue($c['@queue.cmd.consume'] instanceof ConsumeCommand);
        // $console = new Console();
        // $console->add(new new ConsumeCommand());
        // $this->assertTrue(false);
    }

}
