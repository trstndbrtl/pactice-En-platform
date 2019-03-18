<?php

namespace App\Form;

use App\Entity\Verb;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VerbFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('present')
            ->add('preterit')
            ->add('participepresent')
            ->add('participepasse')
            ->add('traduction')
            ->add('phonetique')
            ->add('irregular')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Verb::class,
        ]);
    }
}
