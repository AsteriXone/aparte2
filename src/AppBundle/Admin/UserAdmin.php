<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Show\ShowMapper;

class UserAdmin extends AbstractAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('edit');
    }

    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('username')
            ->add('roles')
            ->add('password')
            ->add('email')
            ->add('direccion')
            ->add('telefono')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
//            ->add('id')
//            ->add('username')
//            ->add('roles')
//            ->add('password')
            ->add('nombre', null, array('editable'=>true))
            ->add('ape_1', null, array('editable'=>true))
            ->add('ape_2', null, array('editable'=>true))
            ->add('username', null, array('editable'=>true))
            ->add('email', null, array('editable'=>true))
            ->add('direccion', null, array('editable'=>true))
            ->add('telefono', null, array('editable'=>true))
//            ->add('roles')
            ->add('onlyDate', null, array('label'=>'Fecha Registro'))
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                ),
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
//            ->add('id')
            ->add('username', null, array(
                'label' => 'Nombre'
            ))
//            ->add('roles')
//            ->add('plainPassword', null, array(
//                'label' => 'Contraseña'
//            ))
            ->add('password')
            ->add('email', null, array(
                'label' => 'Email'
            ))
            ->add('direccion', null, array(
                'label' => 'Dirección'
            ))
            ->add('telefono', null, array(
                'label' => 'Teléfono'
            ))
//            ->add('isActive')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('username')
            ->add('roles')
            ->add('password')
            ->add('email')
            ->add('direccion')
            ->add('telefono')
        ;
    }
    public function getExportFields(){


        $results[]='nombre';
        $results[]='ape_1';
        $results[]='ape_2';
        $results[]='email';
        $results[]='telefono';

        return $results;
    }
}
