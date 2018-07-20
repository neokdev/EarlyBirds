<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 17:43
 */

namespace App\UI\Form;

use App\Domain\DTO\AddPostDTO;
use App\Domain\DTO\Interfaces\AddPostDTOInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class AddPostType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(
        FormBuilderInterface $builder,
        array                $options
    ) {

        $builder
            ->add('title', TextType::class, [
                'label'    => false,
                'required' => true,
                'attr'     => [
                    'placeholder' => 'titre de l\'article'
                ]
            ])
            ->add('content', TextareaType::class, [
                'label'    => false,
                'required' => true,
                'attr'     => [
                    'placeholder' => 'votre article'
                ]
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'vie de l\'association' => [
                        'CR, AG'                 => 'CRAG',
                        'Bénévolat, partenariat' => 'benevola',
                        'faits marquants'        => 'facts'
                    ],
                    'Évènements' => [
                            'Agenda asso'                                                    => 'agenda',
                        'Autres  : exemple "Fête de la nature", we Oiseaux des jardins, etc' => 'autres'
                    ],
                    'L’art d\'observer les oiseaux' => [
                        'Lieux, balades'             => 'places',
                        'Attitude du birdwatcher'    => 'birdwatcher',
                        'équipement'                 => 'gear'
                    ],
                    'Identifier un oiseau (comment reconnaître un .... ?)' => 'bird',
                    'Ornithologie sans frontières' => [
                        'Oiseaux exotiques'                    => 'exoticbirds',
                        'Voyages, expériences ornithologiques' => 'travel'
                    ],
                    'Biodiversité / environnement' => [
                        'Zones à préserver'                          => 'preserv',
                        'Agriculture, jardinage, conseils pratiques' => 'farming'
                    ],
                    'Programmes de recherche et publications' => [
                        'Programmes de recherche en cours' => 'program',
                        'documents scientifiques'          => 'document'
                    ]

                ],
                'placeholder' => 'choisissez une catégorie'
            ])
            ->add('img', FileType::class, [
                'label'    => false,
                'required' => true
            ])
            ->add('miniature', FileType::class, [
                'label'    => false,
                'required' => false
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(
            [
                'data_class' => AddPostDTOInterface::class,
                'empty_data' => function (FormInterface $form) {
                    return new AddPostDTO(
                        $form->get('title')->getData(),
                        $form->get('content')->getData(),
                        $form->get('category')->getData(),
                        $form->get('img')->getData(),
                        $form->get('miniature')->getData()
                    );
                },
                'label' => false
            ]
        )
        ;
    }
}