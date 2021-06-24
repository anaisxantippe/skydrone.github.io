<?php

namespace App\Controller;

use App\Entity\SalesDepartment;
use App\Form\SalesDepartmentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sales/department")
 * @IsGranted("ROLE_ADMIN")
 */
class SalesDepartmentController extends AbstractController
{
    /**
     * @Route("/", name="sales_department_index", methods={"GET"})
     */
    public function index(): Response
    {
        $salesDepartments = $this->getDoctrine()
            ->getRepository(SalesDepartment::class)
            ->findAll();

        return $this->render('sales_department/index.html.twig', [
            'sales_departments' => $salesDepartments,
        ]);
    }

    /**
     * @Route("/new", name="sales_department_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $salesDepartment = new SalesDepartment();
        $form = $this->createForm(SalesDepartmentType::class, $salesDepartment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($salesDepartment);
            $entityManager->flush();

            return $this->redirectToRoute('sales_department_index');
        }

        return $this->render('sales_department/new.html.twig', [
            'sales_department' => $salesDepartment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{sdId}", name="sales_department_show", methods={"GET"})
     */
    public function show(SalesDepartment $salesDepartment): Response
    {
        return $this->render('sales_department/show.html.twig', [
            'sales_department' => $salesDepartment,
        ]);
    }

    /**
     * @Route("/{sdId}/edit", name="sales_department_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SalesDepartment $salesDepartment): Response
    {
        $form = $this->createForm(SalesDepartmentType::class, $salesDepartment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sales_department_index');
        }

        return $this->render('sales_department/edit.html.twig', [
            'sales_department' => $salesDepartment,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{sdId}", name="sales_department_delete", methods={"POST"})
     */
    public function delete(Request $request, SalesDepartment $salesDepartment): Response
    {
        if ($this->isCsrfTokenValid('delete'.$salesDepartment->getSdId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($salesDepartment);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sales_department_index');
    }
}
