let todos=document.querySelectorAll(".ahmed");


todos.forEach(element => {
    let me=document.querySelectorAll(".mytodo")
    element.addEventListener("click",()=>{
        let todo=element.parentElement;
        if(element.checked==true){
            // element.parentNode.classList.add("finished")
            check=true;
            element.previousElementSibling.previousElementSibling.previousElementSibling.style.display="none";
            element.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.style.display="none";
            element.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.style.textDecorationLine="line-through";
            todo.remove();
            document.querySelector(".checked").append(todo); 
            
            
            
        }else{
            check=false;
            console.log(element);
            element.previousElementSibling.previousElementSibling.previousElementSibling.style.display="flex";
            element.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.style.display="flex";
            element.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.style.textDecorationLine="none";
            todo.remove();
            document.querySelector(".notchecked").append(todo);
            
            
            
        }
        let myid=element.previousElementSibling.previousElementSibling.firstElementChild.nextElementSibling.value
        console.log(myid);
        let xml=new XMLHttpRequest();
            xml.onload = function() {
                if (this.readyState == 4 && this.status == 200){
                    
                    
                }
                
                }
            xml.open("GET", "function.php?check="+check+"&"+"myid="+myid, true);
            xml.send();


    })
});
function edit(e){
    myp=e.target.nextElementSibling.nextElementSibling;
    e.target.previousElementSibling.style.display="none"
    myp.style.display="block"
    myp.firstElementChild.value=e.target.previousElementSibling.innerHTML
    e.target.style.display="none"
    e.target.nextElementSibling.style.display="none";
    e.target.nextElementSibling.nextElementSibling.style.display="flex";
    e.target.nextElementSibling.nextElementSibling.nextElementSibling.style.display="flex";
}
// function of delete 
function id_delet(id){
    if(confirm("Are u sure u want do delete it?")){
        let xml=new XMLHttpRequest();
        xml.onload = function() {
            if (this.readyState == 4 && this.status == 200){
                location.href="index.php";
                
            }
            
            }
        xml.open("GET", "function.php?del="+id, true);
        xml.send();
    }else{
        return
    }
}