<?php

namespace App\Form;

use App\Entity\Salonsalle;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SalonsalleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('editionrefrence')
            ->add('libelle', TextType::class, ['label' => 'Libéllé ','attr'=>['class'=> 'form-control']])
            ->add('description', TextareaType::class, ['label' => 'Description ','attr'=>['class'=> 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Salonsalle::class,
        ]);
    }
}
