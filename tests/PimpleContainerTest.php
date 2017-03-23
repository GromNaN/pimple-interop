<?php
/**
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 * @author Jérôme Tamarelle <jerome@tamarelle.net>
 */

namespace GromNaN\Pimple\Tests;

use Psr\Container\ContainerInterface;
use GromNaN\Pimple\PimpleContainer;
use Pimple\Container;

class PimpleContainerTest extends \PHPUnit_Framework_TestCase
{
    public function testImplementation()
    {
        $pimple = new Container();
        $pimple['service'] = function () {
            return new \DateTimeImmutable();
        };
        $pimple['parameter'] = 'ok';

        $container = new PimpleContainer($pimple);

        $this->assertInstanceOf(ContainerInterface::class, $container);
        $this->assertTrue($container->has('service'));
        $this->assertTrue($container->has('parameter'));
        $this->assertFalse($container->has('missing'));

        $this->assertInstanceOf(\DateTimeImmutable::class, $container->get('service'));
        $this->assertEquals('ok', $container->get('parameter'));
    }

    /**
     * @expectedException Psr\Container\NotFoundExceptionInterface
     * @expectedExceptionMessage Identifier "missing" is not defined.
     */
    public function testContainerNotFoundException()
    {
        $pimple = new Container();
        $container = new PimpleContainer($pimple);
        $container->get('missing');
    }

    /**
     * @expectedException InvalidArgumentException
     * @expectedExceptionMessage My error
     */
    public function testContainerExternalException()
    {
        $pimple = new Container();
        $pimple['service'] = function () {
            throw new \InvalidArgumentException('My error');
        };
        $container = new PimpleContainer($pimple);
        $container->get('service');
    }
}
