<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Fieldtypes;

use Statamic\Fields\Fieldtype;

class Availability extends Fieldtype
{
    protected static $title = "Google Product Availabilty";
    protected $categories = ['googlemerchant'];
    protected $icon = 'tags';
    protected $default = 'in_stock';

    public function preload()
    {
        return [
            'availabilities' => [
                [
                    'value' => 'in_stock',
                    'label' => 'In stock',
                ],
                [
                    'value' => 'out_of_stock',
                    'label' => 'Out of stock',
                ],
                [
                    'value' => 'preorder',
                    'label' => 'Preorder',
                ],
            ],
        ];
    }
}
