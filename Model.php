<?php
namespace Modules\BaseX {
    use \Components\Validation;
    use \Components\Validator;     
    final class Model extends \Components\Core\Mapper\Model {
        use \Modules\BaseX;
        public function __construct() {
            parent::__construct([
                "username" => new Validation(false, [new Validator\IsString]),
                "password" => new Validation(false, [new Validator\IsString]),
                "host" => new Validation(false, [new Validator\IsString\IsUrl]),
                "query" => new Validation(false, [new Validator\IsString\IsPath]),
                "tag" => new Validation(false, [new Validator\IsString])
            ]);
            
            $this->model = __DIR__ . DIRECTORY_SEPARATOR . "Model.tpl";
            $this->use = "\Modules\BaseX";
        }   

        public function setup() {
            $xpath = new \DOMXPath($this->fetchDOM($this->query));
            foreach ($xpath->query("//*") as $node) {
                $model = new \Modules\BaseX\Api\Model;
                $model->request = sprintf("%s\%s", $this->namespace, $this->class);
                $model->node = $node;
                $model->namespace = sprintf("%s\%s", $this->namespace, $this->class);
                $model->use = "\Modules\BaseX\Api";
                $model->setup();       
            }                
        }
        
        public function __destruct() {
            $this->remove("query");
            parent::__destruct();
        }        
    }
}
