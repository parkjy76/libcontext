# libcontext for PHP
* データフォーマット変換ライブラリ
* command design pattern
* The attribute is not supported in XML

## Pattern of converting and Examples
+ XML -> Object
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_XML_Decode);
$obj = $this->_context->run($xml);
```

+ XML -> Array
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_XML_Decode);
$context->addCommand(new LibContext_Json_Encode);
$context->addCommand(new LibContext_Json_Decode);
$arr = $this->_context->run($xml);
```

+ JSON -> Object
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_Json_Decode(FALSE));
$obj = $this->_context->run($json);
```

+ JSON -> Array
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_Json_Decode());
$arr = $this->_context->run($json);
```

+ Query String -> Array
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_Query_Decode);
$arr = $this->_context->run($queryString);
```

+ XML -> JSON
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_XML_Decode);
$context->addCommand(new LibContext_Json_Encode);
$json = $this->_context->run($xml);
```

+ XML -> Query String
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_XML_Decode);
$context->addCommand(new LibContext_Json_Encode);
$context->addCommand(new LibContext_Json_Decode);
$context->addCommand(new LibContext_Query_Encode);
$queryString = $this->_context->run($xml);
```

+ JSON -> XML
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_Json_Decode);
$context->addCommand(new LibContext_XML_Encode);
$xml = $this->_context->run($json);
```

+ JSON -> Query String
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_Json_Decode);
$context->addCommand(new LibContext_Query_Encode);
$queryString = $this->_context->run($json);
```

+ Query String -> XML
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_Query_Decode);
$context->addCommand(new LibContext_XML_Encode);
$xml = $this->_context->run($queryString);
```

+ Query String -> Json
```php
<?php
$context = new LibContext;
$context->flushCommand();
$context->addCommand(new LibContext_Query_Decode);
$context->addCommand(new LibContext_Json_Encode);
$json = $this->_context->run($queryString);
```
