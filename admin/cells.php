<?php
session_start();
include_once("includes/header.php");
include_once("includes/navbar.php");

?>
<body>
    
<div>
			<style>
				.on{
					justify-content: center;
				 	align-items: center;
					
					width: 100%;  
					min-height: 1vh;
					display: -webkit-box;
					display: -webkit-flex;
					display: -moz-box;
					display: -ms-flexbox;
					display: flex;
					flex-wrap: wrap;
					justify-content: center;
					align-items: center;
					padding: 15px;
                    
					
				}
                .off {
                    border-style: ridge;
                    width: 50%;
                    boder
                }
                .pbtn
                {
                    font-family: Montserrat-Bold;
                    font-size: 15px;
                    line-height: 1.5;
                    color: #ff0f;
                    text-transform: Lowercase;

                    width: 100%;
                    height: 30px;
                    border-radius: 25px;
                    background: blue;
                    display: -webkit-box;
                    display: -webkit-flex;
                    display: -moz-box;
                    display: -ms-flexbox;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    padding: 0 25px;

                    -webkit-transition: all 0.4s;
                    -o-transition: all 0.4s;
                    -moz-transition: all 0.4s;
                    transition: all 0.4s;

                    margin-left: 10%;
                }
			</style>

                   <script type="text/javascript">
                    
                    function printContent(id){
                    str=document.getElementById(id).innerHTML
                    newwin=window.open('','printwin','left=100,top=100,width=400,height=400')
                    newwin.document.write('<HTML><head><link rel =\"stylesheet\" type=\"text/css\"href=\"css/style.css\"/>')
                    newwin.document.write('<HTML><head><link rel =\"stylesheet\" type=\"text/css\"href=\"css/strip.css\"/>')
                    newwin.document.write('<HTML><head><link rel =\"stylesheet\" type=\"text/css\"href=\"css/responsive.css\"/>')
                    newwin.document.write('<HTML><head><link rel =\"stylesheet\" type=\"text/css\"href=\"css/main.min.css\"/>')
                    newwin.document.write('<head><link rel=\"stylesheet\" type=\"text/css\" href=\"css/bootstrap-3.1.1.min.css\"/>')
                    newwin.document.write('<HTML>\n<HEAD>\n')
                    newwin.document.write('<TITLE>Print Page</TITLE>\n')
                    newwin.document.write('<script>\n')
                    newwin.document.write('function chkstate(){\n')
                    newwin.document.write('if(document.readyState=="complete"){\n')
                    newwin.document.write('window.close()\n')
                    newwin.document.write('}\n')
                    newwin.document.write('else{\n')
                    newwin.document.write('setTimeout("chkstate()",2000)\n')
                    newwin.document.write('}\n')
                    newwin.document.write('}\n')
                    newwin.document.write('function print_win(){\n')
                    newwin.document.write('window.print();\n')
                    newwin.document.write('chkstate();\n')
                    newwin.document.write('}\n')
                    newwin.document.write('<\/script>\n')
                    newwin.document.write('</HEAD>\n')
                    newwin.document.write('<BODY onload="print_win()">\n')
                    newwin.document.write(str)
                    newwin.document.write('</BODY>\n')
                    newwin.document.write('</HTML>\n')
                    newwin.document.close()
                    }
                    </script>  
                    <script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
        
	</script>
    <script src="js/main.js"></script>
            <table>
                <tr>
                    <td>
                        <button class = "btn btn-success" onclick="printContent('printId')"> Print your Id card</button>
                    </td>

                </tr>

            </table>
		
	</div>
	

<div class="card-body" id="printId">

    <div class="table-responsive">

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th>Description</th>
            <!-- <th>Password</th> -->
            <th>EDIT </th>
            <th>DELETE </th>
        </tr>
        </thead>
        <tbody>
            <?php
                $sq = "SELECT * FROM t_cell";
                $sql = mysqli_query(mysqli_connect("localhost","root","","civicTech"), $sq);
                if($sql){
                while ($rr = mysqli_fetch_array($sql)) {
                    # code...
                    //echo("salut");
                
                

                
            ?>
        <tr>
            <td> <?php echo($rr['C_id']);?> </td>
            <td>  <?php echo($rr['C_name']);?> </td>
            <td> <?php
                    echo($rr['C_contacts']);
            ?></td>
             <td>
             
                <form action="includes/edit.php?id=<?php echo($va)?>" method="post">
                    <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
           
            <td>
                <form action="includes/deletemyaccount.php?id=<?php echo($va)?>" method="post">
                  <input type="hidden" name="delete_id" value="">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
        
           
        
           

        </tr>
        <?php
        // 
            }
                    
        }
        ?>
        
        </tbody>
    </table>

    </div>
</div>
</body>
