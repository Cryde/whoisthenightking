<?php

namespace AppBundle\Form;

use AppBundle\Entity\Character;
use AppBundle\Entity\Theory;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TheoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('character', EntityType::class, ['class' => Character::class, 'choice_label' => 'name'])
            ->add('content', TextareaType::class)
            ->add('author');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Theory::class
        ]);
    }
}