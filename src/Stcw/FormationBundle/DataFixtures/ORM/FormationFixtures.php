<?php

namespace Stcw\FormationBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Stcw\FormationBundle\Entity\Module;

class FormationFixtures extends AbstractFixture
{
    public function load($manager)
    {
        $module = new Module();
        $module->setTitle('Basic Navy');
        $module->setSi(50);
        $module->setLevel(500);
        
        $manager->persist($module);
        $manager->flush();
        
        $this->addReference('bny',$module);
        
        unset($module);
        
        $module = new Module();
        $module->setTitle('Rating Navy');
        $module->setSi(50);
        $module->setLevel(600);
        
        $manager->persist($module);
        $manager->flush();
        
        $this->addReference('rny',$module);
        
        unset($module);
        
        $module = new Module();
        $module->setTitle('Basic Navigation');
        $module->setSi(50);
        $module->setLevel(100);
        
        $manager->persist($module);
        $manager->flush();
        
        $this->addReference('bnv',$module);
        
        unset($module);
        
        $module = new Module();
        $module->setTitle('Intermediate Navigation');
        $module->setSi(50);
        $module->setLevel(120);
        
        $manager->persist($module);
        $manager->flush();
        
        $this->addReference('inv',$module);
        
        unset($module);
        
        $module = new Module();
        $module->setTitle('Advanced Navigation');
        $module->setSi(50);
        $module->setLevel(140);
        
        $manager->persist($module);
        $manager->flush();
        
        $this->addReference('anv',$module);
        
        unset($module);
        
        $module = new Module();
        $module->setTitle('Finding Sea Legs');
        $module->setSi(50);
        $module->setLevel(80);
        
        $manager->persist($module);
        $manager->flush();
        
        $this->addReference('fsl',$module);
        
        unset($module);
        
        $module = new Module();
        $module->setTitle('Introduction Navy for HZSA');
        $module->setSi(50);
        $module->setLevel(85);
        
        $manager->persist($module);
        $manager->flush();
        
        $this->addReference('inz',$module);
        
        unset($module);
        
        $module = new Module();
        $module->setTitle('KOO Nautical Service');
        $module->setSi(50);
        $module->setLevel(500);
        
        $manager->persist($module);
        $manager->flush();
        
        $this->addReference('knd',$module);
        
        unset($module);
    }
}