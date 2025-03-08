    var button=document.getElementById('btn');

    button.addEventListener("click",function(event){
        document.querySelector(".popup").style.display ="flex";
        const buttonClicked=event.target;
        // console.log(buttonClicked);
        var name = buttonClicked.parentElement.children[0].children[0].innerHTML;
        var count = buttonClicked.parentElement.children[2].children[1].value;
        var cost = count  * buttonClicked.parentElement.children[0].children[2].innerHTML;
         console.log(name,count,cost);
        document.getElementById('count').value=count;
        document.getElementById('cost').value=cost+'/-';
        document.getElementById('name').value=name;
        document.getElementById('image').src=buttonClicked.parentElement.parentElement.children[0].children[0].src;
        // console.log(buttonClicked.parentElement.parentElement.children[0].children[0].src)
    })
    document.getElementById('close').addEventListener("click",function(){
        document.querySelector(".popup").style.display ="none";
    })