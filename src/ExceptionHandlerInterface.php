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

/**
 * @interface ExceptionHandlerInterface The excption handler interface.
 */
interface ExceptionHandlerInterface
{

    /**
     * Initialize a new exception handler.
     *
     * @param string $passableFunction The function name.
     *
     * @throws RuntimeException If the function does not exists.
     *
     * @return void Returns nothing.
     */
    public function __construct(string $passableFunction = '');

    /**
     * Return the error handler function.
     *
     * @return mixed The error handler function
     */
    public function getCallable();
}
