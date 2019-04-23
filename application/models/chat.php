<?php
    class Chat extends CI_Model {
        function __construct() {
            parent::__construct();
            
            $this->load->database();
            $this->create_table();
        }

        private function create_table() {
            if (!$this->db->table_exists('messages')) {
                $this->db->query("CREATE TABLE `chat`.`messages` ( `id` INT NOT NULL AUTO_INCREMENT , `user` TEXT NOT NULL , `message` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
            }
        }

        public function messages() {
            return $this->db->get('messages')->result_array();
        }

        public function insert($user, $message) {
            $data = array(
                'user' => $this->verify($user),
                'message' => $this->verify($message)
            );
            $this->db->insert('messages', $data);
        }

        private function verify($var) {
            $var = str_replace("<", "", $var);
            $var = str_replace(">", "", $var);
            return $var;
        }
    }
?>