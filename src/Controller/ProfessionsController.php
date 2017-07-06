<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Professions Controller
 *
 * @property \App\Model\Table\ProfessionsTable $Professions
 */
class ProfessionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $data = $this->DataTables->find('Professions', 'all');
        
        $this->set('data', $data);
        $this->set('_serialize', array_merge($this->viewVars['_serialize'], ['data']));
    }

    /**
     * View method
     *
     * @param string|null $id Profession id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $profession = $this->Professions->get($id, [
            'contain' => ['Contacts']
        ]);

        $this->set('profession', $profession);
        $this->set('_serialize', ['profession']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $profession = $this->Professions->newEntity();
        if ($this->request->is('post')) {
            $profession = $this->Professions->patchEntity($profession, $this->request->data);
            if ($this->Professions->save($profession)) {
                $this->Flash->success(__('The profession has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profession could not be saved. Please, try again.'));
        }
        $this->set(compact('profession'));
        $this->set('_serialize', ['profession']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Profession id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $profession = $this->Professions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $profession = $this->Professions->patchEntity($profession, $this->request->data);
            if ($this->Professions->save($profession)) {
                $this->Flash->success(__('The profession has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The profession could not be saved. Please, try again.'));
        }
        $this->set(compact('profession'));
        $this->set('_serialize', ['profession']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Profession id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $profession = $this->Professions->get($id);
        if ($this->Professions->delete($profession)) {
            $this->Flash->success(__('The profession has been deleted.'));
        } else {
            $this->Flash->error(__('The profession could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
