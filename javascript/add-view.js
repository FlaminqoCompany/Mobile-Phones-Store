let imagefolder, brandsql, modelsql, img_index = -1, br2 = 0;
let oglas_id;

function loadf(x){
    alert("Jeste");
    document.getElementById("zoomC").style.backgroundImage = "url('https://istyle.rs/media/catalog/product/cache/image/e9c3970ab036de70892d86c6d221abfe/i/p/iphone_13_midnight_pdp_image_position-1a__wwen_1_1.jpg')";
    document.getElementById("zoomC1").style.backgroundImage = "url('https://istyle.rs/media/catalog/product/cache/image/e9c3970ab036de70892d86c6d221abfe/i/p/iphone_13_midnight_pdp_image_position-1a__wwen_1_1.jpg')";
    $.ajax({
        type: "POST",
        url: "selectadcontent.php",
        data: {id: x},
        success: function(response){
            resultobj = JSON.parse(response);
            oglas_id = resultobj[0]["id"];
            document.getElementsByClassName("data")[1].innerHTML = resultobj[0]["category"];
            document.getElementsByClassName("data")[2].innerHTML = resultobj[0]["brand"];
            document.getElementsByClassName("data")[3].innerHTML = resultobj[0]["model"];

            var lokacija = "main_images/" + resultobj[0]["brand"] + " " + resultobj[0]["model"] + ".png";
            console.log(lokacija);
            document.getElementById("zoomC").style.backgroundImage = "url('"+lokacija+"')";
            document.getElementById("zoomC1").style.backgroundImage = "url('"+lokacija+"')";

            document.getElementById("title").innerHTML = resultobj[0]["title"];
            document.getElementsByClassName("data")[7].innerHTML = resultobj[0]["phone_number"];
            if(resultobj[0]["state"]==0){
                document.getElementsByClassName("data")[5].innerHTML = "novo (nekorisceno)";
            }
            else if(resultobj[0]["state"]==1){
                document.getElementsByClassName("data")[5].innerHTML = "polovno (korisceno)";
            }
            else{
                document.getElementsByClassName("data")[5].innerHTML = "nije navedeno stanje";
            }
            
            document.getElementById("description").innerHTML = resultobj[0]["description"];
            document.getElementsByClassName("data")[6].innerHTML = resultobj[0]["notes"];
            document.getElementsByClassName("data")[4].innerHTML = resultobj[0]["price"];
            document.getElementsByClassName("data")[9].innerHTML = resultobj[0]["creation_date"];
            document.getElementsByClassName("data")[8].innerHTML = resultobj[0]["location"];
            

            imagefolder = resultobj[0]["images"];
            brandsql = resultobj[0]["brand"];
            modelsql = resultobj[0]["model"];
            
            
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "/Mobile-Phones-Store/Mobile-Phones-Store/functionality/"+imagefolder, true);
            xhr.responseType = 'document';
            xhr.onload = () => {
            if (xhr.status === 200) {
                var elements = xhr.response.getElementsByTagName("a");
                for (x of elements) {
                if ( x.href.match(/\.(jpe?g|png|gif)$/) ) { 
                    let img = document.createElement("img");
                    img.src = x.href;
                    img.classList.add("images");
                    img.id = br2++;
                    document.getElementById("img-div").appendChild(img);
                    img.onclick = function(){
                        document.getElementById("zoomC").style.backgroundImage = "url('" +img.src+"')";
                        document.getElementById("zoomC1").style.backgroundImage = "url('" +img.src+"')";
                        img_index = img.id;
                    };
                } 
                };
            } 
            else {
                alert('Request failed. Returned status of ' + xhr.status);
            }
            }
            xhr.send()

            
            var file_name = "../";

            switch(brandsql){
                case "Apple":
                    file_name += "apple.csv";
                    break;
                case "Samsung":
                    file_name += "samsung.csv";
                    break;
                case "Asus":
                    file_name += "asus.csv";
                    break;
                case "Huawei":
                    file_name += "huawei.csv";
                    break;
                case "Alcatel":
                    file_name += "alcatel.csv";
                    break;
            }
            

            var tabela = document.getElementById("specs-table");
            Papa.parse(file_name, {
                download: true,
                complete: function(results) {
                    for(var i = 0; i < results.data.length; i++){
                        if(results.data[i][0] == brandsql && results.data[i][1] == modelsql){
                            Papa.parse('../gsm.csv', {
                                download: true,
                                complete: function(results2) {
                                    for(var j = 0; j < results2.data[0].length; j++){
                                        var tr = document.createElement('tr');
                
                                        var th = document.createElement('th');
                                        th.classList.add("prva_kolona");
                                        var text = document.createTextNode(results2.data[0][j]);
                                        th.appendChild(text);
                                        tr.appendChild(th);
                
                                  
                                        var th2 = document.createElement('th');
                                        th2.classList.add("druga_kolona");
                                        if(results.data[i][j] != '') var text2 = document.createTextNode(results.data[i][j]);
                                        else var text2 = document.createTextNode('/');
                                        th2.appendChild(text2);
                                        tr.appendChild(th2);
                
                                        tabela.appendChild(tr);
                                    }
                                    console.log(oglas_id);
                                    $.ajax({
                                        type: "POST",
                                        url: "nameuserid.php",
                                        data: {id: oglas_id},
                                        success: function(response){
                                            resultobj = JSON.parse(response);
                                            document.getElementsByClassName("data")[0].innerHTML = resultobj[0]["name"] + " " + resultobj[0]["surname"] ;

                                        }
                                    });
                                }
                            });
                            break;
                        }
                        else
                            x = -1;
                    }
                }
            });
        }
    });

    addZoom("zoomC");
        
}

