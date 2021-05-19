<?php

namespace SymfonySkillbox\HomeworkBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use SymfonySkillbox\HomeworkBundle\DependencyInjection\SymfonySkillboxHomeworkExtension;

class SymfonySkillboxHomeworkBundle extends Bundle
{
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new SymfonySkillboxHomeworkExtension();
        }

        return $this->extension;
    }
}