<?php

declare(strict_types=1);

return [
    'general' => 'General',

    'fields' => [
        'fixed_value_handle' => 'Fixed value or _{{ handle }}_ of the field.',
        'google_product_id' => 'ID (SKU)',
        'google_product_id_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324405)',
        'google_product_mpn' => 'Your product’s Manufacturer Part Number (Manufacturer Part Number)',
        'google_product_mpn_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324482)',
        'google_product_gtin' => 'Your product’s Global Trade Item Number (GTIN)',
        'google_product_gtin_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324461)',
        'google_product_title' => 'Title',
        'google_product_title_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324415)',
        'google_product_description' => 'Description',
        'google_product_description_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324468)',
        'google_product_price' => 'Price',
        'google_product_price_instructions' => 'If fixed value, enter without currency. [Official documentation](https://support.google.com/merchants/answer/6324371)',
        'google_product_sale_price' => 'Sale price',
        'google_product_sale_price_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324471)',
        'google_product_image' => 'Image link',
        'google_product_image_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324350)',
        'google_product_additional_image' => 'Additional image link',
        'google_product_additional_image_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324370)',
        'google_product_brand' => 'Brand',
        'google_product_brand_instructions' => ' ',
        'google_product_condition' => 'Condition',
        'google_product_condition_instructions' => 'Possible fixed values: `new`, `refurbished`, `used`. [Official documentation](https://support.google.com/merchants/answer/6324469)',
        'google_product_availability' => 'Availability',
        'google_product_availability_instructions' => 'Possible fixed values: `in stock`, `out of stock`, `preorder`. [Official documentation](https://support.google.com/merchants/answer/6324448)',
        'google_product_availability_date' => 'Availability date',
        'google_product_availability_date_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324470)',
        'google_product_expiration_date' => 'Expiration date',
        'google_product_expiration_date_instructions' => '[Official documentation](https://support.google.com/merchants/answer/6324499)',
    ],

    'settings' => [
        'add_collection' => 'Add collection',
        'headline'                    => 'Google Merchant',
        'collection'                => 'Collection',
        'collection_instructions' => 'Enter the _handle_ of the collection',
        'configure_your_needs'        => 'Adjust Google Merchant to your needs',
        'enabled'                => 'Enabled',
        'enabled_instructions' => 'Activates the automatic creation of the feed.',
        'field_configuration' => 'Field configuration',
        'filename' => 'File name',
        'filename_instructions' => 'The file name of the feed file.',
        'settings'                    => 'Settings',
        'updated_successfully' => 'Saved successfully',
    ],

    'permissions' => [
        'settings' => 'Google Merchant Feed',
        'view_settings' => 'Edit settings',
    ],

    'unable_to_save' => 'Cannot save. Please check your console/log files.',

    'widget' => [
        'feed_exists' => 'Feed exists?',
        'yes' => 'Yes',
        'no' => 'No',
        'not_existing' => 'The feed file does not exist.',
        'products_in_feed' => 'Products in feed',
    ],
];
