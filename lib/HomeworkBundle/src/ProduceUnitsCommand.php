<?php

namespace SymfonySkillbox\HomeworkBundle;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ProduceUnitsCommand extends Command
{
    protected static $defaultName = 'symfony-skillbox-homework:produce-units';

    private $unitFactory;

    public function __construct(UnitFactory $unitFactory)
    {
        parent::__construct();
        $this->unitFactory = $unitFactory;
    }

    protected function configure()
    {
        $this
            ->setDescription('Сервис фабрики существ')
            ->addArgument('resource', InputArgument::REQUIRED, 'количество ресурсов');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $resource = $input->getArgument('resource');

        if ($resource) {

            $army = $this->unitFactory->produceUnits($resource);

            $titles = ['Имя', 'Цена', 'Сила', 'Здоровье'];

            $data = [];
            $res = $resource;
            foreach ($army as $unit) {
                $data[] = [$unit->getName(), $unit->getCost(), $unit->getHealth(), $unit->getStrength()];
                $res -= $unit->getCost();
            }

            $io->text(sprintf('На %d было куплено %d юнитов', $resource, count($army)));
            $io->table($titles, $data);
            $io->text(sprintf('Осталось ресурсов: %d', $res));

        }

        return 0;
    }
}
