<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 25/01/2018
 * Time: 20:49
 */

namespace AppBundle\Form;


use AppBundle\Entity\Cuadrante;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\DateTime;

class CitasType  extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cuadrante', EntityType::class, array(
                'class' => 'AppBundle:Cuadrante',
                'label' => 'Cuadrante:'
            ))
            ->add('diaCuadrante', CollectionType::class, array(
                'entry_type' => DiasCuadranteType::class,
                'entry_options' => array('label' => false),
                'allow_add' => true,
            ))
        ;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Cuadrante::class
        ));
    }
}