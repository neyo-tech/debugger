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
        $this->assertTrue(true)
    }
}

function testErrorHandler($errno, $errstr, $errfile, $errline)
{
    if (!(error_reporting() & $errno)) {
        return false;
    }
    switch ($errno) {
        case E_USER_ERROR:
            echo "<b>My ERROR</b> [$errno] $errstr<br />\n";
            echo "  Fatal error on line $errline in file $errfile";
            echo ", PHP " . PHP_VERSION . " (" . PHP_OS . ")<br />\n";
            echo "Aborting...<br />\n";
            exit(1);
            break;
        case E_USER_WARNING:
            echo "<b>My WARNING</b> [$errno] $errstr<br />\n";
            break;
        case E_USER_NOTICE:
            echo "<b>My NOTICE</b> [$errno] $errstr<br />\n";
            break;
        default:
            echo "Unknown error type: [$errno] $errstr<br />\n";
            break;
    }
    return true;
}

function testExceptionHandler($exception) {
    echo "Uncaught exception: " , $exception->getMessage(), "\n";
}
