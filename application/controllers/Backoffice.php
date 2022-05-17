<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backoffice extends CI_Controller {
    public function __construct(){
		parent::__construct();
	}

    public function index(){
        $data = array();

        $data['title'] = "Accueil";
        $data['page'] = "index";
        $this->load->view('BO-template.php', $data);
    }

    public function categorie(){
        try {
            $this->load->library('grocery_CRUD');
            $crud = new grocery_CRUD();
            // $crud->set_theme('datatables');
            $crud->set_table('categorie');
            $crud->set_subject('Categorie');
            $crud->columns('nom','image','urlcategorie');
            $crud->required_fields('nom');
            $crud->set_field_upload('image','assets/uploads/files');
            $crud->display_as('nom','Nom');
            $crud->display_as('image','Image illustratif');
            $crud->display_as('urlcategorie','Url pour y acceder');
            $crud->callback_before_insert(function ($post_array)  {
                if (empty($post_array['image'])) {
                    $post_array['image'] = ' default-categorie-image.jpg';
                }
                if (empty($post_array['urlcategorie'])) {
                    $post_array['urlcategorie'] = $this->slugify($post_array['nom']);
                }
                else {
                    $post_array['urlcategorie'] = $this->slugify($post_array['urlcategorie']);
                }
                $post_array['nom'] = ucwords($post_array['nom']);
                return $post_array;
            });

            $crud->callback_before_update(function ($post_array)  {
                if (empty($post_array['image'])) {
                    $post_array['image'] = ' default-categorie-image.jpg';
                }
                if (empty($post_array['urlcategorie'])) {
                    $post_array['urlcategorie'] = $this->slugify($post_array['nom']);
                }
                else {
                    $post_array['urlcategorie'] = $this->slugify($post_array['urlcategorie']);
                }
                return $post_array;
            });
            $output = $crud->render();
            $output = (array) $output;
            $output['page'] = 'crud';
            $output['task'] = 'CRUD - Categorie';
            $output['title'] = 'Categorie';
            $this->load->view('BO-template.php', $output);
        }catch(Exception $e){
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    public function article (){
        try {
            $this->load->library('grocery_CRUD');
            $crud = new grocery_CRUD();
            $this->load->model('Article');
            // $crud->set_theme('datatables');
            $crud->set_table('article');
            $crud->set_subject('Article');
            $crud->columns('titre','image', 'description', 'datepubli','urlarticle');
            $crud->set_relation_n_n('Categories', 'tag', 'categorie', 'idarticle', 'idcategorie', 'nom');
            $crud->required_fields('titre');
            $crud->display_as('titre',"Titre de l'article");
            $crud->display_as('idCategorie',"Categorie");
            $crud->display_as('descriimage',"Description de l'image");
            $crud->display_as('description',"Résumé");
            $crud->set_field_upload('image','assets/uploads/files');
            
            $crud->unset_fields('datemodif');
            
            $crud->display_as('urlarticle','Url pour y acceder (sans / )');
            

            $crud->callback_before_insert(function ($post_array)  {
                
                try {
                    $post_array['titre']=trim($post_array['titre']);
                    $post_array['description']=trim($post_array['description']);
                    if (empty($post_array['urlarticle'])) {
                        $post_array['urlarticle'] = $this->slugify($post_array['nom']);
                    }
                    else {
                        $post_array['urlarticle'] = $this->slugify($post_array['urlarticle']);
                    }
                } catch (\Throwable $e) {
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
                return $post_array;
            });
            $crud->callback_after_insert(function ($post_array) {
                
            });
            $crud->callback_before_update(function ($post_array)  {
                $post_array['titre']=trim($post_array['titre']);
                $post_array['description']=trim($post_array['description']);
                if(empty($post_array['urlarticle'])){
                    $a = $this->slugify($post_array['titre']);
                    $post_array['urlarticle'] = trim($a);
                }  
                else {
                    $post_array['urlarticle']= $post_array['urlarticle'][0]='/' 
                                                    ? substr($post_array['urlarticle'],1) 
                                                    : $post_array['urlarticle'];
                    $post_array['urlarticle']=trim($this->slugify($post_array['urlarticle']));
                } 
                $post_array['urlarticle'] = $post_array['urlarticle'];
                return $post_array;
            });
            $output = $crud->render();
            $output = (array) $output;
            $output['page'] = 'crud';
            $output['task'] = 'CRUD - Article';
            $output['title'] = 'Article';
            $this->load->view('BO-template.php', $output);
        } catch (\Throwable $e) {
            show_error($e->getMessage().' --- '.$e->getTraceAsString());
        }
    }

    function slugify($text, string $divider = '-') {
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, $divider);

        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }

    public function Contenue (){
        $data = array();
        $this->load->model('Article');
        $data['listArticle'] = $this->Article->getAll();
        $data['title'] = "Contenue";
        $data['page'] = "contenue";
        $output['task'] = 'CRUD - Contenue';
        $this->load->view('BO-template.php', $data);
    }

    public function ContentOf($id=0){
        if ($id==0){
            $this->Contenue();
        }

        try{
            $this->load->library('grocery_CRUD');
            $crud = new grocery_CRUD();

            $this->load->model('Article');
            
            $obj = $this->Article->getContent(array('idarticle' => $id));

            $crud->set_table('contenue');
            $crud->set_subject('Contenue');
            $crud->where('idarticle',$id);

            $crud->columns('idarticle','titre', 'image', 'descriimage', 'texte', 'typecontenue', 'urlcontenue', 'ordre');
            
            $crud->field_type('typecontenue','dropdown',
                                array(
                                    '1' => 'Texte simple', 
                                    '2' => 'Texte avec image',
                                    '3' => 'Citation' , 
                                    '4' => 'Citation avec image'
                                )
                            );

            $crud->display_as('titre',"Titre du contenue");
            $crud->display_as('image',"Image");
            $crud->display_as('descriimage',"Description de l'image");
            $crud->display_as('texte',"Texte");
            $crud->display_as('typecontenue',"Type de contenue");
            $crud->field_type('emplacementimage','dropdown',
                array(
                    '1' => 'A Droite',
                    '2' => 'A Gauche'
                )
            );
            $crud->unset_fields("datemodification");
            $crud->display_as('emplacementimage',"Positionnement de l'image");
            $crud->display_as('urlcontenue',"Url vers le contenue");
            $crud->display_as('ordre',"Ordre");
            $crud->field_type('idarticle', 'hidden', $id);
            $crud->set_field_upload('image','assets/uploads/files');


            $crud->callback_before_insert(function ($post_array)  {
                
                try {
                    $post_array['titre']=trim($post_array['titre']);
                    $post_array['texte']=trim($post_array['texte']);
                    if (empty($post_array['urlcontenue'])) {
                        $post_array['urlcontenue'] = $this->slugify($post_array['nom']);
                    }
                    else {
                        $post_array['urlcontenue'] = $this->slugify($post_array['urlcontenue']);
                    }
                } catch (\Throwable $e) {
                    show_error($e->getMessage().' --- '.$e->getTraceAsString());
                }
                return $post_array;
            });

            $output = $crud->render();
            $output = (array) $output;
            $output['page'] = 'crud';
            $output['task'] = 'CRUD - Contenue pour l\'article n° '.$id;
            $output['title'] = 'Contenue';
            $this->load->view('BO-template.php', $output);
        }catch (\Exception $e){
            echo $e;
        }
    }
}