<?php

namespace App\Form;

use App\Entity\SalesDepartment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SalesDepartmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname')
            ->add('firstname')
            ->add('adress')
            ->add('zipCode')
            ->add('city')
            ->add('birthdate')
            ->add('phoneNumber')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SalesDepartment::class,
        ]);
    }
}
