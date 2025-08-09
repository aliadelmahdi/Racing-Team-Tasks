<?php

require "lib.php";

class main {
    private $user_agents = [
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.5060.134 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/102.0.5005.63 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/100.0.4896.127 Safari/537.36',
        'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/99.0.4844.84 Safari/537.36'
    ];

    private function getRandomUserAgent() {
        return $this->user_agents[array_rand($this->user_agents)];
    }

    private function req($link, $referer = 'example.com') { 
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_COOKIEJAR, "");
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        if (!empty($referer)) {
            curl_setopt($ch, CURLOPT_REFERER, $referer);
        }
        curl_setopt($ch, CURLOPT_USERAGENT, $this->getRandomUserAgent());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
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
        $table = $html->find('table', 0); // Get the first <table>
        if ($table) {
            $rows = $table->find('tr'); // Get all rows in the table
            $row_data = [];
            $labels = [
                8 => "numberoflabsfast",
                2 => "lefttempfast",
                3 => "righttempfast",
                4 => "amptempfast"
            ];
            $mapped_data = [];

            foreach (array_reverse($rows) as $row) {
                $cells = $row->find('td');
                $has_text = false;
                foreach ($cells as $index => $cell) {
                    $text = trim($cell->plaintext);
                    if (!empty($text)) {
                        $has_text = true;
                        $row_data[$index] = $text; // Collect the text along with its index
                    }
                }

                if ($has_text) {
                    // Map the labels to their corresponding values
                    foreach ($labels as $index => $label) {
                        if (isset($row_data[$index])) {
                            $mapped_data[$label] = $row_data[$index];
                        }
                    }

                    // Assuming we want the 6th value in the row
                    if (isset($row_data[5])) { // Index 5 corresponds to the 6th item (0-indexed)
                        $last_row_value = $row_data[5]; // Store the 6th value
                        $mapped_data["last_row_value"] = $last_row_value;
                        $this->save_to_file($mapped_data); // Save to the file
                        return $this->output(json_encode($mapped_data));
                    }
                }
            }
        }

        return $this->output(json_encode(['error' => 'No rows with text found']));
    }

    private function save_to_file($data) {
        // Save the data to 'generaldata.json' file in the parent directory
        $file_path = '../generaldata.json';
        file_put_contents($file_path, json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE));
    }

    private function output($data) {
        header('content-type: application/json');
        echo $data;
    }
}

if (empty($_GET['slug'])) {
    $error = 'Please enter URL';
    echo $error;
    exit();
}

$link = $_GET['slug'];

$s = new main();
$s->get_last_row_value($link);

?>
