<?php
// to create a single istance of DB, write require_once(path/db) where you need
class DatabaseHelper {

    private $db;

    public function __construct($servername, $username, $password, $dbname) {
        $this->db = new mysqli($servername, $username, $password, $dbname);

        if ($this->db->connect_error) {
            die("Connection Failed: " . $db->connect_error);
        }
    }

    // add a new user into database
    public function addNewUser($username, $password, $email) {
        $stmt = $this->db->prepare("INSERT INTO utente (Username, Password, Email) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $password, $email);
        $stmt->execute();
        return $this->login($email, $password);
    }

    // return true if that user exist otherwise false
    // and save id_user in cache variable
    public function login($email, $password) {
        $stmt = $this->db->prepare("SELECT * FROM `utente` WHERE Email=? AND Password=?");
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // return all posts
    public function getAllPosts() {
        
    }

    // return all posts by Id_post
    public function getPostsById($id) {

    }

    // add a new post into database
    public function addNewPost($track, $desc, $time, $post_img, $url_img, $array_tag, $id_user) {
        // manca Id_community e Categoria

    }

}

?>