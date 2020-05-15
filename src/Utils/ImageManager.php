<?php

namespace App\Utils;

use App\Utils\Exceptions\LoggerException;
use App\Utils\Validator\Constraint\BinaryImage\BinaryImageValidator;
use http\Exception\RuntimeException;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;
use Symfony\Component\HttpFoundation\File\File;

class ImageManager
{
    /** @var string */
    private $uploadFolder;

    /** @var LoggerException  */
    private $loggerException;

    public function __construct(string $uploadFolder, LoggerException $loggerException)
    {
        $this->uploadFolder = $uploadFolder;
        $this->loggerException = $loggerException;
    }

    public function save(string $imageData, string $prefix, string $subFolder, array $context = []): string
    {
        try {
            $data = substr($imageData, strpos($imageData, ',') + 1);
            $data = base64_decode($data);
            $directory = rtrim($this->uploadFolder . $subFolder,DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR;
            if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
                throw new RuntimeException(sprintf('Directory "%s" was not created', $directory));
            }
            $fileName = self::getFileName($prefix, $imageData);
            $filePath = $directory . $fileName;
            file_put_contents($filePath, $data);

            return $subFolder . DIRECTORY_SEPARATOR . $fileName;
        } catch (\Exception $exception) {
            $context = $context+[
                'image_data' => $imageData,
            ];
            $this->loggerException->logException($exception, $context);

            return '';
        }
    }

    private static function getFileName(string $prefix, string $imageData):string
    {
        preg_match(BinaryImageValidator::BINARY_IMAGE_FORMAT_REGEX, $imageData, $type);

        return uniqid($prefix.'_').'.'.strtolower($type[1]);
    }

    /**
     * @throws FileNotFoundException
     */
    public function createFileByImagePath(string $imagePath): File
    {
        return new File($this->uploadFolder . $imagePath);
    }
}
