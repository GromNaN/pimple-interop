<?php
/**
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 * @author Jérôme Tamarelle <jerome@tamarelle.net>
 */

namespace GromNaN\Pimple\Exception;

use Psr\Container\Exception\NotFoundException as NotFoundExceptionInterface;

class NotFoundException extends \InvalidArgumentException implements NotFoundExceptionInterface
{
    public function __construct(\Exception $e)
    {
        parent::__construct($e->getMessage(), $e->getCode(), $e);
    }
}
