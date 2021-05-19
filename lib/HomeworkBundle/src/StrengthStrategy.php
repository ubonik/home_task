<?php

namespace SymfonySkillbox\HomeworkBundle;

class StrengthStrategy implements StrategyInterface
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
            $maxStrengthUnit = $units[0];

            foreach ($units as $unit) {

                if (($unit->getStrength() > $maxStrengthUnit->getStrength()) && ($unit->getCost() <= $resource)) {
                    $maxStrengthUnit = $unit;
                }
            }

            return $maxStrengthUnit;
        }

    }

}