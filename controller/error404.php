<?php

class error404Controller extends baseController {

    public function index() {
        $this->registry->template->show('index', 'index');
    }

}

?>