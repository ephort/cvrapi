<?php

namespace Cvrapi;

/**
 * Validate input
 *
 * @author Kristian Just
 */
class Validate
{
    /**
     * Validate int (e.g. VAT or phonenumber)
     * 
     * @param string
     * @return int
     */
    public static function int($input)
    {
        // Strip all other characters than numbers
        $validated = preg_replace('/[^0-9]/', '', $input);

        return $validated;
    }

    /**
     * Validate search term
     * 
     * @param mixed $input
     * @throws \Exception
     */
    public static function search($input)
    {
        if (empty($input)) {
            throw new \Exception('Invalid search term.');
        }
    }

    /**
     * Validate country
     * 
     * @param string
     * @return string
     */
    public static function country($input)
    {
        if (!in_array($input, Config::$countriesAvailable)) {
            throw new \Exception('Invalid country code.');
        }
    }
}
