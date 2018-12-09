
# IPFuscator

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kamerk22/ipfuscator/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kamerk22/ipfuscator/?branch=master)
[![Build Status][ico-travis]][link-travis]
[![Code Intelligence Status](https://scrutinizer-ci.com/g/kamerk22/ipfuscator/badges/code-intelligence.svg?b=master)](https://scrutinizer-ci.com/code-intelligence)
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]

IPFuscation is a technique that allows for IP addresses to be represented in hexadecimal or decimal instead of the decimal encoding we are used to. 

This package will provide simple and easy API convert IP to alternative formats that are interpreted in the same way.

Insired by [https://github.com/vysec/IPFuscator](https://github.com/vysec/IPFuscator) in Python.

## Installation

You can install this package via Composer.

``` bash
$ composer require kamerk22/ipfuscator
```

## Usage

```php
use kamerk22\IPFuscator\IPFuscator;
```

### Get Decimal 
```php
IPFuscator::getDecimal($ip);
```

### Get Octal
```php
IPFuscator::getOctal($ip);
```

### Get Hexadecimal
```php
IPFuscator::getHexadecimal($ip);
```

### Get Full Octal
```php
IPFuscator::getFullOct($ip);
```

### Get Full Hexadecimal
```php
IPFuscator::getFullHex($ip);
```

### Get Random Base
```php
IPFuscator::getRandomBase($ip);
```

### Get Random Base With Random Pad
```php
IPFuscator::getRandomBaseWithRandomPad($ip);
```
## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.


## Security

If you discover any security related issues, please email kashyapk62@gmail.com instead of using the issue tracker.

## Credits

- [Kashyap Merai][link-author]
- [All Contributors][link-contributors]

## License

MIT. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/kamerk22/ipfuscator.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/kamerk22/ipfuscator.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/com/kamerk22/ipfuscator.svg?style=flat-square


[link-packagist]: https://packagist.org/packages/kamerk22/ipfuscator
[link-downloads]: https://packagist.org/packages/kamerk22/ipfuscator
[link-travis]: https://travis-ci.org/kamerk22/ipfuscator
[link-author]: https://github.com/kamerk22
[link-contributors]: ../../contributors]