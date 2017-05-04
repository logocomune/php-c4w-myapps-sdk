# My Apps SDK for PHP  [![Build Status](https://travis-ci.org/logocomune/php-c4w-myapps-sdk.svg?branch=master)](https://travis-ci.org/logocomune/php-c4w-myapps-sdk)

Unofficial PHP SDK for My Apps. 

Official information are available into [My Apps Tutorial](https://github.com/Cloud4WiSF/my-apps-tutorial)

## Install
The recommended way to install My Apps SDK is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of My Apps:

```bash
php composer.phar require logocomune/c4w-myapps-sdk
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

You can then later update My Apps SDK using composer:

 ```bash
composer.phar update
 ```
## Basic Usage

```php
<?php
use MyAppsSdk\MyAppsSdk;
use MyAppsSdk\Exceptions\MyAppsSdkException;

require (__DIR__.'/vendor/autoload.php');
$configuration = new \MyAppsSdk\Configuration();
$configuration->setBaseUrl('http://controlpaneldevelop.cloud4wi.com');
$myAppsSdk = new MyAppsSdk($configuration);

try {
    $context = $myAppsSdk->getContext();
    $customer =  $context->getCustomer();
    echo $customer->isLogged();
    //True
    echo $customer->getFirstName();
    //Customer name
    
    echo $context->getCompany()->getName();
    //company name
    
} catch (MyAppsSdkException $e){
    //...
    echo $e->getMessage();
}
