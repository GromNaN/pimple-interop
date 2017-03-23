<?php
/**
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 * @author Jérôme Tamarelle <jerome@tamarelle.net>
 */

namespace GromNaN\Pimple;

use Psr\Container\NotFoundExceptionInterface;

class NotFoundException extends \InvalidArgumentException implements NotFoundExceptionInterface
{
}
