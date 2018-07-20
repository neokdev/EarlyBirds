<?php
/**
 * Created by PhpStorm.
 * User: havartjeremie
 * Date: 18/07/2018
 * Time: 19:13
 */

namespace App\UI\Form;

use App\Domain\DTO\AddCommentDTO;
use App\Domain\DTO\Interfaces\AddCommentDTOInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentType extends AbstractType
{
    public function buildForm(
        FormBuilderInterface $builder,
        array                $options
    ) {
       $builder
            ->add('content', TextType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'votre commentaire'
                ]
            ])
       ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'  => AddCommentDTOInterface::class,
            'empty_class' => function (FormInterface $form) {
                return new AddCommentDTO(
                    $form->get('content')->getData()
                );

            },
            'label' => false

        ]);
    }
}