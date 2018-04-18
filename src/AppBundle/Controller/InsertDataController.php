<?php

namespace AppBundle\Controller;

use AppBundle\Entity\City;
use AppBundle\Entity\Company;
use AppBundle\Entity\Province;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InsertDataController extends AbstractController
{
    public function insertDataAction(EntityManagerInterface $em)
    {
        $province = new Province();
        $province->setName('dolnośląskie');
        $em->persist($province);

        $city = new City($province);
        $city->setName('Legnica');
        $city->setPostCode('59-220');
        $em->persist($city);

        $company = new Company();
        $company->setName('NAME');
        $company->setCity($city);
        $em->persist($company);

        $em->flush();

        return $this->render('@App/insert-confirm.html.twig', [
            'company' => $company
        ]);
    }
}


