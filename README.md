# cvrapi

CVRAPI.dk composer package.

## Installation

`composer require kristiani/cvrapi`

## Usage

```php
// Get by VAT number
$result = \Cvrapi\Cvrapi::get('29910251', 'dk', 'Description of my project');

// Get by P-number
$result = \Cvrapi\Cvrapi::get('1012697712', 'dk', 'Description of my project');

// Get by company name
$result = \Cvrapi\Cvrapi::get('I/S Just Iversen', 'dk', 'Description of my project');

// Get company by searching specifically in the VAT field
$result = \Cvrapi\Cvrapi::request('29910251', 'dk', 'vat', 'Description of my project');

// Get company by searching specifically in the P-number field
$result = \Cvrapi\Cvrapi::request('1012697712', 'dk', 'produ', 'Description of my project');

// Get company by searching specifically in the company name field
$result = \Cvrapi\Cvrapi::request('I/S Just Iversen', 'dk', 'name', 'Description of my project');

// Get company by searching specifically in the phone number field
$result = \Cvrapi\Cvrapi::request('61401169', 'dk', 'phone', 'Description of my project');
```