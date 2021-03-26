<?php

declare(strict_types=1);

namespace Codedge\GoogleMerchant\Contracts;

interface ProductContract
{
    const EXCLUDE = 'google_product_exclude';
    const ID = 'google_product_id';
    const GTIN = 'google_product_gtin';
    const MPN = 'google_product_mpn';
    const TITLE = 'google_product_title';
    const DESC = 'google_product_description';
    const PRICE = 'google_product_price';
    const PRICE_SALE = 'google_product_sale_price';
    const IMAGE = 'google_product_image';
    const IMAGE_ADDITIONAL = 'google_product_additional_image';
    const BRAND = 'google_product_brand';
    const CONDITION = 'google_product_condition';
    const AVAILABILITY = 'google_product_availability';
    const AVAILABILITY_DATE = 'google_product_availability_date';
    const EXPIRATION_DATE = 'google_product_expiration_date';
}
