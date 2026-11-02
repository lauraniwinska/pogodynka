<?php

namespace App\Form;

use App\Entity\Location;
use App\Entity\Measurement;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MeasurementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('date', DateType::class, [
                'attr' => [
                    'placeholder' => 'Enter date',
                ],
            ])
            ->add('temperature', NumberType::class, [
                'html5' => true,
                'attr' => [
                    'placeholder' => 'Enter temperature', 'min' => '-80', 'max' => '80'
                ],
            ])
            ->add('cloudiness', TextType::class, [
                'attr' => [
                    'placeholder' => 'Enter cloudiness',
                ],
            ])
            ->add('pressure', NumberType::class, [
                'html5' => true,
                'attr' => [
                    'placeholder' => 'Enter pressure','min' => '870', 'max' => '1085'
                ],
            ])
            ->add('precipitation', NumberType::class, [
                'html5' => true,
                'attr' => [
                    'placeholder' => 'Enter precipitation','min' => '0', 'max' => '500'
                ],
            ])
            ->add('location', EntityType::class, [
                'class' => Location::class,
                'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Measurement::class,
        ]);
    }
}
