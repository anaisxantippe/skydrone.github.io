<?php

namespace App\Controller;

use App\Entity\ResourceDepartment;
use App\Form\ResourceDepartmentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/resourcedepartement")
 * @IsGranted("ROLE_ADMIN")
 */
class ResourcedepartementController extends AbstractController
{
    /**
     * @Route("/", name="resourcedepartement_index", methods={"GET"})
     */
    public function index(): Response
    {
        $resourceDepartments = $this->getDoctrine()
            ->getRepository(ResourceDepartment::class)
            ->findAll();

        return $this->render('resourcedepartement/index.html.twig', [
            'resource_departments' => $resourceDepartments,
        ]);
    }

    /**
     * @Route("/new", name="resourcedepartement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resourceDepartment = new ResourceDepartment();
        $form = $this->createForm(ResourceDepartmentType::class, $resourceDepartment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resourceDepartment);
            $entityManager->flush();

            return $this->redirectToRoute('resourcedepartement_index');
        }

        return $this->render('resourcedepartement/new.html.twig', [
            'resource_department' => $resourceDepartment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{rdId}", name="resourcedepartement_show", methods={"GET"})
     */
    public function show(ResourceDepartment $resourceDepartment): Response
    {
        return $this->render('resourcedepartement/show.html.twig', [
            'resource_department' => $resourceDepartment,
        ]);
    }

    /**
     * @Route("/{rdId}/edit", name="resourcedepartement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ResourceDepartment $resourceDepartment): Response
    {
        $form = $this->createForm(ResourceDepartmentType::class, $resourceDepartment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resourcedepartement_index');
        }

        return $this->render('resourcedepartement/edit.html.twig', [
            'resource_department' => $resourceDepartment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{rdId}", name="resourcedepartement_delete", methods={"POST"})
     */
    public function delete(Request $request, ResourceDepartment $resourceDepartment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resourceDepartment->getRdId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($resourceDepartment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('resourcedepartement_index');
    }
}
