<?php

namespace App\Form;

use App\Entity\Entreprisesecteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EntreprisesecteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('secteurpincipalreference')
            ->add('libelle',TextType::class, ['label' => 'Libellé ','attr'=>['class'=> 'form-control']])
            ->add('description',TextareaType::class, ['Description' => 'Nom ','attr'=>['class'=> 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprisesecteur::class,
        ]);
    }
}
