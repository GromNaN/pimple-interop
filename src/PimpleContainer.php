<?php
/**
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 * @author Jérôme Tamarelle <jerome@tamarelle.net>
 */

namespace GromNaN\Pimple;

use Pimple\Container;
use Psr\Container\ContainerInterface;

class PimpleContainer implements ContainerInterface
{
    private $pimple;

    public function __construct(Container $pimple)
    {
        $this->pimple = $pimple;
    }

    public function get($id)
    {
        try {
            return $this->pimple[$id];
        } catch (\InvalidArgumentException $e) {
            // checks if the exception is thrown by Pimple itself.
            $trace = $e->getTrace();
            if ($trace[0]['class'] === Container::class) {
                throw new Exception\NotFoundException($e);
            }
            throw $e;
        }
    }

    public function has($id)
    {
        return isset($this->pimple[$id]);
    }
}
