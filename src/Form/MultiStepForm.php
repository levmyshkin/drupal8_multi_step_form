<?php

/**
 * @file
 * Contains Drupal\multi_step\Form\MultiStepForm.
 */

namespace Drupal\multi_step\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;

class MultiStepForm extends FormBase
 {

  protected $step = 1;
  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {}

  /**
   * {@inheritdoc}
   */
  public function getFormID() {
    return 'multi_step_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    //$form = parent::buildForm($form, $form_state);

    // Add a wrapper div that will be used by the Form API to update the form using AJAX
    $form['#prefix'] = '<div id="ajax_form_multistep_form">';
    $form['#suffix'] = '</div>';

    if($this->step == 1) {
      $form['model'] = [
        '#type' => 'select',
        '#title' => $this->t('Model'),
        '#description' => $this->t(''),
              '#options' => array('1997', '1998', '1999', '2000', '2001', '2002', '2003', '2004', '2005', '2006', '2007', '2008', '2009', '2010', '2011', '2012', '2013', '2014', '2015'),
              '#default_value' => '1997',
      ];

      $form['message'] = [
        //'#type' => 'html',
        //'#title' => $this->t('Message'),
        '#markup' => '<em>Message</em>',
      ];
    }

    if($this->step == 2) {
      $form['body_style'] = [
        '#type' => 'checkboxes',
        '#title' => $this->t('Body Style'),
        '#description' => $this->t(''),
              '#options' => array('Coupe', 'Sedan', 'Convertible', 'Hatchbac', 'Station wagon', 'SUV', 'Minivan', 'Full-size van', 'Pick-up'),
              '#default_value' => 'Coupe',
      ];
    }

    if($this->step == 3) {
      $form['message'] = [
        //'#type' => 'html',
        //'#title' => $this->t('Message'),
        '#markup' => '<em>Message</em>',
      ];
    }

    if($this->step == 4) {
      $form['message'] = [
        //'#type' => 'html',
        //'#title' => $this->t('Message'),
        '#markup' => '<em>Message</em>',
      ];
    }

   // if ($this->step < 4) {
      $form['buttons']['forward'] = array (
        '#type' => 'submit',
        '#value' => t('Next'),
        '#ajax' => array (
          // We pass in the wrapper we created at the start of the form
          'wrapper' => 'ajax_form_multistep_form',
          // We pass a callback function we will use later to render the form for the user
          'callback' => '::ajax_form_multistep_form_ajax_callback',
        ),
      );
    //}
    // We only want a submit button if we are on the last step of the form
//    else {
//      $form['buttons']['submit'] = array(
//        '#type' => 'submit',
//        '#value' => t('Next'),
//        '#ajax' => array(
//          // We pass in the wrapper we created at the start of the form
//          'wrapper' => 'ajax_form_multistep_form',
//          // We pass a callback function we will use later to render the form for the user
//          'callback' => '::ajax_form_multistep_form_ajax_callback',
//        ),
//      );
//    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    return parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
   // if($this->step <= 4) {
      $this->step++;
      $form_state->setRebuild();
   // }
  }

  public function ajax_form_multistep_form_ajax_callback(array &$form, FormStateInterface $form_state) {
    return $form;
  }

  /**
   * Implements the submit handler for the ajax call.
   *
   * @param array $form
   *   Render array representing from.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   Current form state.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   Array of ajax commands to execute on submit of the modal form.
   */
//  public function ajax_form_multistep_form_ajax_callback(array &$form, FormStateInterface $form_state) {
//
//    // At this point the submit handler has fired.
//    // Clear the message set by the submit handler.
//    drupal_get_messages();
//
//    // We begin building a new ajax reponse.
//    $response = new AjaxResponse();
//    $test = 'asdf';
//    if ($form_state->getErrors()) {
//      unset($form['#prefix']);
//      unset($form['#suffix']);
//      $form['status_messages'] = [
//        '#type' => 'status_messages',
//        '#weight' => -10,
//      ];
//      $response->addCommand(new HtmlCommand('#ajax_form_multistep_form', $form));
//    }
//    else {
//      $title = $form_state->getValue('title');
//      $message = t('You specified a title of %title.', ['%title' => $title]);
//      $content = [
//        '#type' => 'html_tag',
//        '#tag' => 'p',
//        '#value' => $message,
//      ];
//      $response->addCommand(new HtmlCommand('#ajax_form_multistep_form', $content));
//    }
//    return $response;
//  }
}
