<?php

namespace App\Form;

use App\Entity\Orders;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('orderDate')
            ->add('delayedPayment')
            ->add('dfTotal')
            ->add('quantity')
            ->add('payed')
            ->add('discount')
            ->add('total')
            ->add('customer')
            ->add('product')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}
