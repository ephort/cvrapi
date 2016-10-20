# cvrapi

CVRAPI.dk composer package.

## Installation

`composer require kristiani/cvrapi`

## Usage

```php
// Get by VAT number
$result = \Cvrapi\Cvrapi::get('29910251', 'dk');

// Get by P-number
$result = \Cvrapi\Cvrapi::get('1012697712', 'dk');

// Get by company name
$result = \Cvrapi\Cvrapi::get('I/S Just Iversen', 'dk');

// Get company by searching specifically in the VAT field
$result = \Cvrapi\Cvrapi::request('29910251', 'dk', 'vat');

// Get company by searching specifically in the P number field
$result = \Cvrapi\Cvrapi::request('1012697712', 'dk', 'produ');

// Get company by searching specifically in the company name field
$result = \Cvrapi\Cvrapi::request('I/S Just Iversen', 'dk', 'name');

// Get company by searching specifically in the phone number field
$result = \Cvrapi\Cvrapi::request('61401169', 'dk', 'phone');
```