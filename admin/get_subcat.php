<?php
include('config.php');
if(!empty($_POST["cat_id"])) 
{
    $id=intval($_POST['cat_id']);
    $query=mysqli_query($conn,"SELECT * FROM sub_category WHERE categoryid='$id'");
?>
    <option value="">Select Subcategory</option>
    <?php
    while($row=mysqli_fetch_array($query,MYSQLI_ASSOC))
    {
    ?>
    <option value="<?php echo $row['id']; ?>"><?php echo $row['subcategoryName']; ?></option>
    <?php
    }
}
?>