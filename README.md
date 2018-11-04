PHP BYTE API Client
========================

A simple wrapper for the BYTE API that requires PHP >= 7.0.

## Requirements

* PHP >= 7.0 with [cURL](http://php.net/manual/en/book.curl.php) extension,

## Installation

The recommended way is using [composer](http://getcomposer.org):

```bash
$ composer require nybbl/byte
```

## Basic usage

```php
use Nybbl\Byte;

$client = new Byte\Client('<my token>');
$response = $client->api('license')->verify('<license code>');
```

## Documentation
* Official [API documentation](https://docs.byte.nybbl.io).

## Contributing

Feel free to make any comments, file issues or make pull requests.