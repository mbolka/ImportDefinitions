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

use CoreShop\Component\Registry\ServiceRegistryInterface;
use ImportDefinitionsBundle\Model\DefinitionInterface;
use ImportDefinitionsBundle\Model\Mapping;
use Pimcore\Model\DataObject\Concrete;
use Webmozart\Assert\Assert;

final class Nested implements InterpreterInterface
{
    /**
     * @var ServiceRegistryInterface
     */
    protected $interpreterRegistry;

    /**
     * @param ServiceRegistryInterface $interpreterRegistry
     */
    public function __construct(ServiceRegistryInterface $interpreterRegistry)
    {
        $this->interpreterRegistry = $interpreterRegistry;
    }

    /**
     * {@inheritdoc}
     */
    public function interpret(Concrete $object, $value, Mapping $map, $data, DefinitionInterface $definition, $params, $configuration)
    {
        Assert::keyExists($configuration, 'interpreters');
        Assert::isArray($configuration['interpreters'], 'Interpreter Config needs to be array');

        foreach ($map->getInterpreterConfig()['interpreters'] as $interpreter) {
            $interpreterObject = $this->interpreterRegistry->get($interpreter['type']);
            $value = $interpreterObject->interpret($object, $value, $map, $data, $definition, $params, $interpreter['interpreterConfig']);
        }

        return $value;
    }
}
