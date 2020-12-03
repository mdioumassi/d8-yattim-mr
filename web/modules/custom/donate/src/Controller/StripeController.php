<?php

namespace Drupal\donate\Controller;

use Drupal\Core\Controller\ControllerBase;

class StripeController extends ControllerBase
{
    public function ConfirmationPaiement()
    {
        return [
            // '#type' => 'markup',
            //'#markup' => $output,
            '#theme' => 'donate_paiement_confirmation',
            '#attached' => [
                'library' => [
                    'donate/donate'
                ]
            ]
        ];
    }
}
