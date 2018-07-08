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

namespace Neyo;

use RuntimeException;
use UnexpectedValueException;

use function error_reporting;
use function set_error_handler;
use function set_exception_handler;
use function in_array;
use function ini_set;
use function strcmp;
use function trim;

use const null;
use const false;
use const true;

/**
 * @class      Debugger          The debugger.
 * @implements DebuggerInterface Defines the debugger identity.
 */
class Debugger implements DebuggerInterface
{

    /**
     * @var bool $production  Is the environment running in production mode.
     * @var bool $development Is the environment running in development mode.
     */
    private static $production  = null;
    private static $development = null;

    /**
     * @var array                     $modes            Contains a list of avaliable modes. 
     * @var ErrorHandlerInterface     $errorHandler     The error handler.
     * @var ExceptionHandlerInterface $exceptionHandler The exception handler.
     */
    private $modes            = array('production', 'development');
    private $errorHandler     = null;
    private $exceptionHandler = null;

    /**
     * Initialize a new debugger.
     *
     * @param ErrorHandlerInterface     $errorHandler     The error handler.
     * @param ExceptionHandlerInterface $exceptionHandler The exception handler.
     *
     * @return void Returns nothing.
     */
    public function __construct(ErrorHandlerInterface $errorHandler = null, ExceptionHandlerInterface $exceptionHandler = null)
    {
        // If no handlers are provided use the internal php error and exception handler.
        if (!is_null($errorHandler)) {
            // Bind the error hanlder.
            $this->errorHandler = $errorHandler;
        }
        if (!is_null($exceptionHandler)) {
            // Bind the exception hanlder.
            $this->exceptionHandler = $exceptionHandler;
        }
    }

    /**
     * Run this debugger.
     *
     * @param string $mode The mode this environment should run on.
     *
     * @throws RuntimeException         If an unknown error has occured.
     * @throws UnexpectedValueException If the mode requested is unknown or unsupported.
     *
     * @return void Returns nothing.
     */
    public function run(string $mode = ''): void
    {
        // Set the error and exception handler.
        if (!is_null($this->errorHandler)) {
            set_error_handler($this->errorHandler->getCallable());
        }
        if (!is_null($this->exceptionHandler)) {
            set_exception_handler($this->exceptionHandler->getCallable());
        }
        // Determine which mode is set.
        $mode = trim($mode);
        if (in_array($mode, $this->modes)) {
            if (strcmp($mode, 'production') === 0) {
                // Run the environment in production mode.
                error_reporting(0);
                ini_set('display_errors', 'Off');
                self::$production  = true;
                self::$development = false;
            } elseif (strcmp($mode, 'development') === 0) {
                // Run the environment in development mode.
                error_reporting(-1);
                ini_set('display_errors', 'On');
                self::$production  = false;
                self::$development = true;
            } else {
                throw new RuntimeException('An unknown error has occured.');
            }
        } else {
            throw new UnexpectedValueException('The mode requested is unknown or unsupported.');
        }
    }

    /**
     * Check to see if the environment is running in production mode
     *
     * @return bool Returns TRUE if it is running in production mode and FALSE if it is not.
     */
    public static function isProductionMode(): bool
    {
        return self::$production;
    }

    /**
     * Check to see if the environment is running in development mode
     *
     * @return bool Returns TRUE if it is running in development mode and FALSE if it is not.
     */
    public static function isDevelopmentMode(): bool
    {
        return self::$development;
    }
}
