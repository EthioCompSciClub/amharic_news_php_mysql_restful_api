<?php

    class Read{

        private $conn;
        // public $id;
        // public $title;
        // public $title_href;
        // public $title_img;
        // public $title_logo;
        // public $title_logo_link;
        // public $title_date;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $sql = 'SELECT * FROM
                    newsapi
                    ORDER BY title_date DESC';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt;
        }

        public function search_date($interval){
            $sql = 'SELECT * FROM
                    newsapi
                    WHERE DATE(title_date) <= CURDATE() - INTERVAL ' .$interval. ' DAY';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt;
        }

        public function delete_date($interval){
            $sql = 'DELETE FROM
                    newsapi
                    WHERE DATE(title_date) <= CURDATE() - INTERVAL ' .$interval. ' DAY';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return $stmt;
        }
    }