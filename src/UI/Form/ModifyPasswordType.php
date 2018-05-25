<?php
/**
 * Created by PhpStorm.
 * User: Neok
 * Date: 19/05/2018
 * Time: 00:51
 */

namespace App\UI\Form;

use App\Domain\DTO\Interfaces\ModifyPasswordDTOInterface;
use App\Domain\DTO\ModifyPasswordDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifyPasswordType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(
        FormBuilderInterface $builder,
        array $options
    ) {
        $builder
            ->add('password', RepeatedType::class, [
                'type'           => PasswordType::class,
                'first_options'  => [
                    'label' => false,
                    'attr'  => [
                        'placeholder' => 'Mot de passe',
                    ],
                ],
                'second_options' => [
                    'label' => false,
                    'attr'  => [
                        'placeholder' => 'Répétez le mot de passe',
                    ],
                ],
            ])
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ModifyPasswordDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new ModifyPasswordDTO(
                    $form->get('password')->getData()
                );
            },
            'label'      => false,
        ]);
    }
}
