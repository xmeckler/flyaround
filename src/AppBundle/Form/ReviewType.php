<?php
/**
 * Created by PhpStorm.
 * User: wilder17
 * Date: 14/05/18
 * Time: 15:29
 */

namespace AppBundle\Form;


use Symfony\Component\Form\AbstractType;

class ReviewType extends AbstractType
{
    /**
     * {@inheritdoc} Including all fields from Review entity.
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text')
            ->add('publicationDate')
            ->add('note')
            ->add('userRated')
            ->add('reviewAuthor');
    }

    /**
     * {@inheritdoc} Targeting Review entity
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Review'
        ));
    }

    /**
     * {@inheritdoc} getName() is now deprecated
     */
    public function getBlockPrefix()
    {
        return 'appbundle_review';
    }

}