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

                    $data = explode(',', $line);
                    $response[$x][] = [
                        'room' => $data[0],
                        'chance' => $data[1],
                        'time' => $data[2],
                        'score' => floatval($data[2] / $data[1])
                    ];
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
    
    /**
     * The function to write each line of txt with the best option
     * @param Array objs
     * @return String response
     */
    public function writeLine($objs)
    {
        $response = '';
        
        foreach ($objs as $item) {
            $response .= $item['room'] . ',';
        }

        return rtrim($response,",");
    }

    /**
     * The function to download the txt
     * @param Array rows
     * @return void
     */
    public function output($rows)
    {
        $file = fopen($this::DIRFILES . '/output.txt', "w");

        foreach ($rows as $row) {
            fwrite($file, $row . "\n\r");
        }

        fclose($file);
        $file = $this::DIRFILES . '/output.txt';

        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream;");
        header("Content-Length:".filesize($file));
        header("Content-disposition: attachment; filename='output.txt'");
        header("Pragma: no-cache");
        header("Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0");
        header("Expires: 0");
        readfile($file);
        flush();
    }

}
