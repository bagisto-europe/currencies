# Bagisto Currencies
[![Latest Stable Version](http://poser.pugx.org/bagisto-eu/currencies/v)](https://packagist.org/packages/bagisto-eu/currencies)
[![Total Downloads](http://poser.pugx.org/bagisto-eu/currencies/downloads)](https://packagist.org/packages/bagisto-eu/currencies)
[![License](http://poser.pugx.org/bagisto-eu/currencies/license)](https://packagist.org/packages/bagisto-eu/currencies)

With the help of this extensions you can import the most common currencies in your Bagisto instance.  

## Installation

```sh
composer require bagisto-eu/currencies
```

```
php artisan optimize
``` 

Once installed, publish the package assets by executing the following command
```
php artisan vendor:publish --provider="Bagisto\Currencies\Providers\CurrenciesServiceProvider"
```

## Usage


1. Go to your bagisto admin environment
2. Click on Settings and select Currencies from the sidebar.
3. Click on Import
4. Select the currencies you like to import and press **Import selected**

## Changelog
Please see the [CHANGELOG](CHANGELOG.md) file for more information about what has recently changed.
