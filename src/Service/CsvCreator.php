<?php
/**
 * This file contains the class for create/store CSV file.
 *
 * PHP version 7.3
 */

declare(strict_types = 1);

namespace ProfileFinder\Service;

use ProfileFinder\Exception\ValidationException;

/**
 * Class CsvCreator
 * @package ProfileFinder\Service
 */

class CsvCreator
{
    /**
     * Create CSV and store in download directory.
     *
     * @param array $profileData The array to create csv.
     * @return string The Csv file path.
     * @throws ValidationException
     */
    public function create(array $profileData): string
    {
        $delimiter = ',';
        $fileName = $this->createFileName();
        $file = @fopen($fileName, 'w');

        if (0 == count($profileData) || null == $profileData) {
            throw new ValidationException('Could not found any data');
        }

        if (!$file) {
            throw new ValidationException('File open failed.');
        }

        @fputcsv($file, ['Name', 'Profile Url', 'date time'], $delimiter);
        foreach ($profileData as $row) {
            fputcsv($file, $row, $delimiter);
        }
        fclose($file);

        return 'CSV file Created at : ' . realpath($fileName);
    }

    /**
     * Create csv file name.
     *
     * @return string Path to store csv.
     */
    public function createFileName(): string
    {
        $downloadPath= __DIR__ . "/../download";
        
        if (!file_exists($downloadPath)) {
            mkdir($downloadPath, 0755, true);
        }
        return $downloadPath.'/'.time() . '_profile.csv';
    }
}
