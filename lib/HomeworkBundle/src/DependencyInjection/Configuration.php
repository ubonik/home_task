<?php


namespace SymfonySkillbox\HomeworkBundle\DependencyInjection;


use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('symfony_skillbox_homework');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode
            ->children()
            ->scalarNode('strategy')->defaultNull()->info('стратегия создания юнитов')->end()
            ->booleanNode('enable_solder')->defaultTrue()->info('доступны ли для создания солдаты')->end()
            ->booleanNode('enable_archer')->defaultTrue()->info('доступны ли для создания лучники')->end();

        return $treeBuilder;
    }

}