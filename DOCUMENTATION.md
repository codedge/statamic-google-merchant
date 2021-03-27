## Basic configuration

### Currency

The configuration can be done in the `config/google-merchant.php` file.

```php
'currency' => [
    'symbol' => '€',
    'iso_code' => 'EUR',
]
```

### Selecting collections, file output path

In your Statamic Control Panel (CP) in the left sidebar you will find a link to Google Merchant settings.
Here you can set up in which collections your products reside, which file name or file path you want to output the feed to.

#### File output

The generated field file is saved on the `public` disk. So make sure you actually have on.
If you want to put it in a subdirectory, just enter it in the Control Panel like `feeds/gmf.xml`. 

#### Collections

The `handle` of the collection specified should actually exist. Currently, there is no validation if the collection entered  
Also make sure that every collection has all the fields that are required to build the field. 

#### Fields

For each field in the feed you can configure either a fixed value or another field, where you already have the field value in.

- Static value for a field: `My static value
- Reference the `title` field for the product name: `{{ title }}`

Whenever you entered a value enclosed in curly brackets `{{ }}`, the value is considered being a field.


