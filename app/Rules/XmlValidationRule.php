<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class XmlValidationRule implements Rule
{
    protected $xsdFilePath;

    public function __construct($xsdFilePath)
    {
        $this->xsdFilePath = $xsdFilePath;
    }

    public function passes($attribute, $value)
    {
        $xmlReader = new \XMLReader();
        $xmlReader->open($value);

        // Set up XML options
        $xmlReader->setParserProperty(\XMLReader::VALIDATE, true);
        $xmlReader->setSchema($this->xsdFilePath);

        // Read the entire XML to trigger validation
        while ($xmlReader->read()) {
            // Continue reading
        }

        $isValid = !$xmlReader->getSchemaErrors();

        $xmlReader->close();

        return $isValid;
    }

    public function message()
    {
        return 'The XML file does not conform to the specified schema.';
    }
}
