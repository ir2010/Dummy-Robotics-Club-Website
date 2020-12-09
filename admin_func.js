function loadDoc(url,n, func)
            {
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function()
                {
                    if(this.readyState == 4 && this.status == 200)
                    {
                        func(this,n);
                    }
                };
                xhttp.open("POST",url, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("task="+func.name);
            }
            function edit_blog(xhttp,n)
            {
                //alert(xhttp.responseText);
                //document.getElementById("admin_portal").innerHTML=xhttp.responseText;
                document.write(xhttp.responseText);
                
            }
            function approve_blog(xhttp,n)
            {
                //alert(xhttp.responseText); 
                document.getElementById("id"+n).innerHTML="Approved and added to website successfully<i style='font-size:15px; color:green' class='fas'>&#xf00c;</i>";
                
            }
            function delete_blog(xhttp,n)
            {
                //alert(xhttp.responseText);
                document.getElementById("id"+n).innerHTML="Deleted successfully<i style='font-size:15px; color:green' class='fas'>&#xf00c;</i>";
            }
            function approve_all_blogs(xhttp,n)
            {
                alert(xhttp.responseText);
                var x =  document.getElementsByClassName("blog row");
                for(var i=0;i<x.length;i++)
                {
                    x[i].innerHTML="Approved and added to website successfully<i style='font-size:15px; color:green' class='fas'>&#xf00c;</i>";
                }
            }