<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Job;
use Doctrine\ORM\EntityManagerInterface;

final class JobController extends AbstractController
{
    #[Route('/job/create-demo', name: 'app_job')]
    public function demo(EntityManagerInterface $em): Response
    {
        $job = new Job();
        $job->setType('CDI');
        $job->setCompany('Polytechnique');
        $job->setDescription('Ingénieur GL');
        $job->setExpiresAt(new \DateTimeImmutable('+45 days'));
        $job->setEmail('contact@email.com');

        $em->persist($job);
        $em->flush();
        
        return $this->render('job/createjob.html.twig', [
            'id' => $job->getId(),
        ]);
    }

    #[Route('/job/{id}', name: 'job_details')]
    public function show(int $id, EntityManagerInterface $em): Response
    {
        $job = $em->getRepository(Job::class)->find($id);
        

        /**
         * find -> id : find(3) --> where id = 3 
         * findall : findall(): selectall() : select *
         *
         * findOne: findOne['type'=>"cdi","ville"=>"sousse"]
         */
        return $this->render('job/show.html.twig', [
            'job' => $job,
        ]);
    }
}