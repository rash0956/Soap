<?php

require_once __DIR__ . "/vendor/autoload.php";

$class = "Bookcatalog\BookService";

$serviceURI = "http://localhost/Soap/server.php";

$wsdlGenerator = new PHP2WSDL\PHPClass2WSDL($class, $serviceURI);

$wsdlGenerator->generateWSDL(true);

$wsdlXML = $wsdlGenerator->dump();

$wsdlXML = $wsdlGenerator->save('example.wsdl');
