<?php

namespace App\Homework;

use SymfonySkillbox\HomeworkBundle\StrategyInterface;
use SymfonySkillbox\HomeworkBundle\Unit;

class ZergRushStrategy implements StrategyInterface
{
    public function next(array $units, int $resource): ?Unit
    {
        $minCost = $units[0]->getCost();

        foreach ($units as $unit) {
            if ($unit->getCost() < $minCost) {
                $minCost = $unit->getCost();
            }
        }
        if ($minCost < $resource) {

            $minCostUnit = $units[0];
            foreach ($units as $unit) {
                if (($unit->getCost() < $minCostUnit->getCost()) && ($unit->getCost() <= $resource)) {
                    $minCostUnit = $unit;
                }
            }

            return $minCostUnit;
        }

        return null;
    }

}