<?php

namespace Drupal\Donate\Routing;

use  Symfony\Component\Routing\Route;

class DonateRoutes
{
  /**
   * {@inheritdoc}
   */
  public function routes()
  {
    $routes = [];
    // Declares a single route under the name 'example.content'.
    // Returns an array of Route objects.
    $routes['donate.form'] = new Route(
      '/donate',
      [
        '_form' => '\Drupal\donate\Form\DonateForm',
        '_title' => 'Faire un don'
      ],
      // Route requirements:
      [
        '_permission'  => 'access content',
      ]
    );
    $routes['donate.confirmation.stripe'] = new Route(
      '/donate/confirmation',
      [
        '_controller' => '\Drupal\donate\Controller\StripeController::ConfirmationPaiement',
        '_title' => 'Confirmation paiement'
      ],
      // Route requirements:
      [
        '_permission'  => 'access content',
      ]
    );
    return $routes;
  }
}
