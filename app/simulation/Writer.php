<?php
interface  Writer
{
    public function writer($data);
}

class FileWriter implements Writer
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function writer($data)
    {
        return file_put_contents($this->fileName, serialize($data));
    }
}
