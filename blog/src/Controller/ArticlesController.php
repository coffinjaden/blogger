<?php
namespace App\Controller;

/**
 * Articles Controller
 */
class ArticlesController extends AppController
{

    /**
     * Initilization method
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('Flash'); // Include the FlashComponent
    }

    /**
     * Index method
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        #$articles = $this->Articles->find('all');
        #$this->set(compact('articles'));
        $this->set('articles', $this->Articles->find('all'));
    }

    /**
     * View method
     * @param  string|null $id Article id
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }

    /**
     * Add method
     * @return http redirect
     * @throws Flash error
     */
    public function add()
   {
       $article = $this->Articles->newEntity();
       if ($this->request->is('post')) {
           $article = $this->Articles->patchEntity($article, $this->request->getData());
           if ($this->Articles->save($article)) {
               $this->Flash->success(__('Your article has been saved.'));
               return $this->redirect(['action' => 'index']);
           }
           $this->Flash->error(__('Unable to add your article.'));
       }
       $this->set('article', $article);
   }

   /**
    * Edit method
    * @param  string $id
    * @return http redirect
    * @throws NotFoundException
    * @throws Flash error
    */
   public function edit($id = null){
       $article = $this->Articles->get($id);
        if ($this->request->is(['post', 'put'])) {
            $this->Articles->patchEntity($article, $this->request->getData());
        if ($this->Articles->save($article)) {
            $this->Flash->success(__('Your article has been updated.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('Unable to update your article.'));
    }

    $this->set('article', $article);
   }

   /**
    * Delete method
    * @param  string $id
    * @return http redirect
    */
   public function delete($id)
   {
        $this->request->allowMethod(['post', 'delete']);

        $article = $this->Articles->get($id);
        if ($this->Articles->delete($article)) {
            $this->Flash->success(__('The article with id: {0} has been deleted.', h($id)));
            return $this->redirect(['action' => 'index']);
    }
}
}
