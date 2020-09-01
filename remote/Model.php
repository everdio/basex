<?php
namespace Modules\BaseX\Remote {
    use Components\Validator;
    use Components\Validation;    
    class Model extends \Modules\Node\Xml\Model {
        public function __construct() {
            parent::__construct([
                "request" => new Validation(false, [new Validator\IsString])
            ]);
        }
        
        public function __destruct() {
            $this->remove("document");
            parent::__destruct();
        }
    }
}
