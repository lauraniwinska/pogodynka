<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter city name',
                ],
            ])
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'Poland' => 'PL',
                    'United States' => 'US',
                    'United Kingdom' => 'UK',
                    'France' => 'FR',
                    'Germany' => 'DE',
                    'Spain' => 'ES',
                    'Italy' => 'IT',
                    'Australia' => 'AU',
                ],
            ])
            ->add('latitude', NumberType::class, [
                'html5' => true,
                'attr' => [
                    'placeholder' => 'Enter latitude', 'step' => 'any', 'min' => '-90', 'max' => '90'
                ],
            ])
            ->add('longitude', NumberType::class, [
                'html5' => true,
                'attr' => [
                    'placeholder' => 'Enter longitude', 'step' => 'any', 'min' => '-180', 'max' => '180'
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
