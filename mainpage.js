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
            function delete_blog(xhttp)
            {
                alert(xhttp.responseText);
                document.getElementById("delete").innerHTML="Deleted successfully<i style=',"'font-size:15px; color:green' class='fas'>&#xf00c;</i>",';
            }
            function remove_blog(xhttp)
            {
                alert(xhttp.responseText);
                document.getElementById("remove").innerHTML="Removed successfully<i style=',"'font-size:15px; color:green' class='fas'>&#xf00c;</i>",';
            }