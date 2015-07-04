<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Patents Controller
 *
 * @property \App\Model\Table\PatentsTable $Patents
 */
class PatentsController extends AppController
{

    public function index()
    {
        $query = $this->Patents->find('all')->contain(['Inventors']);

        if (isset($this->request->query['q'])) {
            $q = $this->request->query['q'];
            $query = $query->where([
                'OR' => [
                    'Patents.id LIKE'      => "%{$q}%",
                    'Patents.title LIKE'   => "%{$q}%",
                    'Patents.keyword LIKE' => "%{$q}%",
                ]
            ]);
        }

        $this->paginate['limit'] = 50;

        $this->set('patents', $this->paginate($query));
        $this->set('_serialize', ['patents']);
    }

    public function view($id)
    {
        $patent = $this->Patents->get($id, [
            'contain' => ['Inventors', 'Cited', 'Citing']
        ]);



        $this->set('patent', $patent);
        $this->set('_serialize', ['patent']);
    }

}
