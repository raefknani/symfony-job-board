<?php
// src/Controller/InscriptionController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
class InscriptionController extends AbstractController
{
#[Route('/Inscription/number', name: 'number')]
public function number(): Response
{
$number = random_int(0, 100); 
return $this->render('Inscription/number.html.twig', [ 
'number' => $number, 
]);
}
#[Route('/indicateur', name: 'test_indcateur')]
public function test_indicateur(): Response
{
    $indicateur=[
        ['libelle' => 'Taux de réussite', 'valeur' => 87.4567, 'unite' => '%'],
        ['libelle' => 'Nombre d\'étudiants', 'valeur' => 1245, 'unite' => ''],
        ['libelle' => 'Budget consommé', 'valeur' => 15230.5, 'unite' => 'DT'],
];
    return $this->render('Inscription/number_param.html.twig', 
    [ 
'indicateurs' => $indicateur, 
]);
}
#[Route('/Accueil', name: 'accueil')]
public function welcome(): Response
{
$number = random_int(0, 100); 
return $this->render('Inscription/accueil.html.twig', [ 
'number' => $number, 
]);
}
#[Route('/Contact', name: 'contact')]
public function contact(): Response
{
return $this->render('Inscription/contact.html.twig');
}
}