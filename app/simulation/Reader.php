<?php
interface Reader
{
    public function read();
}

class FileReader implements Reader
{
    private $fileName;

    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    public function read()
    {
        return unSerialize(file_get_contents($this->fileName));
    }
}

