<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Fieldtypes;

use Statamic\Fields\Fieldtype;

class Condition extends Fieldtype
{
    protected static $title = "Google Product Condition";
    protected $categories = ['googlemerchant'];
    protected $icon = 'tags';
    protected $default = 'new';

    public function preload()
    {
        return [
            'conditions' => [
                [
                    'value' => 'new',
                    'label' => 'New',
                ],
                [
                    'value' => 'refurbished',
                    'label' => 'Refurbished',
                ],
                [
                    'value' => 'used',
                    'label' => 'Used',
                ],
            ],
        ];
    }
}
