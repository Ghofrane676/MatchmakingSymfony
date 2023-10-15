<?php

namespace App\Form;

use App\Entity\Saloneditionpack;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SaloneditionpackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('editionrefrence',TextType::class, ['label' => 'Référence ','attr'=>['class'=> 'form-control']])
            ->add('nombreparticipant',TextType::class, ['label' => 'Nbre Participant','attr'=>['class'=> 'form-control']])
            ->add('montant',TextType::class, ['label' => 'Montant','attr'=>['class'=> 'form-control']])
            ->add('libelle',TextType::class, ['label' => 'Libellé','attr'=>['class'=> 'form-control']])
            ->add('description',TextareaType::class, ['label' => 'Description','attr'=>['class'=> 'form-control']])
            
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Saloneditionpack::class,
        ]);
    }
}
