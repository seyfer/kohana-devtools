Kohana Devtools Module
======================

## Features

- Easy access to Kohana environment details (normally only provided by `install.php`
- Easy access to `phpinfo()` output
- Provides Transparent Extension information (which Kohana native classes your app/modules ovewrite) extend.
- Includes very useful Route tester
- Easy and readable access to all your app's routes, configs, messages and i18n's


## Preview Screenshot

![Preview!](http://i.imgur.com/bSnagui.png)


## Compatibility

- Kohana 3.2.x


## Installation

1. Checkout/download files and folders to `MODPATH/devtools`.
2. Add this entry under `Kohana::modules` array in your `APPPATH/bootstrap.php`:

```php
'devtools'     => MODPATH.'devtools',      // Devtools
```

### Conditional Loading

If you don't want to worry about disabling the module for non-DEVELOPMENT
environments you can load on condition in your `bootstrap.php`, .e.g:

```php
/**
 * Enable modules. Modules are referenced by a relative or absolute path.
 */
$modules = array(
    // 'auth'       => MODPATH.'auth',       // Basic authentication
    // 'cache'      => MODPATH.'cache',      // Caching with multiple backends
    // 'codebench'  => MODPATH.'codebench',  // Benchmarking tool
    // 'database'   => MODPATH.'database',   // Database access
    // 'image'      => MODPATH.'image',      // Image manipulation
    // 'minion'     => MODPATH.'minion',     // CLI Tasks
    // 'orm'        => MODPATH.'orm',        // Object Relationship Mapping
    // 'unittest'   => MODPATH.'unittest',   // Unit testing
    // 'userguide'  => MODPATH.'userguide',  // User guide and API documentation
);

// Load Devtools module only if in DEVELOPMENT environment
if (Kohana::$environment === Kohana::DEVELOPMENT)
{
    $modules['devtools'] = MODPATH.'devtools';
}

Kohana::modules($modules);
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
