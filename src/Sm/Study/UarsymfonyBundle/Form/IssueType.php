<?php

namespace Sm\Study\UarsymfonyBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;



class IssueType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('number')
            ->add('datePublication', DatetimeType::class, array(
                'years' => range(date('Y'), date('Y', strtotime('-10 years'))),
                'required' => TRUE,
            ))
            ->add('file')
            ->add('publication', EntityType::class, array(
                'required' => TRUE,
                'class' => 'SmStudyUarsymfonyBundle:Publication',
            ))
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Sm\Study\UarsymfonyBundle\Entity\Issue'
        ));
    }
}
