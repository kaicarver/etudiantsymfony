<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Etudiant;
use App\Form\EtudiantType;

class EtudiantController extends AbstractController
{
    #[Route('/etudiant', name: 'app_etudiant')]
    public function index(): Response
    {
        return $this->render('etudiant/index.html.twig', [
            'controller_name' => 'EtudiantController',
        ]);
    }
    #[Route('/addEtudiant', name: 'add_etudiant')]
    public function addEtudiant(ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();
        $et = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $et);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($et);
            $em->flush();
            return $this->redirectToRoute('list_etudiant');
        }
        return $this->render('etudiant/add.html.twig', [
            'f' => $form,
        ]);
    }
    #[Route('/editEtudiant', name: 'edit_etudiant')]
    public function editEtudiant(ManagerRegistry $doctrine, Request $request): Response
    {
        $em = $doctrine->getManager();
        $et = new Etudiant();
        $form = $this->createForm(EtudiantType::class, $et);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($et);
            $em->flush();
            return $this->redirectToRoute('list_etudiant');
        }
        return $this->render('etudiant/edit.html.twig', [
            'f' => $form,
        ]);
    }
    #[Route('/modEtudiant/{id}', name: 'mod_etudiant')]
    public function modEtudiant(ManagerRegistry $doctrine, Etudiant $et, Request $request): Response
    {
        $em = $doctrine->getManager();
        $form = $this->createForm(EtudiantType::class, $et);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($et);
            $em->flush();
            return $this->redirectToRoute('list_etudiant');
        }
        return $this->render('etudiant/add.html.twig', [
            'f' => $form,
        ]);
    }
    #[Route('/delEtudiant/{id}', name: 'edit_etudiant')]
    public function delEtudiant(ManagerRegistry $doctrine, Etudiant $et): Response
    {
        $em = $doctrine->getManager();
        $em->remove($et);
        $em->flush();
        return $this->redirectToRoute('list_etudiant');
    }
    #[Route('/listEtudiant', name: 'list_etudiant')]
    public function listEtudiant(ManagerRegistry $doctrine): Response
    {
        $ets = $doctrine->getRepository(Etudiant::class)->findAll();
        return $this->render('etudiant/list.html.twig', [
            'etudiants' => $ets
        ]);
    }
}
