<?php
namespace Modules\BaseX {
    trait Api {
        use \Modules\Node;
        use \Modules\BaseX;
        public function xpath(string $query) : \DOMNodeList {       
            $request = new $this->request;
            $xpath = new \DOMXPath($request->fetchDOM($query));
            return (object) $xpath->query(sprintf("//%s/*", $request->tag));
        }
    }
}