<?php

class help {

    private $question, $answer, $id, $database;

    public function __construct() {
        
    }

    public function setId($id) {
        $this->id = $this->database->escape($id);
    }

    public function connectDatabase() {
        require_once './database.php';
        global $database;
        $this->database = $database;
    }

    public function setDatabase($database) {
        $this->database = $database;
    }

    public function getQuestion() {
        $query = "SELECT `question` FROM `help` WHERE `questionid`='$this->id'";
        $result = $this->database->query($query);
        $result = $this->database->fetchArray($result);
        return $result['question'];
    }

    public function getAnswer() {
        $query = "SELECT `answer` FROM `help` WHERE `questionid`='$this->id'";
        $result = $this->database->query($query);
        $result = $this->database->fetchArray($result);
        return $result['answer'];
    }

    public function setQuestion($question) {
        $this->question = $this->database->escape($question);
    }

    public function setAnswer($answer) {
        $this->answer = $this->database->escape($answer);
    }

    public function getAllQuestions() {
        $query("SELECT * FROM HELP WHERE ANSWERED=0");
        $result = $this->database->query($query);
        return $result;
    }

    public function storeAnswer() {
        $query = "UPDATE `help` SET `answer`='$this->answer',`answered`='1' WHERE `questionid`='$this->id'";
        $this->database->query($query);
    }

    public function storeQuestion() {
        $query = "INSERT INTO  `help` (`question`) VALUES ('$this->question')";
        $this->database->query($query);
    }

    public function getTopFive() {
        $query = "SELECT * FROM help WHERE ANSWERED='1' order by questionid DESC LIMIT 5";
        $result = $this->database->query($query);
        return $result;
    }

}

$help = new help();
?>