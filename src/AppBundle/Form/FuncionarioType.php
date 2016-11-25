<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FuncionarioType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellido')
            ->add('documentoIdentidad')
            ->add('tipoDocumento', ChoiceType::class, array(
                'choices' => array_flip($options['tiposDocumentosOptions'])
            ))
            ->add('fechaNacimiento', DateType::class)
            ->add('sexo')
            ->add('salario')
            ->add('email')
            ->add('fechaInicio', DateType::class)
            ->add('fechaEntrada', DateTimeType::class)
            ->add('fechaSalida', DateTimeType::class)
            ->add('curriculum', FileType::class)
            ->add('observaciones')
            ->add('dependencia');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setRequired('tiposDocumentosOptions');

        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Funcionario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'funcionario';
    }


}
