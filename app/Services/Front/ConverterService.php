<?php

namespace App\Services\Front;

use Exception;

class ConverterService
{
    private array $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    /**
     * @throws Exception
     */
    public function converter(): string
    {

        if (isset($this->number['date']) && $this->number['date'] !== null) {
            return $this->convertDateToRoman();
        }

        return $this->convertRomanToDate();
    }


    /**
     * @throws Exception
     */
    public function convertDateToRoman(): string
    {
        $date = $this->number['date'];
        $date = explode('-', $date);

        $day = $this->convertIntegerToRoman((int)$date[0]);
        $month = $this->convertIntegerToRoman((int)$date[1]);
        $year = $this->convertIntegerToRoman((int)$date[2]);

        return $day . '-' . $month . '-' . $year;

    }

    /**
     * @throws Exception
     */
    public function convertRomanToDate(): string
    {
        $date = $this->number['roman'];
        $date = explode('-', $date);

        $day = $this->convertRomanToInteger($date[0]);
        $month = $this->convertRomanToInteger($date[1]);
        $year = $this->convertRomanToInteger($date[2]);

        $formattedDay = sprintf('%02d', $day);
        $formattedMonth = sprintf('%02d', $month);
        $formattedYear = sprintf('%04d', $year);

        return $formattedDay . '-' . $formattedMonth . '-' . $formattedYear;
    }

    /**
     * Convert an integer to a Roman numeral.
     *
     * @param int $numbers
     * @return string
     * @throws Exception
     */
    private function convertIntegerToRoman(int $numbers): string
    {
        $roman = '';
        $numerals = config('data.numerals.conversion');

        foreach ($numerals as $key => $value) {
            while ($numbers >= $value) {
                $roman .= $key;
                $numbers -= $value;
            }
        }

        return $roman;
    }

    /**
     * Convert a Roman numeral to an integer.
     *
     * @param string $roman
     * @return int
     * @throws Exception
     */
    private function convertRomanToInteger(string $roman): int
    {
        $integer = 0;
        $numerals = config('data.numerals.conversion');

        $prevValue = 0;
        $length = strlen($roman);

        for ($i = 0; $i < $length; $i++) {
            $currentChar = $roman[$i];
            if (!isset($numerals[$currentChar])) {
                throw new Exception('Invalid Roman numeral character: ' . $currentChar);
            }

            $currentValue = $numerals[$currentChar];

            if ($prevValue !== 0 && $currentValue > $prevValue) {
                $integer += $currentValue - 2 * $prevValue;
            } else {
                $integer += $currentValue;
            }

            $prevValue = $currentValue;
        }

        return $integer;
    }


}
