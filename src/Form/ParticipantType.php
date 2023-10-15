<?php

namespace App\Form;

use App\Entity\Participant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
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

class ParticipantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('entreprisereference',TextType::class, ['label' => 'Entreprise référence','attr'=>['class'=> 'form-control']])
            ->add('participantfonctionreference',TextType::class, ['label' => 'Référence foction','attr'=>['class'=> 'form-control']])
            ->add('participantservicereference',TextType::class, ['label' => 'Référence service','attr'=>['class'=> 'form-control']])
            ->add('nom',TextType::class, ['label' => 'Nom','attr'=>['class'=> 'form-control']])
            ->add('prenom',TextType::class, ['label' => 'Prénom','attr'=>['class'=> 'form-control']])
            ->add('email',EmailType::class, ['label' => 'Email','attr'=>['class'=> 'form-control']])
            ->add('photoprofil',TextType::class, ['label' => 'Photo de profil','attr'=>['class'=> 'form-control']])
            ->add('civilite',TextType::class, ['label' => 'Civilité','attr'=>['class'=> 'form-control']])
            ->add('telephone',TextType::class, ['label' => 'Téléphone','attr'=>['class'=> 'form-control']])
            ->add('fax',TextType::class, ['label' => 'Fax','attr'=>['class'=> 'form-control']])
            ->add('gsm',TextType::class, ['label' => 'GSM','attr'=>['class'=> 'form-control']])
            ->add('linkedin',TextType::class, ['label' => 'LinkedIn','attr'=>['class'=> 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Participant::class,
        ]);
    }
}
