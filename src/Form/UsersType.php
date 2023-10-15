<?php

namespace App\Form;

use App\Entity\Users;
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

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',EmailType::class, ['label' => 'Email','attr'=>['class'=> 'form-control']])
            ->add('roles')
            ->add('password')
            ->add('isVerified')
            ->add('etat')
            ->add('description',TextType::class, ['label' => 'Description','attr'=>['class'=> 'form-control']])
            ->add('lastname',TextType::class, ['label' => 'Nom','attr'=>['class'=> 'form-control']])
            ->add('Firstname',TextType::class, ['label' => 'Prénom','attr'=>['class'=> 'form-control']])
            ->add('pays',TextType::class, ['label' => 'Pays','attr'=>['class'=> 'form-control']])
            ->add('Societe',TextType::class, ['label' => 'Société','attr'=>['class'=> 'form-control']])
            ->add('adresse',TextType::class, ['label' => 'Adresse','attr'=>['class'=> 'form-control']])
            ->add('siteweb',TextType::class, ['label' => 'Site web','attr'=>['class'=> 'form-control']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
