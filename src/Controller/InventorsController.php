<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inventors Controller
 *
 * @property \App\Model\Table\InventorsTable $Inventors
 */
class InventorsController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['Patents']
        ];
        $this->set('inventors', $this->paginate($this->Inventors));
        $this->set('_serialize', ['inventors']);
    }

    public function view($id = null)
    {
        $inventor = $this->Inventors->get($id);

        $patentIds = $this->Inventors
            ->find('all')
            ->select(['patent_id'])
            ->where(['inv_name' => $inventor->inv_name]);

        $patents = [];
        if ($patentIds = $patentIds->extract('patent_id')->toArray()) {
            $patents = $this->loadModel('Patents')
                ->find('all')
                ->where(['Patents.id IN' => $patentIds])
                ->contain(['Inventors']);
        }

        $this->set(compact('inventor', 'patents'));
        $this->set('_serialize', ['inventor']);
    }

}
