<h1>Welcome to Hellenic Bookstore</h1>
<table class="table table-striped mb-2">
  <?php
  // $cat = $_REQUEST['catid'];
  $limit = 4;

  $page = isset($_GET["page"]) ? $_GET["page"] : 1;
  $start = ($page - 1) * $limit;

  $sql = "SELECT ID,Title,Price, Bookcover FROM product LIMIT $start, $limit";
  $result = $mysqli->query($sql);

  $sql2 = "SELECT COUNT(ID) As id FROM product";
  $result1 = $mysqli->query($sql2);
  $resultcount = $result1->fetch_all(MYSQLI_ASSOC);
  $total = $resultcount[0]['id'];

  $pages = ceil($total / $limit);
  $Previous = $page - 1;
  $Next = $page + 1;
  print "<input type = 'text' id='searchtxt'  placeholder='Enter Book Name' style = 'position:absolute; left:900px; top:-43px; height:38px;'/>
  <button class='btn btn-dark' onclick='doSearch()' style = 'position:absolute; left:1112px; top:-43px;'>Search</button>";

  if ($result->num_rows > 0) {
    $pagestatusprev = ($page == 1) ? 'disabled' : '';
    $pagestatusnext = ($page == $pages) ? 'disabled' : '';

    print "<nav aria-label='Page navigation'>
             <ul class='pagination justify-content-center'>
             <li class='page-item $pagestatusprev'>
             <a class='page-link' href='index.php?p=products&page=$Previous' aria-label='Previous'>
            <span aria-hidden='true'> &laquo Previous</span>
             </a>
            </li>";

    for ($i = 1; $i <= $pages; $i++) {
      print "<li class='page-item'><a class='page-link' href='?p=products&page=$i'>$i</a></li>";
    }

    print " <li class='page-item $pagestatusnext'>
                 <a class='page-link' href='?p=products&page=$Next' aria-label='Next'>
                   <span aria-hidden='true'>Next &raquo</span>
                 </a>
               </li>";
    print "</ul>
           </nav> ";

    print "<tr> 
        <th style='width:10%'> Thumbnail </th>
        <th style='width:50%'> Name </th>
        <th style='width:10%'> Price </th>
        </tr>";

    while ($row = $result->fetch_assoc()) {

      print "<tr>
                <td> <img style ='width:60px' src='Assets/img/BookCover/$row[Bookcover]'></td> " .
        "<td> <a href= '?p=productinfo&pid=$row[ID]'>$row[Title]</a></td>" .
        "<td>$row[Price] &euro; </td>  
                </tr>";
    }
  } else {
    echo "0 results";
  }
  ?>
</table>