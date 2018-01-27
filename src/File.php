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

            return move_uploaded_file($file['tmp_name'], $this::DIRFILES . '/input.txt');
            
        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
        
    }

    /**
     * The function return the array with data on input.txt
     * @return array
     */
    public function getArray()
    {
        $lines = [];
        $response = [];

        try {

            $filePath = $this::DIRFILES . '/input.txt';

            if (!file_exists($filePath)) {
                throw new \Exception('Arquivo não encontrado');
            }
            
            $pointer = fopen ($filePath, "r");

            $x = 1;
            while (!feof ($pointer)) {
 
                $rowTxt = ltrim(fgets($pointer, 4096));     

                if ($rowTxt == "") {
                    continue;
                }

                foreach (explode(';', $rowTxt) as $line) {
                    $response[$x][] = explode(',', $line);
                }
                
                $x++;
            }

            fclose ($pointer);
            return $response;

        } catch (\Exception $e) {
            return [
                'error' => true,
                'message' => $e->getMessage()
            ];
        }
    }
}
