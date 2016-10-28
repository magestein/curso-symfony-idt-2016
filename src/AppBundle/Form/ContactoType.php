<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        dump($options);

        $builder->add('nombre')
            ->add('apellido')
            ->add('email')
//            ->add('asunto', ChoiceType::class, array(
//                'choices' => array(
//                    'Contacto Técnico' => 'CT',
//                    'Contacto Comercial' => 'CC',
//                    'Facturación' => 'CF'
//                ),
//                'multiple' => false,
//                'expanded' => true
//            ))
            ->add('asunto', ChoiceType::class, array(
                'choices' => $options['asuntos_options']
            ))
            ->add('mensaje', TextareaType::class)
            ->add('enviar', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('asuntos_options');

        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contacto',
        ));
    }

}