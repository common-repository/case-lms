<?php
/**
 * This file is part of the Case LMS WordPress PLugin.
 *
 * (c) Uriel Wilson <hello@urielwilson.com>
 *
 * Please see the LICENSE file that was distributed with this source code
 * for full copyright and license information.
 */

namespace CaseLMS;

use CaseLMS\Documents\Cases;

class Plugin
{
    private $documents;

    /**
     * Setup Plugin constructor.
     */
    public function __construct()
    {
        $this->documents = [ 'cases' ];
    }

    public function register_types(): void
    {
        add_action(
            'init',
            function(): void {
                Cases::register();
            }
        );
    }

    public function get_documents(): array
    {
        return $this->documents;
    }

    public static function init()
    {
        return new self();
    }
}
