<?php

namespace App\Homework;

use SymfonySkillbox\HomeworkBundle\StrategyInterface;
use SymfonySkillbox\HomeworkBundle\Unit;

class BillGatesStrategy implements StrategyInterface
{
    public function next(array $units, int $resource): ?Unit
    {
        $minCost = $units[0]->getCost();

        foreach ($units as $unit) {
            if ($unit->getCost() < $minCost) {
                $minCost = $unit->getCost();
            }
        }
        if ($minCost > $resource) {

            return null;
        } else {
            $maxCostUnit = $units[0];

            foreach ($units as $unit) {

                if (($unit->getCost() > $maxCostUnit->getCost()) && ($unit->getCost() <= $resource)) {
                    $maxCostUnit = $unit;
                }
            }

            return $maxCostUnit;
        }

    }

}