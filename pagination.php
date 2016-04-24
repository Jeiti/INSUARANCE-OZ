

    <ul class="pagination">
        <li><a href="index.php?num=1">&lt;&lt;</a></li>
        <li><a href="index.php?num=<?php print($_GET['num']-1);?>">&lt;</a></li>

        <?php
        $selected_page = ceil(OUTPUTNEWS/2)+1;
        $start_count_pages = ceil(OUTPUTNEWS/2)-1;
        if(!isset($_GET['num']) || $_GET['num']<$selected_page){
            for ($i=1; $i<=OUTPUTNEWS;$i++){
                if($page_count>OUTPUTNEWS){
                    echo ("<li><a href='#' id='pagination'>$i</a></li>");// в href стояло - href='index.php?num=$i'
                    if($i==OUTPUTNEWS){
                        echo "<li><a href='#'>...</a></li>";
                    }
                }
            }
        }
        else{
            if($_GET['num']>=$selected_page){
                echo "<li><a href='#'>...</a></li>";
                for($i=$start_count_pages;$i<=$start_count_pages+$selected_page;$i++){
                    echo ("<li><a href='#' id='pagination'>$i</a></li>");// в href стояло - href='index.php?num=$i'
                }
                if ($_GET['num']<$selected_page){
                    echo "<li><a href='#'>...</a></li>";
                }

            }
        }

        ?>

        <li><a href="index.php?num=<?php print($_GET['num']+1);?>">&gt;</a></li>
        <li><a href="index.php?num=<?php print($page_count);?>">&gt;&gt;</a></li>
    </ul>

</div>
