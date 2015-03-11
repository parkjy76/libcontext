# libcontext for PHP
* context conversion
* command design pattern
* support XML, JSON and Query-string.

## Limitation
* XML's attribute is not supported

## Conversion patterns and Examples
+ XML -> Object of PHP
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_XML_Decode);
$obj = $context->run($xml);
//$context->flushCommand();
```

+ XML -> Array of PHP
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_XML_Decode);
$context->addCommand(new LibContext_Json_Encode);
$context->addCommand(new LibContext_Json_Decode);
$arr = $context->run($xml);
//$context->flushCommand();
```

+ JSON -> Object of PHP
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_Json_Decode(FALSE));
$obj = $context->run($json);
//$context->flushCommand();
```

+ JSON -> Array of PHP
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_Json_Decode());
$arr = $context->run($json);
//$context->flushCommand();
```

+ Query String -> Array of PHP
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_Query_Decode);
$arr = $context->run($queryString);
//$context->flushCommand();
```

+ XML -> JSON
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_XML_Decode);
$context->addCommand(new LibContext_Json_Encode);
$json = $context->run($xml);
//$context->flushCommand();
```

+ XML -> Query String
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_XML_Decode);
$context->addCommand(new LibContext_Json_Encode);
$context->addCommand(new LibContext_Json_Decode);
$context->addCommand(new LibContext_Query_Encode);
$queryString = $context->run($xml);
//$context->flushCommand();
```

+ JSON -> XML
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_Json_Decode);
$context->addCommand(new LibContext_XML_Encode);
$xml = $context->run($json);
//$context->flushCommand();
```

+ JSON -> Query String
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_Json_Decode);
$context->addCommand(new LibContext_Query_Encode);
$queryString = $context->run($json);
//$context->flushCommand();
```

+ Query String -> XML
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_Query_Decode);
$context->addCommand(new LibContext_XML_Encode);
$xml = $context->run($queryString);
//$context->flushCommand();
```

+ Query String -> Json
```php
<?php
$context = new LibContext;
$context->addCommand(new LibContext_Query_Decode);
$context->addCommand(new LibContext_Json_Encode);
$json = $context->run($queryString);
//$context->flushCommand();
```
