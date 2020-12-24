<?php

namespace SymfonySkillbox\HomeworkBundle;

class HealthStrategy implements StrategyInterface
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

            $maxHealthUnit = $units[0];
            foreach ($units as $unit) {
                if (($unit->getHealth() > $maxHealthUnit->getHealth()) && ($unit->getCost() <= $resource)) {
                    $maxHealthUnit = $unit;
                }
            }

            return $maxHealthUnit;
        }

        return null;
    }

}