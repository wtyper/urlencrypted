<?php

namespace App\Form;

use App\Entity\UrlBase;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UrlBaseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('baseUrl')
            ->add('generatedUrl')
            ->add('generate', SubmitType::class, ['label'=>'GenerateUlr'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UrlBase::class,
        ]);
    }
}
