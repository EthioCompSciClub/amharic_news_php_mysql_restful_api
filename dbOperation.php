<?php
    include('database.php');
    class DatabaseOperation{

        private $pdo;

        function __construct($db){
            $this->pdo = $db;
        }

        function insert($title, $title_href, $title_img, $logo, $logo_link, $title_date){
            $sql = 'INSERT INTO newsapi
                    SET
                        title = :title, 
                        title_href = :href,
                        title_img = :img,
                        logo = :logo, 
                        logo_link = :llink,
                        title_date = :tdate';
            $stmt = $this->pdo->prepare($sql);

            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':href', $title_href);
            $stmt->bindParam(':img', $title_img);
            $stmt->bindParam(':logo', $logo);
            $stmt->bindParam(':llink', $logo_link);
            $stmt->bindParam(':tdate', $title_date);

            $stmt->execute();
        }

        function search($title){
            $sql = 'SELECT * FROM newsapi
                    WHERE title LIKE :title_search';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':title_search', '%' .$title.'%', PDO::PARAM_INT);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                return true;
            }else{
                return false;
            }
        }
    }