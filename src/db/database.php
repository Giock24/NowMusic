<?php
// to create a single istance of DB, write require_once(path/db) where you need
class DatabaseHelper {

    private $db;

    public function __construct($servername, $username, $password, $dbname) {
        $this->db = new mysqli($servername, $username, $password, $dbname);

        if ($this->db->connect_error) {
            die("Connection Failed: " . $db->connect_error);
        } else {
            die("Connection Success with DB!!!");
        }
    }

    // add a new user into database
    public function addNewUser($username, $password, $email) {

    }

    // return true if that user exist otherwise false
    // and save id_user in cache variable
    public function login($email, $password) {

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