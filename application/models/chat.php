<?php
    class Chat extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function messages() {
            return $this->db->get('messages')->results_array();
        }

        public function insert($user, $message) {
            $data = array(
                'user' => $user,
                'message' => $message
            );
            $this->db->insert('messages', $data);
        }
    }
?>