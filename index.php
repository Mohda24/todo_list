<?php
include("config.php");
include("function.php");
$data=afficher();
$data1=afficher1();




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todo-list</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">                                                                                           
</head>
<body>
    <main class="d-flex ">
        <form action="" id="added" class="d-flex align-items-center gap-1 mb-4">
            <input type="text" name="task">
            <button class="btn btn-primary py-1 px-2" name="add">Add</button>
        </form>
        <section class="d-flex notchecked flex-column gap-3">
            <?php
            foreach($data as $item){
            ?>
            <div class="mytodo d-flex gap-2 align-items-center border border-primary py-2 px-3 rounded">
                <p class="m-0 me-2"><?php echo $item["nom"];?></p>
                
                <a  class="edit" onclick="edit(event)">E</a>
                <a onclick="id_delet(<?=$item['id_task']?>)"  class="delete">D</a>
                <form style="display:none" action="">
                    <input type="text" name="update" style="border-radius: 10px;margin-right:5px">
                    
                    <input type="text" value="<?=$item["id_task"]?>" name="id" style="display:none">
                    <button type="submit" class="mohda" name="sbm">U</button>
                </form>
                <a href="" class="anuller" style="background:red;display:none;">A</a>
                <input type="checkbox" class="ahmed" name="checked" id="checked">
            </div>
            <?php
            }?>
        </section>
        <section class="d-flex checked flex-column gap-3" style="margin-top:6px;">
        <?php
            foreach($data1 as $item){
            ?>
            <div class="mytodo d-flex gap-2 align-items-center border border-primary py-2 px-3 rounded">
                <p class="m-0 me-2" style="text-decoration-line: line-through;"><?php echo $item["nom"];?></p>
                
                <a style="display:none;"  class="edit" onclick="edit(event)">E</a>
                <a onclick="id_delet(<?=$item['id_task']?>)"  class="delete">D</a>
                <form style="display:none" action="">
                    <input type="text" name="update" style="border-radius: 10px;margin-right:5px">
                    
                    <input type="text" value="<?=$item["id_task"]?>" name="id" style="display:none">
                    <button type="submit" class="mohda" name="sbm">U</button>
                </form>
                <a href="" class="anuller" style="background:red;display:none;">A</a>
                <input type="checkbox" class="ahmed" checked name="checked" id="checked">
            </div>
            <?php
            }?>
            
        
        </section>
    </main>
    
</body>
<script src="script.js"></script>
</html>