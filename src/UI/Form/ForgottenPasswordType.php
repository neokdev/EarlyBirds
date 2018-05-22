<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 18/05/2018
 * Time: 23:37
 */

namespace App\UI\Form;

use App\Domain\DTO\ForgottenPasswordDTO;
use App\Domain\DTO\Interfaces\ForgottenPasswordDTOInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ForgottenPasswordType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildform(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => false,
                'attr'  => [
                    'placeholder' => 'Email',
                ],
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class'        => ForgottenPasswordDTOInterface::class,
            'empty_data'        => function (FormInterface $form) {
                return new ForgottenPasswordDTO(
                    $form->get('email')->getData()
                );
            },
            'label'             => false,
            'validation_groups' => ['ForgottenPassword'],
        ]);
    }
}
