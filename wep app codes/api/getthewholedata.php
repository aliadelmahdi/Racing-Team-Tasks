<?php

require "lib.php";

class Main {

    private function req($link, $referer = 'example.com') {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $link,
            CURLOPT_COOKIEJAR => "",
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_FOLLOWLOCATION => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_REFERER => $referer,
            CURLOPT_RETURNTRANSFER => 1,
        ]);
        
        $res = curl_exec($ch);
        if ($res === false) {
            error_log('Curl error: ' . curl_error($ch));
        }
        curl_close($ch);
        return str_get_html($res);
    }
    
      public function getdata($link) {
        // Load the content from the provided URL
        $html = $this->req($link);
        if (!$html) {
            error_log('Failed to load HTML content');
            return $this->output(json_encode(['error' => 'Failed to load HTML content']));
        }
        
    $data = [];

        // Process each table (indexes 0, 1, 2, 3)
        for ($tableIndex = 0; $tableIndex < 4; $tableIndex++) {
            $table = $html->find('table', $tableIndex); // Get the table by index
            if ($table) {
                $rows = $table->find('tr'); // Get all rows in the table
                $last_row = end($rows); // Get the last row
                
                if ($last_row) {
                    $cells = $last_row->find('td');
                    $row_data = [];

                    // Skip Date and Time (assume they're in the first two columns)
                    foreach ($cells as $cellIndex => $cell) {
                        if ($cellIndex > 1) { // Exclude Date and Time
                           // $row_data[] = trim($cell->plaintext);
                        $row_data[] = $cell->plaintext;
                            
                        }
                    }

                    if (!empty($row_data)) {
                        $data[] = $row_data; // Add last row data to the main data array
                    }
                }
            }
        }
       // Save all collected data to a JSON file
        $this->save_to_file($data);
        return $this->output(json_encode($data));
    }
        

    private function save_to_file($data) {
        // Save the data to 'electrical.json' file in the parent directory
        $file_path = '../thewholedata.json';
        file_put_contents($file_path, json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
    }

    private function output($data) {
        header('Content-Type: application/json');
        echo $data;
    }
}

if (empty($_GET['slug'])) {
    echo 'Please enter URL';
    exit();
}

$link = $_GET['slug'];

$s = new Main();
$s->getdata($link);

?>
