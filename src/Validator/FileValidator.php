<?php
namespace ProfileFinder\Validator;

class FileValidator
{
    /**
     * @param string $file
     * @return string
     */

    public function validateFile(string $file): string
    {
        try {
            if (!file_exists($file)) {
                throw new Exception("File does not exist.");
            }

            if (empty(trim(file_get_contents($file)))) {
                throw new Exception("File is empty.");
            }

            if (!in_array(pathinfo($file, PATHINFO_EXTENSION), AppConfig::FILE_FORMAT)) {
                throw new Exception("Invalid file format.please provide .csv file format.");
            }

            return $this->profileFinder->find($file);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}
