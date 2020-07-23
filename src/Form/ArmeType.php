<?php

namespace App\Form;

use App\Entity\Arme;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ArmeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('description')
            ->add('degats_base')
            ->add('degats_de')
            ->add('id_univers')
            ->add('id_type_arme')
            ->add('id_personnage')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Arme::class,
        ]);
    }
}
