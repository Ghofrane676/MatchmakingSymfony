<?php

namespace App\Form;

use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
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

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname', TextType::class, ['label' => 'Nom ','attr'=>['class'=> 'form-control']])
            ->add('lastname', TextType::class, ['label' => 'Prénom ','attr'=>['class'=> 'form-control']])
            ->add('societe', TextType::class, ['label' => 'Société ','attr'=>['class'=> 'form-control']])
            ->add('email', EmailType::class, ['label' => 'Email ','attr'=>['class'=> 'form-control']])
            ->add('pays', CountryType::class, ['label' => 'Pays ','attr'=>['class'=> 'form-control']])
            ->add('adresse', TextType::class, ['label' => 'Adresse ','attr'=>['class'=> 'form-control']])
            ->add('siteweb', TextType::class, ['label' => 'Site web ','attr'=>['class'=> 'form-control']])
            ->add('roles', ChoiceType::class, ['attr'=>['class'=> 'form-control'],
                'choices' => [
                    'Collaborateur' => 'ROLE_COLLABORATEUR',
                    'AdminEntreprise' => 'ROLE_ADMINE',
                   
                    
                ],
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'label' => 'Rôle '
            ])
            ->add('agreeTerms', CheckboxType::class, ['label' => 'accepter les conditions ',
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
           
            ->add('password', RepeatedType::class, [
                'mapped'=> false,
                'type' => PasswordType::class,
                'options'=>['attr'=>['class'=> 'form-control']],
                'invalid_message' =>'Ce n\'est pas le même mot de passe !',
                'required' => true,
                'first_options' => ['label' => 'Mot de passe'],
                'second_options' => ['label' => 'confirmer '],
                'constraints' => [
                    new NotBlank,
                    new Length(['min' => 8, 'max' => 4096]),
                ],

            ])
        ;
        $builder->get('roles')
        ->addModelTransformer(new CallbackTransformer(
            function ($rolesArray) {
                // transform the array to a string
                return count($rolesArray)? $rolesArray[0]: null;
            },
            function ($rolesString) {
                // transform the string back to an array
                return [$rolesString];
            }
        ));
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
