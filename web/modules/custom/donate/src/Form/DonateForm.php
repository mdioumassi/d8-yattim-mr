<?php

namespace Drupal\donate\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class DonateForm.
 */
class DonateForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'donate_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['coordonnees'] = array(
      '#type' => 'fieldset',
      '#title' => $this
        ->t('MES COORDONNEES'),
    );
    $form['donate'] = array(
      '#type' => 'fieldset',
      '#title' => $this
        ->t('MON DON'),
    );
    $form['coordonnees']['firstname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Prénom'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
      '#required' => 'TRUE'
    ];
    $form['coordonnees']['lastname'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Nom'),
      '#maxlength' => 64,
      '#size' => 64,
      '#required' => 'TRUE',
      '#weight' => '0',
    ];
    $form['coordonnees']['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
      '#required' => 'TRUE',
      '#weight' => '0',
    ];
    $form['coordonnees']['civility'] = [
      '#type' => 'select',
      '#title' => $this->t('Civilité'),
      '#options' => [
        'Mr' => $this->t('Mr'),
        'Mme' => $this->t('Mme'),
        'Mlle' => $this->t('Mlle'),
        ],
      '#required' => 'TRUE',
      '#weight' => '0',
    ];
    $form['coordonnees']['address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Adresse'),
      '#maxlength' => 64,
      '#size' => 64,
      '#required' => 'TRUE',
      '#weight' => '0',
    ];
    $form['coordonnees']['address_complement'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Adresse complémentaire'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['coordonnees']['postal_code'] = [
      '#type' => 'number',
      '#title' => $this->t('Code postal'),
      '#required' => 'TRUE',
      '#weight' => '0',
    ];
    $form['coordonnees']['city'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Ville'),
      '#maxlength' => 64,
      '#size' => 64,
      '#required' => 'TRUE',
      '#weight' => '0',
    ];
    $form['coordonnees']['mobile_phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Téléphone'),
      '#weight' => '0',
    ];
    $form['donate']['amountOnce20'] = [
      '#type' => 'radio',
      '#title' => $this->t('20€'),
      '#weight' => '0',
    ];
    $form['donate']['amountOnce30'] = [
      '#type' => 'radio',
      '#title' => $this->t('30€'),
      '#weight' => '0',
    ];
    $form['donate']['amountOnce40'] = [
      '#type' => 'radio',
      '#title' => $this->t('40€'),
      '#weight' => '0',
    ];
    $form['donate']['amountOnce50'] = [
      '#type' => 'radio',
      '#title' => $this->t('50€'),
      '#weight' => '0',
    ];
    $form['donate']['amountFree'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Montant libre'),
      '#maxlength' => 64,
      '#size' => 64,
      '#weight' => '0',
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {


    foreach ($form_state->getValues() as $key => $value) {
     if ($key == 'firstname' && is_numeric($value)) {
       $form_state->setErrorByName($key, $this->t('Erreur, veuillez saisir une chaine'));
     }

    }
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      \Drupal::messenger()->addMessage($key . ': ' . ($key === 'text_format'?$value['value']:$value));
    }
  }

}
