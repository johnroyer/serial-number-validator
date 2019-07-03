# Intro. [![Build Status](https://travis-ci.com/johnroyer/ean13-validator.svg?token=fJExdbHq9iTBYQPwsqRw&branch=master)](https://travis-ci.com/johnroyer/ean13-validator)

This library simpley check if given EAV_13 code is valid.


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
