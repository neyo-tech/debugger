<?php
declare(strict_types=1);
/**
 * Neyo PHP Framework.
 *
 * @author @ikorisabi <ikorisabi@gmail.com>.
 * @license <https://github.com/neyo-php-framework/debugger/blob/master/LICENSE> GNU General Public License v3.0.
 *
 * @link    <https://github.com/neyo-php-framework/debugger>                     Source Code.
 */

namespace Neyo;

/**
 * @class Directives A static class that defines the directives.
 */
class Directives
{

    /**
     * @var array $directives The list of supported directives.
     */
    public static $directives = [
        'debugger.log',
        'debugger.session'
    ];
}
