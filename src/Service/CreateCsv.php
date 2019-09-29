<?php
/**
 * This file contains the class for create/store CSV file.
 *
 * PHP version 7.3
 */

declare (strict_types = 1);

namespace ProfileFinder\Service;

use Exception;

/**
 * Class CreateCsv
 * @package ProfileFinder\Service\CreateCsv
 */

class CreateCsv
{
    /**
     * Create CSV file and store in download directory.
     *
     * @param array $data The array to be used in csv.
     * @return string Response message.
     */
    public function create(array $data = null): string
    {
        try {
            $delimiter = ',';
            $fileName = time() . '_profile.csv';
            $downloadPath = __DIR__ . "/../download";

            if (!file_exists($downloadPath)) {
                mkdir($downloadPath, 0755, true);
            }

            $path = $downloadPath . '/' . $fileName;
            $file = @fopen($path, 'w');

            if (0 === count($data) || $data == null) {
                throw new Exception('Could not found any data');
            }

            if (!$file) {
                throw new Exception('File open failed.');
            }

            @fputcsv($file, ['Name', 'Profile Url', 'date time'], $delimiter);
            foreach ($data as $value) {
                $line = array(
                    $value['query'] ?? $value['error'],
                    $value['linkedinUrl'] ?? 'No profile found',
                    $value['timestamp'],
                );

                fputcsv($file, $line, $delimiter);
            }
            fclose($file);

            return 'CSV file Created at : ' . realpath($path);

        } catch (Exception $e) {
            throw new InvalidFileException($e->getMessage());
        }
    }
}
