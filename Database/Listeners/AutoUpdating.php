<?php declare(strict_types=1);

/*
 * This file is part of the tenancy/tenancy package.
 *
 * (c) Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see http://laravel-tenancy.com
 * @see https://github.com/tenancy
 */

namespace Tenancy\Database\Listeners;

use Tenancy\Tenant\Events\Updated;

class AutoUpdating extends DatabaseMutation
{
    /**
     * @param Updated $event
     * @return array|null
     */
    public function statements($event): ?array
    {
        if ($this->driver && config('tenancy.database.auto-update')) {
            return $this->driver->update($event->tenant);
        }

        return null;
    }
}
