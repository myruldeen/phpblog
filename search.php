<?php include("includes/header.php"); ?>
<?php 


// $page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

// $items_per_page = 1;
// // $items_total_count = Photo::count_all();


// $items_total_count = Photo::find_pattern($search);



// $paginate = new Paginate($page, $items_per_page, $items_total_count);


// $sql = "SELECT * FROM photos ";
// $sql .= "LIMIT {$items_per_page} ";
// $sql .= "OFFSET {$paginate->offset()}";


if (isset($_POST['cari'])) {
    $search = $_POST['search'];
}

$photos = Photo::find_pattern($search);









 ?>


        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                
                    <?php //$photos = Photo::find_all_desc(); 

                    foreach ($photos as $photo) {?>

                        <div class="panel panel-default">

                            <a href="photo.php?id=<?php echo $photo->id; ?>"><img class="panel-img-top" src="admin/<?php echo $photo->picture_path(); ?>" alt="sdsdf" width="100%"></a>
                            <div class="panel-body">
                        
                                <h2><?php echo $photo->title; ?></h2>
                                <p><?php echo $photo->description; ?></p>
                            <a href="#" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                             <div class="panel-footer">
                                 Posted on January 1, 2017 by
                                <a href="#">Start Bootstrap</a>
                             </div>
                        </div>

                        <?php
                        
                    }
                    ?>
                     
                     
            
          
         

            </div>
            




            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

            
                 <?php include("includes/sidebar.php"); ?>



        </div>
       
                
            
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
