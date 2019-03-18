<?php

namespace App\Controller;

use App\Entity\Verb;
use App\Form\VerbFormType;
use App\Repository\VerbRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @Route("/playground")
 */
class VerbController extends AbstractController
{
    /**
     * @Route("/all-verbs", name="app_list_verb")
     */
    public function listVerb(VerbRepository $vr)
    {
        $verbs = $vr->findAll();
        return $this->render('verb/list.html.twig', [
            'page_title' => 'Verbes',
            'verbs' => $verbs
        ]);
    }

    /**
     * @Route("/the-verb/{present}", name="app_the_verb")
     */
    public function theVerb(Verb $verb)
    {
        return $this->render('verb/verb.html.twig', [
            'page_title' => 'Verbe',
            'verb' => $verb
        ]);
    }

    /**
     * @Route("/verbs/add", name="app_add_verb")
     * @Security("is_granted('ROLE_USER')")
     */
    public function addVerb(Request $request, EntityManagerInterface $em)
    {
		$form = $this->createForm(VerbFormType::class);

		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()) {
            $verb = $form->getData();
            $em->persist($verb);
			$em->flush();

			$this->addFlash(
				'notice',
				'Le verbe a été ajouté.'
			);

			return $this->redirectToRoute('app_list_verb');
        }

        return $this->render('verb/add-and-edit.html.twig', [
            'page_title' => 'Ajouter',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/verbs/edit/{id}", name="app_edit_verb")
     * @Security("is_granted('ROLE_USER')")
     */
    public function editVerb(Verb $verb, EntityManagerInterface $em, Request $request)
    {

        $form = $this->createForm(VerbFormType::class, $verb);

		$form->handleRequest($request);

		if($form->isSubmitted() && $form->isValid()) {
            $verb = $form->getData();
            $em->persist($verb);
			$em->flush();

			$this->addFlash(
				'notice',
				'Le verbe a été ajouté.'
			);

			return $this->redirectToRoute('app_list_verb');
        }

        return $this->render('verb/add-and-edit.html.twig', [
            'page_title' => 'Editer',
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/verbs/remove/{id}", name="app_delete_verb")
     * @Security("is_granted('ROLE_USER')")
     */
    public function deleteVerb(Verb $verb, EntityManagerInterface $em)
    {
		$em->remove($verb);
		$em->flush();
		return $this->redirectToRoute('app_list_verb');
    }
}
