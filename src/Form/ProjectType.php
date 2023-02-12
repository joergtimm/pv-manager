<?php

namespace App\Form;

use App\Entity\Project;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class ProjectType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $imageConstrains = [
            new Image([
                'maxSize' => '12M'
            ]),
        ];

        $builder
            ->add('name')
            ->add('lat')
            ->add('lon')
            ->add('status', ChoiceType::class, [
                'choices' => [
                    'Angefragt' => 'anfragt',
                    'Bestätigt' => 'bestätigt',
                    'Planung' => 'planung',
                    'Im Bau' => 'im-bau',
                    'Abgeschlossen' => 'abgeschlossen'
                ],
                'multiple' => false,
                'expanded' => false
            ])
            ->add('beschreibung', CKEditorType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'w-100'
                ],
                'config' => [
                    'toolbar' => 'my_toolbar_1',
                ],
                'autoload' => true,
            ])
            ->add('thumb', FileType::class, [
                'label' => false,
                'mapped' => false,
                'required' => false,
                'constraints' => $imageConstrains,
            ])
            ->add('priority')
            ->add('deadline', null, [
                'attr' => [
                    'data-controller' => 'flatpickr',
                    'flatpickr_min_date' => 'Time.zone.now'
                ],
                'widget' => 'single_text',

            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Project::class,
        ]);
    }
}
