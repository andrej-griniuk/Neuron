<?php
namespace App\Shell;

use App\Model\Table\PatentsTable;
use Cake\Console\Shell;

/**
 * Import shell command.
 */
class ImportShell extends Shell
{

    public function inventors($filename) {
        $this->loadModel('Inventors');
        $this->loadModel('Patents');

        set_time_limit(1800);

        $patents = $this->Patents->find('all')->select(['Patents.id'])->extract('id')->toArray();

        $counter = 1;
        $lastNotFound = -1;
        $lastFound = -1;
        $data = [];
        $found = 0;
        if (($handle = fopen(ROOT . DS . $filename, 'r')) !== false) {
            // get the first row, which contains the column-titles (if necessary)
            $header = fgetcsv($handle, 0, '|');

            // loop through the file line-by-line
            while (($row = fgetcsv($handle, 0, '|')) !== false) {
                $patentId = trim($row[0], '"');

                if ($patentId != $lastNotFound) {
                    if (in_array($patentId, $patents)) {
                        if ($patentId != $lastFound) {
                            if (($k = array_search($lastFound, $patents)) !== false) {
                                unset($patents[$k]);
                            }
                        }

                        $data[] = [
                            'patent_id' => $patentId,
                            'pct_app' => trim($row[1], '"'),
                            'appln_id' => (int)trim($row[2], '"'),
                            'inv_name' => trim($row[3], '"'),
                            'address' => trim($row[4], '"'),
                            'reg_code' => trim($row[5], '"'),
                            'city_code' => trim($row[6], '"'),
                            'reg_share' => (float)trim($row[7], '"'),
                            'inv_share' => (float)trim($row[8], '"'),
                        ];

                        $found++;
                    } else {
                        $lastNotFound = $patentId;
                    }
                }

                if ($counter % 1000 == 0) {
                    $this->out("Patent {$patentId}. {$counter} done. {$found} found");
                }

                if (count($data) >= 100) {
                    $inventors = $this->Inventors->newEntities($data);
                    foreach ($inventors as $inv) {
                        if (!$this->Inventors->save($inv)) {
                            debug($inv->errors());
                            break;
                        }
                    }
                    $inventors = null;
                    $data = [];
                }

                $counter++;
            }
            fclose($handle);

            if ($data) {
                $inventors = $this->Inventors->newEntities($data);
                if (!$this->Inventors->save($inventors)) {
                    debug($inventors->errors());
                }
            }
        }
    }

    public function patents($filename) {
        $this->loadModel('Inventors');
        $this->loadModel('Patents');

        set_time_limit(1800);

        $counter = 1;
        if (($handle = fopen(ROOT . DS . $filename, 'r')) !== false) {
            // get the first row, which contains the column-titles (if necessary)
            $header = fgetcsv($handle, 0, ',');

            // loop through the file line-by-line
            while (($row = fgetcsv($handle, 0, ',')) !== false) {
                $date = explode('.', $row[2]);

                $patent = $this->Patents->newEntity();
                $patent->id = $row[1];
                $patent->title = $row[3];
                $patent->keyword = $row[0];
                $patent->publication_date = "{$date[2]}-{$date[1]}-{$date[0]}";

                if (!$this->Patents->save($patent)) {
                    debug($patent->errors());
                    break;
                }

                if ($counter % 1000 == 0) {
                    $this->out("Patent {$patent->id}. {$counter} done...");
                }

                $counter++;
            }
            fclose($handle);
        }
    }
}