function show_description(){
    var div = document.getElementById("description-div");
    var div1 = document.getElementById("specs-div");
        
    div1.style.display = "none";
    div.style.display = "block";
}

function show_specs(){
    var div = document.getElementById("description-div");
    var div1 = document.getElementById("specs-div");

    div.style.display = "none";
    div1.style.display = "block";
}


var addZoom = (target) => {
    // (A) GET CONTAINER + IMAGE SOURCE
    let container = document.getElementById(target),
        imgsrc = container.currentStyle || window.getComputedStyle(container, false);
        imgsrc = imgsrc.backgroundImage.slice(4, -1).replace(/"/g, "");
   
    // (B) LOAD IMAGE + ATTACH ZOOM
    let img = new Image();
    img.src = imgsrc;
    img.onload = () => {
      // (B1) CALCULATE ZOOM RATIO
      let ratio = img.naturalHeight / img.naturalWidth;
   
      // (B2) ATTACH ZOOM ON MOUSE MOVE
      container.onmousemove = (e) => {
        let rect = e.target.getBoundingClientRect(),
            xPos = e.clientX - rect.left,
            yPos = e.clientY - rect.top,
            xPercent = xPos / (container.clientWidth / 100) + "%",
            yPercent = yPos / ((container.clientWidth * ratio) / 100) + "%";
   
        Object.assign(container.style, {
          backgroundPosition: xPercent + " " + yPercent,
          backgroundSize: img.naturalWidth + "px"
        });
      };
   
      // (B3) RESET ZOOM ON MOUSE LEAVE
      container.onmouseleave = (e) => {
        Object.assign(container.style, {
          backgroundPosition: "center",
          backgroundSize: "cover"
        });
      };
    }
  };
   

 function next_img(){
     if(img_index == br2 -1 ){
         img_index = 0;
     }
     else{
         img_index++;
     }
    let img = document.getElementsByClassName("images")[img_index]; 
    document.getElementById("zoomC").style.backgroundImage = "url('" +img.src+"')";
    
 }

 function prev_img(){
    if(img_index == 0 ){
        img_index = br2 -1 ;
    }
    else{
        img_index--;
    }
    let img = document.getElementsByClassName("images")[img_index]; 
    document.getElementById("zoomC").style.backgroundImage = "url('" +img.src+"')";
 }

 function next_img1(){
    if(img_index == br2 -1 ){
        img_index = 0;
    }
    else{
        img_index++;
    }
   let img = document.getElementsByClassName("images")[img_index]; 
   document.getElementById("zoomC1").style.backgroundImage = "url('" +img.src+"')";
   
}

function prev_img1(){
   if(img_index == 0 ){
       img_index = br2 -1 ;
   }
   else{
       img_index--;
   }
   let img = document.getElementsByClassName("images")[img_index]; 
   document.getElementById("zoomC1").style.backgroundImage = "url('" +img.src+"')";
}


 function open_img(){
    var div = document.getElementsByClassName("open-img-div")[0];
    div.style.display = "block";
 }

 function close_img(){
    var div = document.getElementsByClassName("open-img-div")[0];
    div.style.display = "none";
 }

 