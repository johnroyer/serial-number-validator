# Introduction

This library provider fast code checker for `EAN_13`, `EAN_8`, `ISBN`, `TaiwanID`.


# Installation

use composer to install:

```bash
composer require zeroplex/ean13-validator
```


# Usage

Validate:

```PHP
<?php

use Zeroplex\Ean13;

Ean13::isValid('4908569219689'); // true

Ean13::isValid('4908569219680'); // false
```


Get checksum:

```php
<?php

Ean13::getCheckSum('4908569219689'); // 9

Ean13::getCheckSum('4908569219680'); // 9
```
