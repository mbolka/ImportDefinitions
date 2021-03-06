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

namespace ImportDefinitionsBundle\Interpreter;

use Pimcore\Model\DataObject\Concrete;
use ImportDefinitionsBundle\Model\DefinitionInterface;
use ImportDefinitionsBundle\Model\Mapping;

class AssetsUrl extends AssetUrl
{
    /**
     * {@inheritdoc}
     */
    public function interpret(Concrete $object, $value, Mapping $map, $data, DefinitionInterface $definition, $params, $configuration)
    {
        $asset = parent::interpret($object, $value, $map, $data, $definition, $params, $configuration);

        if ($asset) {
            return [$asset];
        }

        return null;
    }
}
