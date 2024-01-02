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
        // PostImmagine è un booleano serve per capire se è stata caricata un'immagine o no
        // Url nome.jpg immagine
        $query = "SELECT Id_Post, Spotify_Id, Testo, Timestamp, PostImmagine, Url, Username FROM post, utente
         WHERE Id_utente=Email";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $final_result = $result->fetch_all(MYSQLI_ASSOC);

        $i = 0;
        foreach ($final_result as $elem) :
            // aggiungo un array di # messi sotto quel posto
            $tag_array = array();
            $stmt = $this->db->prepare("SELECT Id_tag FROM POST_TAG WHERE Id_post = ?");
            $stmt->bind_param("s", $elem["Id_Post"]);
            $stmt->execute();
            $result = $stmt->get_result();
            $result_query = $result->fetch_all(MYSQLI_ASSOC);
            foreach ($result_query as $tag) :
                // array_push() treats array as a stack, and pushes the passed variables onto the end of array
                array_push($tag_array, $tag['Id_tag']);
            endforeach;
            $final_result[$i]["all_tags"] = $tag_array;
            // ----------------------------------------------
            //var_dump($final_result);

            
            // aggiungo per ogni post il numero di commenti in base all'id del post
            $stmt = $this->db->prepare("SELECT COUNT(Id_Commento) AS numcommenti FROM commento WHERE Id_Post = ?");
            $stmt->bind_param("i", $elem["Id_Post"]);
            $stmt->execute();
            $result = $stmt->get_result();

            //var_dump($result->fetch_all(MYSQLI_ASSOC)[0]["numcommenti"]);
            $number_comment = $result->fetch_all(MYSQLI_ASSOC)[0]["numcommenti"];
            $final_result[$i]["numcommenti"] = $number_comment;
            // ----------------------------------------------

            // aggiungo per ogni post i likes ricevuti
            $stmt = $this->db->prepare("SELECT COUNT(Id_post) AS numlikes FROM MI_PIACE WHERE Id_post = ?");
            $stmt->bind_param("i", $elem["Id_Post"]);
            $stmt->execute();
            $result = $stmt->get_result();

            $number_likes = $result->fetch_all(MYSQLI_ASSOC)[0]["numlikes"];
            $final_result[$i]["numlikes"] = $number_likes;
            // ----------------------------------------------
            $i++;
            //var_dump($final_result);
        endforeach;

        return $final_result;
    }

    // return all info of user by id (email)
    public function getInfoUser($email) {
        $stmt = $this->db->prepare("SELECT * FROM utente WHERE Email=?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
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