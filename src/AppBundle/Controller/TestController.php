<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Company;
use AppBundle\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

class TestController extends AbstractController
{
    public function testAction(Company $company, EntityManagerInterface $em, DenormalizerInterface $denormalizer)
    {
        $contactArray = [];
        $contactArray['type'] = 'visit';
        $contactArray['text'] = 'text';
        $contactArray['company'] = $company;

        $contact = $denormalizer->denormalize($contactArray, Contact::class);

        $em->persist($contact);

        $em->flush();

        return $this->render('@App/test.html.twig', [
            'company' => $company
        ]);
    }
}