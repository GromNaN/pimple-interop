<?php
/**
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 * @author Jérôme Tamarelle <jerome@tamarelle.net>
 */

namespace GromNaN\Pimple;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PimpleContainerProvider implements ServiceProviderInterface
{
    private $name;

    public function __construct($name = 'container')
    {
        $this->name = $name;
    }

    public function register(Container $pimple)
    {
        $pimple[$this->name] = function ($pimple) {
            return new PimpleContainer($pimple);
        };
    }
}
