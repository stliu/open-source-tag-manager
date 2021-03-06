<?php
/**
 * Copyright (C) 2015 Digimedia Sp. z o.o. d/b/a Clearcode
 *
 * This program is free software: you can redistribute it and/or modify it under
 * the terms of the GNU Affero General Public License as published by the Free
 * Software Foundation, either version 3 of the License, or (at your option) any
 * later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

namespace SevenTag\Api\VariableBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package SevenTag\Api\VariableBundle\DependencyInjection
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('seven_tag_variable');

        $rootNode
            ->children()
                ->arrayNode('types')
                ->prototype('array')
                    ->children()
                        ->scalarNode('name')->isRequired()->end()
                        ->scalarNode('collectorName')->isRequired()->end()
                        ->scalarNode('helper')->isRequired()->end()
                    ->end()
                ->end()
            ->end();

        $rootNode
            ->children()
                ->arrayNode('variables')
                ->prototype('array')
                    ->children()
                        ->scalarNode('name')->isRequired()->end()
                        ->scalarNode('type')->isRequired()->end()
                        ->scalarNode('value')->isRequired()->end()
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
