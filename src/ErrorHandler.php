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

use function is_null;
use function function_exists;
use function trim;

use const null;

/**
 * @class      ErrorHandler          The error handler.
 * @implements ErrorHandlerInterface The error handler interface.
 */
class ErrorHandler implements ErrorHandlerInterface
{

    /**
     * @var string $passableFunction The function name.
     */
    private $callableFunction;

    /**
     * Initialize a new error handler.
     *
     * @param string $passableFunction The function name.
     *
     * @throws RuntimeException If the function does not exists.
     *
     * @return void Returns nothing.
     */
    public function __construct(string $passableFunction = '')
    {
        $passableFunction = trim($passableFunction);
        // An error handler function is provided.
        if (function_exists($passableFunction)) {
            $this->callableFunction = $passableFunction;
        } else {
            throw new RuntimeException('The function does not exists.');
        }
    }

    /**
     * Return the error handler function.
     *
     * @return callable The error handler function
     */
    public function getCallable()
    {
        return $callableFunction();
    }
}
