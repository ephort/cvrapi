# cvrapi

CVRAPI.dk composer package.

## Installation

`composer require KristianI/cvrapi`

## Usage

```php
// Get by VAT number
\Cvrapi\Cvrapi::get('29910251', 'dk');

// Get by P-number
\Cvrapi\Cvrapi::get('1012697712', 'dk');

// Get by company name
\Cvrapi\Cvrapi::get('I/S Just Iversen', 'dk');

// Get company by searching specifically in the VAT field
\Cvrapi\Cvrapi::request('29910251', 'dk', 'vat');

// Get company by searching specifically in the P number field
\Cvrapi\Cvrapi::request('1012697712', 'dk', 'produ');

// Get company by searching specifically in the company name field
\Cvrapi\Cvrapi::request('I/S Just Iversen', 'dk', 'name');

// Get company by searching specifically in the phone number field
\Cvrapi\Cvrapi::request('61401169', 'dk', 'phone');
```