<?php

namespace Tessmann;

class File 
{
    const TYPES = ['text/plain'];
    const DIRFILES = __DIR__ . '/../files';

    /**
     * The function to upload a file
     * @param  FILE $file
     * @return void
     */
    public function uploader($file)
    {
        try {

            if (!is_array($file)) {
                throw new \Exception('Argumento não é um array');
            }
    
            if (!in_array($file['type'], $this::TYPES)) {
                throw new \Exception('Formato inválido');
            }

            move_uploaded_file($file['tmp_name'], $this::DIRFILES . '/input.txt');
            
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die;
        }
        
    }
}
