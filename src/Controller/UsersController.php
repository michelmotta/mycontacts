<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Mailer\Email;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        // Permitir aos usuários se registrarem e efetuar logout.
        // Você não deve adicionar a ação de "login" a lista de permissões.
        // Isto pode causar problemas com o funcionamento normal do AuthComponent.
        $this->Auth->allow(['logout', 'recovery', 'resetPassword']);
    }

    public function login()
    {
        $this->viewBuilder()->layout('login');
        
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Usuário ou senha ínvalido, tente novamente'));
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $data = $this->DataTables->find('Users', 'all');
        
        $this->set('data', $data);
        $this->set('_serialize', array_merge($this->viewVars['_serialize'], ['data']));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O usuário foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não foi salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('O usuário foi salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O usuário não foi salvo. Por favor, tente novamente.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('O usuário foi deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O usuário não foi deletado com sucesso. Por favor, tente novamente.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function recovery()
    {
        $this->viewBuilder()->layout('recovery');

        if ($this->request->is('post')) {

            $email = $this->request->data('email');

            $data = $this->Users->findByEmail($email);        

            if($data->isEmpty()){
                $this->Flash->error(__('Este e-mail não está cadastrado'));
            }else{
                $userData = $data->first();
                $resetUrl = Router::url(['controller' => 'Users', 'action' => 'resetPassword', 'userid' => $userData->id, 'token' => $userData->resetkey], true);
                $content = 'Esta é uma solicitação de restauração de senha do AGENDA RI SISTEMAS. </br>Para restaurar sua senha, basta clicar no seguinte link e informar uma nova senha. </br>Link de restauração: <a href="' . $resetUrl . '">Clique aqui</a>';
                $email = new Email('default');
                $email->from(['webmaster@agendarisistemas.com.br' => 'Webmaster'])
                    ->emailFormat('html')
                    ->to($userData->email)
                    ->subject('Recuperação de senha do AGENDA RI SISTEMAS')
                    ->send($content);
                $this->Flash->success(__('Enviamos um email de recuperação para você.'));    
            }
        }
    }

    public function resetPassword()
    {
        $this->viewBuilder()->layout('recovery');

        if($this->request->query('userid') != null && $this->request->query('token') != null){

        }else{
            $this->Flash->error(__('Você precisa gerar um link para resetar sua senha antes de acessar aquela área.'));
            return $this->redirect(['action' => 'login']);
        }

        if ($this->request->is('post')) {

            $userId = '';
            $userToken = '';

            if($this->request->query('userid') != null && $this->request->query('token') != null){
                $userId = $this->request->query('userid');
                $userToken = $this->request->query('token');
            }else{
                $this->Flash->error(__('Você precisa gerar um link para resetar sua senha antes de acessar aquela área.'));
                return $this->redirect(['action' => 'login']);
            }

            $newPassword = $this->request->data('password');
            $user = $this->Users->get($userId);

            if ($user->resetkey == $userToken) {
                $user->password = $newPassword;

                if($this->Users->save($user)){
                    $this->Flash->success(__('Sua senha foi restaurada com sucesso'));
                    return $this->redirect(['action' => 'login']);
                }else{
                    $this->Flash->error(__('Ocorreu um erro. Tente resetar a senha novamente'));
                    return $this->redirect(['action' => 'login']);
                }
            }
            else {
                $this->Flash->error(__('Você precisa gerar um link para resetar sua senha antes de acessar aquela área.'));
                return $this->redirect(['action' => 'login']);
            }
        }
    }
}
