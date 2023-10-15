<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
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
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\PercentType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

 use Symfony\Component\Form\Extension\Core\Type\MoneyType;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombreemployereference', IntegerType::class, ['label' => 'Référence nbr employé ',])
            ->add('soussecteurreference', IntegerType::class, ['label' => 'Référence ss secteur ',])
            ->add('chiffreaffairereference', IntegerType::class, ['label' => 'Référence C.A',])
            ->add('paysreference', IntegerType::class, ['label' => 'Référence pays',])
            ->add('servicereference', IntegerType::class, ['label' => 'Référence service ',])
            ->add('denomination', TextType::class, ['label' => 'Dénomination ',])
            ->add('logo', FileType::class, ['label' => 'Logo ',])
            ->add('adresse', TextType::class, ['label' => 'Adresse ',])
            ->add('email', EmailType::class, ['label' => 'Email',])
            ->add('siteweb', TextType::class, ['label' => 'site web',])
            ->add('nombreclient', NumberType::class, ['label' => 'Nbr client ',])
            ->add('pourcentageca', PercentType::class, ['label' => ' Pourcentage',])
            ->add('prixinnovation', MoneyType::class, ['label' => 'Prix inovation ',])
            ->add('cellulaire', TelType::class, ['label' => 'Cellulaire ',])
            ->add('telephone1', TelType::class, ['label' => 'Téléphone 1 ',])
            ->add('telephone2', TelType::class, ['label' => 'Téléphone 2',])
            ->add('fax', NumberType::class, ['label' => ' Fax ',])
            ->add('transferexport', TextType::class, ['label' => 'Transferexport ',])
            ->add('export', TextType::class, ['label' => 'Export ',])
            ->add('client', TextType::class, ['label' => 'Client ',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
