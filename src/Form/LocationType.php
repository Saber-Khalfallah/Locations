<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Appartement;
use App\Entity\Locataire;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('IdLoc', EntityType::class, [
                'class' => Locataire::class,
                'choice_label' => 'IdLoc', // or another property that makes sense
            ])
            ->add('NumApp', EntityType::class, [
                'class' => Appartement::class,
                'choice_label' => 'NumApp', // or another property like 'localite' if more descriptive
            ])
            ->add('DatLoc', DateType::class, [
                'widget' => 'single_text',
                'format' => 'yyyy-MM-dd',
            ])
            ->add('NbrMois', NumberType::class)
            ->add('Montant', TextType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}