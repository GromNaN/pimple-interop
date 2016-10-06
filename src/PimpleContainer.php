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
        if (!isset($this->pimple[$id])) {
            throw new Exception\NotFoundException(sprintf('Identifier "%s" is not defined.', $id));
        }

        return $this->pimple[$id];
    }

    public function has($id)
    {
        return isset($this->pimple[$id]);
    }
}
