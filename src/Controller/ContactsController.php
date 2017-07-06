<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

/**
 * Contacts Controller
 *
 * @property \App\Model\Table\ContactsTable $Contacts
 */
class ContactsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $data = $this->DataTables->find('Contacts', 'all', [
            'contain' => ['Types', 'Professions']
        ]);
        
        $this->set('data', $data);
        $this->set('_serialize', array_merge($this->viewVars['_serialize'], ['data']));
    }

    /**
     * View method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => ['Types', 'Professions']
        ]);

        $this->set('contact', $contact);
        $this->set('_serialize', ['contact']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $contact = $this->Contacts->newEntity();
        if ($this->request->is('post')) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->data);
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('O contato foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O contato não salvo. Por favor, tente novamente.'));
        }
        $types = $this->Contacts->Types->find('list', ['limit' => 200]);
        $professions = $this->Contacts->Professions->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'types', 'professions'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $contact = $this->Contacts->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $contact = $this->Contacts->patchEntity($contact, $this->request->data);
            if ($this->Contacts->save($contact)) {
                $this->Flash->success(__('O contato foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O contato não salvo. Por favor, tente novamente.'));
        }
        $types = $this->Contacts->Types->find('list', ['limit' => 200]);
        $professions = $this->Contacts->Professions->find('list', ['limit' => 200]);
        $this->set(compact('contact', 'types', 'professions'));
        $this->set('_serialize', ['contact']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Contact id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $contact = $this->Contacts->get($id);
        if ($this->Contacts->delete($contact)) {
            $this->Flash->success(__('O contato foi deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O contato não foi deletado. Por favor, tente nocamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function sendmail()
    {
        if ($this->request->is('post')) {
            $username = $this->request->data('name');
            $usermail =  $this->request->data('usermail');
            $subject = $this->request->data('subject');
            $mails = $this->request->data('emails');
            $content = $this->request->data('content');

            $email = new Email('default');
            foreach ($mails as $mail){
                $email->from([$usermail => $username])
                    ->emailFormat('html')
                    ->to($mail)
                    ->subject($subject)
                    ->send($content);
            }
        }
        $term = '';
        if ($this->request->query('q')) {
            $term = $this->request->query('q');
        }
        $data = $this->Contacts->find('all')
        ->where(['Contacts.email LIKE' => $term . '%'])
        ->select(['email'])
        ->limit(10);
        
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    public function export() {
        $this->response->download('Contatos.csv');
        $data = $this->Contacts->find('all')->toArray();
        $_serialize = 'data';

        $this->set(compact('data', '_serialize'));
        $this->viewBuilder()->className('CsvView.Csv');
        return;
    }

    public function contactList() {
        $data = $this->Contacts->find('all');
        
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    public function searchContact()
    {
        $term = '';
        if ($this->request->query('q')) {
            $term = $this->request->query('q');
        }
        $data = $this->Contacts->find('all')
        ->where(['Contacts.name LIKE' => $term . '%'])
        ->select(['name'])
        ->limit(10);
        
        $this->set(compact('data'));
        $this->set('_serialize', ['data']);
    }

    public function etiquetaOne()
    {
        if ($this->request->is('post')) {

            $etiquetas_one = $this->request->data('etiqueta_one');
            $data = $this->Contacts->find()
                ->where(['name IN' => $etiquetas_one]);

            $this->set(compact('data'));
            $this->set('_serialize', ['data']);
        }else{
            $this->Flash->error(__('Não é possível entrar na área acessada anteriormente'));
            return $this->redirect(['action' => 'index']);
        }

    }
    
    public function etiquetaTwo()
    {
        if ($this->request->is('post')) {

            $etiquetas_two = $this->request->data('etiqueta_two');
            $data = $this->Contacts->find()
                ->where(['name IN' => $etiquetas_two]);

            $this->set(compact('data'));
            $this->set('_serialize', ['data']);
        }else{
            $this->Flash->error(__('Não é possível entrar na área acessada anteriormente'));
            return $this->redirect(['action' => 'index']);
        }
    }

    public function tagsPrint() {}

    public function backups() {}

    public function fichaCadastro() {}
}
