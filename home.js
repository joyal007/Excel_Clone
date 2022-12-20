$(()=>{
  $("#white-rect").on('click',()=>{
    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";  
              
    var lenString = 10;  
    var randomstring = '';  
    for (var i=0; i<lenString; i++) {  
    var rnum = Math.floor(Math.random() * characters.length);  
    randomstring += characters.substring(rnum, rnum+1);  
    }
    location.replace("http://localhost/webprogramming--project/index.php?filename="+randomstring)  
  })
})