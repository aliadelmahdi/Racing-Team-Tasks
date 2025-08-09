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

    public function get_last_row_value($link) {
        // Load the content from the provided URL
        $html = $this->req($link);
        if (!$html) {
            error_log('Failed to load HTML content');
            return $this->output(json_encode(['error' => 'Failed to load HTML content']));
        }

        // Find the last row in the first table with text
        $table = $html->find('table', 3); // Get the 4th <table> (index starts from 0)
        if ($table) {
            $rows = $table->find('tr'); // Get all rows in the table
            $mapped_data = [];
            $labels = [
                2 => "totalvoltagefast",
                3 => "totalcurrentfast",
                4 => "powerconsumedfast",
                5 => "energyconsumedfast",
                6 => "socfast"
            ];

            // Iterate through rows from last to first
            foreach (array_reverse($rows) as $row) {
                $cells = $row->find('td');
                $row_data = [];

                // Collect text from each cell
                foreach ($cells as $index => $cell) {
                    $text = trim($cell->plaintext);
                    if (!empty($text)) {
                        $row_data[$index] = $text; // Collect the text along with its index
                    }
                }

                // If we have any valid data, map it to labels
                if (!empty($row_data)) {
                    foreach ($labels as $index => $label) {
                        if (isset($row_data[$index])) {
                            $mapped_data[$label] = $row_data[$index];
                        }
                    }

                    // Assuming we want the 6th value (index 5 in the row data)
                    if (isset($row_data[5])) {
                        $this->save_to_file($mapped_data); // Save to the file
                        return $this->output(json_encode($mapped_data));
                    }
                }
            }
        }

        return $this->output(json_encode(['error' => 'No rows with text found']));
    }

    private function save_to_file($data) {
        // Save the data to 'electrical.json' file in the parent directory
        $file_path = '../electrical.json';
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
$s->get_last_row_value($link);

?>
