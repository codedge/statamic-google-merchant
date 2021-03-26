<?php

declare(strict_types=1);

return [
    'general' => 'Allgemein',

    'fields' => [
        'fixed_value_handle' => 'Festwert oder _{{ handle }}_ des Feldes.',
        'google_product_id' => 'Produkt-ID (SKU)',
        'google_product_id_instructions' => '[Offizielle Dokumentation](https://support.google.com/merchants/answer/6324405 )',
        'google_product_mpn' => 'Teilenummer des Herstellers (Manufacturer Part Number)',
        'google_product_mpn_instructions' => '[Offizielle Dokumentation](https://support.google.com/merchants/answer/6324482)',
        'google_product_gtin' => 'Teilenummer des Herstellers (Manufacturer Part Number)',
        'google_product_gtin_instructions' => '[Offizielle Dokumentation](https://support.google.com/merchants/answer/6324461)',
        'google_product_title' => 'Titel',
        'google_product_title_instructions' => '[Offizielle Dokumentation](https://support.google.com/merchants/answer/6324415)',
        'google_product_description' => 'Beschreibung',
        'google_product_description_instructions' => '[Offizielle Dokumentation](https://support.google.com/merchants/answer/6324468)',
    ],

    'settings' => [
        'add_collection' => 'Sammlung hinzufügen',
        'headline'                    => 'Google Merchant',
        'collection'                => 'Sammlung',
        'collection_instructions' => 'Füge das _handle_ der Sammlung ein',
        'configure_your_needs'        => 'Passe Google Merchant nach deinen Wünschen an',
        'enabled'                => 'Aktiviert',
        'enabled_instructions' => 'Aktiviert die automatische Erstellung des Feeds.',
        'field_configuration' => 'Feldkonfiguration',
        'filename' => 'Dateiname',
        'filename_instructions' => 'Der Name der Feed XML-Datei.',
        'settings'                    => 'Einstellungen',
        'updated_successfully' => 'Erfolgreich gespeichert',
    ],

    'permissions' => [
        'settings' => 'Google Merchant Feed',
        'view_settings' => 'Einstellungen bearbeiten',
    ],

    'unable_to_save' => 'Speichern fehlgeschlagen. Prüfe deine Konsole/Log-Dateien.',
];
