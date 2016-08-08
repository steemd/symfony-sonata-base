<?php
namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use AppBundle\Admin\CategoryAdmin;

class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
		->tab('Post') //create tab in edit panel
			->with('Content', array('class' => 'col-md-12'))
				->add('title', 'text')
				->add('body', 'textarea')
			->end()
		->end()
		->tab('Category') //create tab in edit panel
			->with('Meta data', array('class' => 'col-md-12'))
				->add('category', 'sonata_type_model', array(
					'class' => 'AppBundle\Entity\Category',
					'property' => 'name',
				))
			->end()
		->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('title')
        ->add('body')
		->add('category', null, array(), 'entity', array(
                'class'    => 'AppBundle\Entity\Category',
                'property' => 'name',
            ));
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title') //title with link
		->add('body', null, array('editable' => true)) //create edit pop-up to fiald body
		->add('category.name')
		->add('draft', null, array('editable' => true));
    }
	
	public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post Name'; // shown in the breadcrumb on the create view
    }
}