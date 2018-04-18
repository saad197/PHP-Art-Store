
<?php
include "includes/config.inc.php";
include "includes/browse-gallery.inc.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <?php include "includes/head.inc.php";?>
        <style>
            .content{
                height: 60px;
                border-bottom : 0.5px solid grey;
                margin: 10px;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <?php include 'includes/primary-navigation.inc.php';?>
        <?php
            $galleriesInfo = getGalleryInfo();
            while ($row = $galleriesInfo->fetch()) {
        ?>
        <div class="item">
            <i class="large marker middle aligned icon"></i>
            <div class="content">
                <a href="single-gallery.php?id=<?php echo $row['GalleryID']; ?>" class="header">
                    <?php
                    if ($row['GalleryName'] === $row['GalleryNativeName']) {
                        echo $row['GalleryName'];
                    } else {
                        echo $row['GalleryName'] . ' [' . $row['GalleryNativeName'] . ']';
                    }

                    ?>
                </a>
                <div class="description"><?php echo $row['GalleryCity'] . ', ' . $row['GalleryCountry']; ?></div>
            </div>
        </div>
        <?php
        }
        ?>
    </body>
</html>