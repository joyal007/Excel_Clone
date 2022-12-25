$(()=>{
  $("#white-rect").on('click',()=>{
    var characters = "ABCDEFGHIJKLMNOPQRSTUVWXTZabcdefghiklmnopqrstuvwxyz";  
              
    var lenString = 10;  
    var randomstring = '';  
    for (var i=0; i<lenString; i++) {  
    var rnum = Math.floor(Math.random() * characters.length);  
    randomstring += characters.substring(rnum, rnum+1);  
    }
    window.location.href = "http://localhost/webprogramming--project/index.php?filename="+randomstring
    
  })
  $(".signout-btn").on('click',()=>{
    console.log('HIii')
    $.post("./api/signout.php", function (data) {
      console.log(data)
      window.location.reload()
      
    })
  })
})