<?php

require_once 'USVN/modules/admin/controllers/IndexController.php';

class admin_ProjectController extends admin_IndexController
{
	public function indexAction()
	{
		$table = new USVN_modules_default_models_Projects();
		$this->_view->projects = $table->fetchAll();
		$this->_render('index.html');
	}

	public function newAction()
	{
		if (!empty($_POST)) {
			$this->save("USVN_modules_default_models_Projects", "project");
		}
		$this->_render('form.html');
	}

	public function editAction()
	{
		if (!empty($_POST)) {
			$this->save("USVN_modules_default_models_Projects", "project");
		} else {
			$projectTable = new USVN_modules_default_models_Projects();
			$this->_view->project = $projectTable->fetchRow(array('projects_id = ?' => $this->getRequest()->getParam('id')));
		}
		$this->_render('form.html');
	}

	public function deleteAction()
	{
		if (!empty($_POST)) {
			$this->delete("USVN_modules_default_models_Projects", "project");
		} else {
			$projectTable = new USVN_modules_default_models_Projects();
			$this->_view->project = $projectTable->fetchRow(array('projects_id = ?' => $this->getRequest()->getParam('id')));
		}
		$this->_render('form.html');
	}
}
