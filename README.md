Kohana Devtools Module
======================

## Features

- Easy access to Kohana environment details (normally only provided by `install.php`
- Provides Transparent Extension information (which Kohana native classes your app/modules ovewrite) extend.
- Includes very useful Route tester
- Easy and readable access to all your app's routes, configs, messages and i18n's


## Preview Screenshot

![Preview!](http://i.imgur.com/RKwiaT4.png)


## Compatibility

- Kohana 3.3.x


## Installation

1. Checkout/download files and folders to `MODPATH/devtools`.
2. Add this entry under `Kohana::modules` array in your `APPPATH/bootstrap.php`:

```php
'devtools'     => MODPATH.'devtools',      // Devtools
```


## Configuration

This module requires no configuration.


## Usage

Simply browse to `/devtools` on your app.


## Notes

This module will throw an exception if enabled in an environment different than `DEVELOPMENT`.


## Acknowledgements

This module was originally created by [Michael Peters aka bluehawk](https://github.com/bluehawk).
I merely provided few tweaks and updates to make it work with latest Kohana versions.
