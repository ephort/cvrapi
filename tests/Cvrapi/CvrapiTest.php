<?php

class CvrapiTest extends PHPUnit_Framework_TestCase {
    
    /**
     * Project not filled in
     */
    public function testProjectNotFilledIn()
    {
        $result = \Cvrapi\Cvrapi::get('29910251', 'dk');
        
        $this->assertTrue(property_exists($result, 'error'));
        $this->assertTrue((string)$result->error === 'INVALID_UA');
    }
    
    /**
     * Get company information by VAT as JSON
     */
    public function testGetCompanyByVatJson()
    {
        \Cvrapi\Config::$format = 'json';
        
        $result = \Cvrapi\Cvrapi::get('29910251', 'dk', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'vat'));
        $this->assertTrue((int)$result->vat === 29910251);
    }
    
    /**
     * Get company information by VAT as XML
     */
    public function testGetCompanyByVatXml()
    {
        \Cvrapi\Config::$format = 'xml';
        
        $result = \Cvrapi\Cvrapi::get('29910251', 'dk', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'vat'));
        $this->assertTrue((int)$result->vat === 29910251);
    }
    
    /**
     * Get company information by P-number
     */
    public function testGetCompanyByPNumber()
    {
        $result = \Cvrapi\Cvrapi::get('1012697712', 'dk', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'vat'));
        $this->assertTrue((int)$result->vat === 29910251);
    }
    
    /**
     * Get company information by company name
     */
    public function testGetCompanyByCompanyName()
    {
        $result = \Cvrapi\Cvrapi::get('I/S Just Iversen', 'dk', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'vat'));
        $this->assertTrue((int)$result->vat === 29910251);
    }
    
    /**
     * Get company by searching specifically in the VAT field
     */
    public function testSearchOnlyVAT()
    {
        $result = \Cvrapi\Cvrapi::request('29910251', 'dk', 'vat', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'vat'));
        $this->assertTrue((int)$result->vat === 29910251);
    }
    
    /**
     * Get company by searching specifically in the P-number field
     */
    public function testSearchOnlyPNumber()
    {
        $result = \Cvrapi\Cvrapi::request('1012697712', 'dk', 'produ', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'vat'));
        $this->assertTrue((int)$result->vat === 29910251);
    }
    
    /**
     * Get company by searching specifically in the company name field
     */
    public function testSearchOnlyCompanyName()
    {
        $result = \Cvrapi\Cvrapi::request('I/S Just Iversen', 'dk', 'name', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'vat'));
        $this->assertTrue((int)$result->vat === 29910251);
    }
    
    /**
     * Get company by searching specifically in the phone number field
     */
    public function testSearchOnlyPhone()
    {
        $result = \Cvrapi\Cvrapi::request('61401169', 'dk', 'phone', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'vat'));
        $this->assertTrue((int)$result->vat === 29910251);
    }
    
    /**
     * Incorrect VAT number
     */
    public function testIncorrectVat()
    {
        $result = \Cvrapi\Cvrapi::get('29910251111111', 'dk', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'error'));
        $this->assertTrue((string)$result->error === 'NOT_FOUND');
    }
    
    /**
     * Empty VAT number
     * 
     * @expectedException Exception
     */
    public function testEmptyVat()
    {
        $result = \Cvrapi\Cvrapi::request('xxxx', 'dk', 'vat', 'Unit Testing');
    }
    
    /**
     * Empty search term
     * 
     * @expectedException Exception
     */
    public function testEmptySearch()
    {
        $result = \Cvrapi\Cvrapi::get('', 'dk', 'Unit Testing');
    }
    
    /**
     * VAT number containing characters will have their characters stripped,
     * and thus still work if the remaining numbers are a valid VAT number.
     */
    public function testStrippedVat()
    {
        $result = \Cvrapi\Cvrapi::request('xxxx29910251xxxx', 'dk', 'vat', 'Unit Testing');
        
        $this->assertTrue(property_exists($result, 'vat'));
        $this->assertTrue((int)$result->vat === 29910251);
    }
    
    /**
     * Malformed VAT number
     * 
     * @expectedException Exception
     */
    public function testMalformedVat()
    {
        $result = \Cvrapi\Cvrapi::request('xxxx', 'dk', 'vat', 'Unit Testing');
    }
    
    /**
     * Not available country code
     * 
     * @expectedException Exception
     */
    public function testMalformedCountryCode()
    {
        $result = \Cvrapi\Cvrapi::request('29910251', 'ch', 'Unit Testing');
    }
    
}