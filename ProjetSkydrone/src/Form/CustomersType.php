<?php

namespace App\Form;

use App\Entity\Customers;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('role')
            ->add('company')
            ->add('lastname')
            ->add('firstname')
            ->add('deliveryAdress')
            ->add('deliveryZip')
            ->add('deliveryCity')
            ->add('deliveryCountry')
            ->add('billingAdress')
            ->add('billingCity')
            ->add('billingZip')
            ->add('billingCountry')
            ->add('vat')
            ->add('phoneNumber')
            ->add('sd')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Customers::class,
        ]);
    }
}
