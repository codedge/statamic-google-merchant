<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Fieldtypes;

use Statamic\Fields\Fieldtype;

class Price extends Fieldtype
{
    protected static $title = "Google Product Price";
    protected $categories = ['googlemerchant'];
    protected $icon = 'tags';

    public function preload(): array
    {
        return [
            'currencySymbol' => config('google-merchant.currency.symbol'),
        ];
    }

    public function process($data)
    {
        return $data;
    }
}
