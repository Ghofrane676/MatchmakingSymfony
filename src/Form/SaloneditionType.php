<?php

namespace App\Form;

use App\Entity\Salonedition;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\LocaleType;
use Symfony\Component\Form\Extension\Core\Type\CurrencyType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class SaloneditionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('salonreference', IntegerType::class, ['label' => 'Adresse ','attr'=>['class'=> 'form-control']])
            ->add('adresse', TextType::class, ['label' => 'Adresse ','attr'=>['class'=> 'form-control']])
            ->add('datedebut', TextType::class, ['label' => 'Date début ','attr'=>['class'=> 'form-control']])
            ->add('nombrejour', TextType::class, ['label' => 'Nbr de jour ','attr'=>['class'=> 'form-control']])
            ->add('datefin', TextType::class, ['label' => 'Date fin ','attr'=>['class'=> 'form-control']])
            ->add('heuredebutparjour', TextType::class, ['label' => 'Début H/J ','attr'=>['class'=> 'form-control']])
            ->add('heurefinparjour', TextType::class, ['label' => 'Fin H/J ','attr'=>['class'=> 'form-control']])
            ->add('dureerencontre', TextType::class, ['label' => 'Durée rencontre ','attr'=>['class'=> 'form-control']])
            ->add('debutrepas', TextType::class, ['label' => 'Début repas ','attr'=>['class'=> 'form-control']])
            ->add('dureerepas', TextType::class, ['label' => 'Durée repas ','attr'=>['class'=> 'form-control']])
            ->add('finrepas', TextType::class, ['label' => 'Fin repas ','attr'=>['class'=> 'form-control']])
            ->add('debutpausecafeam', TextType::class, ['label' => 'Début pause café AM ','attr'=>['class'=> 'form-control']])
            ->add('dureepausecafeam', TextType::class, ['label' => 'Durée pause café AM ','attr'=>['class'=> 'form-control']])
            ->add('finpausecafeam', TextType::class, ['label' => 'Fin pause café AM ','attr'=>['class'=> 'form-control']])
            ->add('debutpausecafepm', TextType::class, ['label' => 'Début pause café PM ','attr'=>['class'=> 'form-control']])
            ->add('dureepausecafepm', TextType::class, ['label' => 'Durée pause café PM ','attr'=>['class'=> 'form-control']])
            ->add('finpausecafepm', TextType::class, ['label' => 'Fin pause café PM','attr'=>['class'=> 'form-control']])
            ->add('datelimiteinscription', TextType::class, ['label' => 'Limite inscription ','attr'=>['class'=> 'form-control']])
            ->add('datelimiterencontre', TextType::class, ['label' => 'Limite rencontre ','attr'=>['class'=> 'form-control']])
            ->add('maxrencontre', TextType::class, ['label' => 'Max rencontre ','attr'=>['class'=> 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Salonedition::class,
        ]);
    }
}
