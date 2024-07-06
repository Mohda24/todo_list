<?php
include("config.php");
function addtask(){
    if(isset($_GET["task"])){
        global $conn;
        $task=$_GET["task"];
        $query="INSERT INTO task(nom) value(?)";
        $stm=$conn->prepare($query);
        $stm->execute([$task]);
        if($stm){
            header("location:index.php");
        }
        
    }
}
function afficher(){
    global $conn;
        $query="SELECT * from task where is_finished=? order by id_task DESC";
        $stm=$conn->prepare($query);
        $stm->execute([false]);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}
function afficher1(){
    global $conn;
        $query="SELECT * from task where is_finished=? order by id_task DESC";
        $stm=$conn->prepare($query);
        $stm->execute([true]);
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        return $result;
}
function updatetask($id){
    global $conn;
    if(isset($_GET["sbm"])){
        $text=$_GET["update"];
        if(!empty($text)){
            $stmt=$conn->prepare("UPDATE task set nom=? where id_task=?");
            $stmt->execute([$text,$id]);
            if($stmt){
                header("location:index.php");
            }
        }
    }
    
}
function delete($id){
    global $conn;
    $stm=$conn->prepare("DELETE FROM task WHERE id_task=?");
    $stm->execute([$id]);
    if($stm){
        echo "succes";
    }
}
if(isset($_GET["add"])){
    addtask();
}
if(isset($_GET["sbm"])){
    updatetask($_GET["id"]);
}
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["check"])){
    global $conn;
    $finich=$_GET["check"];
    $id=$_GET["myid"];
    $stm=$conn->query("UPDATE task SET is_finished=$finich where id_task=$id");
    if($stm){
        echo "good";
    }

}
if($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["del"])){
    delete($_GET["del"]);
}

?>