<?php
/**
 * Import Definitions.
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2016-2017 W-Vision (http://www.w-vision.ch)
 * @license    https://github.com/w-vision/ImportDefinitions/blob/master/gpl-3.0.txt GNU General Public License version 3 (GPLv3)
 */

namespace ImportDefinitionsBundle\DependencyInjection\Compiler;

final class CleanerRegistryCompilerPass extends AbstractServiceRegistryCompilerPass
{
    public function __construct()
    {
        parent::__construct(
            'import_definition.registry.cleaner',
            'import_definition.cleaners',
            'import_definition.cleaner'
        );
    }
}
