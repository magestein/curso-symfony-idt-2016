<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('tipoDocumento')
            ->add('fechaNacimiento')
            ->add('sexo')
            ->add('salario')
            ->add('email')
            ->add('fechaInicio')
            ->add('fechaEntrada')
            ->add('fechaSalida')
            ->add('curriculum')
            ->add('observaciones')
            ->add('dependencia');
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Funcionario'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_funcionario';
    }


}
