<?php

/**
 * user actions.
 *
 * @package    test
 * @subpackage user
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class userActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->user_detailss = Doctrine_Core::getTable('user_details')
      ->createQuery('a')
      ->execute();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->user_details = Doctrine_Core::getTable('user_details')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->user_details);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new user_detailsForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new user_detailsForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($user_details = Doctrine_Core::getTable('user_details')->find(array($request->getParameter('id'))), sprintf('Object user_details does not exist (%s).', $request->getParameter('id')));
    $this->form = new user_detailsForm($user_details);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($user_details = Doctrine_Core::getTable('user_details')->find(array($request->getParameter('id'))), sprintf('Object user_details does not exist (%s).', $request->getParameter('id')));
    $this->form = new user_detailsForm($user_details);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($user_details = Doctrine_Core::getTable('user_details')->find(array($request->getParameter('id'))), sprintf('Object user_details does not exist (%s).', $request->getParameter('id')));
    $user_details->delete();

    $this->redirect('user/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $user_details = $form->save();

      $this->redirect('user/edit?id='.$user_details->getId());
    }
  }
}
