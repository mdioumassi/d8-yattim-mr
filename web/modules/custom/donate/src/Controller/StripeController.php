<?php

namespace Drupal\donate\Controller;

use Drupal\Core\Controller\ControllerBase;

class StripeController extends ControllerBase
{
    public function ConfirmationPaiement()
    {
        $output = '<div class="w3-padding-64 w3-center w3-card">';
        $output .= '<p class="w3-xlarge">Votre don a bien été reception, Merci ! </p>';
        $output .= '</div>';
        return [
            '#type' => 'markup',
            '#markup' => $output,
            '#attached' => [
                'library' => [
                    'donate/donate'
                ]
            ]
        ];
    }
}
