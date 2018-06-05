<?php

namespace App\UI\Form;

use App\Domain\DTO\Interfaces\ObserveDTOInterface;
use App\Domain\DTO\ObserveDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class ObserveType extends AbstractType
{
    /**
     * @param FormBuilderInterface  $builder
     * @param array                 $options
     */
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ) {
        $builder
            ->add('author',TextType::class, [
                'label'=> false,
                'attr' => [
                    'placeholder' => 'votre nom d\'utilissateur'
                ]
            ])
            ->add('ref', TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'nom de l\'oiseau'
                ]
            ])
            ->add('description',TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'desecription'
                ]
            ])
            ->add('latitude',TextType::class,[
                'label' => false,
                'attr' => [
                    'placeholder' => 'latitude'
                ]
            ])
            ->add('longitude',TextType::class, [
                'label' => false,
                'attr' => [
                    'placeholder' => 'longitude'
                ]
            ])
            ->add('img',FileType::class, [
                'label' => false
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(
        OptionsResolver $resolver
    ) {
        $resolver->setDefaults([
            'data_class' => ObserveDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new ObserveDTO(
                    $form->get('author')->getData(),
                    $form->get('ref')->getData(),
                    $form->get('description')->getData(),
                    $form->get('latitude')->getData(),
                    $form->get('longitude')->getData(),
                    $form->get('img')->getData()
                );
            },
            'label'      => false,
            'validation_groups' => ['Observe']
        ]);
    }
}