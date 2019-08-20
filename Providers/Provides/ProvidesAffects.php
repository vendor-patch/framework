<?php

declare(strict_types=1);

/*
 * This file is part of the tenancy/tenancy package.
 *
 * Copyright Laravel Tenancy & Daniël Klabbers <daniel@klabbers.email>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @see https://tenancy.dev
 * @see https://github.com/tenancy
 */

namespace Tenancy\Providers\Provides;

use Tenancy\Affects\Contracts\ResolvesAffects;

trait ProvidesAffects
{
    protected function bootProvidesAffects()
    {
        if (count($this->affects)) {
            $this->app->resolving(ResolvesAffects::class, function (ResolvesAffects $resolver) {
                foreach ($this->affects as $affect) {
                    $resolver->addAffect($affect);
                }
            });
        }
    }
}
