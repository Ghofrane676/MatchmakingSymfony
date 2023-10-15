<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class EditProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('lastname',  TextType::class, ['label' => 'Nom ','attr'=>['class'=> 'form-control']])
            ->add('Firstname', TextType::class, ['label' => 'Prénom ','attr'=>['class'=> 'form-control']])
            ->add('email', TextType::class, ['label' => 'Email ','attr'=>['class'=> 'form-control']])
            ->add('adresse', TextType::class, ['label' => 'Adresse ','attr'=>['class'=> 'form-control']])
            ->add('siteweb', TextType::class, ['label' => 'Site Web ','attr'=>['class'=> 'form-control']])
            ->add('enregistrer', SubmitType::class,  ['label' => 'Modifier '])
            
            

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
