<?php

include('db_connect.php');
include('Moderatorheader/moderatorhead.php');

if(isset($_POST['delete']))
{
    $a = $_GET['sl'];
    $sql1 = "DELETE FROM post WHERE sl = '$a' ";

if (mysqli_query($con, $sql1)) {
  header("location:ViewRequest.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
}

if(isset($_POST['approve']))
{
    $a = $_GET['sl'];
    $sql2 = "update post set status = '1' WHERE sl = '$a' ";

if (mysqli_query($con, $sql2)) {
  header("location:ViewRequest.php");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}
}

?>
<style>
*{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
}
body{
    font-family: Helvetica;
    -webkit-font-smoothing: antialiased;

}
h2{
    text-align: center;
    font-size: 18px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: white;
    padding: 30px 0;
}

/* Table Styles */

.table-wrapper{
    margin: 10px 70px 70px;

}

.fl-table {
    border-radius: 5px;
    font-size: 12px;
    font-weight: normal;
    border: none;
    border-collapse: collapse;
    width: 99%;
    /* padding-top: 34px; */
    /* align-items: center; */
    max-width: 69%;
    margin-left: 257px;
    margin-top: -12px;
    white-space: nowrap;
    background-color: #1f80fd;
}

.fl-table td, .fl-table th {
    text-align: center;
    padding: 8px;
}

.fl-table td {
    border-right: 1px solid #f8f8f8;
    font-size: 12px;
}

.fl-table thead th {
    color: #ffffff;
    background: #4FC3A1;
}


.fl-table thead th:nth-child(odd) {
    color: #ffffff;
    background: #324960;
}

.fl-table tr:nth-child(even) {
    background: #F8F8F8;
}

/* Responsive */

@media (max-width: 767px) {
    .fl-table {
        display: block;
        width: 100%;
    }
    .table-wrapper:before{
        content: "Scroll horizontally >";
        display: block;
        text-align: right;
        font-size: 11px;
        color: white;
        padding: 0 0 10px;
    }
    .fl-table thead, .fl-table tbody, .fl-table thead th {
        display: block;
    }
    .fl-table thead th:last-child{
        border-bottom: none;
    }
    .fl-table thead {
        float: left;
    }
    .fl-table tbody {
        width: auto;
        position: relative;
        overflow-x: auto;
    }
    .fl-table td, .fl-table th {
        padding: 20px .625em .625em .625em;
        height: 60px;
        vertical-align: middle;
        box-sizing: border-box;
        overflow-x: hidden;
        overflow-y: auto;
        width: 120px;
        font-size: 13px;
        text-overflow: ellipsis;
    }
    .fl-table thead th {
        text-align: left;
        border-bottom: 1px solid #f7f7f9;
    }
    .fl-table tbody tr {
        display: table-cell;
    }
    .fl-table tbody tr:nth-child(odd) {
        background: none;
    }
    .fl-table tr:nth-child(even) {
        background: transparent;
    }
    .fl-table tr td:nth-child(odd) {
        background: #F8F8F8;
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tr td:nth-child(even) {
        border-right: 1px solid #E6E4E4;
    }
    .fl-table tbody td {
        display: block;
        text-align: center;
    }
}

div.gallery {
  margin: -98px;
      border: 1px solid #ccc;
      float: right;
      width: 274px;
      margin-top: 30px;
      margin-right: 204px;
      /* tab-size: 10px; */
      /* -webkit-text-stroke-width: medium; */
      color: #7e3ce7;
      font-size: larger;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>

<section><div class="table-wrapper">
    <table class="fl-table">
      <thead>
      <tr>
          <th>Category</th>
          <th>Room</th>
    <th>Bedroom</th>
          <th>Dining</th>
          <th>Drawing</th>
          <th>Attach Bathroom</th>
          <th>Common Bathroom</th>
          <th>Balcony</th>
          <th>Floor</th>
          <th>Lift</th>
          <th>Block</th>
          <th>Road</th>
          <th>Rent</th>
          <th>Owner</th>
      </tr>
      </thead>


        <tbody>
        <?php
        $sl = $_GET['sl'];
        $sql = " select * from post where sl = '$sl' ";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
       ?>
       <tr>


           <td><?php echo $row['category'];?></td>

           <td><?php echo $row['room'];?></td>

           <td><?php echo $row['bedroom'];?></td>

           <td><?php echo $row['dining'];?></td>

           <td><?php echo $row['drawing'];?></td>

        <td><?php echo $row['attachbathroom'];?></td>

           <td><?php echo $row['commonbathroom'];?></td>

           <td><?php echo $row['balcony'];?></td>

           <td><?php echo $row['floor'];?></td>

          <td><?php echo $row['lift'];?></td>

           <td><?php echo $row['block'];?></td>

          <td><?php echo $row['road'];?></td>

          <td><?php echo $row['rent'];?></td>

           <td><?php echo $row['owner'];?></td>
     </tr>

<!-- there will be 3 button view picture;approve;delete and back button will be common button-->
       <td><form method="POST"><input type= "submit" value = "Delete" name = "delete"></td>
       <td><input type= "submit" value = "APPROVE" name = "approve"></form></td>
       <tr><td><a href = "ViewRequest.php">BACK</a></td></tr>
 <tbody>
    </table>
</div></section>
<div class="gallery">
  <a target="_blank" href="<?php echo $row['photo1'];?>">
    <img src="<?php echo $row['photo1'];?>" alt="Cinque Terre" width="600" height="400">
  </a>

</div>

<div class="gallery">
  <a target="_blank" href="<?php echo $row['photo2'];?>">
    <img src="<?php echo $row['photo2'];?>" alt="Forest" width="600" height="400">
  </a>

</div>

<div class="gallery">
  <a target="_blank" href="<?php echo $row['photo3'];?>g">
    <img src="<?php echo $row['photo3'];?>" alt="Northern Lights" width="600" height="400">
  </a>

</div>


  </body>
</html>
