<?php

namespace SymfonySkillbox\HomeworkBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

class SymfonySkillboxHomeworkExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(dirname(__DIR__) . '/Resources/config'));
        $loader->load('services.xml');

        $configuration = $this->getConfiguration($configs, $container);

        $config = $this->processConfiguration($configuration, $configs);

        $definition = $container->getDefinition('symfony_skillbox_homework.unit_factory');

        if (null == $config['strategy']) {

            $definition->setArgument(0, new Reference('symfony_skillbox_homework.strategy'));

        } else {
            $container->setAlias('symfony_skillbox_homework.strategy', $config['strategy']);
        }

        $definition->setArgument(1, $config['enable_solder']);
        $definition->setArgument(2, $config['enable_archer']);

    }

    public function getAlias()
    {
        return 'symfony_skillbox_homework';
    }


}