<?php
declare(strict_types=1);
/**
 * Neyo PHP Framework.
 *
 * @author @ikorisabi <ikorisabi@gmail.com>.
 *
 * @license <https://github.com/neyo-php-framework/debugger/blob/master/LICENSE> GNU General Public License v3.0.
 * @link    <https://github.com/neyo-php-framework/debugger>                     Source Code.
 */

namespace Neyo\Tests;

use Neyo\Debugger;
use Neyo\ErrorHandler;
use Neyo\ExceptionHandler;

use PHPUnit\Framework\TestCase;

use const true;
use const false;
use const E_USER_ERROR;
use const E_USER_WARNING;
use const E_USER_NOTICE;
use const PHP_VERSION;
use const PHP_OS;

use function error_reporting;

/**
 * @class DebuggerTest The debugger test class.
 */
class DebuggerTest extends TestCase
{

    public function testConstructor()
    {
        $errorHandler     = new ErrorHandler('testErrorHandler');
        $exceptionHandler = new ExceptionHandler('testExceptionHandler');
        $debugger = new Debugger($errorHandler, $exceptionHandler);
        $this->assertTrue(true);
    }
}
